<?php
/**
 * Template Name: Карточка товара
 * 
 * @package Termoservis
 */

get_header();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* ===== СПЕЦИФИЧНЫЕ СТИЛИ ДЛЯ КАРТОЧКИ ТОВАРА ===== */
    .product-hero {
        background: linear-gradient(135deg, #f8fafc 0%, #e9edf1 100%);
        padding: 60px 0;
    }

    .hero-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 40px;
    }

    .hero-content {
        flex: 1;
        min-width: 300px;
    }

    .hero-image {
        flex: 1;
        min-width: 300px;
        text-align: center;
    }

    .hero-image img {
        max-width: 100%;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .product-title {
        font-size: 2.5rem;
        color: #0056b8;
        margin-bottom: 15px;
        line-height: 1.2;
    }

    .product-subtitle {
        font-size: 1.3rem;
        color: #555;
        margin-bottom: 25px;
        font-weight: 500;
    }

    .product-description {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 35px;
        line-height: 1.7;
    }

    .hero-cta {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn-primary {
        display: inline-block;
        background-color: #0056b8;
        color: white;
        padding: 14px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        text-align: center;
        border: 2px solid #0056b8;
    }

    .btn-primary:hover {
        background-color: #004494;
        border-color: #004494;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 86, 184, 0.2);
    }

    .btn-secondary {
        display: inline-block;
        background-color: transparent;
        color: #0056b8;
        padding: 14px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        text-align: center;
        border: 2px solid #0056b8;
    }

    .btn-secondary:hover {
        background-color: #0056b8;
        color: white;
    }

    .btn-secondary-light {
        display: inline-block;
        background-color: transparent;
        color: white;
        padding: 14px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        text-align: center;
        border: 2px solid white;
    }

    .btn-secondary-light:hover {
        background-color: white;
        color: #0056b8;
    }

    .btn.full-width {
        width: 100%;
    }

    /* ===== БЛОК ДОВЕРИЯ ===== */
    .trust-badges {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 40px;
    }

    .badge {
        background-color: #f8fafc;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        width: 180px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s;
    }

    .badge:hover {
        transform: translateY(-5px);
    }

    .badge-icon {
        font-size: 2.5rem;
        color: #0056b8;
        margin-bottom: 15px;
    }

    .badge-text {
        font-weight: 600;
        color: #333;
        font-size: 0.95rem;
    }

    .key-specs {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }

    .spec-card {
        background-color: #f8fafc;
        padding: 25px;
        border-radius: 8px;
        text-align: center;
        border-left: 4px solid #0056b8;
    }

    .spec-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0056b8;
        margin-bottom: 5px;
    }

    .spec-label {
        color: #666;
        font-size: 0.95rem;
    }

    /* ===== ОПИСАНИЕ И ПРИМЕНЕНИЕ ===== */
    .description-section {
        background-color: #f8fafc;
    }

    .description-content {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        align-items: center;
    }

    .description-text {
        flex: 1;
        min-width: 300px;
    }

    .description-image {
        flex: 1;
        min-width: 300px;
        text-align: center;
    }

    .description-image img {
        max-width: 100%;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .applications {
        margin-top: 30px;
    }

    .applications h3 {
        color: #0056b8;
        margin-bottom: 15px;
    }

    .applications-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
        list-style: none;
    }

    .applications-list li {
        padding: 10px 0 10px 25px;
        position: relative;
    }

    .applications-list li:before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #0056b8;
        font-weight: bold;
    }

    /* ===== ТЕХНИЧЕСКИЕ ХАРАКТЕРИСТИКИ ===== */
    .specs-tabs {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
        border-bottom: 1px solid #eaeaea;
        flex-wrap: wrap;
    }

    .tab-btn {
        padding: 12px 25px;
        background: none;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        color: #666;
        cursor: pointer;
        position: relative;
        transition: color 0.3s;
    }

    .tab-btn:hover {
        color: #0056b8;
    }

    .tab-btn.active {
        color: #0056b8;
    }

    .tab-btn.active:after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 3px;
        background-color: #0056b8;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .specs-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-radius: 8px;
        overflow: hidden;
    }

    .specs-table th, .specs-table td {
        padding: 16px 20px;
        text-align: left;
        border-bottom: 1px solid #eaeaea;
    }

    .specs-table th {
        background-color: #f8fafc;
        font-weight: 600;
        color: #333;
        width: 60%;
    }

    .specs-table td {
        color: #0056b8;
        font-weight: 500;
        width: 40%;
    }

    .specs-table tr:last-child th,
    .specs-table tr:last-child td {
        border-bottom: none;
    }

    .specs-note {
        background-color: #f8fafc;
        padding: 15px 20px;
        border-radius: 8px;
        margin-top: 20px;
        font-size: 0.9rem;
        color: #666;
    }

    /* ===== КОМПЛЕКТАЦИЯ ===== */
    .package-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .package-card {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .package-card h3 {
        color: #0056b8;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eaeaea;
    }

    .component-list {
        list-style: none;
    }

    .component-list li {
        padding: 12px 0;
        border-bottom: 1px solid #f5f5f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 5px;
    }

    .component-list li:last-child {
        border-bottom: none;
    }

    .component-name {
        color: #333;
    }

    .component-brand {
        color: #666;
        font-size: 0.9rem;
        background-color: #f8fafc;
        padding: 4px 10px;
        border-radius: 4px;
        text-align: end;
    }

    .quality-assurance {
        background-color: #fff;
        padding: 25px;
        border-radius: 8px;
        margin-top: 30px;
        display: flex;
        align-items: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .quality-icon {
        font-size: 2.5rem;
        color: #0056b8;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .quality-text {
        font-size: 1.1rem;
        color: #333;
        font-weight: 500;
    }

    /* ===== FAQ ===== */
    .faq-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        margin-bottom: 15px;
        border: 1px solid #eaeaea;
        border-radius: 8px;
        overflow: hidden;
    }

    .faq-question {
        padding: 20px;
        background-color: #f8fafc;
        font-weight: 600;
        color: #333;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.3s;
    }

    .faq-question:hover {
        background-color: #f0f4f8;
    }

    .faq-question i {
        color: #0056b8;
        transition: transform 0.3s;
    }

    .faq-answer {
        padding: 0 20px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s, padding 0.3s;
        color: #666;
    }

    .faq-item.active .faq-answer {
        padding: 20px;
        max-height: 500px;
    }

    .faq-item.active .faq-question i {
        transform: rotate(180deg);
    }

    /* ===== ФИНАЛЬНЫЙ CTA ===== */
    .final-cta-section {
        background: linear-gradient(135deg, #0056b8 0%, #003d7a 100%);
        color: white;
        padding: 70px 0;
        text-align: center;
    }

    .final-cta-section h2 {
        font-size: 2.2rem;
        margin-bottom: 20px;
        color: white;
    }
    .final-cta-section h2::after{
        background-color: white;
    }
    .final-cta-section p {
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto 40px;
        opacity: 0.9;
        color: white;
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 50px;
    }

    .services-showcase {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }

    .service-card {
        background-color: rgba(255, 255, 255, 0.1);
        padding: 25px;
        border-radius: 8px;
        text-align: center;
        backdrop-filter: blur(10px);
    }

    .service-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: white;
    }

    .service-card h3 {
        margin-bottom: 10px;
        font-size: 1.2rem;
        color: aliceblue;
    }

    /* ===== МОДАЛЬНЫЕ ОКНА ===== */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2000;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s, visibility 0.3s;
    }

    .modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .modal {
        background-color: white;
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        padding: 30px;
        position: relative;
        transform: translateY(20px);
        transition: transform 0.3s;
    }

    .modal-overlay.active .modal {
        transform: translateY(0);
    }

    .modal-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #666;
    }

    .modal h3 {
        color: #0056b8;
        margin-bottom: 20px;
        font-size: 1.5rem;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }

    .form-control:focus {
        outline: none;
        border-color: #0056b8;
    }

    /* ===== АДАПТИВНОСТЬ ===== */
    @media (max-width: 768px) {
        .hero-container, .description-content {
            flex-direction: column;
        }

        .product-title {
            font-size: 2rem;
        }

        .specs-table th, .specs-table td {
            padding: 12px 15px;
            font-size: 0.95rem;
        }

        .tab-btn {
            padding: 10px 15px;
            font-size: 0.9rem;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .quality-assurance {
            flex-direction: column;
            text-align: center;
        }

        .quality-icon {
            margin-right: 0;
            margin-bottom: 15px;
        }
    }

    @media (max-width: 480px) {
        .badge {
            width: 140px;
            padding: 15px 10px;
        }

        .key-specs {
            grid-template-columns: 1fr;
        }

        .applications-list {
            grid-template-columns: 1fr;
        }

        .product-title {
            font-size: 1.8rem;
        }
    }
</style>

<!-- ХЛЕБНЫЕ КРОШКИ -->
<div class="breadcrumbs">
    <div class="container">
        <a href="<?php echo esc_url(home_url('/')); ?>">Главная</a>
        <span>/</span>
        <a href="<?php echo esc_url(home_url('/catalog')); ?>">Каталог</a>
        <span>/</span>
        <strong><?php the_title(); ?></strong>
    </div>
</div>

<!-- 1. ГЕРОЙ-СЕКЦИЯ -->
<section class="product-hero">
    <div class="container hero-container">
        <div class="hero-content">
            <?php
            $product = wc_get_product(get_the_ID());
            $power = $product ? $product->get_attribute('Мощность') : '';
            ?>
            <h1 class="product-title"><?php the_title(); ?><?php echo $power ? ' мощностью ' . esc_html($power) . ' кВт' : ''; ?></h1>
            <div class="product-subtitle">Профессиональное промышленное охлаждение для вашего производства</div>
            <p class="product-description">
                Современный чиллер российского производства, разработанный для эффективного охлаждения технологического оборудования, воды, гликоля и других теплоносителей. Обеспечивает стабильный температурный режим с высокой точностью.
            </p>
            <div class="hero-cta">
                <button class="btn btn-primary open-modal-calc">
                    <i class="fas fa-calculator"></i> Рассчитать стоимость
                </button>
                <button class="btn btn-secondary open-modal-call">
                    <i class="fas fa-phone"></i> Получить консультацию
                </button>
            </div>
        </div>
        <div class="hero-image">
            <?php 
            $product = wc_get_product(get_the_ID());
            if ($product && has_post_thumbnail(get_the_ID())) {
                echo wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'full', false, array('alt' => esc_attr(get_the_title())));
            } else {
                echo '<img src="https://images.iimg.live/images/amazing-shot-8342.webp&auto=format&fit=crop&w=800&q=80" alt="' . esc_attr(get_the_title()) . '">';
            }
            ?>
        </div>
    </div>
