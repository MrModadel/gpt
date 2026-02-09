<?php

/**
 * Template Name: Холодильные агрегаты
 * 
 * @package Termoservis
 */

get_header();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* ===== 5. ПРИЗЫВ К ДЕЙСТВИЮ ===== */
    .catalog-cta {
        background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
        color: white;
        border-radius: 16px;
        overflow: hidden;
        position: relative;
    }

    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .cta-content h2 {
        color: white;
    }

    .cta-content h2:after {
        background-color: white;
        left: 50%;
        transform: translateX(-50%);
    }

    .cta-content p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        opacity: 0.9;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-form {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 30px;
        border-radius: 12px;
        max-width: 600px;
        margin: 0 auto;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        color: #333;
    }

    .cta-form h3 {
        color: #0056b8;
        text-align: center;
        margin-bottom: 25px;
    }

    .download-catalog {
        margin-top: 30px;
        text-align: center;
    }

    .download-catalog a {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: white;
        font-weight: 600;
        padding: 12px 25px;
        background-color: rgba(255, 255, 255, 0.15);
        border-radius: 6px;
        transition: all 0.3s;
    }

    .download-catalog a:hover {
        background-color: rgba(255, 255, 255, 0.25);
        transform: translateY(-3px);
    }

    /* ===== СПЕЦИФИЧНЫЕ СТИЛИ ДЛЯ СТРАНИЦЫ ===== */
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* ===== ХЛЕБНЫЕ КРОШКИ ===== */
    .breadcrumbs {
        background-color: #f8f9fa;
        padding: 15px 0;
        font-size: 0.9rem;
        border-bottom: 1px solid #eee;
    }

    .breadcrumbs a {
        color: #0056b8;
    }

    .breadcrumbs a:hover {
        text-decoration: underline;
    }

    .breadcrumbs span {
        color: #666;
        margin: 0 8px;
    }

    /* ===== СТИКИ-НАВИГАЦИЯ ===== */
    .sticky-nav {
        position: sticky;
        top: 0;
        background-color: white;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        display: none;
    }

    .sticky-nav.active {
        display: block;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-100%);
        }

        to {
            transform: translateY(0);
        }
    }

    .sticky-nav .container {
        display: flex;
        justify-content: center;
        gap: 25px;
        padding: 15px 20px;
        overflow-x: auto;
    }

    .sticky-nav a {
        color: #555;
        font-weight: 600;
        white-space: nowrap;
        padding: 5px 0;
        position: relative;
    }

    .sticky-nav a:hover {
        color: #0056b8;
    }

    .sticky-nav a:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #0056b8;
        transition: width 0.3s ease;
    }

    .sticky-nav a:hover:after {
        width: 100%;
    }

    /* ===== ГЕРОЙ-СЕКЦИЯ ===== */
    .aggregate-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('https://i.postimg.cc/zXZD7fdp/photo-1581094794329-c8112a89af12-(2).jpg') center/cover no-repeat;
        color: white;
        padding: 120px 0 80px;
    }

    .aggregate-hero h1 {
        color: white;
        margin-bottom: 25px;
        animation: fadeInDown 1s ease;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-subtitle {
        font-size: 1.3rem;
        max-width: 700px;
        margin: 0 auto 40px;
        opacity: 0.9;
        line-height: 1.7;
        animation: fadeInUp 1s ease 0.3s both;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 50px 0;
    }

    .feature-item {
        text-align: center;
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .feature-item i {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: #4dabf7;
    }

    .feature-item h4 {
        color: white;
        margin-bottom: 10px;
    }

    .feature-item p {
        opacity: 0.9;
        font-size: 0.95rem;
        color: white;
    }

    /* ===== КЛАССИФИКАЦИЯ ===== */
    .classification {
        background-color: #f8f9fa;
        border-radius: 15px;
        padding: 50px;
        margin-top: -40px;
        position: relative;
        z-index: 10;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .class-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .class-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        border: 2px solid #eee;
    }

    .class-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 86, 184, 0.15);
        border-color: #0056b8;
    }

    .class-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        font-size: 2rem;
    }

    .class-card h3 {
        margin-bottom: 15px;
        color: #0056b8;
    }

    .class-card ul {
        text-align: left;
        margin: 20px 0;
    }

    .class-card li {
        margin-bottom: 8px;
        padding-left: 20px;
        position: relative;
    }

    .class-card li:before {
        content: '•';
        color: #0056b8;
        position: absolute;
        left: 0;
    }

    /* ===== ТИПЫ АГРЕГАТОВ ===== */
    .aggregate-types {
        background-color: white;
    }

    .types-tabs {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        margin-bottom: 40px;
    }

    .type-tab {
        padding: 15px 30px;
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .type-tab:hover {
        border-color: #0056b8;
        color: #0056b8;
    }

    .type-tab.active {
        background-color: #0056b8;
        color: white;
        border-color: #0056b8;
    }

    .type-content {
        display: none;
    }

    .type-content.active {
        display: block;
        animation: fadeIn 0.5s ease;
    }

    .type-description {
        max-width: 800px;
        margin: 0 auto 40px;
        color: #666;
        font-size: 1.1rem;
        line-height: 1.7;
    }

    .type-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .type-feature {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid #0056b8;
    }

    .type-feature h4 {
        margin-bottom: 10px;
        color: #0056b8;
    }

    /* ===== МОДЕЛИ ===== */
    .configurations {
        background-color: #f8f9fa;
    }

    .config-filter {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 40px;
        justify-content: center;
    }

    .config-btn {
        padding: 12px 25px;
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .config-btn:hover {
        border-color: #0056b8;
        color: #0056b8;
    }

    .config-btn.active {
        background-color: #0056b8;
        color: white;
        border-color: #0056b8;
    }

    .config-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    .config-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
    }

    .config-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 86, 184, 0.15);
    }

    .config-header {
        background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
        color: white;
        padding: 25px;
        text-align: center;
    }

    .config-header h3 {
        color: white;
        margin-bottom: 10px;
    }

    .config-body {
        padding: 25px;
    }

    .config-specs {
        margin: 20px 0;
    }

    .spec-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }

    .spec-item:last-child {
        border-bottom: none;
    }

    .spec-label {
        color: #666;
    }

    .spec-value {
        font-weight: 600;
        color: #222;
    }

    .config-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0056b8;
        text-align: center;
        margin: 20px 0;
    }

    /* ===== ОТРАСЛИ ===== */
    .industry-applications {
        background-color: white;
    }

    .industry-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .industry-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        text-align: center;
        padding: 30px;
    }

    .industry-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 86, 184, 0.15);
    }

    .industry-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        font-size: 2rem;
    }

    .industry-card h3 {
        margin-bottom: 15px;
        color: #0056b8;
    }

    .industry-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
        margin-top: 20px;
    }

    .industry-tag {
        background-color: #e9f5ff;
        color: #0056b8;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* ===== МОНТАЖ ===== */
    .installation-section {
        background-color: #f8f9fa;
    }

    .install-steps {
        margin-top: 30px;
    }

    .install-step {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 25px;
    }

    .step-index {
        width: 40px;
        height: 40px;
        background: #0056b8;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex-shrink: 0;
    }

    /* ===== FAQ ===== */
    .faq-section {
        background-color: white;
    }

    .faq-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        margin-bottom: 15px;
        border: 1px solid #eee;
        border-radius: 10px;
        overflow: hidden;
    }

    .faq-question {
        padding: 20px;
        background-color: #f8f9fa;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        color: #333;
        transition: all 0.3s;
    }

    .faq-question:hover {
        background-color: #f0f7ff;
    }

    .faq-question i {
        transition: transform 0.3s ease;
    }

    .faq-question.active i {
        transform: rotate(180deg);
    }

    .faq-answer {
        padding: 0 20px;
        max-height: 0;
        overflow: hidden;
        transition: all 0.5s ease;
        color: #555;
        line-height: 1.7;
    }

    .faq-answer.active {
        padding: 20px;
        max-height: 500px;
    }

    /* ===== SEO ===== */
    .seo-content {
        background-color: #f8f9fa;
        border-radius: 15px;
        padding: 50px;
    }

    .seo-text {
        max-width: 900px;
        margin: 0 auto;
    }

    .seo-text h2 {
        text-align: center;
    }

    .seo-text p {
        margin-bottom: 20px;
        font-size: 1.05rem;
        line-height: 1.8;
        color: #555;
    }

    .keywords-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 15px;
        margin-top: 40px;
    }

    .keyword-item {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .keyword-item i {
        color: #0056b8;
        font-size: 1.5rem;
    }

    /* ===== ФОРМЫ / ФАЙЛЫ ===== */
    .form-row {
        display: flex;
        gap: 15px;
    }

    .form-group {
        flex: 1;
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

    .file-upload input[type="file"] {
        display: none;
    }

    .file-label {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 12px 15px;
        border: 1px dashed #cbd5e1;
        border-radius: 8px;
        background: white;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .file-label:hover {
        border-color: #0056b8;
        background-color: #f0f7ff;
    }

    .file-label i {
        color: #0056b8;
    }

    /* ===== МОДАЛЬНЫЕ ОКНА (под main.js) ===== */
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
        padding: 20px;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
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
        max-width: 520px;
        max-height: calc(100vh - 40px);
        overflow-y: auto;
        padding: 30px;
        position: relative;
        transform: translateY(20px);
        transition: transform 0.3s;
        height: auto;
    }

    .modal-overlay.active .modal {
        transform: translateY(0);
        display: block;
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
        margin-bottom: 12px;
        font-size: 1.5rem;
    }

    .modal p {
        color: #555;
        margin-bottom: 18px;
        line-height: 1.6;
    }

    /* ===== АДАПТИВНОСТЬ ===== */
    @media (max-width: 768px) {
        section {
            padding: 60px 0;
        }

        .aggregate-hero {
            padding: 100px 0 60px;
        }

        .types-tabs {
            flex-direction: column;
        }

        .type-tab {
            width: 100%;
            text-align: center;
        }

        .sticky-nav .container {
            gap: 15px;
            padding: 15px;
        }

        h1 {
            font-size: 2.4rem;
        }

        h2 {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        section {
            padding: 50px 0;
        }

        .aggregate-hero {
            padding: 80px 0 50px;
        }

        .hero-subtitle {
            font-size: 1.05rem;
            margin-bottom: 28px;
        }

        .hero-features {
            grid-template-columns: 1fr;
            gap: 12px;
            margin: 28px 0;
        }

        .feature-item {
            padding: 16px;
        }

        .classification {
            padding: 24px 18px;
            margin-top: -25px;
        }

        .class-grid,
        .industry-grid,
        .keywords-grid,
        .type-features {
            grid-template-columns: 1fr;
        }

        .class-card,
        .industry-card {
            padding: 22px;
        }

        .types-tabs {
            gap: 10px;
        }

        .type-tab {
            padding: 12px 18px;
        }

        .type-feature {
            padding: 16px;
        }

        .install-step {
            gap: 12px;
        }

        .step-index {
            width: 34px;
            height: 34px;
        }

        .seo-content {
            padding: 28px 18px;
        }

        .cta-form {
            padding: 20px;
        }

        .form-row {
            flex-direction: column;
            gap: 0;
        }

        .modal {
            width: 100%;
            padding: 22px;
        }

        .sticky-nav .container {
            justify-content: flex-start;
        }
    }

    @media (max-width: 360px) {
        .aggregate-hero {
            padding: 70px 0 45px;
        }

        h1 {
            font-size: 1.9rem;
        }

        h2 {
            font-size: 1.6rem;
        }

        .classification {
            margin-top: 0;
            padding: 20px 14px;
            border-radius: 12px;
        }

        .cta-content p {
            font-size: 1rem;
        }

        .cta-form {
            padding: 16px;
        }

        .faq-question {
            padding: 16px;
        }

        .faq-answer.active {
            padding: 16px;
        }

        .modal {
            padding: 18px;
        }

        .sticky-nav a {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 320px) {
        .sticky-nav .container {
            gap: 12px;
        }

        .sticky-nav a {
            font-size: 0.85rem;
        }

        .feature-item i {
            font-size: 2rem;
        }

        .class-icon,
        .industry-icon {
            width: 64px;
            height: 64px;
            font-size: 1.6rem;
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

<!-- СТИКИ-НАВИГАЦИЯ -->
<div class="sticky-nav" id="stickyNav">
    <div class="container">
        <a href="#classification"><i class="fas fa-list"></i> Классификация</a>
        <a href="#types"><i class="fas fa-layer-group"></i> Типы</a>
        <a href="#applications"><i class="fas fa-industry"></i> Отрасли</a>
        <a href="#installation"><i class="fas fa-tools"></i> Монтаж</a>
        <a href="#cta"><i class="fas fa-calculator"></i> Расчет</a>
        <a href="#faq"><i class="fas fa-question-circle"></i> FAQ</a>
    </div>
</div>


 <!-- ГЕРОЙ-СЕКЦИЯ -->
<section class="aggregate-hero">
    <div class="container">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <p class="hero-subtitle text-center">Проектируем и производим надежные холодильные установки для камер хранения, овощехранилищ, логистических комплексов. Индивидуальные решения под любые температурные режимы от +15°C до -50°C.</p>

        <div class="hero-features">
            <div class="feature-item">
                <i class="fas fa-temperature-low"></i>
                <h4>Широкий диапазон</h4>
                <p>От +15°C до -50°C для любых продуктов</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-cog"></i>
                <h4>Качественные компоненты</h4>
                <p>Compressor Copeland, Bitzer, Frascold</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-shield-alt"></i>
                <h4>Гарантия 3 года</h4>
                <p>Самая длинная гарантия на рынке</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-leaf"></i>
                <h4>Энергоэффективность</h4>
                <p>Класс энергопотребления А++</p>
            </div>
        </div>

        <div class="text-center">
            <button type="button" class="btn open-modal-calc">
                <i class="fas fa-calculator"></i> Подобрать агрегат
            </button>
            <button type="button" class="btn btn-outline open-modal-call">
                <i class="fas fa-phone"></i> Получить консультацию
            </button>
        </div>
    </div>
</section>

<!-- КЛАССИФИКАЦИЯ -->
<section id="classification" class="classification fade-in">
    <div class="container">
        <h2 class="text-center">Классификация холодильных агрегатов</h2>
        <p class="text-center mb-30" style="color:#666;">Выберите подходящий тип агрегата в зависимости от требуемого температурного режима и назначения</p>

        <div class="class-grid">
            <div class="class-card">
                <div class="class-icon">
                    <i class="fas fa-thermometer-half"></i>
                </div>
                <h3>Среднетемпературные</h3>
                <p>Температурный диапазон: <strong>от 0°C до +15°C</strong></p>
                <ul>
                    <li>Для охлаждения продуктов</li>
                    <li>Хранение овощей и фруктов</li>
                    <li>Охлаждение напитков</li>
                    <li>Фармацевтическое хранение</li>
                </ul>
            </div>

            <div class="class-card">
                <div class="class-icon">
                    <i class="fas fa-snowflake"></i>
                </div>
                <h3>Низкотемпературные</h3>
                <p>Температурный диапазон: <strong>от -10°C до -25°C</strong></p>
                <ul>
                    <li>Заморозка продуктов</li>
                    <li>Хранение мяса и рыбы</li>
                    <li>Мороженое и полуфабрикаты</li>
                    <li>Промышленная заморозка</li>
                </ul>
            </div>

            <div class="class-card">
                <div class="class-icon">
                    <i class="fas fa-temperature-low"></i>
                </div>
                <h3>Глубокой заморозки</h3>
                <p>Температурный диапазон: <strong>от -30°C до -50°C</strong></p>
                <ul>
                    <li>Шоковая заморозка</li>
                    <li>Медицинские препараты</li>
                    <li>Биологические материалы</li>
                    <li>Специальные технологии</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ТИПЫ АГРЕГАТОВ -->
<section id="types" class="aggregate-types fade-in">
    <div class="container">
        <h2 class="text-center">Типы холодильных агрегатов</h2>

        <div class="types-tabs">
            <div class="type-tab active" data-tab="monoblock">Моноблочные</div>
            <div class="type-tab" data-tab="split">Сплит-системы</div>
            <div class="type-tab" data-tab="cascade">Каскадные</div>
            <div class="type-tab" data-tab="central">Центральные</div>
        </div>

        <div class="type-content active" id="monoblock">
            <div class="type-description text-center">
                <p><strong>Моноблочные холодильные агрегаты</strong> — это компактные установки "все в одном", где все компоненты расположены в едином корпусе. Идеальное решение для небольших и средних холодильных камер.</p>
            </div>
            <div class="type-features">
                <div class="type-feature">
                    <h4>Преимущества</h4>
                    <p>Простой монтаж, не требуется профессиональная заправка хладагентом, доступная цена, компактные размеры.</p>
                </div>
                <div class="type-feature">
                    <h4>Область применения</h4>
                    <p>Небольшие торговые точки, мини-производства, камеры до 50 м³, мобильные холодильные установки.</p>
                </div>
                <div class="type-feature">
                    <h4>Мощностной ряд</h4>
                    <p>От 0.5 до 10 кВт, температура от +15°C до -25°C, воздушное или водяное охлаждение конденсатора.</p>
                </div>
            </div>
        </div>

        <div class="type-content" id="split">
            <div class="type-description text-center">
                <p><strong>Сплит-системы</strong> состоят из двух блоков: внутреннего (испаритель) и наружного (конденсатор с компрессором). Оптимальны для средних и крупных холодильных камер.</p>
            </div>
            <div class="type-features">
                <div class="type-feature">
                    <h4>Преимущества</h4>
                    <p>Высокая энергоэффективность, низкий уровень шума в помещении, возможность установки на большие расстояния.</p>
                </div>
                <div class="type-feature">
                    <h4>Область применения</h4>
                    <p>Супермаркеты, рестораны, пищевые производства, склады средней площади, фармацевтические хранилища.</p>
                </div>
                <div class="type-feature">
                    <h4>Мощностной ряд</h4>
                    <p>От 3 до 100 кВт, температура от +15°C до -35°C, широкий выбор компрессоров и теплообменников.</p>
                </div>
            </div>
        </div>

        <div class="type-content" id="cascade">
            <div class="type-description text-center">
                <p><strong>Каскадные холодильные системы</strong> используются для достижения экстремально низких температур (до -60°C и ниже). Состоят из двух или более контуров с разными хладагентами.</p>
            </div>
            <div class="type-features">
                <div class="type-feature">
                    <h4>Преимущества</h4>
                    <p>Достижение сверхнизких температур, высокая надежность, возможность использования экологичных хладагентов.</p>
                </div>
                <div class="type-feature">
                    <h4>Область применения</h4>
                    <p>Лаборатории, медицинские учреждения, промышленная заморозка, хранение особых материалов, научные исследования.</p>
                </div>
                <div class="type-feature">
                    <h4>Мощностной ряд</h4>
                    <p>От 5 до 200 кВт, температура от -35°C до -80°C, индивидуальное проектирование под задачи заказчика.</p>
                </div>
            </div>
        </div>

        <div class="type-content" id="central">
            <div class="type-description text-center">
                <p><strong>Центральные холодильные установки</strong> — это мощные системы для обслуживания нескольких холодильных камер или крупных складов. Максимальная эффективность и контроль.</p>
            </div>
            <div class="type-features">
                <div class="type-feature">
                    <h4>Преимущества</h4>
                    <p>Высокая холодопроизводительность, централизованное управление, экономия энергии, резервирование мощностей.</p>
                </div>
                <div class="type-feature">
                    <h4>Область применения</h4>
                    <p>Крупные логистические центры, овощехранилища, мясоперерабатывающие комбинаты, рыбные терминалы, гипермаркеты.</p>
                </div>
                <div class="type-feature">
                    <h4>Мощностной ряд</h4>
                    <p>От 100 до 5000 кВт, любые температурные режимы, модульное построение, система мониторинга и управления.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
// Массив кастомных ссылок: 'slug' => '/путь/на/сайте/'
$custom_links = array(
    'standard-chiller-line' => '/industrial-chillers/',
);

// Функция: вернуть либо кастомную ссылку, либо ссылку на категорию
function get_custom_or_term_link($term, $custom_links)
{
    if (isset($custom_links[$term->slug])) {
        // Используем home_url для корректного абсолютного пути
        return esc_url(home_url($custom_links[$term->slug]));
    }

    $link = get_term_link($term->term_id, 'product_cat');
    if (is_wp_error($link)) {
        return '#';
    }
    return esc_url($link);
}
?>

<section class="system-nav fade-in">
    <div class="container">
        <h2>Полная система холодильного оборудования ТЕРМОСИСТЕМЫ-С</h2>
        <p class="mb-30" style="color:#666;">Изучите нашу продукцию как единый технологический комплекс. Категории выстроены по принципу от центрального холодоснабжения к конечным применениям. Кликните на любой раздел, чтобы увидеть модели, характеристики и типовые решения.</p>

        <div class="nav-accordion">
            <?php
            // Исключаем категории "Misc" и "Отраслевые решения"
            $exclude_slugs = array('misc', 'special-way-of-solving');
            $exclude_ids = array();

            foreach ($exclude_slugs as $slug) {
                $term = get_term_by('slug', $slug, 'product_cat');
                if ($term && ! is_wp_error($term)) {
                    $exclude_ids[] = $term->term_id;
                }
            }

            $categories = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
                'parent' => 0,
                'exclude' => ! empty($exclude_ids) ? $exclude_ids : array(),
            ));

            if (! empty($categories) && ! is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $count = $category->count;
            ?>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <?php echo esc_html($category->name); ?>
                            <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="accordion-content">
                            <div class="subcategory-list">
                                <div class="subcategory-item">
                                    <a href="<?php echo get_custom_or_term_link($category, $custom_links); ?>">
                                        <span class="item-count"><?php echo esc_html($count); ?></span>
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                </div>
                                <?php
                                // Получаем подкатегории
                                $subcategories = get_terms(array(
                                    'taxonomy' => 'product_cat',
                                    'parent' => $category->term_id,
                                    'hide_empty' => false,
                                ));

                                if (! empty($subcategories) && ! is_wp_error($subcategories)) {
                                    foreach ($subcategories as $subcat) {
                                ?>
                                        <div class="subcategory-item">
                                            <a href="<?php echo get_custom_or_term_link($subcat, $custom_links); ?>">
                                                <span class="item-count"><?php echo esc_html($subcat->count); ?></span>
                                                <?php echo esc_html($subcat->name); ?>
                                            </a>
                                        </div>
                                        <?php
                                        // Третий уровень
                                        $sub_subcategories = get_terms(array(
                                            'taxonomy' => 'product_cat',
                                            'parent' => $subcat->term_id,
                                            'hide_empty' => false,
                                        ));

                                        if (! empty($sub_subcategories) && ! is_wp_error($sub_subcategories)) {
                                            foreach ($sub_subcategories as $sub_subcat) {
                                        ?>
                                                <div class="subcategory-item" style="padding-left: 30px;">
                                                    <a href="<?php echo get_custom_or_term_link($sub_subcat, $custom_links); ?>">
                                                        <span class="item-count"><?php echo esc_html($sub_subcat->count); ?></span>
                                                        <?php echo esc_html($sub_subcat->name); ?>
                                                    </a>
                                                </div>
                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div style="padding:20px; text-align:center; color:#999;">
                    <i class="fas fa-box" style="font-size:2rem; margin-bottom:15px; color:#ddd; display:block;"></i>
                    <p>Категории не найдены. Добавьте категории товаров в WooCommerce.</p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- ОТРАСЛИ -->
<section id="applications" class="industry-applications fade-in">
    <div class="container">
        <h2 class="text-center">Применение по отраслям</h2>
        <p class="text-center mb-40" style="color:#666;">Более 300 успешных проектов в различных сферах бизнеса</p>

        <div class="industry-grid">
            <div class="industry-card">
                <div class="industry-icon">
                    <i class="fas fa-apple-alt"></i>
                </div>
                <h3>Овощехранилища</h3>
                <p>Системы вентиляции и охлаждения для долгосрочного хранения овощей и фруктов с сохранением всех полезных свойств.</p>
                <div class="industry-tags">
                    <span class="industry-tag">Картофель</span>
                    <span class="industry-tag">Яблоки</span>
                    <span class="industry-tag">Лук/морковь</span>
                </div>
            </div>

            <div class="industry-card">
                <div class="industry-icon">
                    <i class="fas fa-drumstick-bite"></i>
                </div>
                <h3>Мясная промышленность</h3>
                <p>Холодильные камеры для охлаждения, созревания и хранения мяса, птицы, субпродуктов с соблюдением СанПиН.</p>
                <div class="industry-tags">
                    <span class="industry-tag">Мясо КРС</span>
                    <span class="industry-tag">Птица</span>
                    <span class="industry-tag">Полуфабрикаты</span>
                </div>
            </div>

            <div class="industry-card">
                <div class="industry-icon">
                    <i class="fas fa-fish"></i>
                </div>
                <h3>Рыбопереработка</h3>
                <p>Низкотемпературные системы для шоковой заморозки и хранения рыбы, морепродуктов, икры.</p>
                <div class="industry-tags">
                    <span class="industry-tag">Шоковая заморозка</span>
                    <span class="industry-tag">Хранение</span>
                    <span class="industry-tag">Переработка</span>
                </div>
            </div>

            <div class="industry-card">
                <div class="industry-icon">
                    <i class="fas fa-pills"></i>
                </div>
                <h3>Фармацевтика</h3>
                <p>Прецизионные системы с точным поддержанием температуры для хранения лекарств, вакцин, биоматериалов.</p>
                <div class="industry-tags">
                    <span class="industry-tag">Вакцины</span>
                    <span class="industry-tag">Лекарства</span>
                    <span class="industry-tag">Лаборатории</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- МОНТАЖ -->
<section id="installation" class="installation-section fade-in">
    <div class="container">
        <h2 class="text-center">Монтаж и обслуживание агрегатов</h2>

        <div class="install-steps">
            <div class="install-step">
                <div class="step-index">1</div>
                <div>
                    <h4>Проектирование и расчет</h4>
                    <p>Разрабатываем проектную документацию, выполняем теплотехнический расчет, подбираем оптимальное оборудование.</p>
                </div>
            </div>

            <div class="install-step">
                <div class="step-index">2</div>
                <div>
                    <h4>Поставка оборудования</h4>
                    <p>Осуществляем доставку агрегатов и комплектующих на объект. Все оборудование проходит предпродажную подготовку.</p>
                </div>
            </div>

            <div class="install-step">
                <div class="step-index">3</div>
                <div>
                    <h4>Монтаж и пусконаладка</h4>
                    <p>Выполняем монтажные работы, подключение, заправку хладагентом, настройку автоматики и пробный запуск.</p>
                </div>
            </div>

            <div class="install-step">
                <div class="step-index">4</div>
                <div>
                    <h4>Обучение и сервис</h4>
                    <p>Обучаем персонал работе с оборудованием, предоставляем гарантию 3 года и сервисное обслуживание.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="cta" class="catalog-cta fade-in">
    <div class="container">
        <div class="cta-content">
            <h2>Не нашли нужную модель или есть особые требования?</h2>
            <p>Более 40% наших проектов — это разработка индивидуальных решений под нестандартные задачи. Пришлите техническое задание, и наши инженеры спроектируют и рассчитают стоимость оборудования специально для вас в течение 24 часов.</p>

            <div class="cta-form">
                <h3 style="color:#0056b8; text-align:center; margin-bottom:25px;">Рассчитайте индивидуальное решение</h3>
                <form id="catalogForm" class="form-tel" enctype="multipart/form-data">
                    <input type="hidden" name="formType" value="Расчет холодильного агрегата / КП: <?php echo esc_attr(get_the_title()); ?>">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Ваше имя *</label>
                            <input type="text" name="name" class="form-control" placeholder="Иванов Иван" required>
                        </div>
                        <div class="form-group">
                            <label>Телефон *</label>
                            <input type="tel" name="phone" class="form-control" placeholder="+7 (___) ___-__-__" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="ivanov@example.com">
                        </div>
                        <div class="form-group">
                            <label>Прикрепить ТЗ (до 10 МБ)</label>
                            <div class="file-upload">
                                <input type="file" id="fileUpload" name="file1" accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg">
                                <label class="file-label" for="fileUpload">
                                    <i class="fas fa-paperclip"></i>
                                    <span id="fileName">Выберите файл...</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Опишите вашу задачу</label>
                        <textarea name="message" class="form-control" rows="4" placeholder="Технические требования, условия эксплуатации, желаемые сроки..." required></textarea>
                    </div>
                    <button type="submit" class="btn" style="width:100%;">
                        <i class="fas fa-calculator"></i> Получить КП
                    </button>
                </form>
            </div>


        </div>
    </div>
</section>
<!-- FAQ -->
<section id="faq" class="faq-section fade-in">
    <div class="container">
        <div class="faq-container">
            <h2 class="text-center">Частые вопросы о холодильных агрегатах</h2>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Какой холодильный агрегат выбрать для овощехранилища?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Для овощехранилища оптимально подходят среднетемпературные агрегаты с диапазоном температур от 0°C до +15°C. Ключевые особенности:</p>
                    <ul style="padding-left:20px; margin:10px 0;">
                        <li>Система вентиляции для равномерного распределения температуры</li>
                        <li>Поддержание влажности 85-95% для сохранения свежести</li>
                        <li>Регулируемая скорость охлаждения для разных типов овощей</li>
                    </ul>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Как рассчитать мощность холодильного агрегата?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Мощность агрегата зависит от объема камеры, требуемой температуры и теплопритоков. Наши инженеры выполняют точный расчет бесплатно при подготовке коммерческого предложения.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Какой срок службы у холодильных агрегатов?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Срок службы холодильных агрегатов: 15-20 лет для качественных компрессоров, 10-15 лет для эконом-класса. Регулярное обслуживание увеличивает срок на 30-40%.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Какие хладагенты используются в современных агрегатах?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Современные системы используют экологичные хладагенты: R-448A, R-513A, R-1234ze с низким потенциалом глобального потепления. Мы подбираем хладагент в соответствии с требованиями заказчика.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Возможно ли дистанционное управление агрегатами?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Да, современные агрегаты оснащаются системами дистанционного управления: контроль температуры в реальном времени, СМС-оповещение, удаленное изменение параметров, сбор статистики энергопотребления.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEO -->
<section class="seo-content fade-in">
    <div class="container">
        <div class="seo-text">
            <h2>Холодильные агрегаты промышленные: производство в Самаре</h2>

            <p>Компания «ТЕРМОСИСТЕМЫ-С» с 2010 года специализируется на проектировании и производстве промышленных холодильных агрегатов для различных отраслей экономики. Мы изготавливаем надежные системы холодоснабжения, которые обеспечивают стабильную работу холодильных камер, складов, овощехранилищ и производственных помещений.</p>

            <p>Наше производство в Самаре оснащено современным оборудованием для изготовления холодильных агрегатов мощностью от 1 до 500 кВт. Мы используем только качественные компоненты от мировых производителей: компрессоры Copeland и Bitzer, теплообменники Alfa Laval и Güntner, автоматику Danfoss и Carel.</p>

            <p>Мы предлагаем широкий ассортимент холодильных агрегатов: среднетемпературные (от 0°C до +15°C), низкотемпературные (от -10°C до -25°C), каскадные системы (до -60°C), моноблочные и сплит-системы. Все оборудование адаптировано к российским климатическим условиям.</p>

            <p>Собственное производство позволяет нам контролировать качество на всех этапах и предлагать конкурентные цены. Мы обеспечиваем полный цикл: от теплотехнического расчета и проектирования до изготовления, доставки, монтажа, пусконаладки и сервисного обслуживания оборудования.</p>

            <div class="keywords-grid">
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>холодильные агрегаты купить в Самаре</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Производство от завода-изготовителя</p>
                    </div>
                </div>
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>промышленные холодильные установки цена</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Стоимость для камер и складов</p>
                    </div>
                </div>
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>низкотемпературные агрегаты заморозка</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Оборудование для заморозки</p>
                    </div>
                </div>
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>среднетемпературные холодильные системы</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Охлаждение для овощехранилищ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- МОДАЛЬНЫЕ ОКНА -->
<div class="modal-overlay" id="calcModal">
    <div class="modal">
        <button class="modal-close close-modal" type="button" aria-label="Закрыть">&times;</button>
        <h3>Рассчитать стоимость и получить КП</h3>
        <p>Оставьте контакты — инженер уточнит параметры и подготовит предложение.</p>
        <form id="calcForm" class="form-tel" enctype="multipart/form-data">
            <input type="hidden" name="formType" value="Расчет/КП: <?php echo esc_attr(get_the_title()); ?>">
            <div class="form-group">
                <label for="calcName">Ваше имя *</label>
                <input type="text" id="calcName" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="calcPhone">Телефон *</label>
                <input type="tel" id="calcPhone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="calcEmail">Email</label>
                <input type="email" id="calcEmail" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="calcMessage">Что нужно рассчитать</label>
                <textarea id="calcMessage" name="message" class="form-control" rows="3" placeholder="Температура, объем камеры, продукт, условия установки, сроки..."></textarea>
            </div>
            <div class="form-group">
                <label>Прикрепить ТЗ (до 10 МБ)</label>
                <div class="file-upload">
                    <input type="file" id="calcFileUpload" name="file1" accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg">
                    <label class="file-label" for="calcFileUpload">
                        <i class="fas fa-paperclip"></i>
                        <span id="calcFileName">Выберите файл...</span>
                    </label>
                </div>
            </div>
            <button type="submit" class="btn" style="width:100%;">
                <i class="fas fa-paper-plane"></i> Отправить заявку
            </button>
        </form>
    </div>
</div>

<div class="modal-overlay" id="callModal">
    <div class="modal">
        <button class="modal-close close-modal" type="button" aria-label="Закрыть">&times;</button>
        <h3>Заказать консультацию</h3>
        <p>Наш специалист свяжется с вами в удобное время и ответит на вопросы.</p>
        <form id="callForm" class="form-tel">
            <input type="hidden" name="formType" value="Консультация: <?php echo esc_attr(get_the_title()); ?>">
            <div class="form-group">
                <label for="callName">Ваше имя *</label>
                <input type="text" id="callName" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="callPhone">Телефон *</label>
                <input type="tel" id="callPhone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="callTime">Удобное время</label>
                <select id="callTime" name="time" class="form-control">
                    <option value="">В любое время</option>
                    <option value="9-12">9:00 - 12:00</option>
                    <option value="12-15">12:00 - 15:00</option>
                    <option value="15-18">15:00 - 18:00</option>
                </select>
            </div>
            <div class="form-group">
                <label for="callQuestion">Ваш вопрос</label>
                <textarea id="callQuestion" name="message" class="form-control" rows="3" placeholder="Что вас интересует?"></textarea>
            </div>
            <button type="submit" class="btn" style="width:100%;">
                <i class="fas fa-phone"></i> Заказать звонок
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Анимация появления при скролле
        const fadeElements = document.querySelectorAll('.fade-in');
        const stickyNav = document.getElementById('stickyNav');

        const fadeInOnScroll = function() {
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                if (elementTop < window.innerHeight - 150) {
                    element.classList.add('visible');
                }
            });

            if (stickyNav) {
                if (window.scrollY > 500) {
                    stickyNav.classList.add('active');
                } else {
                    stickyNav.classList.remove('active');
                }
            }
        };

        window.addEventListener('scroll', fadeInOnScroll);
        fadeInOnScroll();

        // Табы типов
        const typeTabs = document.querySelectorAll('.type-tab');
        typeTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.dataset.tab;

                typeTabs.forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.type-content').forEach(c => c.classList.remove('active'));

                this.classList.add('active');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Отображение выбранного файла (CTA + модальное окно)
        function bindFileLabel(inputId, labelId) {
            const input = document.getElementById(inputId);
            const label = document.getElementById(labelId);
            if (!input || !label) return;

            input.addEventListener('change', function(e) {
                const files = e.target.files;
                if (files && files.length > 0) {
                    label.textContent = Array.from(files).map(f => f.name).join(', ');
                } else {
                    label.textContent = 'Выберите файл...';
                }
            });
        }

        bindFileLabel('fileUpload', 'fileName');
        bindFileLabel('calcFileUpload', 'calcFileName');

        // Фильтрация модели
        const configBtns = document.querySelectorAll('.config-btn');
        const configCards = document.querySelectorAll('.config-card');

        configBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.dataset.filter;

                configBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                configCards.forEach(card => {
                    if (filter === 'all' || card.dataset.type.includes(filter)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // FAQ
        const faqQuestions = document.querySelectorAll('.faq-question');
        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;

                document.querySelectorAll('.faq-answer.active').forEach(ans => {
                    ans.classList.remove('active');
                    ans.previousElementSibling.classList.remove('active');
                });

                this.classList.add('active');
                answer.classList.add('active');
            });
        });
    });
</script>

<?php get_footer(); ?>
