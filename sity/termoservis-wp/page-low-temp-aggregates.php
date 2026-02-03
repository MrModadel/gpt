<?php
/**
 * Template Name: Низкотемпературные агрегаты
 * 
 * @package Termoservis
 */

get_header();
?>

<div class="breadcrumbs">
    <div class="container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a> 
        <span>/</span> 
        <a href="<?php echo esc_url( home_url( '/catalog' ) ); ?>">Каталог</a>
        <span>/</span> 
        <a href="<?php echo esc_url( home_url( '/holodilnye-agregaty' ) ); ?>">Холодильные агрегаты</a>
        <span>/</span> 
        <strong><?php the_title(); ?></strong>
    </div>
</div>

<section class="category-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <p class="hero-description">
            Профессиональные системы для глубокой заморозки и экстремально низких температур. 
            Диапазон: от -15°C до -50°C и ниже. Надежность, точность, долговечность.
        </p>
        <a href="#contact" class="btn">Запросить консультацию</a>
    </div>
</section>

<section class="characteristics fade-in">
    <div class="container">
        <h2>Технические характеристики</h2>
        <div class="characteristics-grid">
            <div class="char-card">
                <h3><i class="fas fa-thermometer-low"></i> Температурный диапазон</h3>
                <p>От -15°C до -50°C (возможны более низкие температуры)</p>
            </div>
            <div class="char-card">
                <h3><i class="fas fa-gauge"></i> Мощность</h3>
                <p>От 3 кВт до 50+ кВт на основе требований</p>
            </div>
            <div class="char-card">
                <h3><i class="fas fa-clock"></i> Время охлаждения</h3>
                <p>Быстрое охлаждение благодаря двухступенчатым системам</p>
            </div>
            <div class="char-card">
                <h3><i class="fas fa-certificate"></i> Надежность</h3>
                <p>Гарантия 3 года, сертификация ISO и CE</p>
            </div>
        </div>
    </div>
</section>

<section class="use-cases fade-in">
    <div class="container">
        <h2>Области применения</h2>
        <div class="use-cases-grid">
            <div class="use-case">
                <div class="case-icon">
                    <i class="fas fa-ice-cream"></i>
                </div>
                <h3>Мороженое</h3>
                <p>Производство и хранение мороженого при -18°C и ниже</p>
            </div>
            <div class="use-case">
                <div class="case-icon">
                    <i class="fas fa-drumstick-bite"></i>
                </div>
                <h3>Мясо и птица</h3>
                <p>Хранение и заморозка мяса, птицы, субпродуктов</p>
            </div>
            <div class="use-case">
                <div class="case-icon">
                    <i class="fas fa-fish"></i>
                </div>
                <h3>Рыба и морепродукты</h3>
                <p>Глубокая заморозка рыбы и экспортное хранение</p>
            </div>
            <div class="use-case">
                <div class="case-icon">
                    <i class="fas fa-flask"></i>
                </div>
                <h3>Фармацевтика</h3>
                <p>Хранение вакцин, сывороток, биопрепаратов</p>
            </div>
            <div class="use-case">
                <div class="case-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3>Ягоды и фрукты</h3>
                <p>Сохранение сезонных урожаев ягод и фруктов</p>
            </div>
            <div class="use-case">
                <div class="case-icon">
                    <i class="fas fa-flask-vial"></i>
                </div>
                <h3>Научные исследования</h3>
                <p>Криогенные условия для лабораторий и НИИ</p>
            </div>
        </div>
    </div>
</section>

<section class="advantages fade-in">
    <div class="container">
        <h2>Почему выбирать нас?</h2>
        <div class="advantages-grid">
            <div class="advantage">
                <div class="advantage-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3>Полная комплектация</h3>
                <p>Компрессор, конденсатор, испаритель, система управления — всё включено</p>
            </div>
            <div class="advantage">
                <div class="advantage-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3>Автоматизация</h3>
                <p>Система управления с микропроцессорным контролем и оптимизацией</p>
            </div>
            <div class="advantage">
                <div class="advantage-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3>Доставка по России</h3>
                <p>Логистика до объекта заказчика, монтаж и пусконаладка</p>
            </div>
            <div class="advantage">
                <div class="advantage-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Техническая поддержка</h3>
                <p>Обслуживание, ремонт, консультации после продажи</p>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="contact-section fade-in">
    <div class="container">
        <h2>Получить расчет для вашего проекта</h2>
        <p>
            Каждый проект уникален. Наши инженеры разработают оптимальное решение, 
            учитывая ваши требования к температуре, производительности и бюджету.
        </p>
        <a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" class="btn btn-large">
            <i class="fas fa-calculator"></i> Рассчитать стоимость
        </a>
    </div>
</section>

<?php get_footer(); ?>