</section>

<!-- 2. БЛОК ДОВЕРИЯ И ПРЕИМУЩЕСТВ -->
<section class="section">
    <div class="container">
        <h2 class="text-center">Почему выбирают наше оборудование</h2>
        <p class="text-center" style="color:#666; margin-bottom: 40px;">Мы обеспечиваем полный цикл — от проектирования до монтажа и сервисного обслуживания</p>
        
        <div class="trust-badges">
            <?php
            $product = wc_get_product(get_the_ID());
            $manufacturer = $product ? $product->get_attribute('Производитель') : 'ТЕРМОСИСТЕМЫ-С';
            ?>
            <div class="badge">
                <div class="badge-icon"><i class="fas fa-industry"></i></div>
                <div class="badge-text"><?php echo esc_html($manufacturer); ?></div>
            </div>
            <div class="badge">
                <div class="badge-icon"><i class="fas fa-clock"></i></div>
                <div class="badge-text">Подбор за 24 часа</div>
            </div>
            <div class="badge">
                <div class="badge-icon"><i class="fas fa-shield-alt"></i></div>
                <div class="badge-text">Гарантия 2 года</div>
            </div>
            <div class="badge">
                <div class="badge-icon"><i class="fas fa-tools"></i></div>
                <div class="badge-text">Монтаж под ключ</div>
            </div>
            <div class="badge">
                <div class="badge-icon"><i class="fas fa-truck"></i></div>
                <div class="badge-text">Доставка по РФ</div>
            </div>
        </div>
        
        <div class="key-specs">
            <?php
            $product = wc_get_product(get_the_ID());
            $power = $product ? $product->get_attribute('Мощность') : '[X]';
            $accuracy = $product ? $product->get_attribute('Точность охлаждения') : '±[X]°C';
            $consumption = $product ? $product->get_attribute('Потребляемая электроэнергия') : '[X]';
            $compressors = $product ? $product->get_attribute('Кол-во компрессоров') : '[X]';
            ?>
            <div class="spec-card">
                <div class="spec-value"><?php echo esc_html($power); ?></div>
                <div class="spec-label">Мощность охлаждения</div>
            </div>
            <div class="spec-card">
                <div class="spec-value"><?php echo esc_html($accuracy); ?></div>
                <div class="spec-label">Точность охлаждения</div>
            </div>
            <div class="spec-card">
                <div class="spec-value"><?php echo esc_html($consumption); ?></div>
                <div class="spec-label">Потребляемая мощность</div>
            </div>
            <div class="spec-card">
                <div class="spec-value"><?php echo esc_html($compressors); ?></div>
                <div class="spec-label">Кол-во компрессоров</div>
            </div>
        </div>
    </div>
