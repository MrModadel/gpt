<?php

/**
 * Template Name: Среднетемпературные агрегаты
 *
 * Шаблон страницы "Среднетемпературные агрегаты" (подкатегория "Холодильные агрегаты").
 *
 * @package Termoservis
 */

get_header();

$low_temp_page_url = '';
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

if ( empty( $low_temp_page_ids ) ) {
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

if ( ! empty( $low_temp_page_ids ) ) {
   $low_temp_page_url = get_permalink( (int) $low_temp_page_ids[0] );
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
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a>
      <i class="fas fa-chevron-right"></i>
      <a href="<?php echo esc_url( home_url( '/catalog' ) ); ?>">Каталог</a>
      <i class="fas fa-chevron-right"></i>
      <a href="<?php echo esc_url( home_url( '/holodilnye-agregaty' ) ); ?>">Холодильные агрегаты</a>
      <i class="fas fa-chevron-right"></i>
      <span>Среднетемпературные агрегаты</span>
   </div>
</div>

<!-- Hero секция -->
<section class="hero">
   <div class="container">
      <h1>Среднетемпературные агрегаты — подбор и производство под ваш объект</h1>
      <p>Раздел категории «Холодильные агрегаты». Среднетемпературные агрегаты применяются для камер хранения, овоще- и фруктохранилищ, складов и пищевых производств. Типовой диапазон температур — от <strong>0°C до +15°C</strong> (точное значение зависит от продукта и технологии). Подберём по расчёту теплопритоков, режиму оттайки, условиям установки и требованиям к автоматике.</p>
      <div class="cta-buttons">
         <button class="btn" id="openCalcModal">Рассчитать среднетемпературный агрегат</button>
         <?php if ( $low_temp_page_url ) : ?>
            <a class="btn btn-outline" href="<?php echo esc_url( $low_temp_page_url ); ?>">Низкотемпературные агрегаты</a>
         <?php endif; ?>
      </div>
   </div>
</section>

<!-- Секция проблем -->
<section>
   <div class="container">
      <div class="section-title">
         <h2>Какие задачи решают среднетемпературные агрегаты?</h2>
      </div>
       <div class="problems-grid">
           <div class="problem-card">
              <div class="problem-icon">
                 <i class="fas fa-thermometer-half"></i>
              </div>
             <h3>Стабильная температура без перемораживания</h3>
             <p>Держим уставку в диапазоне 0…+15°C, чтобы продукт сохранял качество и срок годности. Подбираем агрегат и автоматику под условия хранения и вентиляцию камеры.</p>
           </div>
           <div class="problem-card">
             <div class="problem-icon">
               <i class="fas fa-snowflake"></i>
             </div>
             <h3>Обмерзание испарителя и проблемы с оттайкой</h3>
             <p>Неправильная схема оттайки приводит к наледи, «задушенному» воздухообмену и просадке температуры. Настраиваем оттайку и управление вентиляторами для стабильной работы.</p>
           </div>
           <div class="problem-card">
              <div class="problem-icon">
                 <i class="fas fa-bolt"></i>
              </div>
             <h3>Перерасход энергии и «лишние кВт»</h3>
             <p>Перемощненное или неверно настроенное оборудование работает в коротких циклах и тратит больше энергии. Подбор по расчёту и корректное регулирование снижают расходы.</p>
           </div>
           <div class="problem-card">
              <div class="problem-icon">
                 <i class="fas fa-shield-alt"></i>
              </div>
             <h3>Надёжная работа 24/7 и защита оборудования</h3>
             <p>Комплекс защит по давлению/температуре, грамотная обвязка и сервисные узлы помогают избежать аварий и простоев. Возможен удалённый мониторинг и сигнализация.</p>
           </div>
       </div>
   </div>
</section>

<!-- Секция преимуществ -->
<section style="background-color: #f8f9fa;">
   <div class="container">
      <div class="section-title">
         <h2>Преимущества среднетемпературных агрегатов</h2>
      </div>
      <p class="section-intro">Подбираем агрегаты под режим среднетемпературного хранения (0…+15°C): расчёт теплопритоков, подбор компрессора/конденсации/автоматики, компоновка и заводские испытания перед отгрузкой.</p>

      <div class="features-list">
         <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <div class="feature-text">
               <h3>Точный расчёт и подбор под ваш объект</h3>
               <p>Учитываем объём камеры, продукт, частоту открытий, оттайку, теплопритоки, температуру окружающей среды и длины трасс — чтобы агрегат работал стабильно и без переплаты.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-compress-arrows-alt"></i>
            </div>
            <div class="feature-text">
               <h3>Гибкая комплектация и варианты исполнения</h3>
               <p>Подбираем конфигурацию под объект: уровень шума, условия монтажа (улица/цех), вариант конденсации, сервисный доступ. Возможны опции — зимний комплект и шумозащита.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="feature-text">
               <h3>Автоматика, защиты и правильная оттайка</h3>
               <p>Контроллер, датчики, аварийные защиты, управление вентиляторами и клапанами, логика оттайки и сигнализация. При необходимости — интеграция в диспетчеризацию.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-leaf"></i>
            </div>
            <div class="feature-text">
               <h3>Энергоэффективность в реальных условиях</h3>
               <p>Оптимизация конденсации, регулирование производительности и корректные уставки помогают снижать энергопотребление при частичных нагрузках и сезонных изменениях.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-network-wired"></i>
            </div>
            <div class="feature-text">
               <h3>Контроль и мониторинг (опционально)</h3>
               <p>Сигналы аварий, история параметров, удалённый доступ и интеграция по протоколам — удобно для эксплуатации складов и распределительных центров.</p>
            </div>
         </div>
         <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-tools"></i>
            </div>
            <div class="feature-text">
               <h3>Поставка, монтаж и сервис</h3>
               <p>Сопровождаем проект от расчёта до пусконаладки: документация, настройка, обучение персонала и сервисное обслуживание.</p>
            </div>
         </div>
      </div>


   </div>
</section>

<!-- Типовые режимы и применение -->
<section>
   <div class="container">
      <div class="section-title">
         <h2>Типовые режимы среднетемпературного хранения</h2>
      </div>
      <p class="section-intro">Ниже — ориентиры по диапазонам температур. Точный режим зависит от продукта, влажности, вентиляции и требований к технологии хранения.</p>

      <div class="problems-grid">
         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-leaf"></i>
            </div>
            <h3>Овощи и фрукты</h3>
            <p>Обычно +2…+10°C. Часто важнее не «холод», а стабильность температуры и контроль влажности, чтобы избежать пересушки.</p>
         </div>
         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-utensils"></i>
            </div>
            <h3>Молочная продукция и гастрономия</h3>
            <p>Обычно +2…+6°C. Требуются стабильная вентиляция, корректная оттайка и надежные защиты для круглосуточной работы.</p>
         </div>
         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-fish"></i>
            </div>
            <h3>Охлаждённое мясо и рыба</h3>
            <p>Часто 0…+2°C. Важно исключить перемораживание и обеспечить равномерную температуру по объёму камеры.</p>
         </div>
         <div class="problem-card">
            <div class="problem-icon">
               <i class="fas fa-warehouse"></i>
            </div>
            <h3>Склад и логистика</h3>
            <p>Обычно +4…+12°C. Учитываем теплопритоки от частых открытий дверей, погрузки и перемещения товара.</p>
         </div>
      </div>
   </div>
</section>

<!-- Секция товаров
 <section class='products-section'>
    <div class="container">
       <div class="section-title">
           <h2>Подберите среднетемпературный агрегат</h2>
         </div>
       <p class="section-intro">Подбор по режиму 0…+15°C и параметрам объекта: различная холодопроизводительность, варианты автоматики и исполнения.</p>

       <div class="products-grid">
          <?php
         // Укажи slug категории WooCommerce для среднетемпературных агрегатов
         $category_slug = 'medium-temperature-units';

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
         <h2>Среднетемпературные агрегаты — особенности выбора и эксплуатации</h2>

         <p>Среднетемпературные агрегаты применяются для холодильных камер с режимом примерно от 0°C до +15°C: хранение овощей и фруктов, молочной продукции и гастрономии, напитков, а также складские и логистические помещения. Главная задача — держать стабильную температуру без перемораживания и без лишних энергозатрат.</p>

         <p>Для точного подбора важны объём и геометрия камеры, тип продукта, частота открытий дверей, теплопритоки (освещение, люди, техника), требуемая влажность, режим оттайки и условия окружающей среды. От этих параметров зависит холодопроизводительность и подбор компонентов.</p>

         <p>Энергоэффективность обеспечивается корректным запасом мощности, настройкой автоматики, оптимизацией конденсации и регулированием производительности. Перемощненный агрегат часто приводит к коротким циклам работы и повышенному расходу энергии.</p>

         <p>Эксплуатация включает очистку конденсатора, контроль давления и масла, обслуживание фильтров и датчиков, проверку корректности оттайки и профилактику утечек. Для складов и распределительных центров полезны удалённый мониторинг и сигнализация.</p>

         <p>Заказывая среднетемпературный агрегат у производителя «ТермоСервис», вы получаете инженерный расчёт, подбор комплектации, сборку и испытания, гарантию 2 года, а также услуги по монтажу и сервису. Это снижает риски простоев и помогает удерживать стабильный режим хранения.</p>
      </div>
   </div>
</section>

<!-- Финальный CTA -->
<section class="final-cta">
   <div class="container">
      <h2>Нужно подобрать среднетемпературный агрегат?</h2>
      <p>Оставьте заявку — подготовим расчёт и коммерческое предложение под ваш режим и объект.</p>

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
      <h3>Расчёт стоимости среднетемпературного агрегата</h3>
      <div class="modal-product-info">
         <h4>Страница: Среднетемпературные агрегаты</h4>
         <p>Подготовим предложение с учётом температуры в камере, продукта, условий установки и требований к автоматике.</p>
      </div>
      <form id="calcForm" class="form-tel">
         <input type="hidden" name="formType" value="Расчет среднетемпературного агрегата">
         <input type="hidden" name="unitType" value="mt">
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
            <label for="calcTemperature">Температура в камере (°C)</label>
            <input type="text" id="calcTemperature" name="temperature" class="form-control" placeholder="Например: +2…+6">
         </div>
         <div class="form-group">
            <label for="calcVolume">Объем камеры (м³)</label>
            <input type="text" id="calcVolume" name="volume" class="form-control" placeholder="Например: 120">
          </div>
         <div class="form-group">
            <label for="calcPower">Холодопроизводительность (кВт) (если известна)</label>
            <input type="text" id="calcPower" name="power" class="form-control" placeholder="Например: 12">
         </div>
         <div class="form-group">
            <label for="calcComments">Дополнительная информация</label>
            <textarea id="calcComments" name="message" class="form-control" rows="3" placeholder="Продукт, частота открытий, требования по влажности, оттайка, условия установки (улица/цех), сроки..."></textarea>
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
         <input type="hidden" name="formType" value="Быстрый заказ: среднетемпературный агрегат">
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
         <input type="hidden" name="formType" value="Коммерческое предложение: среднетемпературный агрегат">
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
         <input type="hidden" name="formType" value="Заказать звонок инженера: среднетемпературные агрегаты">
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

   // Закрытие модальных окон при клике на оверлей
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
