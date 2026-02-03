<?php
/**
 * AJAX фильтры для каталога
 * 
 * @package Termoservis
 */

// Получить все доступные фильтры (атрибуты и их значения)
add_action( 'wp_ajax_nopriv_get_available_filters', 'termoservis_get_available_filters' );
add_action( 'wp_ajax_get_available_filters', 'termoservis_get_available_filters' );

function termoservis_get_available_filters() {
    $filters = array();
    
    // Если WooCommerce активен
    if ( class_exists( 'WooCommerce' ) ) {
        // Получаем все атрибуты товаров
        $attributes = wc_get_attribute_taxonomies();
        
        if ( ! empty( $attributes ) ) {
            foreach ( $attributes as $attribute ) {
                $taxonomy = 'pa_' . $attribute->attribute_name;
                $terms = get_terms( array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => true, // Только товары с товарами
                ) );
                
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    $filter_data = array(
                        'label' => $attribute->attribute_label,
                        'name' => $attribute->attribute_name,
                        'values' => array(),
                    );
                    
                    foreach ( $terms as $term ) {
                        $filter_data['values'][] = array(
                            'value' => $term->slug,
                            'label' => $term->name,
                            'count' => $term->count,
                        );
                    }
                    
                    if ( ! empty( $filter_data['values'] ) ) {
                        $filters[] = $filter_data;
                    }
                }
            }
        }
    }
    
    // Если есть фильтры - возвращаем, иначе сообщаем
    if ( ! empty( $filters ) ) {
        wp_send_json_success( $filters );
    } else {
        wp_send_json_success( array() ); // Пустой массив без ошибки
    }
    
    wp_die();
}

// Фильтровать товары и вернуть результаты
add_action( 'wp_ajax_nopriv_filter_products', 'termoservis_filter_products' );
add_action( 'wp_ajax_filter_products', 'termoservis_filter_products' );

function termoservis_filter_products() {
    check_ajax_referer( 'catalog_nonce', 'nonce' );
    
    $filters = isset( $_POST['filters'] ) ? json_decode( stripslashes( $_POST['filters'] ) ) : array();
    $page = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : 1;
    
    // Базовые параметры запроса
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 12,
        'paged' => $page,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Если WooCommerce активен, используем его
    if ( class_exists( 'WooCommerce' ) ) {
        // Строим query для WooCommerce товаров
        $tax_query = array();
        
        if ( ! empty( $filters ) ) {
            foreach ( $filters as $filter ) {
                if ( is_object( $filter ) && ! empty( $filter->values ) ) {
                    $taxonomy = 'pa_' . $filter->name;
                    
                    $tax_query[] = array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $filter->values,
                        'operator' => 'IN',
                    );
                }
            }
            
            if ( ! empty( $tax_query ) ) {
                $tax_query['relation'] = 'AND';
                $args['tax_query'] = $tax_query;
            }
        }
    }
    
    $query = new WP_Query( $args );
    
    ob_start();
    
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            
            if ( class_exists( 'WooCommerce' ) ) {
                $product = wc_get_product( get_the_ID() );
                
                if ( $product ) {
                    ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php echo $product->get_image( 'woocommerce_thumbnail' ) ?: '<img src="https://images.iimg.live/images/amazing-shot-8342.webp&auto=format&fit=crop&w=600&q=80" alt="' . esc_attr( get_the_title() ) . '">'; ?>
                        </div>
                        <h4><?php the_title(); ?></h4>
                        <p><?php echo wp_trim_words( $product->get_description(), 15 ); ?></p>
                        <div class="product-price">
                            <span><?php echo $product->get_price_html(); ?></span>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn" style="padding:8px 20px;">Подробнее</a>
                    </div>
                    <?php
                }
            } else {
                // Fallback для постов
                ?>
                <div class="product-card">
                    <div class="product-image">
                        <?php 
                        $image = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                        if ( $image ) {
                            echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                        } else {
                            echo '<img src="https://images.iimg.live/images/amazing-shot-8342.webp&auto=format&fit=crop&w=600&q=80" alt="' . esc_attr( get_the_title() ) . '">';
                        }
                        ?>
                    </div>
                    <h4><?php the_title(); ?></h4>
                    <p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
                    <div class="product-price">
                        <span><?php echo get_post_meta( get_the_ID(), 'product_price', true ) ?: 'Уточнить цену'; ?></span>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn" style="padding:8px 20px;">Подробнее</a>
                </div>
                <?php
            }
        }
    } else {
        ?>
        <div style="text-align:center; padding:40px; color:#666; grid-column: 1 / -1;">
            <i class="fas fa-search" style="font-size:3rem; margin-bottom:20px; color:#ddd;"></i>
            <h3 style="color:#666; margin-bottom:10px;">Товары не найдены</h3>
            <p>Попробуйте изменить параметры фильтрации или обратитесь за индивидуальным расчетом</p>
            <a href="#cta" class="btn" style="margin-top:20px;">
                <i class="fas fa-calculator"></i> Запросить расчет
            </a>
        </div>
        <?php
    }
    
    $html = ob_get_clean();
    wp_reset_postdata();
    
    wp_send_json_success( array(
        'html' => $html,
        'total' => $query->found_posts,
        'total_pages' => $query->max_num_pages,
    ) );
    
    wp_die();
}

// Получить количество найденных товаров с текущими фильтрами
add_action( 'wp_ajax_nopriv_count_filtered_products', 'termoservis_count_filtered_products' );
add_action( 'wp_ajax_count_filtered_products', 'termoservis_count_filtered_products' );

function termoservis_count_filtered_products() {
    check_ajax_referer( 'catalog_nonce', 'nonce' );
    
    $filters = isset( $_POST['filters'] ) ? json_decode( stripslashes( $_POST['filters'] ) ) : array();
    
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
    );
    
    if ( class_exists( 'WooCommerce' ) && ! empty( $filters ) ) {
        $tax_query = array();
        
        foreach ( $filters as $filter ) {
            if ( is_object( $filter ) && ! empty( $filter->values ) ) {
                $taxonomy = 'pa_' . $filter->name;
                
                $tax_query[] = array(
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $filter->values,
                    'operator' => 'IN',
                );
            }
        }
        
        if ( ! empty( $tax_query ) ) {
            $tax_query['relation'] = 'AND';
            $args['tax_query'] = $tax_query;
        }
    }
    
    $query = new WP_Query( $args );
    
    wp_send_json_success( array(
        'count' => $query->found_posts,
    ) );
    
    wp_die();
}
