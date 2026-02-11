<?php

/**
 * Template Name: Промышленные льдоаккумуляторы
 *
 * Шаблон страницы "Промышленные льдоаккумуляторы".
 * Родительский раздел для категории "Холодильные агрегаты".
 *
 * @package Termoservis
 */

get_header();

$aggregates_page_url  = '';
$medium_temp_page_url = '';
$low_temp_page_url    = '';

$aggregates_page_ids = get_posts(
   array(
      'post_type'              => 'page',
      'posts_per_page'         => 1,
      'no_found_rows'          => true,
      'ignore_sticky_posts'    => true,
      'update_post_meta_cache' => false,
      'update_post_term_cache' => false,
      'fields'                 => 'ids',
      'meta_key'               => '_wp_page_template',
      'meta_value'             => 'page-aggregates.php',
   )
);

if (! empty($aggregates_page_ids)) {
   $aggregates_page_url = get_permalink((int) $aggregates_page_ids[0]);
} else {
   $aggregates_page_url = home_url('/refrigeration-units');
}

$medium_temp_page_ids = get_posts(
   array(
      'post_type'              => 'page',
      'posts_per_page'         => 1,
      'no_found_rows'          => true,
      'ignore_sticky_posts'    => true,
      'update_post_meta_cache' => false,
      'update_post_term_cache' => false,
      'fields'                 => 'ids',
      'meta_key'               => '_wp_page_template',
      'meta_value'             => 'page-medium-temperature-units.php',
   )
);

if (! empty($medium_temp_page_ids)) {
   $medium_temp_page_url = get_permalink((int) $medium_temp_page_ids[0]);
}

$low_temp_page_ids = get_posts(
   array(
      'post_type'              => 'page',
      'posts_per_page'         => 1,
      'no_found_rows'          => true,
      'ignore_sticky_posts'    => true,
      'update_post_meta_cache' => false,
      'update_post_term_cache' => false,
      'fields'                 => 'ids',
      'meta_key'               => '_wp_page_template',
      'meta_value'             => 'page-low-temperature-units.php',
   )
);

if (empty($low_temp_page_ids)) {
   $low_temp_page_ids = get_posts(
      array(
         'post_type'              => 'page',
         'posts_per_page'         => 1,
         'no_found_rows'          => true,
         'ignore_sticky_posts'    => true,
         'update_post_meta_cache' => false,
         'update_post_term_cache' => false,
         'fields'                 => 'ids',
         'meta_key'               => '_wp_page_template',
         'meta_value'             => 'page-low-temp-aggregates.php',
      )
   );
}