</section>

<!-- 3. ОПИСАНИЕ И ПРИМЕНЕНИЕ -->
<section class="description-section">
    <div class="container">
        <h2 class="text-center">Назначение и области применения</h2>
        <p class="text-center" style="color:#666; margin-bottom: 40px;">Универсальное решение для различных отраслей промышленности</p>
        
        <div class="description-content">
            <div class="description-text">
                <p>Чиллер — это холодильный агрегат, предназначенный для охлаждения жидких теплоносителей (вода, раствор этиленгликоля). Может поставляться в моноблочном исполнении или раздельном (с выносным конденсатором).</p>
                
                <div class="applications">
                    <h3>Применяется в отраслях, где требуется:</h3>
                    <ul class="applications-list">
                        <li>Охлаждение лазерных станков и сварочных аппаратов</li>
                        <li>Поддержка стабильной температуры в технологических процессах</li>
                        <li>Охлаждение воды и гликоля в пищевых и промышленных установках</li>
                        <li>Охлаждение климатических камер и теплообменников</li>
                        <li>Малые производственные линии и локальные системы</li>
                        <li>Охлаждение инжекционно-литьевых машин (ТПА)</li>
                        <li>Охлаждение экструдеров и полимерного оборудования</li>
                    </ul>
                </div>
            </div>
            <div class="description-image">
                <?php 
                $product = wc_get_product(get_the_ID());
                if ($product && has_post_thumbnail(get_the_ID())) {
                    echo wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'full', false, array('alt' => esc_attr(get_the_title())));
                } else {
                    echo '<img src="https://images.iimg.live/images/amazing-shot-8342.webp&auto=format&fit=crop&w=800&q=80" alt="' . esc_attr(get_the_title()) . '">';
                }
                ?>
            </div>
        </div>
    </div>
