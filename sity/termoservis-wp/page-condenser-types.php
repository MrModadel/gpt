<?php

/**
 * Template Name: По типу охлаждения конденсатора
 * 
 * @package Termoservis
 */

get_header();
?>
<style>
    /* ===== 1. ГЕРОЙ-СЕКЦИЯ ===== */
    .cooling-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('https://res.cloudinary.com/dbsm61hrr/image/upload/v1768714160/photo-1581094794329-c8112a89af12-_3_-_1__11zon_nazxqf.webp') center/cover no-repeat;
        color: white;
        padding: 120px 0 80px;
        position: relative;
    }

    .cooling-hero .container {
        position: relative;
        z-index: 1;
        max-width: 1000px;
    }

    .cooling-hero h1 {
        color: white;
        margin-bottom: 25px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
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
        max-width: 900px;
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
        animation: fadeInUp 1s ease 0.6s both;
    }

    .feature-item {
        text-align: center;
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        backdrop-filter: blur(5px);
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
    }

    /* ===== 2. ТАБЫ С ТИПАМИ ОХЛАЖДЕНИЯ ===== */
    .cooling-types {
        background-color: white;
    }

    .type-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 40px;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }

    .type-tab {
        padding: 15px 30px;
        background-color: #f8f9fa;
        border: none;
        border-radius: 8px 8px 0 0;
        font-weight: 600;
        color: #555;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .type-tab:hover {
        background-color: #f0f7ff;
        color: #0056b8;
    }

    .type-tab.active {
        background-color: #0056b8;
        color: white;
    }

    .type-tab i {
        font-size: 1.2rem;
    }

    .type-content {
        display: none;
        animation: fadeIn 0.5s ease;
    }

    .type-content.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .type-description {
        margin-bottom: 40px;
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
    }

    .type-advantages {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin: 40px 0;
    }

    .advantage-item {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 10px;
        border-left: 4px solid #0056b8;
    }

    .advantage-item h4 {
        color: #0056b8;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .advantage-item i {
        font-size: 1.3rem;
    }
