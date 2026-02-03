<?php
/**
 * Template Name: Специализированные чиллеры
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
        <a href="<?php echo esc_url( home_url( '/promyshlennye-chillery' ) ); ?>">Чиллеры</a>
        <span>/</span> 
        <strong><?php the_title(); ?></strong>
    </div>
</div>

<section class="category-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <p class="hero-description">
            Нестандартные решения для сложных условий эксплуатации: агрессивные среды, 
            экстремальные температуры, высокие давления и специальные требования.
        </p>
    </div>
</section>

<section class="solutions-grid fade-in">
    <div class="container">
        <h2>Специализированные решения</h2>
        <div class="grid">
            <div class="solution-card">
                <div class="card-icon">
                    <i class="fas fa-flask"></i>
                </div>
                <h3>Для агрессивных сред</h3>
                <p>Чиллеры для работы с кислотами, щелочами и органическими растворителями. 
                    Специальные материалы, устойчивые к коррозии.</p>
            </div>
            <div class="solution-card">
                <div class="card-icon">
                    <i class="fas fa-temperature-low"></i>
                </div>
                <h3>Криогенные системы</h3>
                <p>Системы охлаждения до -70°C для криогенных процессов, 
                    производства жидкого азота и кислорода.</p>
            </div>
            <div class="solution-card">
                <div class="card-icon">
                    <i class="fas fa-gauge"></i>
                </div>
                <h3>Высокие давления</h3>
                <p>Оборудование для работы при давлениях свыше 100 бар. 
                    Усиленная конструкция, надежная герметизация.</p>
            </div>
            <div class="solution-card">
                <div class="card-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3>Взрывозащита</h3>
                <p>Чиллеры для взрывоопасных условий (зоны 1, 2 по ГОСТ). 
                    Соответствие стандартам безопасности.</p>
            </div>
            <div class="solution-card">
                <div class="card-icon">
                    <i class="fas fa-microchip"></i>
                </div>
                <h3>Для РЭА и лазеров</h3>
                <p>Высокоточные системы охлаждения с точностью ±0.1°C 
                    для электроники, лазеров и оптических систем.</p>
            </div>
            <div class="solution-card">
                <div class="card-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3>Сертифицированные</h3>
                <p>Оборудование, соответствующее международным стандартам 
                    и сертификациям ISO, CE, PED.</p>
            </div>
        </div>
    </div>
</section>

<section class="process fade-in">
    <div class="container">
        <h2>Процесс разработки нестандартного решения</h2>
        <div class="steps-grid">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Консультация</h3>
                <p>Обсуждение требований и условий эксплуатации</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Техническое задание</h3>
                <p>Формирование ТЗ с точными параметрами</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Проектирование</h3>
                <p>Разработка конструкции и расчеты</p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <h3>Изготовление</h3>
                <p>Производство на собственном заводе</p>
            </div>
            <div class="step">
                <div class="step-number">5</div>
                <h3>Тестирование</h3>
                <p>Полное тестирование перед отправкой</p>
            </div>
            <div class="step">
                <div class="step-number">6</div>
                <h3>Поддержка</h3>
                <p>Монтаж, пусконаладка и техническая поддержка</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section fade-in">
    <div class="container">
        <h2>Обсудите вашу задачу с нашими инженерами</h2>
        <p>
            Более 40% наших проектов — это разработка уникальных решений. 
            Мы готовы помочь воплотить самые сложные идеи в жизнь.
        </p>
        <a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" class="btn btn-large">
            <i class="fas fa-paper-plane"></i> Отправить запрос
        </a>
    </div>
</section>

<?php get_footer(); ?>