</section>


<!-- 5. Технические характеристики -->
<section class="section" style="background-color: #f8fafc;">
    <div class="container">
        <h2 class="text-center">Технические характеристики</h2>
        <p class="text-center" style="color:#666; margin-bottom: 40px;">Мы используем проверенные комплектующие от мировых производителей</p>
        
        <div class="package-grid">
            <?php
            $product = wc_get_product(get_the_ID());
            if ($product) {
                $attributes = $product->get_attributes();
                
                // Получаем все атрибуты товара с их значениями
                $all_attrs = array();
                
                if (!empty($attributes)) {
                    foreach ($attributes as $attr) {
                        $attr_name = $attr->get_name();
                        // Получаем значения атрибута
                        $attr_value = $product->get_attribute($attr_name);
                        
                        if (!empty($attr_value)) {
                            $all_attrs[$attr_name] = $attr_value;
                        }
                    }
                } else {
                    // Если get_attributes() ничего не вернул, попробуем напрямую через постмету
                    $post_id = get_the_ID();
                    $post_meta = get_post_meta($post_id);
                    
                    foreach ($post_meta as $key => $value) {
                        if (strpos($key, 'pa_') === 0) {
                            $attr_name = str_replace('pa_', '', $key);
                            $attr_name = str_replace('_', ' ', ucwords($attr_name, '_'));
                            $all_attrs[$attr_name] = is_array($value) ? implode(', ', $value) : $value[0];
                        }
                    }
                }
                
                // Если атрибутов нет, показываем плейсхолдер
                if (empty($all_attrs)) {
                    echo '<div class="package-card"><h3>Атрибуты не установлены</h3><p>Заполните атрибуты товара в WooCommerce для этого товара</p></div>';
                } else {
                    // Группируем атрибуты по категориям
                    $groups = array(
                        'Основные параметры' => array('Мощность', 'Охлаждение', 'Точность охлаждения', 'Производитель', 'Потребляемая электроэнергия', 'Охлаждение конденсатора', 'Страна', 'Тип компрессора', 'Кол-во компрессоров', 'Гидромодуль'),
                        'Производительность' => array('Мощность охлаждения при tохл.+15°С', 'Мощность охлаждения при tохл.+10°С', 'Мощность охлаждения при tохл.+5°С', 'Потребляемая мощность (при +15С)', 'Потребляемая мощность (при +10С)', 'Потребляемая мощность (при +5С)'),
                        'Технические спецификации' => array('Компрессор, тип', 'Количество холодильных контуров', 'Хладагент', 'Заправка хладагента', 'Количество вентиляторов', 'Расход воздуха', 'Выделяемое тепло', 'Насос встроенный', 'Расход воды', 'Макс. рабочее давление', 'Диаметр входа/выхода водяного контура', 'Объем аккум. емкости', 'Испаритель, тип'),
                        'Физические характеристики' => array('Уровень звукового давления', 'Длина', 'Ширина', 'Высота', 'Масса', 'Степень защиты', 'Материал корпуса', 'Цвет'),
                        'Электрическая защита и управление' => array('Применяемые компоненты', 'Световая индикация аварий', 'Защита по напряжению', 'Защита от частых вкл/выкл', 'Защита от перегрева компрессора', 'Автомат защиты компрессора')
                    );
                    
                    foreach ($groups as $group_name => $group_attrs) {
                        $group_values = array();
                        
                        foreach ($group_attrs as $attr_name) {
                            // Ищем в all_attrs с учётом разных написаний
                            foreach ($all_attrs as $key => $value) {
                                if (strtolower($key) === strtolower($attr_name)) {
                                    $group_values[$attr_name] = $value;
                                    break;
                                }
                            }
                        }
                        
                        if (!empty($group_values)) {
                            echo '<div class="package-card">';
                            echo '<h3>' . esc_html($group_name) . '</h3>';
                            echo '<ul class="component-list">';
                            
                            foreach ($group_values as $attr_name => $value) {
                                echo '<li>';
                                echo '<span class="component-name">' . esc_html($attr_name) . '</span>';
                                echo '<span class="component-brand">' . esc_html($value) . '</span>';
                                echo '</li>';
                            }
                            
                            echo '</ul>';
                            echo '</div>';
                        }
                    }
                }
            }
            ?>
        </div>
        
        <div class="quality-assurance">
            <div class="quality-icon"><i class="fas fa-check-circle"></i></div>
            <div class="quality-text">Все агрегаты проходят тестирование на заводе перед отгрузкой на функциональность и проверку всех компонентов. Поставляются заправленными хладагентом.</div>
        </div>
    </div>