if (! empty($low_temp_page_ids)) {
   $low_temp_page_url = get_permalink((int) $low_temp_page_ids[0]);
}
?>
<style>
   /* Сброс и базовые стили */
   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   }

   :root {
      --ts-primary: #0056b8;
      --ts-primary-dark: #004494;
      --ts-accent: #4dabf7;

      --ts-bg: #ffffff;
      --ts-surface: #f8f9fa;

      --ts-text: #333333;
      --ts-muted: #666666;
   }

   body {
      color: var(--ts-text);
      line-height: 1.6;
      background-color: var(--ts-bg);
      overflow-x: hidden;
   }

   .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
   }

   /* Хлебные крошки */
   .breadcrumbs {
      padding: 15px 0;
      background-color: var(--ts-surface);
      font-size: 14px;
   }

   .breadcrumbs a {
      color: var(--ts-primary);
      text-decoration: none;
   }

   .breadcrumbs span {
      color: #666;
   }

   .breadcrumbs i {
      margin: 0 8px;
      color: #999;
      font-size: 12px;
   }

   /* Hero секция */
   .hero {
      background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.iimg.live/images/amazing-shot-8342.webp&auto=format&fit=crop&w=1200&q=80');
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
      color: #f1f5f9;
   }

   .hero p {
      font-size: 1.2rem;
      max-width: 800px;
      margin: 0 auto 30px;
   }

   .btn {
      display: inline-block;
      background-color: var(--ts-primary);
      color: white;
      padding: 14px 35px;
      border-radius: 4px;
      text-decoration: none;
      font-weight: 700;
      font-size: 1.1rem;
      transition: all 0.4s ease;
      border: none;
      cursor: pointer;
      text-align: center;
      position: relative;
      overflow: hidden;
      z-index: 1;
   }

   .btn:before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.7s ease;
      z-index: -1;
   }

   .btn:hover:before {
      left: 100%;
   }

   .btn:hover {
      background-color: var(--ts-primary-dark);
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0, 86, 184, 0.3);
   }

   .btn-outline {
      background-color: transparent;
      border: 2px solid var(--ts-primary);
      color: var(--ts-primary);
   }

   .btn-outline:hover {
      background-color: var(--ts-primary);
      color: white;
   }

   .btn-small {
      padding: 10px 25px;
      font-size: 1rem;
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
      color: var(--ts-primary);
      margin-bottom: 15px;
      position: relative;
      display: inline-block;
   }

   .section-title h2:after {
      content: '';
      position: absolute;
      width: 70px;
      height: 3px;
      background-color: var(--ts-primary);
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

   /* Блок проблем */
   .problems-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
   }

   .problem-card {
      background-color: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      text-align: center;
      transition: transform 0.3s;
   }

   .problem-card:hover {
      transform: translateY(-5px);
   }

   .problem-icon {
      font-size: 2.5rem;
      color: var(--ts-primary);
      margin-bottom: 20px;
   }

   .problem-card h3 {
      margin-bottom: 15px;
      color: var(--ts-primary);
   }

   /* Блок преимуществ */
   .features-list {
      max-width: 900px;
      margin: 0 auto;
   }

   .feature-item {
      display: flex;
      align-items: flex-start;
      margin-bottom: 25px;
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
   }

   .feature-icon {
      font-size: 1.5rem;
      color: var(--ts-primary);
      margin-right: 20px;
      min-width: 30px;
   }

   .feature-text h3 {
      margin-bottom: 8px;
      color: #333;
   }

   .feature-image {
      text-align: center;
      margin-top: 40px;
   }

   .feature-image img {
      max-width: 100%;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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
   }

   .product-card:hover {
      transform: translateY(-10px);
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
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: calc(100% - 200px);
   }

   .product-content h3 {
      color: var(--ts-primary);
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

   /* Блок услуг */
   .services-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
   }

   .service-card {
      background-color: white;
      padding: 35px 25px;
      border-radius: 8px;
      text-align: center;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      border-top: 4px solid var(--ts-primary);
   }

   .service-icon {
      font-size: 2.5rem;
      color: var(--ts-primary);
      margin-bottom: 20px;
   }

   .service-card h3 {
      margin-bottom: 15px;
      color: #333;
   }

   /* SEO текст */
   .seo-section {
      background-color: #f1f5f9;
      padding: 60px 0;
   }

   .seo-content {
      max-width: 900px;
      margin: 0 auto;
   }

   .seo-content h2 {
      color: var(--ts-primary);
      margin-bottom: 25px;
      font-size: 1.8rem;
   }

   .seo-content p {
      margin-bottom: 20px;
      text-align: justify;
      line-height: 1.7;
   }

   /* CTA перед футером */
   .final-cta {
      text-align: center;
      background-color: white;
      padding: 70px 0;
   }

   .final-cta h2 {
      font-size: 2.2rem;
      color: var(--ts-primary);
      margin-bottom: 20px;
   }

   .cta-buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
      flex-wrap: wrap;
   }

   /* Футер (как в page-specialized-chillers.php) */
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
      color: var(--ts-primary);
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
      background: var(--ts-primary);
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
      color: var(--ts-primary);
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
      color: var(--ts-primary);
      width: 18px;
      text-align: center;
   }

   .footer-contacts a {
      color: #ddd;
   }

   .footer-contacts a:hover {
      color: var(--ts-primary);
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
      background-color: var(--ts-primary);
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
      color: var(--ts-primary);
   }

   /* Модальные окна */
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
      display: block;
   }

   .modal-overlay .modal {
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
      display: block;
   }

   .modal-overlay .modal-close {
      position: absolute;
      top: 15px;
      right: 15px;
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      color: var(--ts-muted);
   }

   .modal-overlay .modal h3 {
      color: var(--ts-primary);
      margin-bottom: 20px;
      font-size: 1.5rem;
   }

   .modal-overlay .modal-product-info {
      background-color: var(--ts-surface);
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
   }

   .modal-overlay .modal-product-info h4 {
      color: #333;
      margin-bottom: 10px;
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
      border-color: var(--ts-primary);
   }

   .modal-overlay .btn {
      width: 100%;
   }

   /* Адаптивность */
   @media (max-width: 768px) {
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

      .btn {
         width: 100%;
         max-width: 300px;
         margin-bottom: 10px;
      }
   }

   @media (max-width: 480px) {

      .products-grid,
      .services-grid,
      .problems-grid {
         grid-template-columns: 1fr;
      }

      .hero {
         padding: 50px 0;
      }

      section {
         padding: 50px 0;
      }
   }

   @media (max-width: 360px) {
      .container {
         padding: 0 15px;
      }

      .breadcrumbs .container {
         display: flex;
         flex-wrap: wrap;
         gap: 6px;
         align-items: center;
      }

      .breadcrumbs i {
         margin: 0 4px;
      }

      .hero {
         padding: 45px 0;
      }

      .hero h1 {
         font-size: 1.7rem;
      }

      .hero p {
         font-size: 1rem;
      }

      .feature-item {
         flex-direction: column;
         gap: 10px;
      }

      .feature-icon {
         margin-right: 0;
      }

      .product-specs li {
         flex-direction: column;
         align-items: flex-start;
         gap: 4px;
      }

      .modal-overlay .modal {
         padding: 20px;
         max-height: 90vh;
         overflow: auto;
      }
   }
