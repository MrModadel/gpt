<?php
/**
 * Termoservis Theme Functions
 * 
 * @package Termoservis
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Set up theme defaults
 */
function termoservis_setup() {
    // Add support for title tag
    add_theme_support( 'title-tag' );
    
    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );
    
    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    
    // Register menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'termoservis' ),
        'footer'  => esc_html__( 'Footer Menu', 'termoservis' ),
    ) );
}
add_action( 'after_setup_theme', 'termoservis_setup' );

/**
 * Register and enqueue styles
 */
function termoservis_enqueue_styles() {
    // Enqueue Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );
    
  
}
add_action( 'wp_enqueue_scripts', 'termoservis_enqueue_styles' );

/**
 * Register and enqueue scripts
 */
function termoservis_enqueue_scripts() {
    wp_enqueue_script(
        'termoservis-main',
        get_template_directory_uri() . '/js/main.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
    
    // Localize script
    wp_localize_script(
        'termoservis-main',
        'termoservisData',
        array(
            'homeUrl' => home_url(),
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'catalogNonce' => wp_create_nonce( 'catalog_nonce' ),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'termoservis_enqueue_scripts' );

/**
 * Customize WordPress Customizer
 */
function termoservis_customize_register( $wp_customize ) {
    // Contact Information Section
    $wp_customize->add_section(
        'termoservis_contact_info',
        array(
            'title'    => esc_html__( 'Contact Information', 'termoservis' ),
            'priority' => 160,
        )
    );
    
    // Phone
    $wp_customize->add_setting( 'termoservis_phone', array(
        'default'           => '+7 (927) 001-38-85',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'termoservis_phone', array(
        'label'       => esc_html__( 'Phone Number', 'termoservis' ),
        'section'     => 'termoservis_contact_info',
        'type'        => 'text',
    ) );
    
    // Work Time
    $wp_customize->add_setting( 'termoservis_work_time', array(
        'default'           => 'Пн-Пт: 9:00-18:00, Сб-Вс: выходной',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'termoservis_work_time', array(
        'label'       => esc_html__( 'Work Time', 'termoservis' ),
        'section'     => 'termoservis_contact_info',
        'type'        => 'text',
    ) );
    
    // Address
    $wp_customize->add_setting( 'termoservis_address', array(
        'default'           => 'г. Самара, ул. Заводская, 42',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'termoservis_address', array(
        'label'       => esc_html__( 'Address', 'termoservis' ),
        'section'     => 'termoservis_contact_info',
        'type'        => 'text',
    ) );
    
    // Email
    $wp_customize->add_setting( 'termoservis_email', array(
        'default'           => 'info@termoservice63.ru',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'termoservis_email', array(
        'label'       => esc_html__( 'Email', 'termoservis' ),
        'section'     => 'termoservis_contact_info',
        'type'        => 'email',
    ) );
    
    // Social Links Section
    $wp_customize->add_section(
        'termoservis_social_links',
        array(
            'title'    => esc_html__( 'Social Links', 'termoservis' ),
            'priority' => 161,
        )
    );
    
    // Telegram
    $wp_customize->add_setting( 'termoservis_telegram', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'termoservis_telegram', array(
        'label'       => esc_html__( 'Telegram URL', 'termoservis' ),
        'section'     => 'termoservis_social_links',
        'type'        => 'url',
    ) );
    
    // WhatsApp
    $wp_customize->add_setting( 'termoservis_whatsapp', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'termoservis_whatsapp', array(
        'label'       => esc_html__( 'WhatsApp URL', 'termoservis' ),
        'section'     => 'termoservis_social_links',
        'type'        => 'url',
    ) );
    
    // VK
    $wp_customize->add_setting( 'termoservis_vk', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'termoservis_vk', array(
        'label'       => esc_html__( 'VKontakte URL', 'termoservis' ),
        'section'     => 'termoservis_social_links',
        'type'        => 'url',
    ) );
    
    // YouTube
    $wp_customize->add_setting( 'termoservis_youtube', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'termoservis_youtube', array(
        'label'       => esc_html__( 'YouTube URL', 'termoservis' ),
        'section'     => 'termoservis_social_links',
        'type'        => 'url',
    ) );
    
    // Footer Text
    $wp_customize->add_setting( 'termoservis_footer_text', array(
        'default'           => 'Производство и комплексное внедрение промышленных холодильных систем. Надежные решения для вашего бизнеса с 2010 года.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'termoservis_footer_text', array(
        'label'       => esc_html__( 'Footer Description', 'termoservis' ),
        'section'     => 'termoservis_social_links',
        'type'        => 'textarea',
    ) );
}
add_action( 'customize_register', 'termoservis_customize_register' );

/**
 * Add custom menu classes
 */
function termoservis_nav_menu_link_attributes( $atts, $item, $args ) {
    // Add icon support
    if ( ! empty( $item->description ) ) {
        $atts['data-icon'] = $item->description;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'termoservis_nav_menu_link_attributes', 10, 3 );

/**
 * Custom classes for menu items with submenus
 */
function termoservis_nav_menu_css_class( $classes, $item, $args, $depth ) {
    if ( in_array( 'menu-item-has-children', $classes ) ) {
        $classes[] = 'has-dropdown';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'termoservis_nav_menu_css_class', 10, 4 );

/**
 * Custom container for dropdown menus
 */
function termoservis_nav_menu_submenu_html( $item_output, $item, $depth, $args ) {
    if ( $depth === 0 && in_array( 'menu-item-has-children', $item->classes ) ) {
        // Customize dropdown if needed
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'termoservis_nav_menu_submenu_html', 10, 4 );

/**
 * Remove admin bar from frontend for non-admin users
 */
function termoservis_hide_admin_bar() {
    if ( is_admin_bar_showing() && ! current_user_can( 'manage_options' ) ) {
        show_admin_bar( false );
    }
}
add_action( 'wp_loaded', 'termoservis_hide_admin_bar' );

/**
 * Add support for custom header
 */
function termoservis_custom_header_setup() {
    add_theme_support( 'custom-header', array(
        'default-image'      => '',
        'default-text-color' => '0056b8',
        'width'              => 1200,
        'height'             => 100,
        'flex-height'        => true,
        'flex-width'         => true,
    ) );
}
add_action( 'after_setup_theme', 'termoservis_custom_header_setup', 11 );

/**
 * Sanitize dropdown menu
 */
function termoservis_custom_menu_class( $menu ) {
    $menu = preg_replace( '/ class="sub-menu"/', ' class="dropdown-menu"', $menu );
    return $menu;
}
add_filter( 'wp_nav_menu', 'termoservis_custom_menu_class' );

/**
 * Walker for custom menu structure
 */
class Termoservis_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->theme_location ) ) {
            $menu_classes = 'dropdown-menu';
            
            // Add specific classes for different menu types
            if ( $depth === 0 ) {
                // You can add specific classes here
            }
            
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
            $output .= "\n" . $indent . '<ul class="' . esc_attr( $menu_classes ) . '">' . "\n";
        } else {
            parent::start_lvl( $output, $depth, $args );
        }
    }
    
    function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
        $output .= $indent . "</ul>\n";
    }
}

/**
 * Register footer menu walker
 */
function termoservis_footer_menu( $args = array() ) {
    $defaults = array(
        'theme_location' => 'footer',
        'menu_class'     => 'footer-menu',
        'container'      => false,
        'fallback_cb'    => false,
        'depth'          => 1,
        'echo'           => false,
    );
    
    $args = wp_parse_args( $args, $defaults );
    return wp_nav_menu( $args );
}

/**
 * Add custom excerpt length
 */
function termoservis_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'termoservis_excerpt_length', 999 );

/**
 * Customize excerpt more
 */
function termoservis_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'termoservis_excerpt_more' );

/**
 * Add support for block editor
 */
function termoservis_block_editor_styles() {
    wp_enqueue_style(
        'termoservis-block-editor',
        get_template_directory_uri() . '/css/block-editor.css'
    );
}
add_action( 'enqueue_block_editor_assets', 'termoservis_block_editor_styles' );

/**
 * Disable automatic paragraph tags in widgets
 */
function termoservis_widget_text_content( $widget_text ) {
    return $widget_text;
}

/**
 * Include AJAX filters
 */
add_action( 'init', function() {
    require_once get_template_directory() . '/ajax-filters.php';
}, 5 );
add_filter( 'widget_text_content', 'termoservis_widget_text_content' );
add_filter('template_include', function($template) {
    if ( is_singular('product') ) {
        // Путь к твоему кастомному шаблону
        $custom_template = get_stylesheet_directory() . '/page-product-cards.php';
        if ( file_exists($custom_template) ) {
            return $custom_template;
        }
    }
    return $template;
});


// Если есть страница с таким же slug, как у категории — ведём на неё
function get_page_or_term_link( $term ) {

    // Ищем страницу с таким же slug
    $page = get_page_by_path( $term->slug );

    if ( $page ) {
        return esc_url( get_permalink( $page->ID ) );
    }

    // Иначе — обычная ссылка на категорию
    $link = get_term_link( $term->term_id, 'product_cat' );

    if ( is_wp_error( $link ) ) {
        return '#';
    }

    return esc_url( $link );
}
