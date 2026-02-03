<?php

/**
 * Template Name: Чиллеры с воздушным охлаждением
 * 
 * @package Termoservis
 */

get_header();
?>
<style>
    /* Hero секция */
    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://res.cloudinary.com/dbsm61hrr/image/upload/v1768714160/photo-1581094794329-c8112a89af12-_3_-_1__11zon_nazxqf.webp');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 80px 0;
        text-align: center;
    }

    .hero h1 {
        font-size: 2.8rem;
        margin-bottom: 20px;
        line-height: 1.2;
        color: #fff;
    }

    .hero p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto 30px;
    }

    .btn-primary {
        display: inline-block;
        background-color: #1a5fb4;
        color: white;
        padding: 15px 35px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: background-color 0.3s, transform 0.3s;
        border: none;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #1a5fb4;
        transform: translateY(-2px);
    }

    /* Секции */
    section {
        padding: 70px 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title h2 {
        font-size: 2.2rem;
        color: #1a5fb4;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-title h2:after {
        content: '';
        position: absolute;
        width: 70px;
        height: 3px;
        background-color: #1a5fb4;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
    }

    .section-intro {
        text-align: center;
        max-width: 800px;
        margin: 0 auto 40px;
        font-size: 1.1rem;
        color: #555;
    }

    /* Блок подкатегорий - НОВЫЙ БЛОК ДЛЯ ВТОРОГО УРОВНЯ ВЛОЖЕННОСТИ */
    .subcategories {
        background-color: white;
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 50px;
    }

    .subcategories-title {
        text-align: center;
        margin-bottom: 30px;
        color: #1a5fb4;
        font-size: 1.5rem;
    }

    .subcategories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }



    .subcategory-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 25px;
        border-radius: 8px;
        text-align: center;
        transition: all 0.3s ease;
        border-left: 4px solid #1a5fb4;
        cursor: pointer;
    }

    .subcategory-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    }
    .--active {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    }
    .subcategory-icon {
        font-size: 2.5rem;
        color: #1a5fb4;
        margin-bottom: 15px;
    }

    .subcategory-card h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .subcategory-card p {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 15px;
    }

    .subcategory-link {
        display: inline-block;
        color: #1a5fb4;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .subcategory-link i {
        margin-left: 5px;
        transition: transform 0.3s;
    }

    .subcategory-card:hover .subcategory-link i {
        transform: translateX(5px);
    }

    /* Преимущества воздушного охлаждения */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .feature-card {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        text-align: center;
        transition: transform 0.3s;
        border-top: 4px solid #1a5fb4;
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    .feature-icon {
        font-size: 2.5rem;
        color: #1a5fb4;
        margin-bottom: 20px;
    }

    .feature-card h3 {
        margin-bottom: 15px;
        color: #1a5fb4;
    }

    /* Блок сравнения водяного и воздушного охлаждения */
    .comparison {
        background-color: #f1f5f9;
        border-radius: 10px;
        padding: 40px;
        margin-top: 50px;
    }

    .comparison-title {
        text-align: center;
        margin-bottom: 30px;
        color: #1a5fb4;
    }

    .comparison-table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .comparison-table th {
        background-color: #1a5fb4;
        color: white;
        padding: 15px;
        text-align: center;
    }

    .comparison-table td {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .comparison-table tr:last-child td {
        border-bottom: none;
    }

    .comparison-table .feature-name {
        font-weight: 600;
        color: #333;
        width: 40%;
    }

    .comparison-table .air-cooling {
        color: #1a5fb4;
        font-weight: 600;
    }

    .comparison-table .water-cooling {
        color: #1a5fb4;
        font-weight: 600;
    }

    /* Карточки товаров */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .product-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-10px);
    }

    .product-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: #1a5fb4;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 1;
    }

    .product-image {
        height: 200px;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .product-card:hover .product-image img {
        transform: scale(1.05);
    }

    .product-content {
        padding: 25px;
    }

    .product-content h3 {
        color: #1a5fb4;
        margin-bottom: 15px;
        font-size: 1.4rem;
    }

    .product-specs {
        list-style: none;
        margin-bottom: 20px;
    }

    .product-specs li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
    }

    .product-specs li:last-child {
        border-bottom: none;
    }

    .spec-name {
        color: #666;
    }

    .spec-value {
        font-weight: 600;
        color: #333;
    }

    .btn-product {
        display: block;
        width: 100%;
        text-align: center;
        background-color: #1a5fb4;
        color: white;
        padding: 12px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s;
        border: none;
        cursor: pointer;
    }

    .btn-product:hover {
        background-color: #0d4a9c;
    }

    .btn-catalog {
        display: inline-block;
        margin-top: 40px;
        background-color: transparent;
        color: #1a5fb4;
        border: 2px solid #1a5fb4;
        padding: 12px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-catalog:hover {
        background-color: #1a5fb4;
        color: white;
    }

    /* Блок применения */
    .applications {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .applications-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    .application-item {
        background-color: white;
        padding: 25px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .application-icon {
        font-size: 2rem;
        color: #1a5fb4;
        margin-bottom: 15px;
    }

    .application-item h3 {
        color: #333;
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    /* SEO секция */
    .seo-section {
        background-color: #f1f5f9;
        padding: 60px 0;
    }

    .seo-content {
        max-width: 900px;
        margin: 0 auto;
    }

    .seo-content h2 {
        color: #1a5fb4;
        margin-bottom: 25px;
        font-size: 1.8rem;
    }

    .seo-content h3 {
        color: #333;
        margin: 25px 0 15px;
        font-size: 1.4rem;
    }

    .seo-content p {
        margin-bottom: 20px;
        text-align: justify;
        line-height: 1.7;
    }

    .seo-content ul {
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .seo-content li {
        margin-bottom: 10px;
        line-height: 1.6;
    }

    /* Финальный CTA */
    .final-cta {
        text-align: center;
        background-color: white;
        padding: 70px 0;
    }

    .final-cta h2 {
        font-size: 2.2rem;
        color: #1a5fb4;
        margin-bottom: 20px;
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .btn-secondary {
        display: inline-block;
        background-color: transparent;
        color: #1a5fb4;
        border: 2px solid #1a5fb4;
        padding: 15px 35px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-secondary:hover {
        background-color: #1a5fb4;
        color: white;
    }

    /* Футер */
    footer {
        background-color: #1a1a1a;
        color: #ddd;
        padding: 50px 0 20px;
    }

    .footer-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        margin-bottom: 40px;
    }

    .footer-column h3 {
        color: white;
        margin-bottom: 20px;
        font-size: 1.2rem;
    }

    .footer-column ul {
        list-style: none;
    }

    .footer-column li {
        margin-bottom: 10px;
        display: flex;
        align-items: flex-start;
    }

    .footer-column i {
        margin-right: 10px;
        color: #aaa;
        min-width: 20px;
    }

    .footer-column a {
        color: #aaa;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-column a:hover {
        color: white;
    }

    .copyright {
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #333;
        color: #888;
        font-size: 0.9rem;
    }

    /* Адаптивность */
    @media (max-width: 768px) {
        .header-container {
            flex-direction: column;
        }

        nav ul {
            margin-top: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        nav li {
            margin: 5px 10px;
        }

        .hero h1 {
            font-size: 2rem;
        }

        .section-title h2 {
            font-size: 1.8rem;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            max-width: 300px;
            margin-bottom: 10px;
        }

        .subcategories-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {

        .products-grid,
        .applications-grid,
        .features-grid {
            grid-template-columns: 1fr;
        }

        .hero {
            padding: 50px 0;
        }

        section {
            padding: 50px 0;
        }

        .comparison {
            padding: 20px;
        }

        .comparison-table {
            font-size: 0.9rem;
        }
    }
</style>


<!-- Хлебные крошки - ВАЖНО: показываем полный путь вложенности -->

<div class="breadcrumbs ">
    <div class="container">
        <a href="/">Главная</a> <span>/</span>
        <a href="/catalog/">Каталог</a> <span>/</span>
        <a href="/industrial-chillers/">Промышленные чиллеры</a> <span>/</span>
        <a href="/condenser-cooling-types/">По типу охлаждения конденсатора</a> <span>/</span>
        <strong><?php the_title(); ?></strong>
    </div>
</div>
<!-- Hero секция -->
<section class="hero fade-in">
    <div class="container">
        <h1>Промышленные чиллеры с воздушным охлаждением</h1>
        <p>Эффективное решение для производств, где нет доступа к водным ресурсам или требуется установка оборудования внутри цеха. Экономия воды до 100%, простота монтажа и обслуживания.</p>
        <a href="/#cta" class="btn-primary btn" id="openCalcModal">Подобрать чиллер с воздушным охлаждением</a>
    </div>
</section>

<!-- Блок подкатегорий - ключевой элемент для навигации по второму уровню вложенности -->
<section class="fade-in" style="padding:70px 0 0px;">
    <div class="container">
        <div class="subcategories">
            <h2 class="subcategories-title">Типы чиллеров с воздушным охлаждением</h2>
            <p style="text-align: center; margin-bottom: 30px; color: #666;">Выберите категорию оборудования для вашего производства</p>

            <div class="subcategories-grid">
                <div class="subcategory-card --active" data-category="modular-chillers">
                    <div class="subcategory-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <h3>Моноблочные чиллеры</h3>
                    <p>Компактные решения</p>
                    <div class="subcategory-link">Выбрать тип</div>
                </div>

                <div class="subcategory-card" data-category="remote-condenser-chillers">
                    <div class="subcategory-icon">
                        <i class="fas fa-object-ungroup"></i>
                    </div>
                    <h3>Сплит-системы</h3>
                    <p>Раздельные блоки</p>
                    <div class="subcategory-link">Выбрать тип</div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="ts-root container fade-in" id="ts-chillers" style="padding:0px 0 70px;">


    <div id="ts-grid" class="ts-grid">


        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => array(
                        'modular-chillers',
                        'remote-condenser-chillers'
                    )
                )
            )
        );

        $products = new WP_Query($args);

        if ($products->have_posts()) {
            while ($products->have_posts()) {
                $products->the_post();
                $product = wc_get_product(get_the_ID());

                // категория товара (одна из двух)
                $cats = get_the_terms(get_the_ID(), 'product_cat');
                $cat_slug = '';

                if ($cats && !is_wp_error($cats)) {
                    foreach ($cats as $cat) {
                        if (in_array($cat->slug, ['modular-chillers', 'remote-condenser-chillers'])) {
                            $cat_slug = $cat->slug;
                            break;
                        }
                    }
                }

                // мощность
                $power = $product->get_attribute('мощность');
                if (!$power) $power = $product->get_attribute('power');

                $power_number = preg_replace('/[^0-9]/', '', $power);
                $power_number = $power_number ? $power_number : '0';

                // теги
                $tags = get_the_terms(get_the_ID(), 'product_tag');
                $tag_html = '';
                if ($tags && !is_wp_error($tags)) {
                    foreach ($tags as $tag) {
                        $tag_html .= '<span class="ts-tag">' . esc_html($tag->name) . '</span>';
                    }
                }

                // изображение
                $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : 'https://via.placeholder.com/360x200?text=Chiller';
        ?>

                <article
                    class="ts-card ts-product"
                    data-power="<?php echo esc_attr($power_number); ?>"
                    data-category="<?php echo esc_attr($cat_slug); ?>">
                    <div class="ts-media">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                    <div class="ts-body">
                        <div class="ts-kicker">Чиллер — <strong><?php echo esc_html($power); ?></strong></div>
                        <h3 class="ts-name"><?php the_title(); ?></h3>
                        <div class="ts-meta">
                            <?php echo wp_kses_post($tag_html); ?>
                        </div>
                    </div>
                    <div class="ts-foot">
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-small">
                            <i class="fas fa-info-circle"></i> Подробнее
                        </a>
                    </div>
                </article>

        <?php
            }
            wp_reset_postdata();
        }
        ?>

    </div>
    
</section>
<!-- Преимущества воздушного охлаждения -->
<section class="fade-in" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2>Преимущества чиллеров с воздушным охлаждением</h2>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tint-slash"></i>
                </div>
                <h3>Экономия воды</h3>
                <p>Полное отсутствие потребления воды для охлаждения конденсатора, что особенно важно в регионах с дефицитом водных ресурсов.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-compress-arrows-alt"></i>
                </div>
                <h3>Компактность</h3>
                <p>Возможность установки внутри производственного цеха без необходимости подвода водопровода и канализации.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-ruble-sign"></i>
                </div>
                <h3>Снижение эксплуатационных затрат</h3>
                <p>Отсутствие расходов на водоподготовку, реагенты и оплату канализационных стоков.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3>Простота монтажа</h3>
                <p>Не требуется сложная обвязка с водопроводом, проще и быстрее вводится в эксплуатацию.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-snowflake"></i>
                </div>
                <h3>Работа при низких температурах</h3>
                <p>Стабильная работа в холодное время года без риска замерзания градирни или испарительной установки.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3>Экологичность</h3>
                <p>Отсутствие сброса тепла в водоемы, что соответствует современным экологическим стандартам.</p>
            </div>
        </div>
    </div>
</section>

<!-- Блок сравнения -->
<section class="fade-in">
    <div class="container">
        <div class="comparison">
            <h2 class="comparison-title">Сравнение: воздушное vs водяное охлаждение</h2>

            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Характеристика</th>
                        <th>Воздушное охлаждение</th>
                        <th>Водяное охлаждение</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="feature-name">Расход воды</td>
                        <td class="air-cooling">0 м³/ч</td>
                        <td class="water-cooling">2-50 м³/ч</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Затраты на воду</td>
                        <td class="air-cooling">Отсутствуют</td>
                        <td class="water-cooling">Высокие</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Зависимость от температуры окружающей среды</td>
                        <td class="air-cooling">Высокая (летом КПД снижается)</td>
                        <td class="water-cooling">Низкая (стабильная работа)</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Стоимость оборудования</td>
                        <td class="air-cooling">Ниже на 15-30%</td>
                        <td class="water-cooling">Выше</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Эксплуатационные расходы</td>
                        <td class="air-cooling">Низкие</td>
                        <td class="water-cooling">Высокие (вода, реагенты, электроэнергия)</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Уровень шума</td>
                        <td class="air-cooling">Выше (вентиляторы)</td>
                        <td class="water-cooling">Ниже</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Требования к месту установки</td>
                        <td class="air-cooling">Доступ свежего воздуха</td>
                        <td class="water-cooling">Подвод воды и канализации</td>
                    </tr>
                </tbody>
            </table>

            <p style="text-align: center; margin-top: 20px; color: #666; font-size: 0.9rem;">
                * Воздушное охлаждение оптимально для большинства производств с мощностью до 500 кВт и при отсутствии жестких требований к температуре конденсации.
            </p>
        </div>
    </div>
</section>


<!-- Блок применения -->
<section class="applications fade-in">
    <div class="container">
        <div class="section-title">
            <h2>Области применения чиллеров с воздушным охлаждением</h2>
        </div>

        <div class="applications-grid">
            <div class="application-item">
                <div class="application-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <h3>Пластмассовая промышленность</h3>
                <p>Охлаждение ТПА, экструдеров, термостатов пресс-форм</p>
            </div>

            <div class="application-item">
                <div class="application-icon">
                    <i class="fas fa-prescription-bottle"></i>
                </div>
                <h3>Химическое производство</h3>
                <p>Охлаждение реакторов, дистилляционных колонн, конденсаторов</p>
            </div>

            <div class="application-item">
                <div class="application-icon">
                    <i class="fas fa-wine-bottle"></i>
                </div>
                <h3>Пищевая промышленность</h3>
                <p>Охлаждение смесителей, танков, линий розлива</p>
            </div>

            <div class="application-item">
                <div class="application-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Электронная промышленность</h3>
                <p>Охлаждение лазеров, источников питания, испытательных камер</p>
            </div>

            <div class="application-item">
                <div class="application-icon">
                    <i class="fas fa-car"></i>
                </div>
                <h3>Автомобилестроение</h3>
                <p>Охлаждение испытательных стендов, пресс-форм, окрасочных камер</p>
            </div>

            <div class="application-item">
                <div class="application-icon">
                    <i class="fas fa-flask"></i>
                </div>
                <h3>Фармацевтика</h3>
                <p>Охлаждение оборудования в чистых помещениях</p>
            </div>
        </div>
    </div>
</section>

<!-- SEO секция -->
<section class="seo-section fade-in">
    <div class="container">
        <div class="seo-content">
            <h2>Промышленные чиллеры с воздушным охлаждением: особенности, преимущества и критерии выбора</h2>

            <p>Чиллеры с воздушным охлаждением представляют собой замкнутые системы охлаждения жидкостей, в которых тепло отводится в атмосферу через конденсатор, обдуваемый вентиляторами. В отличие от систем с водяным охлаждением, где требуется постоянный подвод и сброс технической воды, воздушные чиллеры работают по полностью автономному принципу, что делает их оптимальным выбором для производств, расположенных в регионах с дефицитом водных ресурсов или жесткими экологическими ограничениями на сброс подогретой воды.</p>

            <h3>Принцип работы и конструктивные особенности</h3>

            <p>Основными компонентами чиллера с воздушным охлаждением являются: компрессор (чаще всего винтовой или спиральный), конденсатор воздушного охлаждения с осевыми или центробежными вентиляторами, испаритель (пластинчатый или кожухотрубный), терморегулирующий вентиль и система автоматического управления. Хладагент циркулирует по замкнутому контуру, забирая тепло от охлаждаемой жидкости (воды или водно-гликолевого раствора) в испарителе и отдавая его в атмосферу через конденсатор.</p>

            <p>Конструктивно воздушные чиллеры делятся на три основных типа:</p>

            <ul>
                <li><strong>Моноблочные установки</strong> — все компоненты размещены в едином корпусе, что упрощает монтаж и уменьшает занимаемую площадь. Идеальны для установки внутри производственных помещений при условии организации эффективного воздухообмена.</li>
                <li><strong>Сплит-системы</strong> — состоят из двух блоков: наружного (с конденсатором и вентиляторами) и внутреннего (с испарителем и компрессором). Позволяют разместить шумное оборудование за пределами цеха, сохранив внутри только компактный испарительный блок.</li>
                <li><strong>Крышные установки</strong> — монтируются на кровле здания, что экономит полезную производственную площадь и обеспечивает оптимальные условия для теплообмена с атмосферой.</li>
            </ul>

            <h3>Ключевые преимущества перед системами с водяным охлаждением</h3>

            <p>Основным конкурентным преимуществом воздушных чиллеров является полное отсутствие потребления воды для охлаждения конденсатора. Это позволяет:</p>

            <ul>
                <li>Экономить до 100% расходов на водопотребление и водоотведение</li>
                <li>Исключить затраты на водоподготовку (умягчение, фильтрацию, химическую обработку)</li>
                <li>Избежать проблем, связанных с образованием накипи и биологических обрастаний в конденсаторе</li>
                <li>Работать в регионах с ограниченными водными ресурсами или высокими тарифами на воду</li>
                <li>Соответствовать жестким экологическим нормативам по сбросам в водоемы</li>
            </ul>

            <h3>Критерии выбора и особенности эксплуатации</h3>

            <p>При подборе чиллера с воздушным охлаждением необходимо учитывать следующие параметры:</p>

            <ul>
                <li><strong>Расчетная мощность охлаждения</strong> — определяется на основе теплового баланса технологического оборудования с учетом пиковых нагрузок и запаса 10-15%</li>
                <li><strong>Температурный диапазон окружающей среды</strong> — воздушные чиллеры эффективно работают при температуре окружающего воздуха от -25°C до +45°C, при более высоких температурах требуется увеличение поверхности конденсатора</li>
                <li><strong>Уровень шума</strong> — особенно важен при установке вблизи жилых зон или офисных помещений, регулируется выбором типа вентиляторов и системой шумоглушения</li>
                <li><strong>Требования к месту установки</strong> — необходимо обеспечить свободный приток воздуха к конденсатору (не менее 1,5 метров с фронтальной стороны и 1 метра с боковых)</li>
                <li><strong>Энергоэффективность</strong> — современные модели оснащаются инверторными компрессорами и EC-вентиляторами, что позволяет снизить энергопотребление на 30-40%</li>
            </ul>

            <p>Эксплуатация воздушных чиллеров требует регулярного технического обслуживания, включающего очистку конденсатора от пыли и загрязнений (особенно актуально для производств с высоким уровнем запыленности), проверку натяжения ремней вентиляторов, контроль уровня масла в компрессоре и замену фильтров-осушителей.</p>

            <p>Компания "ТермоСервис" предлагает полный цикл услуг по поставке, монтажу и обслуживанию промышленных чиллеров с воздушным охлаждением. Наши инженеры выполнят профессиональный тепловой расчет, подберут оптимальную модель с учетом всех особенностей вашего производства, обеспечат качественный монтаж и пусконаладку оборудования. Все чиллеры сертифицированы, соответствуют требованиям Технического регламента Таможенного союза и имеют гарантию 2 года.</p>
        </div>
    </div>
</section>

<!-- Финальный CTA -->
<section class="final-cta fade-in">
    <div class="container">
        <h2>Нужна консультация по выбору чиллера с воздушным охлаждением?</h2>
        <p>Наши инженеры помогут подобрать оптимальное решение для вашего производства с учетом всех технических нюансов.</p>

        <div class="cta-buttons">
            <a href="/#cta" class="btn-primary btn" id="openProposalModal">Получить коммерческое предложение</a>
            <a href="/#cta" class="btn-secondary btn" id="openCallbackModal">Заказать звонок инженера</a>
        </div>
    </div>
</section>


<!-- Остальные модальные окна (quickOrderModal, proposalModal, callbackModal) -->
<!-- Они идентичны тем, что в файле экструдеров -->

<script>
    const cards = document.querySelectorAll('.subcategory-card');
    const ts_products = document.querySelectorAll('.ts-product');

    // при старте показываем первую категорию
    filterProducts(cards[0].dataset.category);

    cards.forEach(card => {
        card.addEventListener('click', function() {

            // активная карточка
            cards.forEach(c => c.classList.remove('--active'));
            this.classList.add('--active');

            const category = this.dataset.category;
            filterProducts(category);

        });
    });

    function filterProducts(category) {
        ts_products.forEach(product => {
            if (product.dataset.category === category) {
                product.style.display = '';
            } else {
                product.style.display = 'none';
            }
        });
    }

    const fadeElements = document.querySelectorAll('.fade-in');

    const fadeInOnScroll = function() {
        fadeElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('visible');
            }
        });
    };

    window.addEventListener('scroll', fadeInOnScroll);
    fadeInOnScroll();
    // Данные для карточек товаров
    const products = {
        "TS-AC-20": {
            name: "TS-AC-20",
            description: "Моноблочный чиллер с воздушным охлаждением",
            specs: [{
                    name: "Мощность охлаждения",
                    value: "20 кВт"
                },
                {
                    name: "Тип охлаждения",
                    value: "Воздушное"
                },
                {
                    name: "Хладагент",
                    value: "R410A"
                },
                {
                    name: "Температурный диапазон",
                    value: "+10°C ... +30°C"
                },
                {
                    name: "Уровень шума",
                    value: "65 дБ"
                }
            ]
        },
        "TS-AC-60": {
            name: "TS-AC-60",
            description: "Сплит-чиллер с воздушным охлаждением",
            specs: [{
                    name: "Мощность охлаждения",
                    value: "60 кВт"
                },
                {
                    name: "Тип охлаждения",
                    value: "Воздушное (сплит)"
                },
                {
                    name: "Хладагент",
                    value: "R407C"
                },
                {
                    name: "Температурный диапазон",
                    value: "+5°C ... +30°C"
                },
                {
                    name: "Макс. длина трассы",
                    value: "30 м"
                }
            ]
        },
        "TS-AC-150": {
            name: "TS-AC-150",
            description: "Промышленный чиллер с воздушным охлаждением",
            specs: [{
                    name: "Мощность охлаждения",
                    value: "150 кВт"
                },
                {
                    name: "Тип охлаждения",
                    value: "Воздушное (2 контура)"
                },
                {
                    name: "Хладагент",
                    value: "R134a"
                },
                {
                    name: "Температурный диапазон",
                    value: "+5°C ... +35°C"
                },
                {
                    name: "Кол-во вентиляторов",
                    value: "4 шт"
                }
            ]
        }
    };

    // Базовый JavaScript для управления модальными окнами
    // (можно скопировать из файла экструдеров)
    document.addEventListener('DOMContentLoaded', function() {
        // Простая реализация открытия/закрытия модальных окон
        const modals = document.querySelectorAll('.modal-overlay');
        const openButtons = document.querySelectorAll('[id^="open"]');
        const closeButtons = document.querySelectorAll('.modal-close');

        openButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modalId = this.id.replace('open', '') + 'Modal';
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            });
        });

        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal-overlay');
                if (modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // Закрытие по клику на оверлей
        modals.forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // Обработка быстрого заказа
        const quickOrderButtons = document.querySelectorAll('.quick-order-btn');
        quickOrderButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product');
                const productDesc = this.getAttribute('data-desc');

                if (products[productId]) {
                    const product = products[productId];
                    alert(`Заказ на ${product.name} - ${productDesc} добавлен в корзину!`);
                    // Здесь можно добавить логику открытия модального окна заказа
                }
            });
        });

        // Простая обработка форм
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formType = this.id;
                let message = '';

                switch (formType) {
                    case 'calcForm':
                        message = 'Запрос на подбор чиллера отправлен! Наш инженер свяжется с вами в течение 2 часов.';
                        break;
                    case 'proposalForm':
                        message = 'Запрос на коммерческое предложение отправлен! Мы отправим КП на указанный email.';
                        break;
                    case 'callbackForm':
                        message = 'Заявка на обратный звонок принята! Наш специалист свяжется с вами в указанное время.';
                        break;
                    default:
                        message = 'Форма отправлена успешно!';
                }

                alert(message);

                // Закрываем модальное окно если оно есть
                const modal = this.closest('.modal-overlay');
                if (modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }

                // Очищаем форму
                this.reset();
            });
        });
    });