</style>
<!-- Хлебные крошки -->
<div class="breadcrumbs">
   <div class="container">
      <a href="<?php echo esc_url(home_url('/')); ?>">Главная</a>
      <i class="fas fa-chevron-right"></i>
      <a href="<?php echo esc_url(home_url('/catalog')); ?>">Каталог</a>
      <i class="fas fa-chevron-right"></i>
      <a href="<?php echo esc_url(home_url('/refrigeration-units')); ?>">Холодильные агрегаты</a>
      <i class="fas fa-chevron-right"></i>
      <span>Промышленные льдоаккумуляторы</span>
   </div>
</div>

<!-- Hero секция -->
<section class="hero">
   <div class="container">
      <h1>Промышленные льдоаккумуляторы</h1>
      <p>Промышленные льдоаккумуляторы (аккумуляторы холода) позволяют <strong>накопить холод в виде льда</strong> и использовать его в пиковые часы: снизить <strong>пиковую электрическую мощность</strong>, перенести часть нагрузки на <strong>ночной тариф</strong> и получить <strong>резерв холодоснабжения</strong>. Система обычно работает с «ледяной водой» (ориентир <strong>+1…+3°C</strong>) и интегрируется с насосной группой и автоматикой. Раздел является родительским для категории «Холодильные агрегаты».</p>
      <div class="cta-buttons">
         <button class="btn" id="openCalcModal">Рассчитать льдоаккумулятор</button>
         <?php if ($aggregates_page_url) : ?>
            <a class="btn btn-outline" href="<?php echo esc_url($aggregates_page_url); ?>">Холодильные агрегаты</a>
         <?php endif; ?>
         <?php if ($medium_temp_page_url) : ?>
            <a class="btn btn-outline" href="<?php echo esc_url($medium_temp_page_url); ?>">Среднетемпературные</a>
         <?php endif; ?>
         <?php if ($low_temp_page_url) : ?>
            <a class="btn btn-outline" href="<?php echo esc_url($low_temp_page_url); ?>">Низкотемпературные</a>
         <?php endif; ?>
      </div>
   </div>
</section>

<!-- Как работает льдоаккумулятор -->
<section style="background-color: #f1f5f9;">
   <div class="container">
      <div class="section-title">
         <h2>Как работает льдоаккумулятор</h2>
      </div>
      <p class="section-intro">Система аккумулирует холод в баке-льдоаккумуляторе и отдаёт его тогда, когда это выгодно по тарифам или необходимо по технологии.</p>

      <div class="problems-grid">
         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-moon"></i>
            </div>
            <h3>Зарядка (ночь)</h3>
            <p>Холодильная машина работает на намораживание льда на теплообменниках. Нагрузка переносится на ночной тариф и «размазывается» по времени.</p>
         </div>

         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-battery-full"></i>
            </div>
            <h3>Хранение</h3>
            <p>Лёд сохраняется в теплоизолированном баке с минимальными потерями. Система готова отдать холод по команде автоматики.</p>
         </div>

         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-chart-line"></i>
            </div>
            <h3>Разрядка (пик)</h3>
            <p>Накопленный лёд плавится и охлаждает воду/гликоль. Потребители получают стабильный холод даже при кратковременных пиковых нагрузках.</p>
         </div>

         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-shuffle"></i>
            </div>
            <h3>Смешанный режим</h3>
            <p>Часть холода обеспечивает чиллер/агрегат, часть — льдоаккумулятор. Управление подбирает оптимальный баланс по мощности и экономике.</p>
         </div>
      </div>

      <?php if ($aggregates_page_url) : ?>
         <div style="text-align: center; margin-top: 28px;">
            <a class="btn btn-outline" href="<?php echo esc_url($aggregates_page_url); ?>">Перейти в категорию «Холодильные агрегаты»</a>
         </div>
      <?php endif; ?>
   </div>
</section>

<!-- Секция проблем -->
<section>
   <div class="container">
      <div class="section-title">
         <h2>Какие задачи решают промышленные льдоаккумуляторы?</h2>
      </div>
      <p class="section-intro">Льдоаккумулирование помогает управлять графиком потребления холода и повышать устойчивость системы без «раздувания» установленной мощности.</p>
      <div class="problems-grid">
         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-bolt"></i>
            </div>
            <h3>Снижение пиковой электрической мощности</h3>
            <p>Когда выделенная мощность ограничена, льдоаккумулятор покрывает пики потребления холода и снижает требования к мощности компрессоров.</p>
         </div>
         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-coins"></i>
            </div>
            <h3>Экономия за счёт ночного тарифа</h3>
            <p>Производим холод ночью (или в «дешёвые» часы), а днём используем накопленный запас льда — это снижает стоимость кВт⋅ч холода.</p>
         </div>
         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-shield-alt"></i>
            </div>
            <h3>Резерв холодоснабжения</h3>
            <p>Запас холода повышает устойчивость технологии при кратковременных сбоях, росте нагрузки и аварийных ситуациях.</p>
         </div>
         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-temperature-low"></i>
            </div>
            <h3>Стабильная «ледяная вода» для процесса</h3>
            <p>Стабильная температура подачи (часто +1…+3°C) улучшает повторяемость процесса и качество продукта при пиковых нагрузках.</p>
         </div>
      </div>
   </div>
