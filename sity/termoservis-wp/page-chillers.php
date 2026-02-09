<?php

/**
 * Template Name: Промышленные чиллеры
 * 
 * @package Termoservis
 */

get_header();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* ====== ALL STYLES ARE SCOPED WITH ts- PREFIX ====== */
    .ts-root {
        --ts-accent: #0b5ed7;
        --ts-muted: #6b6f76;
        --ts-bg: #fff;
        --ts-radius: 10px
    }

    .ts-section {
        max-width: 1100px;
        margin: 0 auto
    }

    .ts-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 18px;
        margin-bottom: 18px
    }

    .ts-title {
        font-size: 22px;
        font-weight: 700;
        margin: 0
    }

    .ts-sub {
        color: var(--ts-muted);
        font-size: 13px
    }

    .ts-controls {
        display: flex;
        gap: 10px;
        align-items: center
    }

    .ts-input,
    .ts-select {
        padding: 8px 10px;
        border-radius: 8px;
        border: 1px solid #e6e9ef;
        background: #fff
    }

    .ts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 16px
    }

    .ts-card {
        background: var(--ts-bg);
        border-radius: var(--ts-radius);
        overflow: hidden;
        border: 1px solid #eef0f2;
        display: flex;
        flex-direction: column;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;

    }

    .ts-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 86, 184, 0.15);
    }

    .ts-media {
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, #fbfcff, #fff)
    }

    .ts-media img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: transform 0.5s ease;
    }

    .ts-card:hover .ts-media img {
        transform: scale(1.05);
    }

    .ts-body {
        padding: 12px;
        display: flex;
        flex-direction: column;
        gap: 8px
    }

    .ts-kicker {
        font-size: 13px;
        color: var(--ts-muted)
    }

    .ts-name {
        font-size: 16px;
        font-weight: 700;
        margin: 0
    }

    .ts-meta {
        display: flex;
        gap: 8px;
        flex-wrap: wrap
    }

    .ts-tag {
        font-size: 13px;
        padding: 6px 8px;
        border-radius: 999px;
        background: #f7fbff;
        border: 1px solid #e8f0ff;
        color: var(--ts-muted)
    }

    .ts-foot {
        display: flex;
        gap: 10px;
        padding: 12px;
        border-top: 1px solid #f4f6f8
    }

    .ts-btn {
        flex: 1;
        padding: 9px 10px;
        border-radius: 8px;
        border: 0;
        cursor: pointer;
        font-weight: 600
    }

    .ts-btn--ghost {
        background: transparent;
        border: 1px solid #e6e9ef;
        color: var(--ts-accent)
    }

    .ts-btn--primary {
        background: var(--ts-accent);
        color: #fff
    }

    /* helpers */
    .ts-skeleton {
        height: 150px;
        background: linear-gradient(90deg, #f4f6f8 25%, #eef2f5 50%, #f4f6f8 75%);
        background-size: 200% 100%;
        animation: ts-shimmer 1.2s linear infinite;
        border-radius: 8px
    }

    @keyframes ts-shimmer {
        0% {
            background-position: 200% 0
        }

        100% {
            background-position: -200% 0
        }
    }

    @media (max-width:720px) {
        .ts-media {
            height: 110px
        }

        .ts-head {
            flex-direction: column;
            align-items: stretch
        }
    }






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

    /* ===== 1. ГЕРОЙ-СЕКЦИЯ ===== */
    .chiller-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('https://i.postimg.cc/zXZD7fdp/photo-1581094794329-c8112a89af12-(2).jpg') center/cover no-repeat;
        color: white;
        padding: 120px 0 80px;
        position: relative;
    }

    .chiller-hero .container {
        position: relative;
        z-index: 1;
        max-width: 900px;
    }

    .chiller-hero h1 {
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
        max-width: 700px;
        margin: 0 auto 40px;
        opacity: 0.9;
        line-height: 1.7;
        animation: fadeInUp 1s ease 0.3s both;
        color: white;
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
        margin-top: 0;
    }

    .feature-item p {
        opacity: 0.9;
        font-size: 0.95rem;
        color: white;
    }

    /* ===== ТИПЫ ЧИЛЛЕРОВ ===== */
    .chiller-types {
        background-color: white;
        padding: 80px 0;
    }

    .types-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .type-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        border: 2px solid #eee;
    }

    .type-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 86, 184, 0.15);
        border-color: #0056b8;
    }

    .type-header {
        padding: 25px;
        background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
        color: white;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .type-header i {
        font-size: 2.5rem;
    }

    .type-header h3 {
        color: white;
        margin: 0;
    }

    .type-header p {
        color: white;
        opacity: 0.9;
        margin: 5px 0 0;
    }

    .type-content {
        padding: 25px;
    }

    .type-features {
        margin: 20px 0;
    }

    .type-feature {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
        color: #555;
    }

    .type-feature i {
        color: #0056b8;
    }

    .type-price {
        font-size: 1.4rem;
        font-weight: 700;
        color: #0056b8;
        margin: 20px 0;
    }

    .type-cta {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-small {
        padding: 10px 20px;
        font-size: 0.9rem !important;
    }

    /* ===== ТАБЛИЦА ХАРАКТЕРИСТИК ===== */
    .tech-specs {
        background-color: #f8f9fa;
        padding: 80px 0;
    }

    .specs-table-container {
        overflow-x: auto;
        margin: 40px 0;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .specs-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        min-width: 800px;
    }

    .specs-table th {
        background-color: #0056b8;
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
    }

    .specs-table td {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .specs-table tr:hover {
        background-color: #f8f9fa;
    }

    .specs-table tr.highlight {
        background-color: #e9f5ff !important;
        font-weight: 600;
    }

    .specs-table small {
        display: block;
        font-weight: normal;
        color: #999;
        margin-top: 3px;
    }

    .download-catalog {
        text-align: center;
        margin-top: 40px;
    }

    /* ===== КЕЙСЫ ===== */
    .use-cases {
        background-color: white;
        padding: 80px 0;
    }

    .cases-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .case-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
    }

    .case-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 86, 184, 0.15);
    }

    .case-image {
        height: 200px;
        overflow: hidden;
    }

    .case-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .case-card:hover .case-image img {
        transform: scale(1.05);
    }

    .case-content {
        padding: 25px;
    }

    .case-content h3 {
        margin-bottom: 15px;
    }

    .case-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 15px 0;
    }

    .case-tag {
        background-color: #e9f5ff;
        color: #0056b8;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
    }

    /* ===== КАК МЫ РАБОТАЕМ ===== */
    .work-process {
        background-color: #f8f9fa;
        padding: 80px 0;
    }

    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .process-step {
        text-align: center;
        padding: 30px 20px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        position: relative;
        transition: all 0.4s ease;
    }

    .process-step:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0, 86, 184, 0.1);
    }

    .step-icon {
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

    .step-number-large {
        position: absolute;
        top: -15px;
        right: -15px;
        width: 40px;
        height: 40px;
        background-color: #0056b8;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .step-content h4 {
        margin-bottom: 15px;
        color: #222;
    }

    .guarantee-banner {
        background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
        color: white;
        padding: 40px;
        border-radius: 15px;
        margin-top: 50px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        gap: 30px;
    }

    .guarantee-item {
        text-align: center;
        flex: 1;
        min-width: 200px;
    }

    .guarantee-item i {
        font-size: 3rem;
        margin-bottom: 15px;
        color: rgba(255, 255, 255, 0.9);
    }

    .guarantee-item h3 {
        color: white;
        margin-bottom: 10px;
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
        margin-top: 0;
    }

    .widget-header p {
        color: white;
        margin: 0;
        font-size: 0.9rem;
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

    .widget-features {
        margin: 15px 0;
    }

    .widget-feature {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
        color: #555;
        font-size: 0.9rem;
    }

    .widget-feature i {
        color: #0056b8;
    }

    /* ===== FAQ ===== */
    .faq-section {
        background-color: white;
        padding: 80px 0;
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
        margin: 0;
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
        max-height: 1000px;
    }

    .faq-answer p {
        margin-bottom: 15px;
    }

    .faq-answer ul,
    .faq-answer ol {
        margin-bottom: 15px;
    }

    /* ===== SEO-ФУНДАМЕНТ ===== */
    .seo-content {
        background-color: #f8f9fa;
        border-radius: 15px;
        padding: 50px;
        margin: 80px 0;
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

    .keyword-item strong {
        display: block;
        color: #222;
        margin-bottom: 5px;
    }

    /* ===== УТИЛИТЫ ===== */
    .text-center {
        text-align: center;
    }

    .mb-40 {
        margin-bottom: 40px;
    }

    .fade-in {
        opacity: 0;
        transform: none;
    }

    /* ===== АДАПТИВНОСТЬ ===== */
    @media (max-width: 992px) {
        h1 {
            font-size: 2.4rem;
        }

        h2 {
            font-size: 2rem;
        }

        .types-grid {
            grid-template-columns: 1fr;
        }

        .sticky-widget {
            width: 300px;
            right: 20px;
        }
    }

    @media (max-width: 768px) {
        section {
            padding: 60px 0 !important;
        }

        .chiller-hero {
            padding: 100px 0 60px;
        }

        .sticky-widget {
            display: none !important;
        }

        .sticky-nav .container {
            gap: 15px;
            padding: 15px;
        }

        .guarantee-banner {
            flex-direction: column;
            text-align: center;
        }

        .process-steps {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
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

        .type-card {
            margin-bottom: 20px;
        }

        .modal-content {
            width: 95%;
        }
    }

    @media (max-width: 360px) {

        .cases-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }
    }

    .ts-title::after {
        left: 0 !important;
        transform: none !important;
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
<section class=" chiller-hero">
    <div class="container">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <p class="hero-subtitle text-center">Проектируем и производим системы централизованного холодоснабжения для металлообработки, пищевой, химической промышленности и других отраслей. Индивидуальный расчет за 24 часа.</p>

        <div class="hero-features">
            <div class="feature-item">
                <i class="fas fa-cogs"></i>
                <h4>Собственное производство</h4>
                <p>Изготовление на современном оборудовании в Самаре</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-tachometer-alt"></i>
                <h4>Расчет за 24 часа</h4>
                <p>Технико-коммерческое предложение в течение суток</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-shield-alt"></i>
                <h4>Гарантия 2 года</h4>
                <p>Расширенная гарантия и сервисное обслуживание</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-truck"></i>
                <h4>Доставка по России</h4>
                <p>Отгрузка транспортом любой сложности</p>
            </div>
        </div>

        <div class="text-center">
            <a href="#cta" class="btn" style="">
                <i class="fas fa-calculator"></i> Рассчитать стоимость
            </a>
            <a href="#cta" class="btn btn-outline">
                <i class="fas fa-phone"></i> Заказать звонок
            </a>
        </div>
    </div>
</section>

<!-- 4. КЛЮЧЕВЫЕ КАТЕГОРИИ (ПРЕВЬЮ) -->
<section class="categories-preview fade-in">
    <div class="container">
        <h2 style="text-align: center;">Ключевые категории</h2>
        <p class="mb-30" style="color:#666; max-width:900px; margin:0 auto 30px;">Ниже представлены основные группы нашего каталога с детальными техническими особенностями, областями применения и типовыми схемами внедрения. Для каждой категории мы подготовили руководство по выбору.</p>

        <div class="categories-grid">
            <?php
            // Показываем только три конкретные категории по slug
            $category_slugs = array('condenser-cooling-types', 'specialized-chillers', 'komponenty-i-moduli-dlya-chillerov');


            foreach ($category_slugs as $index => $slug) {
                $category = get_term_by('slug', $slug, 'product_cat');

                if (! $category || is_wp_error($category)) {
                    continue;
                }

                // Получаем подкатегории
                $subcategories = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'parent' => $category->term_id,
                    'hide_empty' => false,
                ));

                // Получаем изображение категории (для WooCommerce)
                $image_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
                if (! $image_id) {
                    $image_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                }
                $image_url = $image_id ? wp_get_attachment_url($image_id) : 'https://images.iimg.live/images/amazing-shot-8342.webp&auto=format&fit=crop&w=600&q=80';

                $badge = isset($badges[$index]) ? $badges[$index] : 'КАТЕГОРИЯ';
            ?>
                <div class="category-card">
                    <div class="card-image">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
                        <div class="card-badge"><?php echo esc_html($badge); ?></div>
                    </div>
                    <div class="card-content">
                        <h3><?php echo esc_html($category->name); ?></h3>
                        <p><?php echo wp_kses_post(term_description($category->term_id, 'product_cat')); ?></p>
                        <div class="card-links">
                            <?php
                            if (! empty($subcategories) && ! is_wp_error($subcategories)) {
                                $sub_count = 0;
                                foreach ($subcategories as $subcat) {
                                    if ($sub_count >= 4) break;
                            ?>
                                    <a href="/<?php echo esc_html($subcat->slug); ?>" class="card-link">
                                        <?php echo esc_html($subcat->name); ?>
                                    </a>
                            <?php
                                    $sub_count++;
                                }
                            }
                            ?>
                        </div>
                        <?php
                        // Для третьей категории (special-way-of-solving) - другая кнопка
                        if ($index === 2) {
                        ?>
                            <a href="#cta" class="btn">Обсудить решение</a>
                        <?php
                        } else {
                        ?>
                            <a href="/<?php echo  $slug ?>" class="btn">
                                Смотреть все
                            </a>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>



        </div>
    </div>
</section>


<!--  ПРИЗЫВ К ДЕЙСТВИЮ -->
<section id="cta" class="catalog-cta fade-in">
    <div class="container">
        <div class="cta-content">
            <h2>Не нашли нужную модель или есть особые требования?</h2>
            <p>Более 40% наших проектов — это разработка индивидуальных решений под нестандартные задачи. Пришлите техническое задание, и наши инженеры спроектируют и рассчитают стоимость оборудования специально для вас в течение 24 часов.</p>

            <div class="cta-form">
                <h3 style="color:#0056b8; text-align:center; margin-bottom:25px;">Рассчитайте индивидуальное решение</h3>
                <form id="catalogForm" class="form-tel">
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
                                <input type="file" id="fileUpload" name="file1">
                                <div class="file-label">
                                    <i class="fas fa-paperclip"></i>
                                    <span id="fileName">Выберите файл...</span>
                                </div>
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
<!-- 4. КЕЙСЫ ПРИМЕНЕНИЯ -->
<section id="cases" class="use-cases fade-in">
    <div class="container">
        <h2 class="text-center">Сферы применения чиллеров</h2>
        <p class="text-center mb-40" style="color:#666;">Более 200 успешных проектов в различных отраслях промышленности</p>

        <div class="cases-grid">
            <div class="case-card">
                <div class="case-image">
                    <img src="https://res.cloudinary.com/dbsm61hrr/image/upload/v1768724222/image-258_lzyhtf.jpg" alt="Металлообработка">
                </div>
                <div class="case-content">
                    <h3>Металлообработка</h3>
                    <p>Охлаждение пресс-форм, сварочного оборудования, лазерных станков. Точное поддержание температуры для стабильности технологических процессов.</p>
                    <div class="case-tags">
                        <span class="case-tag">Пресс-формы</span>
                        <span class="case-tag">Лазерные станки</span>
                        <span class="case-tag">Точность ±0.5°C</span>
                    </div>
                </div>
            </div>

            <div class="case-card">
                <div class="case-image">
                    <img src="https://res.cloudinary.com/dbsm61hrr/image/upload/v1768724311/photo-1556909114-f6e7ad7d3136_rxe1io.avif" alt="Пищевая промышленность">
                </div>
                <div class="case-content">
                    <h3>Пищевая промышленность</h3>
                    <p>Охлаждение смесителей, танков, производственных линий. Гигиеничное исполнение, соответствие требованиям Роспотребнадзора.</p>
                    <div class="case-tags">
                        <span class="case-tag">Молочные комбинаты</span>
                        <span class="case-tag">Мясопереработка</span>
                        <span class="case-tag">Гигиеничное исполнение</span>
                    </div>
                </div>
            </div>

            <div class="case-card">
                <div class="case-image">
                    <img src="https://res.cloudinary.com/dbsm61hrr/image/upload/v1768724408/7pmnjr07djmjnvxdn4b56of3295rtga5_jzjfpk.jpg" alt="Химическая промышленность">
                </div>
                <div class="case-content">
                    <h3>Химическая промышленность</h3>
                    <p>Охлаждение реакторов, конденсаторов, экструдеров. Взрывозащищенные исполнения, работа с агрессивными средами.</p>
                    <div class="case-tags">
                        <span class="case-tag">Взрывозащита</span>
                        <span class="case-tag">Коррозионная стойкость</span>
                        <span class="case-tag">Высокая точность</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ts-root ts-section fade-in" id="ts-chillers">
    <div class="ts-head">
        <div>
            <h2 class="ts-title">Стандартная линейка чиллеров</h2>
        </div>
        <div class="ts-controls">
            <input id="ts-search" class="ts-input" type="search" placeholder="Поиск: модель, назначение" />
            <select id="ts-power" class="ts-select">
                <option value="all">Все мощности</option>
                <option value="0-50">до 50 кВт</option>
                <option value="51-150">51–150 кВт</option>
                <option value="151-300">151–300 кВт</option>
                <option value="301-9999">301+ кВт</option>
            </select>
        </div>
    </div>

    <div id="ts-grid" class="ts-grid">
        <?php
        // Получаем товары из категории standard-chiller-line
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'standard-chiller-line'
                )
            )
        );

        $products = new WP_Query($args);

        if ($products->have_posts()) {
            while ($products->have_posts()) {
                $products->the_post();
                $product = wc_get_product(get_the_ID());

                // Получаем атрибут "Мощность"
                $power = $product->get_attribute('мощность');
                if (!$power) {
                    $power = $product->get_attribute('power');
                }

                // Извлекаем число для data-power
                $power_number = preg_replace('/[^0-9]/', '', $power);
                $power_number = $power_number ? $power_number : '0';

                // Получаем теги товара (product_tag)
                $tags = get_the_terms(get_the_ID(), 'product_tag');
                $tag_html = '';
                if ($tags && !is_wp_error($tags)) {
                    foreach ($tags as $tag) {
                        $tag_html .= '<span class="ts-tag">' . esc_html($tag->name) . '</span>';
                    }
                }

                // Получаем изображение
                $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : 'https://via.placeholder.com/360x200?text=Chiller';
        ?>
                <article class="ts-card ts-product" data-power="<?php echo esc_attr($power_number); ?>">
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
        } else {
            echo '<p style="grid-column: 1/-1; text-align: center; padding: 40px;">Товары не найдены в категории</p>';
        }
        ?>
    </div>
</section>
<!-- 5. КАК МЫ РАБОТАЕМ -->
<section id="process" class="work-process fade-in">
    <div class="container">
        <h2 class="text-center">Как мы работаем</h2>
        <p class="text-center mb-40" style="color:#666;">5 шагов от заявки до запуска оборудования</p>

        <div class="process-steps">
            <div class="process-step">
                <div class="step-number-large">1</div>
                <div class="step-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="step-content">
                    <h4>Заявка и ТЗ</h4>
                    <p>Получаем техническое задание, проводим первичную консультацию</p>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number-large">2</div>
                <div class="step-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="step-content">
                    <h4>Проектирование</h4>
                    <p>Разрабатываем 3D-модель, подбираем компоненты, делаем расчеты</p>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number-large">3</div>
                <div class="step-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <div class="step-content">
                    <h4>Изготовление</h4>
                    <p>Производим оборудование на нашем заводе в Самаре</p>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number-large">4</div>
                <div class="step-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="step-content">
                    <h4>Доставка и монтаж</h4>
                    <p>Доставляем, устанавливаем и проводим пусконаладку</p>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number-large">5</div>
                <div class="step-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="step-content">
                    <h4>Гарантия и сервис</h4>
                    <p>Обучаем персонал, предоставляем гарантию 2 года</p>
                </div>
            </div>
        </div>

        <div class="guarantee-banner">
            <div class="guarantee-item">
                <i class="far fa-calendar-check"></i>
                <h3>Сроки</h3>
                <p>от 14 рабочих дней</p>
            </div>
            <div class="guarantee-item">
                <i class="fas fa-shield-alt"></i>
                <h3>Гарантия</h3>
                <p>24 месяца</p>
            </div>
            <div class="guarantee-item">
                <i class="fas fa-cogs"></i>
                <h3>Сервис</h3>
                <p>круглосуточная поддержка</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. FAQ -->
<section id="faq" class="faq-section fade-in">
    <div class="container">
        <div class="faq-container">
            <h2 class="text-center">Частые вопросы о промышленных чиллерах</h2>
            <p class="text-center mb-40" style="color:#666;">Ответы на самые популярные вопросы от наших клиентов</p>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Чем отличается промышленный чиллер от бытового кондиционера?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Промышленный чиллер — это мощная холодильная машина для охлаждения жидкостей (воды, рассолов, антифризов) с холодопроизводительностью от 10 кВт до нескольких мегаватт. В отличие от бытовых кондиционеров, чиллеры работают в непрерывном режиме 24/7, обеспечивают точность температуры до ±0.5°C, имеют защиту от агрессивных сред и рассчитаны на срок службы 15-20 лет.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Как подобрать чиллер по мощности?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Для точного расчета мощности чиллера необходимо знать тепловую нагрузку, температуру теплоносителя, расход через систему, климатические условия и требования к точности. Наши инженеры бесплатно выполнят теплотехнический расчет на основе ваших данных.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Какое обслуживание требуется чиллеру?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Регламентное обслуживание включает ежеквартальную проверку давления и фильтров, ежегодную диагностику с проверкой компрессора, и раз в 3 года капитальный осмотр. Мы предлагаем сервисные контракты с выездом специалистов на ваш объект.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Какой срок службы у промышленного чиллера?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Срок службы при правильной эксплуатации составляет 15-20 лет для стандартных исполнений, 20-25 лет для взрывозащищенных и специальных исполнений. Наши чиллеры изготавливаются с запасом прочности 30-40% для увеличения ресурса.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Можно ли модернизировать существующую систему охлаждения?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Да, мы регулярно выполняем модернизацию устаревших систем. Возможны замена чиллера, добавление частотного регулирования, интеграция в автоматизацию, установка систем рекуперации и переход на экологичные хладагенты. Экономия может достигать 40% по электроэнергии.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. SEO-ФУНДАМЕНТ -->
<section class="seo-content fade-in">
    <div class="container">
        <div class="seo-text">
            <h2>Промышленные чиллеры: производство в Самаре</h2>

            <p>Компания «ТЕРМОСИСТЕМЫ-С» специализируется на проектировании и производстве промышленных чиллеров для различных отраслей промышленности с 2010 года. Мы изготавливаем надежные системы холодоснабжения, которые обеспечивают стабильную работу технологического оборудования в металлообработке, пищевом производстве, химической промышленности и других сферах.</p>

            <p>Наше производство расположено в Самаре и оснащено современным оборудованием для изготовления чиллеров воздушного и водяного охлаждения мощностью от 10 до 1000 кВт. Каждая единица оборудования проходит многоступенчатый контроль качества, включая гидравлические испытания, проверку электрооборудования и тестовый запуск под нагрузкой.</p>

            <p>Мы предлагаем как серийные модели чиллеров, так и индивидуальные решения под конкретные задачи заказчика. Наши инженеры выполняют теплотехнический расчет, разрабатывают 3D-модели и подбирают оптимальные компоненты для достижения максимальной энергоэффективности системы.</p>

            <p>Собственное производство позволяет нам контролировать качество на всех этапах и предлагать конкурентные цены на промышленные чиллеры. Мы обеспечиваем полный цикл: от проектирования и изготовления до доставки, монтажа, пусконаладки и сервисного обслуживания оборудования.</p>

            <div class="keywords-grid">
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>купить промышленный чиллер в Самаре</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Производство и продажа от завода-изготовителя</p>
                    </div>
                </div>
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>чиллер для охлаждения воды цена</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Стоимость систем водяного охлаждения</p>
                    </div>
                </div>
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>производство чиллеров под заказ</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Индивидуальное проектирование и изготовление</p>
                    </div>
                </div>
                <div class="keyword-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>чиллеры для пластика и металла</strong>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#666;">Оборудование для пресс-форм и штампов</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
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
    fadeInOnScroll();

    (function() {
        const root = document.getElementById('ts-chillers');
        const grid = root.querySelector('#ts-grid');
        const search = root.querySelector('#ts-search');
        const power = root.querySelector('#ts-power');

        const selectors = ['.ts-product'];

        function hide(el) {
            if (!el.dataset._d) el.dataset._d = getComputedStyle(el).display;
            el.style.display = 'none';
        }

        function show(el) {
            el.style.display = el.dataset._d || '';
        }

        function getPower(el) {
            if (el.dataset.power) {
                return Number(el.dataset.power);
            }
            const m = el.textContent.match(/(\d{1,4})\s*(?:квт|kW)/i);
            return m ? Number(m[1]) : null;
        }

        function apply() {
            const q = search.value.toLowerCase();
            const r = power.value;
            const items = grid.querySelectorAll(selectors.join(','));

            items.forEach(el => {
                let ok = true;
                if (q && !el.textContent.toLowerCase().includes(q)) ok = false;
                if (r !== 'all') {
                    const p = getPower(el);
                    if (p !== null) {
                        const [a, b] = r.split('-').map(Number);
                        if (p < a || p > b) ok = false;
                    }
                }
                ok ? show(el) : hide(el);
            });
        }

        search.addEventListener('input', apply);
        power.addEventListener('change', apply);

        const mo = new MutationObserver(() => apply());
        mo.observe(grid, {
            childList: true,
            subtree: true
        });

        apply();
    })();
</script>
<script>
    // FAQ Accordion
    document.addEventListener('DOMContentLoaded', function() {
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                answer.classList.toggle('active');
                this.classList.toggle('active');
            });
        });

        // Sticky Widget
        const stickyWidget = document.getElementById('stickyWidget');
        const closeWidget = document.getElementById('closeWidget');

        stickyWidget.classList.add('active');

        closeWidget.addEventListener('click', function() {
            stickyWidget.classList.remove('active');
        });
    });
</script>
<?php get_footer(); ?>