.comparison{
    background-color: transparent;
    border-radius: 0;
    padding: 0;
    margin: 0;
}
    .comparison-table {
        width: 100%;
        border-collapse: collapse;
        margin: 40px 0;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border-radius: 10px;
        overflow: hidden;
    }

    .comparison-table th {
        background-color: #0056b8;
        color: white;
        padding: 20px;
        text-align: left;
        font-weight: 600;
    }

    .comparison-table td {
        padding: 20px;
        border-bottom: 1px solid #eee;
    }

    .comparison-table tr:hover {
        background-color: #f8f9fa;
    }

    .comparison-table .highlight {
        background-color: #e9f5ff;
        font-weight: 600;
    }

    /* ===== 3. СРАВНИТЕЛЬНАЯ ТАБЛИЦА ===== */
    .comparison-section {
        background-color: #f8f9fa;
        border-radius: 15px;
        padding: 50px;
        margin-top: 40px;
    }

    .comparison-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .comparison-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        border: 2px solid #eee;
    }

    .comparison-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 86, 184, 0.15);
        border-color: #0056b8;
    }

    .card-header {
        text-align: center;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0f0f0;
    }

    .card-header i {
        font-size: 3rem;
        color: #0056b8;
        margin-bottom: 15px;
    }

    .card-features {
        margin: 25px 0;
    }

    .card-feature {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        color: #555;
    }

    .card-feature i {
        color: #28a745;
    }

    .card-price {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0056b8;
        text-align: center;
        margin: 25px 0;
    }

    .card-cta {
        text-align: center;
    }

    /* ===== 4. СХЕМЫ РАБОТЫ ===== */
    .schemes-section {
        background-color: white;
    }

    .schemes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
        margin-top: 40px;
    }

    .scheme-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
    }

    .scheme-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 86, 184, 0.15);
    }

    .scheme-image {
        height: 200px;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ccc;
        font-size: 5rem;
    }

    .scheme-content {
        padding: 30px;
    }

    .scheme-content h3 {
        margin-bottom: 20px;
        color: #0056b8;
    }

    .scheme-steps {
        margin: 25px 0;
    }

    .scheme-step {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .step-number {
        width: 30px;
        height: 30px;
        background: #0056b8;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        flex-shrink: 0;
    }

    .step-text {
        flex-grow: 1;
    }

    /* ===== 5. КАЛЬКУЛЯТОР ВЫБОРА ===== */
    .selector-calculator {
        background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
        color: white;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
    }

    .selector-container {
        max-width: 900px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .selector-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .selector-header h2 {
        color: white;
    }

    .selector-header h2:after {
        background-color: white;
        left: 50%;
        transform: translateX(-50%);
    }

    .selector-form {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    }

    .form-group {
        margin-bottom: 25px;
    }

    #typeName {
        color: #ffffff;
        font-size: 24px;
        font-weight: 600;

    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #333;
        font-size: 1rem;
    }

    .form-control {
        width: 100%;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #0056b8;
        box-shadow: 0 0 0 3px rgba(0, 86, 184, 0.1);
    }

    .radio-group {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .radio-label {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .radio-label:hover {
        background-color: #f0f7ff;
    }

    .radio-label input {
        width: 20px;
        height: 20px;
    }

    .selector-result {
        display: none;
        text-align: center;
        padding: 30px;
        background-color: #e9f5ff;
        border-radius: 10px;
        margin-top: 30px;
    }

    .selector-result h3 {
        color: #0056b8;
        margin-bottom: 15px;
    }

    .recommended-type {
        background-color: #0056b8;
        color: white;
        padding: 15px;
        border-radius: 8px;
        margin: 20px 0;
    }

    /* ===== 6. СФЕРЫ ПРИМЕНЕНИЯ ===== */
    .application-areas {
        background-color: #f8f9fa;
    }

    .areas-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .area-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
    }

    .area-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 86, 184, 0.15);
    }

    .area-icon {
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

    .area-content {
        padding: 25px;
        text-align: center;
    }

    .area-content h4 {
        margin-bottom: 15px;
        color: #222;
    }

    .area-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 20px;
        justify-content: center;
    }

    .area-tag {
        background-color: #e9f5ff;
        color: #0056b8;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
    }

    /* ===== 7. FAQ ===== */
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

    /* ===== 8. SEO-КОНТЕНТ ===== */
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
        text-align: justify;
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

    /* ===== СТИКИ-ВИДЖЕТ ===== */
    .sticky-widget {
        position: fixed;
        right: 30px;
        bottom: 30px;
        width: 350px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        z-index: 999;
        overflow: hidden;
        display: none;
    }

    .sticky-widget.active {
        display: block;
        animation: slideInRight 0.5s ease;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .widget-header {
        background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
        color: white;
        padding: 20px;
        text-align: center;
    }

    .widget-header h4 {
        color: white;
        margin-bottom: 10px;
    }

    .widget-content {
        padding: 25px;
    }

    .widget-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background: none;
        border: none;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
    }

    /* ===== ФУТЕР ===== */
    .main-footer {
        background-color: #222;
        color: #ddd;
        padding: 70px 0 30px;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        margin-bottom: 40px;
    }

    .footer-logo {
        font-size: 1.7rem;
        font-weight: 800;
        color: white;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .footer-logo i {
        margin-right: 10px;
        color: #0056b8;
    }

    .footer-about p {
        margin-bottom: 25px;
        line-height: 1.7;
        color: #aaa;
        font-size: 0.95rem;
    }

    .footer-links h4,
    .footer-contacts h4 {
        color: white;
        margin-bottom: 25px;
        font-size: 1.1rem;
        position: relative;
        padding-bottom: 10px;
    }

    .footer-links h4:after,
    .footer-contacts h4:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background: #0056b8;
    }

    .footer-links ul li {
        margin-bottom: 12px;
    }

    .footer-links ul li a {
        color: #aaa;
        transition: all 0.3s;
        display: inline-block;
        font-size: 0.9rem;
    }

    .footer-links ul li a:hover {
        color: #0056b8;
        transform: translateX(5px);
    }

    .footer-contacts p {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #aaa;
        font-size: 0.9rem;
    }

    .footer-contacts i {
        color: #0056b8;
        width: 18px;
        text-align: center;
    }

    .footer-contacts a {
        color: #ddd;
    }

    .footer-contacts a:hover {
        color: #0056b8;
    }

    .social-links {
        display: flex;
        gap: 12px;
        margin-top: 20px;
    }

    .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        background-color: #333;
        border-radius: 50%;
        color: white;
        transition: all 0.3s;
        font-size: 1rem;
    }

    .social-links a:hover {
        background-color: #0056b8;
        transform: translateY(-3px);
    }

    .footer-bottom {
        text-align: center;
        padding-top: 30px;
        border-top: 1px solid #444;
        color: #888;
        font-size: 0.85rem;
    }

    .footer-bottom a {
        color: #aaa;
    }

    .footer-bottom a:hover {
        color: #0056b8;
    }

    /* ===== АДАПТИВНОСТЬ ===== */
    @media (max-width: 992px) {
        h1 {
            font-size: 2.4rem;
        }

        h2 {
            font-size: 2rem;
        }

        .type-tabs {
            justify-content: center;
        }

        .comparison-section {
            padding: 30px;
        }

        .sticky-widget {
            width: 300px;
            right: 20px;
        }
    }

    @media (max-width: 768px) {
        section {
            padding: 60px 0;
        }

        .cooling-hero {
            padding: 100px 0 60px;
        }

        .type-tabs {
            flex-direction: column;
        }

        .type-tab {
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .schemes-grid {
            grid-template-columns: 1fr;
        }

        .selector-form {
            padding: 20px;
        }

        .sticky-widget {
            display: none !important;
        }

        .radio-group {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        h1 {
            font-size: 2rem;
        }

        h2 {
            font-size: 1.7rem;
        }

        .feature-item {
            padding: 15px;
        }

        .comparison-card {
            padding: 20px;
        }

        .scheme-card {
            margin-bottom: 20px;
        }

        .seo-content {
            padding: 20px;
        }
    }

    @media (max-width: 400px) {
        .comparison-section {
            padding: 10px 0 0;
        }

        .comparison-grid {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }

        .type-advantages {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }

    }
</style>
<!-- ХЛЕБНЫЕ КРОШКИ -->
<div class="breadcrumbs">
    <div class="container">
        <a href="/">Главная</a> <span>/</span>
        <a href="/catalog/">Каталог</a> <span>/</span>
        <a href="/industrial-chillers/">Промышленные чиллеры</a> <span>/</span>
        <strong>По типу охлаждения конденсатора</strong>
    </div>
</div>

<!-- 1. ГЕРОЙ-СЕКЦИЯ -->
<section class="cooling-hero">
    <div class="container">
        <h1 class="text-center">Чиллеры по типу охлаждения конденсатора</h1>
        <p class="hero-subtitle text-center">Выбор правильного типа охлаждения конденсатора — ключ к энергоэффективности и надежности вашей системы холодоснабжения. Сравниваем воздушное, водяное, выносное и испарительное охлаждение для оптимального решения.</p>

        <div class="hero-features">
            <div class="feature-item">
                <i class="fas fa-tachometer-alt"></i>
                <h4>До 40% экономии энергии</h4>
                <p>Правильный подбор типа охлаждения снижает эксплуатационные расходы</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-cogs"></i>
                <h4>4 основных типа</h4>
                <p>Воздушное, водяное, выносное и испарительное охлаждение</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-chart-line"></i>
                <h4>Оптимальный КПД</h4>
                <p>Каждый тип обеспечивает максимальную эффективность в своих условиях</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-calculator"></i>
                <h4>Бесплатный расчет</h4>
                <p>Подберем оптимальный тип охлаждения для ваших условий</p>
            </div>
        </div>

        <div class="text-center">
            <a href="#selector" class="btn">
                <i class="fas fa-sliders-h"></i> Подобрать тип охлаждения
            </a>
            <a href="/#cta" class="btn btn-outline" id="requestCall" style="padding: 13px 35px">
                <i class="fas fa-phone"></i> Консультация инженера
            </a>
        </div>
    </div>
</section>

<!-- 2. ТАБЫ С ТИПАМИ ОХЛАЖДЕНИЯ -->
<section id="types" class="cooling-types fade-in">
    <div class="container">
        <h2 class="text-center">Основные типы охлаждения конденсатора</h2>
        <p class="text-center mb-40" style="color:#666;">Выберите тип для просмотра подробной информации и технических характеристик</p>

        <div class="type-tabs">
            <button class="type-tab active" data-type="air">
                <i class="fas fa-fan"></i>
                Воздушное охлаждение
            </button>
            <button class="type-tab" data-type="water">
                <i class="fas fa-tint"></i>
                Водяное охлаждение
            </button>
            <button class="type-tab" data-type="remote">
                <i class="fas fa-external-link-alt"></i>
                Выносной конденсатор
            </button>
            <button class="type-tab" data-type="evaporative">
                <i class="fas fa-wind"></i>
                Испарительное охлаждение
            </button>
        </div>

        <!-- Воздушное охлаждение -->
        <div class="type-content active" id="airContent">
            <div class="type-description">
                <h3>Чиллеры с воздушным охлаждением конденсатора</h3>
                <p>Наиболее распространенный тип чиллеров, где тепло отводится в атмосферу с помощью вентиляторов. Конденсатор представляет собой теплообменник с оребренными трубками, обдуваемый мощными осевыми или центробежными вентиляторами.</p>
                <p>Идеальное решение для большинства промышленных применений, где нет ограничений по размещению оборудования и есть доступ к свежему воздуху.</p>
            </div>

            <div class="type-advantages">
                <div class="advantage-item">
                    <h4><i class="fas fa-check-circle"></i> Преимущества</h4>
                    <ul style="padding-left: 20px; color: #555;">
                        <li>Не требует водоснабжения и канализации</li>
                        <li>Проще и дешевле в монтаже</li>
                        <li>Более низкие эксплуатационные расходы</li>
                        <li>Меньше компонентов — выше надежность</li>
                        <li>Возможность уличного исполнения</li>
                    </ul>
                </div>

                <div class="advantage-item">
                    <h4><i class="fas fa-exclamation-triangle"></i> Особенности</h4>
                    <ul style="padding-left: 20px; color: #555;">
                        <li>Требует хорошей вентиляции помещения</li>
                        <li>Производительность зависит от температуры окружающего воздуха</li>
                        <li>Занимает больше места по сравнению с водяными аналогами</li>
                        <li>Более высокий уровень шума (особенно у моделей большой мощности)</li>
                    </ul>
                </div>
            </div>

            <h3 style="margin-top: 40px;">Технические характеристики</h3>
            
        </div>
<div class="comparison">
                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th>Параметр</th>
                            <th>Значение</th>
                            <th>Особенности</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Холодопроизводительность</strong></td>
                            <td>10-2000 кВт</td>
                            <td>Стандартный диапазон для промышленных применений</td>
                        </tr>
                        <tr class="highlight">
                            <td><strong>Температура конденсации</strong></td>
                            <td>35-50°C</td>
                            <td>Зависит от температуры окружающего воздуха</td>
                        </tr>
                        <tr>
                            <td><strong>Энергоэффективность (COP)</strong></td>
                            <td>3.0-4.5</td>
                            <td>Выше при низких температурах окружающей среды</td>
                        </tr>
                        <tr>
                            <td><strong>Требования к размещению</strong></td>
                            <td>Вентилируемое помещение или улица</td>
                            <td>Минимальное расстояние до стен 1-1.5 м</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <!-- Водяное охлаждение -->
        <div class="type-content" id="waterContent">
            <div class="type-description">
                <h3>Чиллеры с водяным охлаждением конденсатора</h3>
                <p>Водяные чиллеры используют воду в качестве теплоносителя для отвода тепла от конденсатора. Охлаждающая вода может подаваться из градирни, чиллера с фрикулингом или оборотной системы водоснабжения предприятия.</p>
                <p>Оптимальное решение для объектов с ограниченным пространством, высокими требованиями к шуму или расположенных в регионах с жарким климатом.</p>
            </div>

            <div class="type-advantages">
                <div class="advantage-item">
                    <h4><i class="fas fa-check-circle"></i> Преимущества</h4>
                    <ul style="padding-left: 20px; color: #555;">
                        <li>Высокий КПД (на 20-30% выше воздушных аналогов)</li>
                        <li>Компактные размеры оборудования</li>
                        <li>Низкий уровень шума при работе</li>
                        <li>Стабильная работа в жарком климате</li>
                        <li>Можно размещать в закрытых помещениях</li>
                    </ul>
                </div>

                <div class="advantage-item">
                    <h4><i class="fas fa-exclamation-triangle"></i> Особенности</h4>
                    <ul style="padding-left: 20px; color: #555;">
                        <li>Требуется система водоподготовки и водоотведения</li>
                        <li>Более сложный и дорогой монтаж</li>
                        <li>Высокие эксплуатационные расходы на воду</li>
                        <li>Риск образования накипи и коррозии</li>
                        <li>Зависимость от работы градирни или другого источника охлаждающей воды</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Выносной конденсатор -->
        <div class="type-content" id="remoteContent">
            <div class="type-description">
                <h3>Чиллеры с выносным конденсатором</h3>
                <p>Гибридная система, в которой испарительная часть чиллера размещается внутри помещения, а конденсатор выносится на улицу или в отдельное техническое помещение. Соединение осуществляется фреоновыми магистралями.</p>
                <p>Идеальное решение для объектов, где необходимо минимизировать шум и тепловыделение в производственных помещениях, а также для модернизации существующих систем.</p>
            </div>

            <div class="type-advantages">
                <div class="advantage-item">
                    <h4><i class="fas fa-check-circle"></i> Преимущества</h4>
                    <ul style="padding-left: 20px; color: #555;">
                        <li>Минимальный шум и тепловыделение в помещении</li>
                        <li>Гибкость в размещении оборудования</li>
                        <li>Возможность использования в стесненных условиях</li>
                        <li>Упрощенное обслуживание конденсатора</li>
                        <li>Хорошо подходит для модернизации</li>
                    </ul>
                </div>

                <div class="advantage-item">
                    <h4><i class="fas fa-exclamation-triangle"></i> Особенности</h4>
                    <ul style="padding-left: 20px; color: #555;">
                        <li>Требуется прокладка фреоновых трасс</li>
                        <li>Более высокая стоимость монтажа</li>
                        <li>Ограничения по длине фреоновых магистралей</li>
                        <li>Требуется квалифицированный монтаж</li>
                        <li>Дополнительные потери в трассах</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Испарительное охлаждение -->
        <div class="type-content" id="evaporativeContent">
            <div class="type-description">
                <h3>Чиллеры с испарительным охлаждением</h3>
                <p>Инновационная система, сочетающая преимущества воздушного и водяного охлаждения. Вода распыляется на теплообменник, и ее испарение обеспечивает эффективное охлаждение конденсатора. Обеспечивает температуру конденсации, близкую к температуре мокрого термометра.</p>
                <p>Наиболее энергоэффективное решение для регионов с сухим климатом и объектов с высокими требованиями к энергосбережению.</p>
            </div>

            <div class="type-advantages">
                <div class="advantage-item">
                    <h4><i class="fas fa-check-circle"></i> Преимущества</h4>
                    <ul style="padding-left: 20px; color: #555;">
                        <li>Самая высокая энергоэффективность (COP до 6.0)</li>
                        <li>Низкая температура конденсации</li>
                        <li>Меньший расход электроэнергии</li>
                        <li>Компактные размеры по сравнению с воздушными аналогами</li>
                        <li>Стабильная работа в жарком климате</li>
                    </ul>
                </div>

                <div class="advantage-item">
                    <h4><i class="fas fa-exclamation-triangle"></i> Особенности</h4>
                    <ul style="padding-left: 20px; color: #555;">
                        <li>Требуется водоподготовка и система водоотведения</li>
                        <li>Высокие требования к качеству воды</li>
                        <li>Риск образования биологических загрязнений</li>
                        <li>Более сложное обслуживание</li>
                        <li>Высокая начальная стоимость</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. СРАВНИТЕЛЬНАЯ ТАБЛИЦА -->
<section id="comparison" class="comparison-section fade-in">
    <div class="container">
        <h2 class="text-center">Сравнение типов охлаждения</h2>
        <p class="text-center mb-40" style="color:#666;">Сводная таблица ключевых параметров для быстрого сравнения</p>

        <div class="comparison-grid">
            <div class="comparison-card">
                <div class="card-header">
                    <i class="fas fa-fan"></i>
                    <h3>Воздушное</h3>
                </div>
                <div class="card-features">
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Энергоэффективность:</strong> 3.0-4.5 COP</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Монтаж:</strong> Простой</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Эксплуатация:</strong> Низкая стоимость</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-times" style="color:#dc3545;"></i>
                        <span><strong>Зависимость:</strong> От температуры воздуха</span>
                    </div>
                </div>
                <div class="card-price">от 450 000 ₽</div>
                <div class="card-cta">
                    <a href="#" class="btn btn-small select-type" data-type="air">
                        Выбрать этот тип
                    </a>
                </div>
            </div>

            <div class="comparison-card">
                <div class="card-header">
                    <i class="fas fa-tint"></i>
                    <h3>Водяное</h3>
                </div>
                <div class="card-features">
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Энергоэффективность:</strong> 4.0-5.5 COP</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Размеры:</strong> Компактные</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Шум:</strong> Низкий</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-times" style="color:#dc3545;"></i>
                        <span><strong>Вода:</strong> Требуется постоянно</span>
                    </div>
                </div>
                <div class="card-price">от 680 000 ₽</div>
                <div class="card-cta">
                    <button class="btn btn-small select-type" data-type="water">
                        Выбрать этот тип
                    </button>
                </div>
            </div>

            <div class="comparison-card">
                <div class="card-header">
                    <i class="fas fa-external-link-alt"></i>
                    <h3>Выносной</h3>
                </div>
                <div class="card-features">
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Размещение:</strong> Гибкое</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Шум в помещении:</strong> Минимальный</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Тепловыделение:</strong> На улице</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-times" style="color:#dc3545;"></i>
                        <span><strong>Монтаж:</strong> Сложный</span>
                    </div>
                </div>
                <div class="card-price">от 750 000 ₽</div>
                <div class="card-cta">
                    <button class="btn btn-small select-type" data-type="remote">
                        Выбрать этот тип
                    </button>
                </div>
            </div>

            <div class="comparison-card">
                <div class="card-header">
                    <i class="fas fa-wind"></i>
                    <h3>Испарительное</h3>
                </div>
                <div class="card-features">
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Эффективность:</strong> 5.0-6.0 COP</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Экономия энергии:</strong> До 40%</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-check"></i>
                        <span><strong>Климат:</strong> Для жаркого и сухого</span>
                    </div>
                    <div class="card-feature">
                        <i class="fas fa-times" style="color:#dc3545;"></i>
                        <span><strong>Обслуживание:</strong> Сложное</span>
                    </div>
                </div>
                <div class="card-price">от 950 000 ₽</div>
                <div class="card-cta">
                    <button class="btn btn-small select-type" data-type="evaporative">
                        Выбрать этот тип
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. СХЕМЫ РАБОТЫ -->
<section id="schemes" class="schemes-section fade-in">
    <div class="container">
        <h2 class="text-center">Принципиальные схемы работы</h2>
        <p class="text-center mb-40" style="color:#666;">Визуализация принципов работы каждого типа охлаждения конденсатора</p>

        <div class="schemes-grid">
            <div class="scheme-card">
                <div class="scheme-image">
                    <i class="fas fa-fan" style="color:#0056b8;"></i>
                </div>
                <div class="scheme-content">
                    <h3>Схема воздушного охлаждения</h3>
                    <p>Тепло от хладагента передается воздуху через оребренный теплообменник. Вентиляторы создают поток воздуха, уносящий тепло в атмосферу.</p>
                    <div class="scheme-steps">
                        <div class="scheme-step">
                            <div class="step-number">1</div>
                            <div class="step-text">Горячий хладагент поступает в конденсатор</div>
                        </div>
                        <div class="scheme-step">
                            <div class="step-number">2</div>
                            <div class="step-text">Вентиляторы обдувают теплообменник</div>
                        </div>
                        <div class="scheme-step">
                            <div class="step-number">3</div>
                            <div class="step-text">Тепло передается воздуху и рассеивается</div>
                        </div>
                        <div class="scheme-step">
                            <div class="step-number">4</div>
                            <div class="step-text">Охлажденный хладагент возвращается в цикл</div>
                        </div>
                    </div>
                    <a href="/air-cooled-chillers/" class="btn btn-small">
                        Выбрать этот тип
                    </a>
                </div>
            </div>

            <div class="scheme-card">
                <div class="scheme-image">
                    <i class="fas fa-tint" style="color:#0056b8;"></i>
                </div>
                <div class="scheme-content">
                    <h3>Схема водяного охлаждения</h3>
                    <p>Тепло от хладагента передается воде в пластинчатом или кожухотрубном теплообменнике. Нагретая вода охлаждается в градирне или другом теплообменнике.</p>
                    <div class="scheme-steps">
                        <div class="scheme-step">
                            <div class="step-number">1</div>
                            <div class="step-text">Горячий хладагент поступает в конденсатор</div>
                        </div>
                        <div class="scheme-step">
                            <div class="step-number">2</div>
                            <div class="step-text">Тепло передается циркулирующей воде</div>
                        </div>
                        <div class="scheme-step">
                            <div class="step-number">3</div>
                            <div class="step-text">Нагретая вода охлаждается в градирне</div>
                        </div>
                        <div class="scheme-step">
                            <div class="step-number">4</div>
                            <div class="step-text">Охлажденная вода возвращается в конденсатор</div>
                        </div>
                    </div>
                    <a href="/water-cooled-chillers/" class="btn btn-small">
                        Выбрать этот тип
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. КАЛЬКУЛЯТОР ВЫБОРА -->
<section id="selector" class="selector-calculator fade-in">
    <div class="container">
        <div class="selector-container">
            <div class="selector-header">
                <h2>Подбор оптимального типа охлаждения</h2>
                <p>Ответьте на 5 вопросов, и мы порекомендуем оптимальный тип чиллера для ваших условий</p>
            </div>

            <div class="selector-form">
                <form id="coolingSelector" class="form-tel">
                    <div class="form-group">
                        <label>1. Где будет установлен чиллер? *</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="location" value="indoor" required>
                                <span>Внутри помещения (цех, техкомната)</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="location" value="outdoor">
                                <span>На улице (крыша, площадка)</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="location" value="mixed">
                                <span>Раздельно (испаритель внутри, конденсатор снаружи)</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>2. Какие требования к шуму? *</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="noise" value="low" required>
                                <span>Низкий уровень шума критичен</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="noise" value="medium">
                                <span>Умеренные требования</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="noise" value="high">
                                <span>Шум не является ограничением</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>3. Есть ли доступ к воде? *</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="water" value="available" required>
                                <span>Есть водоснабжение и канализация</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="water" value="limited">
                                <span>Ограниченный доступ к воде</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="water" value="none">
                                <span>Нет доступа к воде</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>4. Климатические условия региона *</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="climate" value="hot" required>
                                <span>Жаркий климат (летом выше 30°C)</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="climate" value="temperate">
                                <span>Умеренный климат</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="climate" value="dry">
                                <span>Сухой климат (низкая влажность)</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>5. Бюджетные ограничения *</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="budget" value="economy" required>
                                <span>Минимальная начальная стоимость</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="budget" value="balanced">
                                <span>Баланс стоимости и эффективности</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="budget" value="premium">
                                <span>Максимальная энергоэффективность</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ваши контактные данные для отправки результата</label>
                        <div style="display: grid; grid-template-columns: 1fr; gap: 20px; margin-top: 15px;">
                            <input type="text" class="form-control" id="selectorName" placeholder="Ваше имя" name="name" required>
                            <input type="tel" class="form-control" id="selectorPhone" placeholder="Телефон" name="phone" required>
                        </div>
                    </div>

                    <button type="submit" class="btn" style="width: 100%;">
                        <i class="fas fa-magic"></i> Получить рекомендацию
                    </button>
                </form>

                <div class="selector-result" id="selectorResult">
                    <h3>Рекомендуемый тип охлаждения</h3>
                    <div class="recommended-type" id="recommendedType">
                        <h4 id="typeName">Воздушное охлаждение</h4>
                        <p id="typeDescription">Наиболее универсальное решение для ваших условий</p>
                        <p><strong>Обоснование:</strong> <span id="typeReason">На основе ваших ответов мы рекомендуем этот тип как оптимальный баланс стоимости, эффективности и простоты эксплуатации.</span></p>
                        <p><strong>Ориентировочная экономия:</strong> <span id="typeSavings">до 25% по сравнению с альтернативами</span></p>
                    </div>

                    <div style="margin-top: 25px;">
                        <a href="/#cta" class="btn" id="consultResult">
                            <i class="fas fa-user-tie"></i> Получить консультацию
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. СФЕРЫ ПРИМЕНЕНИЯ -->
<section id="application" class="application-areas fade-in">
    <div class="container">
        <h2 class="text-center">Сферы применения по типам охлаждения</h2>
        <p class="text-center mb-40" style="color:#666;">Каждый тип оптимален для определенных условий и отраслей</p>

        <div class="areas-grid">
            <div class="area-card">
                <div class="area-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <div class="area-content">
                    <h4>Воздушное охлаждение</h4>
                    <p>Металлообработка, пищевая промышленность, склады, серверные помещения, торговые центры</p>
                    <div class="area-tags">
                        <span class="area-tag">Универсальность</span>
                        <span class="area-tag">Простота монтажа</span>
                        <span class="area-tag">Экономичность</span>
                    </div>
                </div>
            </div>

            <div class="area-card">
                <div class="area-icon">
                    <i class="fas fa-flask"></i>
                </div>
                <div class="area-content">
                    <h4>Водяное охлаждение</h4>
                    <p>Химическая промышленность, фармацевтика, ЦОД, прецизионное кондиционирование, высотные здания</p>
                    <div class="area-tags">
                        <span class="area-tag">Высокий КПД</span>
                        <span class="area-tag">Компактность</span>
                        <span class="area-tag">Тихая работа</span>
                    </div>
                </div>
            </div>

            <div class="area-card">
                <div class="area-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="area-content">
                    <h4>Выносной конденсатор</h4>
                    <p>Медицинские учреждения, лаборатории, офисные здания, гостиницы, реконструкция существующих систем</p>
                    <div class="area-tags">
                        <span class="area-tag">Минимальный шум</span>
                        <span class="area-tag">Гибкость размещения</span>
                        <span class="area-tag">Модернизация</span>
                    </div>
                </div>
            </div>

            <div class="area-card">
                <div class="area-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <div class="area-content">
                    <h4>Испарительное охлаждение</h4>
                    <p>Регионы с жарким климатом, пустынные районы, объекты с высокими требованиями к энергосбережению</p>
                    <div class="area-tags">
                        <span class="area-tag">Максимальный КПД</span>
                        <span class="area-tag">Экономия энергии</span>
                        <span class="area-tag">Жаркий климат</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. FAQ -->
<section id="faq" class="faq-section fade-in">
    <div class="container">
        <div class="faq-container">
            <h2 class="text-center">Частые вопросы о типах охлаждения конденсатора</h2>
            <p class="text-center mb-40" style="color:#666;">Ответы на технические вопросы от наших клиентов и инженеров</p>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Какой тип охлаждения самый экономичный в эксплуатации?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Экономичность зависит от конкретных условий эксплуатации:</p>
                    <ul style="padding-left:20px; margin:10px 0;">
                        <li><strong>Воздушное охлаждение</strong> — минимальные эксплуатационные расходы, если есть хорошая вентиляция</li>
                        <li><strong>Водяное охлаждение</strong> — высокие затраты на воду и химобработку, но экономия электроэнергии</li>
                        <li><strong>Испарительное охлаждение</strong> — максимальная экономия электроэнергии (до 40%), но затраты на воду и обслуживание</li>
                        <li><strong>Выносной конденсатор</strong> — умеренные расходы, хороший компромисс для ограниченных условий</li>
                    </ul>
                    <p>Для точного расчета экономичности нужен детальный анализ ваших условий и тарифов.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Можно ли заменить тип охлаждения на существующем чиллере?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Замена типа охлаждения на работающем чиллере — сложная техническая задача, которая обычно экономически нецелесообразна. Однако существуют варианты модернизации:</p>
                    <ul style="padding-left:20px; margin:10px 0;">
                        <li><strong>Доработка воздушного чиллера</strong> — установка дополнительных вентиляторов или теплообменников</li>
                        <li><strong>Добавление фрикулинга</strong> — возможность использовать наружный воздух для охлаждения в холодный период</li>
                        <li><strong>Замена конденсатора</strong> — в некоторых случаях возможна замена воздушного конденсатора на водяной</li>
                        <li><strong>Установка выносного конденсатора</strong> — для воздушных чиллеров при необходимости снизить шум</li>
                    </ul>
                    <p>Лучше всего предусмотреть возможность изменения типа охлаждения на этапе проектирования.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Как температура окружающей среды влияет на эффективность разных типов?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Влияние температуры окружающей среды различается:</p>
                    <ul style="padding-left:20px; margin:10px 0;">
                        <li><strong>Воздушное охлаждение</strong> — эффективность снижается на 2-3% на каждый градус повышения температуры выше +25°C</li>
                        <li><strong>Водяное охлаждение</strong> — зависит от температуры охлаждающей воды, обычно более стабильна</li>
                        <li><strong>Испарительное охлаждение</strong> — эффективность зависит от влажности воздуха, в сухом климате работает лучше</li>
                        <li><strong>Выносной конденсатор</strong> — аналогично воздушному охлаждению, зависит от уличной температуры</li>
                    </ul>
                    <p>Для жаркого климата водяное или испарительное охлаждение обычно эффективнее.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Какие требования к помещению для разных типов охлаждения?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Требования к размещению значительно различаются:</p>
                    <ul style="padding-left:20px; margin:10px 0;">
                        <li><strong>Воздушное охлаждение</strong> — требуется вентилируемое помещение с притоком свежего воздуха, расстояние до стен не менее 1 метра</li>
                        <li><strong>Водяное охлаждение</strong> — можно размещать в закрытых помещениях, требуется подвод и отвод воды</li>
                        <li><strong>Выносной конденсатор</strong> — испарительная часть компактна, конденсатор размещается на улице</li>
                        <li><strong>Испарительное охлаждение</strong> — требуется дренаж и водоснабжение, лучше размещать в технических помещениях</li>
                    </ul>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Какой срок службы у разных типов охлаждения?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Срок службы зависит от условий эксплуатации и обслуживания:</p>
                    <ul style="padding-left:20px; margin:10px 0;">
                        <li><strong>Воздушное охлаждение</strong> — 15-20 лет при регулярной очистке теплообменников</li>
                        <li><strong>Водяное охлаждение</strong> — 12-18 лет, зависит от качества воды и системы водоподготовки</li>
                        <li><strong>Выносной конденсатор</strong> — 15-20 лет, но требуются регулярные проверки фреоновых трасс</li>
                        <li><strong>Испарительное охлаждение</strong> — 10-15 лет из-за коррозионного воздействия влаги</li>
                    </ul>
                    <p>Правильное обслуживание может продлить срок службы любого типа на 30-50%.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. SEO-КОНТЕНТ -->
<section class="seo-content fade-in">
    <div class="container">
        <div class="seo-text">
            <h2>Типы охлаждения конденсатора промышленных чиллеров</h2>

            <p>Выбор типа охлаждения конденсатора — один из ключевых факторов при проектировании системы холодоснабжения. Компания «ТЕРМОСИСТЕМЫ-С» предлагает полный спектр промышленных чиллеров с различными типами охлаждения конденсатора: воздушным, водяным, с выносным конденсатором и испарительным охлаждением. Каждый тип имеет свои преимущества и оптимальные области применения.</p>

            <p>Воздушное охлаждение конденсатора — наиболее распространенный и универсальный вариант. Чиллеры с воздушным охлаждением не требуют подвода воды, просты в монтаже и обслуживании, имеют относительно низкую стоимость. Они идеально подходят для большинства промышленных применений: металлообработки, пищевого производства, складских комплексов и торговых центров. Однако их эффективность снижается при высоких температурах окружающего воздуха.</p>

            <p>Водяное охлаждение конденсатора обеспечивает более высокий коэффициент полезного действия (COP — до 5.5) и стабильную работу в жарком климате. Такие чиллеры компактнее воздушных аналогов, работают значительно тише и могут размещаться в закрытых помещениях. Они требуют системы водоподготовки и водоотведения, что увеличивает эксплуатационные расходы. Водяные чиллеры оптимальны для химической и фармацевтической промышленности, центров обработки данных и объектов с высокими требованиями к энергоэффективности.</p>

            <p>Чиллеры с выносным конденсатором (сплит-системы) сочетают преимущества воздушного и водяного охлаждения. Испарительная часть размещается внутри помещения, что минимизирует шум и тепловыделение в производственной зоне, а конденсатор выносится на улицу. Это решение особенно востребовано при реконструкции существующих объектов, в медицинских учреждениях, лабораториях и офисных зданиях, где критически важны акустический комфорт и чистота воздуха.</p>

            <p>Испарительное охлаждение — наиболее энергоэффективная технология (COP до 6.0), основанная на эффекте охлаждения при испарении воды. Такие системы обеспечивают самую низкую температуру конденсации, что значительно снижает энергопотребление компрессора. Они особенно эффективны в регионах с жарким и сухим климатом, где позволяют экономить до 40% электроэнергии по сравнению с воздушными аналогами. Основные области применения — объекты с высокими требованиями к энергосбережению в условиях жаркого климата.</p>

            <div class="keywords-grid">
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>типы охлаждения конденсатора чиллера</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Воздушное, водяное, выносное, испарительное</p>
                    </div>
                </div>
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>чиллер с воздушным охлаждением конденсатора</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Наиболее распространенный промышленный вариант</p>
                    </div>
                </div>
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>водяное охлаждение конденсатора преимущества</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Высокий КПД, компактность, тихая работа</p>
                    </div>
                </div>
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>выбор типа охлаждения для чиллера</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Критерии подбора, сравнение эффективности</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // ===== ОСНОВНОЙ СКРИПТ =====
    document.addEventListener('DOMContentLoaded', function() {
        // Анимация появления элементов при скролле
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
        fadeInOnScroll(); // Проверка при загрузке

        // Плавная прокрутка по якорным ссылкам
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#' || href === '#!') return;

                const targetElement = document.querySelector(href);
                if (targetElement) {
                    e.preventDefault();
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // ===== ТАБЫ ТИПОВ ОХЛАЖДЕНИЯ =====
        const typeTabs = document.querySelectorAll('.type-tab');
        const typeContents = document.querySelectorAll('.type-content');
        console.log('Type Tabs:', typeTabs);
        typeTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                console.log('Tab clicked:', this);
                const type = this.dataset.type;

                // Убираем активный класс со всех табов
                typeTabs.forEach(t => t.classList.remove('active'));
                // Добавляем активный класс текущему табу
                this.classList.add('active');

                // Скрываем все контенты
                typeContents.forEach(content => content.classList.remove('active'));
                // Показываем соответствующий контент
                document.getElementById(`${type}Content`).classList.add('active');
            });
        });

        // ===== ПОДБОР ТИПА =====
        const selectTypeButtons = document.querySelectorAll('.select-type');

        selectTypeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const type = this.dataset.type;
                const typeNames = {
                    'air': 'Воздушное охлаждение',
                    'water': 'Водяное охлаждение',
                    'remote': 'Чиллер с выносным конденсатором',
                    'evaporative': 'Испарительное охлаждение'
                };

                // Прокрутка к калькулятору
                document.getElementById('selector').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Автовыбор в калькуляторе
                setTimeout(() => {
                    // В зависимости от типа устанавливаем рекомендуемые настройки
                    let location, noise, water, climate, budget;

                    switch (type) {
                        case 'air':
                            location = 'outdoor';
                            noise = 'high';
                            water = 'none';
                            climate = 'temperate';
                            budget = 'economy';
                            break;
                        case 'water':
                            location = 'indoor';
                            noise = 'low';
                            water = 'available';
                            climate = 'hot';
                            budget = 'balanced';
                            break;
                        case 'remote':
                            location = 'mixed';
                            noise = 'low';
                            water = 'limited';
                            climate = 'temperate';
                            budget = 'balanced';
                            break;
                        case 'evaporative':
                            location = 'outdoor';
                            noise = 'medium';
                            water = 'available';
                            climate = 'dry';
                            budget = 'premium';
                            break;
                    }

                    // Устанавливаем значения в форме
                    document.querySelector(`input[name="location"][value="${location}"]`).checked = true;
                    document.querySelector(`input[name="noise"][value="${noise}"]`).checked = true;
                    document.querySelector(`input[name="water"][value="${water}"]`).checked = true;
                    document.querySelector(`input[name="climate"][value="${climate}"]`).checked = true;
                    document.querySelector(`input[name="budget"][value="${budget}"]`).checked = true;

                    // Запускаем расчет
                    document.querySelector('#coolingSelector button[type="submit"]').click();
                }, 500);
            });
        });

        // ===== КАЛЬКУЛЯТОР ВЫБОРА =====
        document.getElementById('coolingSelector').addEventListener('submit', function(e) {
            e.preventDefault();

            // Собираем данные из формы
            const formData = {
                location: document.querySelector('input[name="location"]:checked')?.value,
                noise: document.querySelector('input[name="noise"]:checked')?.value,
                water: document.querySelector('input[name="water"]:checked')?.value,
                climate: document.querySelector('input[name="climate"]:checked')?.value,
                budget: document.querySelector('input[name="budget"]:checked')?.value
            };

            // Проверяем, что все поля заполнены
            if (!formData.location || !formData.noise || !formData.water || !formData.climate || !formData.budget) {
                alert('Пожалуйста, ответьте на все вопросы');
                return;
            }

            // Логика подбора типа (упрощенная)
            let recommendedType, description, reason, savings;

            // Пример логики подбора (можно усложнить)
            if (formData.water === 'none') {
                recommendedType = 'Воздушное охлаждение';
                description = 'Оптимально при отсутствии доступа к воде';
                reason = 'Поскольку у вас нет доступа к водоснабжению, воздушное охлаждение — единственный viable вариант.';
                savings = '15-20% по сравнению с альтернативами при наличии хорошей вентиляции';
            } else if (formData.climate === 'hot' && formData.water === 'available') {
                recommendedType = 'Водяное охлаждение';
                description = 'Лучшая эффективность в жарком климате';
                reason = 'Для жаркого климата водяное охлаждение обеспечивает стабильную работу и высокий КПД.';
                savings = '25-30% экономии электроэнергии по сравнению с воздушным охлаждением в жару';
            } else if (formData.noise === 'low' && formData.location === 'mixed') {
                recommendedType = 'Чиллер с выносным конденсатором';
                description = 'Минимальный шум в помещении';
                reason = 'Для снижения шума в рабочей зоне оптимально вынести шумное оборудование на улицу.';
                savings = '10-15% за счет оптимизации размещения оборудования';
            } else if (formData.climate === 'dry' && formData.budget === 'premium') {
                recommendedType = 'Испарительное охлаждение';
                description = 'Максимальная энергоэффективность в сухом климате';
                reason = 'В сухом климате испарительное охлаждение обеспечивает наивысший КПД.';
                savings = '35-40% экономии электроэнергии';
            } else {
                recommendedType = 'Воздушное охлаждение';
                description = 'Универсальное решение для большинства условий';
                reason = 'Воздушное охлаждение обеспечивает оптимальный баланс стоимости, надежности и эффективности для ваших условий.';
                savings = '15-25% по сравнению с альтернативами';
            }

            // Показываем результат
            document.getElementById('typeName').textContent = recommendedType;
            document.getElementById('typeDescription').textContent = description;
            document.getElementById('typeReason').textContent = reason;
            document.getElementById('typeSavings').textContent = savings;
            document.getElementById('selectorResult').style.display = 'block';

            // Прокручиваем к результату
            setTimeout(() => {
                document.getElementById('selectorResult').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 300);

            // Собираем контактные данные
            const name = document.getElementById('selectorName').value;
            const phone = document.getElementById('selectorPhone').value;

            if (name && phone) {
                // Отправка данных (в реальности здесь будет AJAX запрос)
                console.log('Заявка на подбор типа:', {
                    ...formData,
                    name,
                    phone,
                    recommendedType
                });
            }
        });



        // ===== FAQ =====
        const faqQuestions = document.querySelectorAll('.faq-question');
        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const isActive = this.classList.contains('active');

                // Закрываем все открытые ответы
                document.querySelectorAll('.faq-answer.active').forEach(ans => {
                    ans.classList.remove('active');
                    ans.previousElementSibling.classList.remove('active');
                });

                // Открываем текущий ответ, если он был закрыт
                if (!isActive) {
                    this.classList.add('active');
                    answer.classList.add('active');
                }
            });
        });


    });
</script>
<?php get_footer(); ?>