</section>

<!-- Секция преимуществ -->
<section style="background-color: #f8f9fa;">
   <div class="container">
      <div class="section-title">
         <h2>Преимущества промышленных льдоаккумуляторов</h2>
      </div>
      <p class="section-intro">Льдоаккумулирование увеличивает «пиковую» холодопроизводительность системы и помогает снизить эксплуатационные затраты за счёт правильного графика работы.</p>

      <div class="features-list">
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-bolt"></i>
            </div>
            <div class="feature-text">
               <h3>Peak shaving и разгрузка компрессоров</h3>
               <p>Льдоаккумулятор берёт часть холодопроизводительности на себя в пиковые часы — это помогает уменьшить установленную мощность и снизить нагрузки.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-clock"></i>
            </div>
            <div class="feature-text">
               <h3>Перенос нагрузки на ночной тариф</h3>
               <p>Настраиваем график заряд/разряд под ваш режим работы и тарифы, чтобы снизить стоимость холода без потери производительности.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-shield-alt"></i>
            </div>
            <div class="feature-text">
               <h3>Резерв и устойчивость системы</h3>
               <p>Запас льда страхует технологию при пиках и нештатных ситуациях, снижая риск простоев и потерь.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-tint"></i>
            </div>
            <div class="feature-text">
               <h3>Стабильный температурный график</h3>
               <p>Получаете «ледяную воду» нужной температуры для технологических процессов и охлаждения с более точным контролем в часы пика.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-network-wired"></i>
            </div>
            <div class="feature-text">
               <h3>Автоматика и диспетчеризация (опционально)</h3>
               <p>Датчики, управление насосами/клапанами, журналирование параметров и удалённый доступ — для стабильной работы и контроля.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-tools"></i>
            </div>
            <div class="feature-text">
               <h3>Проектирование, монтаж и сервис</h3>
               <p>Сопровождаем проект от расчёта до пусконаладки: документация, настройка, обучение персонала и сервисное обслуживание.</p>
            </div>
         </div>
      </div>


   </div>
</section>

<!-- Режимы работы -->
<section>
   <div class="container">
      <div class="section-title">
         <h2>Режимы работы — быстрые ориентиры</h2>
      </div>
      <p class="section-intro">Точный режим зависит от профиля потребления холода и температурного графика воды/гликоля. Ниже — ориентиры для первичного запроса.</p>

      <div style="max-width: 980px; margin: 0 auto; background: #fff; border-radius: 8px; padding: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
         <ul class="product-specs" style="margin: 0;">
            <li>
               <span class="spec-name"><i class="fas fa-moon" style="margin-right: 8px; color: var(--ts-primary);"></i>Перенос нагрузки на ночь</span>
               <span class="spec-value">Заряд 6–10 ч • Разряд 4–8 ч</span>
            </li>
            <li>
               <span class="spec-name"><i class="fas fa-chart-line" style="margin-right: 8px; color: var(--ts-primary);"></i>Покрытие кратковременного пика</span>
               <span class="spec-value">Пик 1–3 ч • Максимальная мощность</span>
            </li>
            <li>
               <span class="spec-name"><i class="fas fa-shield-alt" style="margin-right: 8px; color: var(--ts-primary);"></i>Резерв холодоснабжения</span>
               <span class="spec-value">Автономность 0.5–2 ч • По задаче</span>
            </li>
            <li>
               <span class="spec-name"><i class="fas fa-tint" style="margin-right: 8px; color: var(--ts-primary);"></i>«Ледяная вода» для процесса</span>
               <span class="spec-value">Подача +1…+3°C • Обратка +5…+7°C</span>
            </li>
         </ul>

         <p style="margin-top: 15px; color: #666;">Температуры и длительность заряда/разряда рассчитываются по вашему профилю нагрузки — подготовим технико-экономическое сравнение вариантов.</p>
         <?php if ($aggregates_page_url) : ?>
            <div style="text-align: center; margin-top: 20px;">
               <a class="btn btn-outline" href="<?php echo esc_url($aggregates_page_url); ?>">Холодильные агрегаты (для заряда)</a>
            </div>
         <?php endif; ?>
      </div>
   </div>
</section>