(function() {
    const root = document.getElementById('ts-chillers');
    const grid = root.querySelector('#ts-grid');
   
    const cards = document.querySelectorAll('.subcategory-card');

    const templates = {
        'modular-chillers': document.getElementById('tpl-modular').innerHTML,
        'remote-condenser-chillers': document.getElementById('tpl-remote').innerHTML
    };

    const selectors = ['.ts-product'];

    // ===================== Фильтр =====================
    function getPower(el) {
        if (el.dataset.power) {
            return Number(el.dataset.power);
        }
        const m = el.textContent.match(/(\d{1,4})\s*(?:квт|kW)/i);
        return m ? Number(m[1]) : null;
    }


    // ===================== Render категории =====================
    function renderCategory(category) {
        grid.innerHTML = templates[category] || 
            '<p style="grid-column:1/-1;text-align:center;padding:40px;">Товары не найдены</p>';
        apply(); // фильтр сразу применяем к новым карточкам
    }

    // ===================== Старт =====================
    const activeCard = document.querySelector('.subcategory-card.--active') || cards[0];
    renderCategory(activeCard.dataset.category);

    // ===================== Клики на карточки =====================
    cards.forEach(card => {
        card.addEventListener('click', function () {
            cards.forEach(c => c.classList.remove('--active'));
            this.classList.add('--active');
            renderCategory(this.dataset.category);
        });
    });

})();

</script>

<?php get_footer(); ?>