</section>

<!-- 6. FAQ -->
<section class="section">
    <div class="container">
        <h2 class="text-center">Часто задаваемые вопросы</h2>
        <p class="text-center" style="color:#666; margin-bottom: 40px;">Ответы на самые популярные вопросы</p>
        
        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question">
                    <span>Сколько стоит этот чиллер?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Цена зависит от комплектации: с фрикулингом, типом насосной группы, типом компрессора и другими параметрами. Мы подбираем решение под задачи клиента — отправьте заявку, и мы подготовим индивидуальное коммерческое предложение.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>Что может охлаждать такой чиллер?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Этот чиллер используется для охлаждения воды, гликоля, технологического оборудования, лазерных станков, климатических камер и на небольших производствах.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>Можно ли выбрать тип компрессора?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Да. Мы предлагаем подбор компрессора по вашему требованию: спиральный, винтовой или поршневой — в зависимости от условий эксплуатации и бюджета.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>Это российского производства?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Да, чиллеры производятся на собственном заводе в России. Это значит — никаких санкционных рисков, стабильная цена и быстрые сроки поставки.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>Есть ли доставка в другие города?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Конечно! Мы осуществляем доставку по всей России. Возможен самовывоз или отправка через транспортную компанию.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>Какая гарантия на оборудование?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Мы предоставляем гарантию 2 года на все оборудование. Также предлагаем сервисное обслуживание и поставку запасных частей.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. ФИНАЛЬНЫЙ CTA -->
<section class="final-cta-section">
    <div class="container">
        <h2>Подберём чиллер за 24 часа</h2>
        <p>Мы подберём оптимальное решение под ваши задачи — быстро, профессионально и без переплат</p>
        
        <div class="cta-buttons">
            <button class="btn btn-primary open-modal-calc">
                <i class="fas fa-file-alt"></i> Оставить заявку
            </button>
            <button class="btn btn-secondary-light open-modal-call">
                <i class="fas fa-phone"></i> Получить консультацию
            </button>
        </div>
        
        <div class="services-showcase">
            <div class="service-card">
                <div class="service-icon"><i class="fas fa-cogs"></i></div>
                <h3>Изготовим на производстве</h3>
                <p>Собственное производство в России</p>
            </div>
            <div class="service-card">
                <div class="service-icon"><i class="fas fa-truck"></i></div>
                <h3>Бесплатно доставим по РФ</h3>
                <p>Доставка до вашего объекта</p>
            </div>
            <div class="service-card">
                <div class="service-icon"><i class="fas fa-tools"></i></div>
                <h3>Монтаж и обучение персонала</h3>
                <p>Полный цикл "под ключ"</p>
            </div>
        </div>
    </div>