<!-- Чек-лист для подбора -->
<section style="background-color: #f1f5f9;">
   <div class="container">
      <div class="section-title">
         <h2>Что указать для точного подбора</h2>
      </div>
      <p class="section-intro">Если каких-то данных нет — ничего страшного: поможем уточнить. Но чем больше исходных данных, тем точнее расчёт.</p>

      <div class="features-list">
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="feature-text">
               <h3>Профиль нагрузки и цель</h3>
               <p>Сколько кВт нужно в пик и на сколько часов, есть ли ночной тариф, требуется ли резерв на аварийные ситуации.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-thermometer-half"></i>
            </div>
            <div class="feature-text">
               <h3>Температурный график и теплоноситель</h3>
               <p>Подача/обратка (°C), вода или гликоль, требуемый расход/перепад температур, особенности потребителей.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="feature-text">
               <h3>Условия эксплуатации</h3>
               <p>Место установки (цех/улица), температура окружающей среды, качество воды/фильтрация, требования по шуму, доступность обслуживания, электропитание.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
               <i class="fas fa-network-wired"></i>
            </div>
            <div class="feature-text">
               <h3>Автоматика и контроль</h3>
               <p>Нужны ли мониторинг, сигнализация, удалённый доступ, интеграция с существующим чиллером/агрегатом и диспетчеризацией.</p>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Секция товаров
 <section class='products-section'>
    <div class="container">
       <div class="section-title">
            <h2>Подберите промышленный льдоаккумулятор</h2>
          </div>
        <p class="section-intro">Подбор по профилю нагрузки и температурному графику: требуемая мощность и часы разряда, вода/гликоль, интеграция с агрегатом/чиллером и автоматикой.</p>

       <div class="products-grid">
           <?php
            // Укажи slug категории WooCommerce для промышленных льдоаккумуляторов
            $category_slug = 'industrial-ice-storage';

            if (!function_exists('wc_get_product')) {
               echo '<p style="grid-column: 1/-1; text-align: center; padding: 40px;">WooCommerce не активен. Каталог товаров недоступен.</p>';
            } else {
               $args = array(
                  'post_type' => 'product',
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'no_found_rows' => true,
                  'ignore_sticky_posts' => true,
                  'orderby' => array(
                     'menu_order' => 'ASC',
                     'title' => 'ASC',
                  ),
                  'tax_query' => array(
                     array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $category_slug,
                     ),
                  ),
               );

               $products = new WP_Query($args);

               if ($products->have_posts()) {
                  while ($products->have_posts()) {
                     $products->the_post();
                     $product = wc_get_product(get_the_ID());

                     if (!$product) {
                        continue;
                     }

                     $product_name = $product->get_name();

                     $short_desc = $product->get_short_description();
                     if (!$short_desc) {
                        $short_desc = wp_trim_words(wp_strip_all_tags($product->get_description()), 24, '…');
                     } else {
                        $short_desc = wp_trim_words(wp_strip_all_tags($short_desc), 24, '…');
                     }

                     $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : wc_placeholder_img_src('medium');

                     $attribute_items = array();
                     $attributes = $product->get_attributes();
                     if (!empty($attributes)) {
                        foreach ($attributes as $attr) {
                           if (!($attr instanceof WC_Product_Attribute)) {
                              continue;
                           }

                           $attr_name = $attr->get_name();
                           $attr_value = $product->get_attribute($attr_name);

                           if (!$attr_value) {
                              continue;
                           }

                           $attr_label = $attr->get_id() ? wc_attribute_label($attr_name) : $attr_name;
                           $attr_label = $attr_label ? $attr_label : $attr_name;

                           $attribute_items[] = array(
                              'position' => (int)$attr->get_position(),
                              'visible' => (bool)$attr->get_visible(),
                              'label' => $attr_label,
                              'value' => $attr_value,
                           );
                        }

                        usort($attribute_items, static function ($a, $b) {
                           return $a['position'] <=> $b['position'];
                        });
                     }

                     $visible_items = array_values(array_filter($attribute_items, static function ($item) {
                        return !empty($item['visible']);
                     }));
                     $hidden_items = array_values(array_filter($attribute_items, static function ($item) {
                        return empty($item['visible']);
                     }));

                     $spec_items = array_slice(array_merge($visible_items, $hidden_items), 0, 5);
            ?>
                  <div class="product-card">
                     <a href="<?php the_permalink(); ?>" class="product-image" style="display: block;">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product_name); ?>" loading="lazy" decoding="async">
                     </a>
                     <div class="product-content">
                        <h3><?php echo esc_html($product_name); ?></h3>
                        <ul class="product-specs">
                           <?php
                           $printed = 0;
                           foreach ($spec_items as $item) {
                           ?>
                              <li><span class="spec-name"><?php echo esc_html($item['label']); ?>:</span><span class="spec-value"><?php echo esc_html($item['value']); ?></span></li>
                           <?php
                              $printed++;
                           }

                           if ($printed === 0) {
                              echo '<li><span class="spec-name">Характеристики:</span><span class="spec-value">по запросу</span></li>';
                           }
                           ?>
                        </ul>
                        <button class="btn btn-small quick-order-btn" data-product="<?php echo esc_attr($product_name); ?>" data-desc="<?php echo esc_attr($short_desc); ?>">Быстрый заказ</button>
                     </div>
                  </div>
         <?php
                  }
                  wp_reset_postdata();
               } else {
                  $term = get_term_by('slug', $category_slug, 'product_cat');
                  if (!$term) {
                     echo '<p style="grid-column: 1/-1; text-align: center; padding: 40px;">Категория "' . esc_html($category_slug) . '" не найдена. Проверьте slug категории в WooCommerce.</p>';
                  } else {
                     echo '<p style="grid-column: 1/-1; text-align: center; padding: 40px;">В категории "' . esc_html($term->name) . '" пока нет товаров.</p>';
                  }
               }
            }
         ?>
      </div>
   </div>
</section> -->

<!-- Секция услуг -->
<section style="background-color: #f1f5f9;">
   <div class="container">
      <div class="section-title">
         <h2>Проектирование, монтаж и сервис</h2>
      </div>
      <p class="section-intro">Мы обеспечиваем полный цикл сопровождения оборудования — от проектирования до сервисного обслуживания.</p>

      <div class="services-grid">
         <div class="service-card">
            <div class="service-icon">
               <i class="fas fa-drafting-compass"></i>
            </div>
            <h3>Проектирование</h3>
            <p>Аудит существующей системы, тепловой расчет, подбор оптимальной модели, разработка схемы подключения и компоновки.</p>
         </div>
         <div class="service-card">
            <div class="service-icon">
               <i class="fas fa-tools"></i>
            </div>
            <h3>Пусконаладка</h3>
            <p>Монтаж оборудования на месте, ввод в эксплуатацию, настройка рабочих параметров, обучение вашего персонала.</p>
         </div>
         <div class="service-card">
            <div class="service-icon">
               <i class="fas fa-headset"></i>
            </div>
            <h3>Сервис</h3>
            <p>Гарантия 2 года на оборудование, дистанционный мониторинг, техническая поддержка 24/7, поставка оригинальных запчастей.</p>
         </div>
      </div>
   </div>
</section>

<!-- SEO секция -->
<section class="seo-section">
   <div class="container">
      <div class="seo-content">
         <h2>Промышленные льдоаккумуляторы — принцип работы и подбор</h2>

         <p>Промышленный льдоаккумулятор — это накопитель холода, в котором запас хранится в виде льда (как правило, на теплообменниках внутри теплоизолированного бака). Такой подход позволяет разделить во времени <strong>производство</strong> и <strong>потребление</strong> холода: «заряжать» систему в периоды низких тарифов/нагрузок и отдавать холод в часы пика.</p>

         <p>Льдоаккумулирование особенно эффективно, когда есть выраженные пики потребления холода, ограничение по выделенной электрической мощности, ночной тариф или требования к резервированию технологического процесса. Система может работать в режиме <em>переноса нагрузки</em> (night shift), <em>покрытия пика</em> (peak shaving) или в смешанном режиме вместе с чиллером/агрегатом.</p>

         <p>При подборе учитывают профиль нагрузки по часам, требуемую холодопроизводительность и ёмкость (кВт⋅ч), температурный график подачи/обратки, тип теплоносителя (вода/гликоль), гидравлику (насосы, арматура, теплообменники), качество воды и требования к автоматике. Правильно спроектированная система даёт стабильные параметры «ледяной воды» и предсказуемую экономику.</p>

         <p>Эксплуатация включает контроль уровней и температур, обслуживание насосной группы, фильтрацию/подготовку воды и периодические проверки автоматики. При необходимости выполняется промывка контура и обслуживание теплообменного оборудования — это сохраняет эффективность и ресурс системы.</p>

         <p>Заказывая промышленный льдоаккумулятор у производителя «ТермоСервис», вы получаете инженерный расчёт, подбор комплектации (бак, холодильный агрегат/чиллер, насосы, автоматика), сборку и испытания, гарантию 2 года, а также услуги по монтажу и сервису. Это снижает риски простоев и помогает получить стабильный холод по вашему графику.</p>
      </div>
   </div>
</section>

<!-- Финальный CTA -->
<section class="final-cta">
   <div class="container">
      <h2>Нужно подобрать промышленный льдоаккумулятор?</h2>
      <p>Оставьте заявку — подготовим расчёт и коммерческое предложение под вашу нагрузку, температурный график и условия эксплуатации.</p>

      <div class="cta-buttons">
         <button class="btn" id="openProposalModal">Получить коммерческое предложение</button>
         <button class="btn btn-outline" id="openCallbackModal">Заказать звонок инженера</button>
      </div>
   </div>
</section>