</section>

<!-- МОДАЛЬНОЕ ОКНО РАСЧЕТА -->
<div class="modal-overlay" id="calcModal">
    <div class="modal">
        <button class="modal-close close-modal">&times;</button>
        <h3>Рассчитать стоимость и получить КП</h3>
        <p>Наш специалист свяжется с вами в ближайшее время для расчета стоимости.</p>
        <form id="calcForm"  class="form-tel">
            <div class="form-group">
                <label for="calcName">Ваше имя *</label>
                <input type="text" id="calcName" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="calcPhone">Телефон *</label>
                <input type="tel" id="calcPhone" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
                <label for="calcEmail">Email *</label>
                <input type="email" id="calcEmail" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="calcModel">Интересуемая модель</label>
                <input type="text" id="calcModel" class="form-control" name="model" value="<?php the_title(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="calcMessage">Дополнительная информация</label>
                <textarea id="calcMessage" class="form-control" name="message" rows="3" placeholder="Укажите требуемые параметры..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary full-width">
                <i class="fas fa-paper-plane"></i> Отправить заявку
            </button>
        </form>
    </div>
</div>

<!-- МОДАЛЬНОЕ ОКНО ОБРАТНОГО ЗВОНКА -->
<div class="modal-overlay" id="callModal">
    <div class="modal">
        <button class="modal-close close-modal">&times;</button>
        <h3>Заказать консультацию</h3>
        <p>Наш специалист свяжется с вами в удобное время и ответит на все вопросы.</p>
        <form id="callForm"  class="form-tel">
            <div class="form-group">
                <label for="callName">Ваше имя *</label>
                <input type="text" id="callName" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="callPhone">Телефон *</label>
                <input type="tel" id="callPhone" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
                <label for="callTime">Удобное время для звонка</label>
                <select id="callTime" class="form-control" name="time">
                    <option value="">В любое время</option>
                    <option value="9-12">9:00 - 12:00</option>
                    <option value="12-15">12:00 - 15:00</option>
                    <option value="15-18">15:00 - 18:00</option>
                </select>
            </div>
            <div class="form-group">
                <label for="callQuestion">Ваш вопрос</label>
                <textarea name="message" id="callQuestion" class="form-control" rows="3" placeholder="Что вас интересует?"></textarea>
            </div>
            <button type="submit" class="btn btn-primary full-width">
                <i class="fas fa-phone"></i> Заказать звонок
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Табы характеристик
        const tabBtns = document.querySelectorAll('.tab-btn');
        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const tabId = this.dataset.tab;
                
                tabBtns.forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                this.classList.add('active');
                document.getElementById(tabId + '-tab').classList.add('active');
            });
        });
        
        // FAQ аккордеон
        const faqQuestions = document.querySelectorAll('.faq-question');
        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const faqItem = this.parentElement;
                
                document.querySelectorAll('.faq-item.active').forEach(item => {
                    item.classList.remove('active');
                });
                
                faqItem.classList.add('active');
            });
        });
        
        // Модальные окна
        const calcModal = document.getElementById('calcModal');
        const callModal = document.getElementById('callModal');
        const openCalcBtns = document.querySelectorAll('.open-modal-calc');
        const openCallBtns = document.querySelectorAll('.open-modal-call');
        const closeModals = document.querySelectorAll('.close-modal');
        
        openCalcBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                calcModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });
        
        openCallBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                callModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });
        
        closeModals.forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.modal-overlay.active').forEach(m => {
                    m.classList.remove('active');
                    document.body.style.overflow = 'auto';
                });
            });
        });
        
        document.querySelectorAll('.modal-overlay').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });
        
        // Закрытие по Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay').forEach(m => {
                    m.classList.remove('active');
                    document.body.style.overflow = 'auto';
                });
            }
        });
        
        // Отправка форм
        document.getElementById('calcForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Заявка отправлена! Наш специалист свяжется с вами в ближайшее время.');
            calcModal.classList.remove('active');
            document.body.style.overflow = 'auto';
            document.getElementById('calcForm').reset();
        });
        
        document.getElementById('callForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Заявка на консультацию принята! Мы свяжемся с вами в указанное время.');
            callModal.classList.remove('active');
            document.body.style.overflow = 'auto';
            document.getElementById('callForm').reset();
        });
    });
</script>

<?php get_footer(); ?>