<!-- Модальное окно расчета стоимости -->
<div class="modal-overlay" id="calcModal">
   <div class="modal">
      <button class="modal-close" id="closeCalcModal">&times;</button>
      <h3>Расчёт стоимости промышленного льдоаккумулятора</h3>
      <div class="modal-product-info">
         <h4>Страница: Промышленные льдоаккумуляторы</h4>
         <p>Подготовим предложение с учётом профиля нагрузки, требуемой мощности и часов разряда, температурного графика воды/гликоля и условий установки.</p>
      </div>
      <form id="calcForm" class="form-tel">
         <input type="hidden" name="formType" value="Расчет промышленного льдоаккумулятора">
         <input type="hidden" name="unitType" value="ice-storage">
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
            <label for="calcScenario">Цель / сценарий</label>
            <select id="calcScenario" name="scenario" class="form-control">
               <option value="">Выберите вариант</option>
               <option value="night-tariff">Перенос нагрузки на ночь (ночной тариф)</option>
               <option value="peak-shaving">Снижение пиковой мощности (peak shaving)</option>
               <option value="backup">Резервный холод / аварийный запас</option>
               <option value="process">Ледяная вода для техпроцесса</option>
               <option value="other">Другое</option>
            </select>
         </div>
         <div class="form-group">
            <label for="calcTemperature">Температурный график (подача/обратка, °C)</label>
            <input type="text" id="calcTemperature" name="tempSchedule" class="form-control" placeholder="Например: +1/+6">
         </div>
         <div class="form-group">
            <label for="calcMedia">Теплоноситель</label>
            <input type="text" id="calcMedia" name="media" class="form-control" placeholder="Например: вода или гликоль (концентрация %)">
         </div>
         <div class="form-group">
            <label for="calcDischargeHours">Длительность разряда (ч)</label>
            <input type="text" id="calcDischargeHours" name="dischargeHours" class="form-control" placeholder="Например: 4">
         </div>
         <div class="form-group">
            <label for="calcPower">Пиковая холодопроизводительность (кВт) (если известна)</label>
            <input type="text" id="calcPower" name="power" class="form-control" placeholder="Например: 12">
         </div>
         <div class="form-group">
            <label for="calcObject">Объект / процесс</label>
            <input type="text" id="calcObject" name="object" class="form-control" placeholder="Например: молочный цех, пивоварня, технологическая вода, кондиционирование">
         </div>
         <div class="form-group">
            <label for="calcComments">Дополнительная информация</label>
            <textarea id="calcComments" name="message" class="form-control" rows="3" placeholder="График нагрузки по часам, ограничения по эл. мощности, текущая система, условия установки (улица/цех), требования к автоматике, сроки..."></textarea>
         </div>
         <button type="submit" class="btn">Отправить запрос на расчет</button>
      </form>
   </div>
</div>

<!-- Модальное окно быстрого заказа -->
<div class="modal-overlay" id="quickOrderModal">
   <div class="modal">
      <button class="modal-close" id="closeQuickOrderModal">&times;</button>
      <h3>Быстрый заказ</h3>
      <div class="modal-product-info" id="productInfo">
         <!-- Сюда будет вставлена информация о товаре через JS -->
      </div>
      <form id="quickOrderForm" class="form-tel">
         <input type="hidden" name="formType" value="Быстрый заказ: промышленный льдоаккумулятор">
         <input type="hidden" id="orderProduct" name="product" value="">
         <input type="hidden" id="orderProductDescription" name="productDescription" value="">
         <input type="hidden" id="orderProductSpecs" name="productSpecs" value="">
         <div class="form-group">
            <label for="orderName">Ваше имя *</label>
            <input type="text" id="orderName" name="name" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="orderPhone">Телефон *</label>
            <input type="tel" id="orderPhone" name="phone" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="orderEmail">Email</label>
            <input type="email" id="orderEmail" name="email" class="form-control">
         </div>
         <div class="form-group">
            <label for="orderQuantity">Количество</label>
            <input type="number" id="orderQuantity" name="quantity" class="form-control" value="1" min="1">
         </div>
         <div class="form-group">
            <label for="orderComments">Комментарий к заказу</label>
            <textarea id="orderComments" name="message" class="form-control" rows="2" placeholder="Особые требования, сроки..."></textarea>
         </div>
         <button type="submit" class="btn">Отправить заявку</button>
      </form>
   </div>
</div>

<!-- Модальное окно коммерческого предложения -->
<div class="modal-overlay" id="proposalModal">
   <div class="modal">
      <button class="modal-close" id="closeProposalModal">&times;</button>
      <h3>Получить коммерческое предложение</h3>
      <p>Отправьте запрос, и мы подготовим детальное КП с ценами, сроками и условиями поставки.</p>
      <form id="proposalForm" class="form-tel">
         <input type="hidden" name="formType" value="Коммерческое предложение: промышленный льдоаккумулятор">
         <div class="form-group">
            <label for="proposalName">Ваше имя *</label>
            <input type="text" id="proposalName" name="name" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="proposalPhone">Телефон *</label>
            <input type="tel" id="proposalPhone" name="phone" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="proposalCompany">Компания</label>
            <input type="text" id="proposalCompany" name="company" class="form-control">
         </div>
         <div class="form-group">
            <label for="proposalEmail">Email *</label>
            <input type="email" id="proposalEmail" name="email" class="form-control" required>
         </div>
         <button type="submit" class="btn">Запросить КП</button>
      </form>
   </div>
</div>

<!-- Модальное окно обратного звонка -->
<div class="modal-overlay" id="callbackModal">
   <div class="modal">
      <button class="modal-close" id="closeCallbackModal">&times;</button>
      <h3>Заказать звонок инженера</h3>
      <p>Наш специалист свяжется с вами в удобное время и ответит на все технические вопросы.</p>
      <form id="callbackForm" class="form-tel">
         <input type="hidden" name="formType" value="Заказать звонок инженера: промышленные льдоаккумуляторы">
         <div class="form-group">
            <label for="callbackName">Ваше имя *</label>
            <input type="text" id="callbackName" name="name" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="callbackPhone">Телефон *</label>
            <input type="tel" id="callbackPhone" name="phone" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="callbackTime">Удобное время для звонка</label>
            <select id="callbackTime" name="time" class="form-control">
               <option value="">В любое время</option>
               <option value="9-12">9:00 - 12:00</option>
               <option value="12-15">12:00 - 15:00</option>
               <option value="15-18">15:00 - 18:00</option>
            </select>
         </div>
         <div class="form-group">
            <label for="callbackQuestion">Ваш вопрос</label>
            <textarea id="callbackQuestion" name="message" class="form-control" rows="3" placeholder="Что вас интересует?"></textarea>
         </div>
         <button type="submit" class="btn">Заказать звонок</button>
      </form>
   </div>
</div>

<script>
   // Отправка форм (Telegram) выполняется в /js/main.js для .form-tel
   // Элементы модальных окон
   const calcModal = document.getElementById('calcModal');
   const quickOrderModal = document.getElementById('quickOrderModal');
   const proposalModal = document.getElementById('proposalModal');
   const callbackModal = document.getElementById('callbackModal');

   // Кнопки открытия модальных окон
   const openCalcModalBtn = document.getElementById('openCalcModal');
   const openProposalModalBtn = document.getElementById('openProposalModal');
   const openCallbackModalBtn = document.getElementById('openCallbackModal');

   // Кнопки закрытия модальных окон
   const closeCalcModalBtn = document.getElementById('closeCalcModal');
   const closeQuickOrderModalBtn = document.getElementById('closeQuickOrderModal');
   const closeProposalModalBtn = document.getElementById('closeProposalModal');
   const closeCallbackModalBtn = document.getElementById('closeCallbackModal');

   // Кнопки быстрого заказа в карточках товаров
   const quickOrderButtons = document.querySelectorAll('.quick-order-btn');

   // Элемент для информации о товаре в модальном окне быстрого заказа
   const productInfoElement = document.getElementById('productInfo');
   const orderProductInput = document.getElementById('orderProduct');
   const orderProductDescriptionInput = document.getElementById('orderProductDescription');
   const orderProductSpecsInput = document.getElementById('orderProductSpecs');

   // Функция открытия модального окна
   function openModal(modal) {
      modal.classList.add('active');
      document.body.style.overflow = 'hidden'; // Блокируем прокрутку фона
   }

   // Функция закрытия модального окна
   function closeModal(modal) {
      modal.classList.remove('active');
      document.body.style.overflow = 'auto'; // Возвращаем прокрутку фона
   }

   // Обработчики открытия модальных окон
   openCalcModalBtn.addEventListener('click', () => openModal(calcModal));
   openProposalModalBtn.addEventListener('click', () => openModal(proposalModal));
   openCallbackModalBtn.addEventListener('click', () => openModal(callbackModal));

   // Обработчики закрытия модальных окон
   closeCalcModalBtn.addEventListener('click', () => closeModal(calcModal));
   closeQuickOrderModalBtn.addEventListener('click', () => closeModal(quickOrderModal));
   closeProposalModalBtn.addEventListener('click', () => closeModal(proposalModal));
   closeCallbackModalBtn.addEventListener('click', () => closeModal(callbackModal));

   // Закрытие модальных о98AAAкон при клике на оверлей
   document.querySelectorAll('.modal-overlay').forEach(modal => {
      modal.addEventListener('click', (e) => {
         if (e.target === modal) {
            closeModal(modal);
         }
      });
   });

   // Обработчики для кнопок быстрого заказа в карточках товаров
   quickOrderButtons.forEach(button => {
      button.addEventListener('click', () => {
         const productCard = button.closest('.product-card');
         const productModel = button.getAttribute('data-product') || productCard?.querySelector('.product-content h3')?.textContent?.trim() || '';
         const productDescription = button.getAttribute('data-desc') || '';

         const specs = productCard ? Array.from(productCard.querySelectorAll('.product-specs li'))
            .map(li => ({
               name: li.querySelector('.spec-name')?.textContent?.trim() || '',
               value: li.querySelector('.spec-value')?.textContent?.trim() || ''
            }))
            .filter(spec => spec.name || spec.value) : [];

         if (productInfoElement) {
            const specsHtml = specs
               .map(spec => `<p><strong>${spec.name}</strong> ${spec.value}</p>`)
               .join('');

            productInfoElement.innerHTML = `
                        <h4>${productModel || 'Модель'}</h4>
                        ${productDescription ? `<p>${productDescription}</p>` : ''}
                        ${specsHtml}
                    `;
         }

         if (orderProductInput) orderProductInput.value = productModel;
         if (orderProductDescriptionInput) orderProductDescriptionInput.value = productDescription;
         if (orderProductSpecsInput) orderProductSpecsInput.value = specs.map(spec => `${spec.name} ${spec.value}`).join('\n');

         openModal(quickOrderModal);
      });
   });

   // Закрытие модальных окон при нажатии Escape
   document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
         closeModal(calcModal);
         closeModal(quickOrderModal);
         closeModal(proposalModal);
         closeModal(callbackModal);
      }
   });
</script>

<?php get_footer(); ?>