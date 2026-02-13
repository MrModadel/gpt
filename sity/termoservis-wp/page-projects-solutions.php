<?php

/**
 * Template Name: Проекты и решения
 *
 * @package Termoservis
 */

get_header();

$termoservis_phone_raw = get_theme_mod( 'termoservis_phone', '+7 (927) 001-38-85' );
$termoservis_phone_tel = preg_replace( '/[^\d+]/', '', $termoservis_phone_raw );
?>

<style>
   :root {
      --primary: #0056b8;
      --primary-2: #00a3ff;
      --text: #333333;
      --muted: #666666;
      --bg: #f8f9fa;
      --card: #ffffff;
      --border: rgba(0, 0, 0, 0.08);
      --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      --shadow-strong: 0 20px 50px rgba(0, 0, 0, 0.14);
      --radius: 14px;
   }

   /* ===== БАЗОВЫЕ СТИЛИ ===== */
   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   }

   body {
      background-color: #ffffff;
      color: var(--text);
      line-height: 1.6;
      overflow-x: hidden;
   }

   a {
      text-decoration: none;
      color: inherit;
      transition: all 0.3s ease;
   }

   ul {
      list-style: none;
   }

   .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
   }

   section {
      padding: 80px 0;
      position: relative;
   }

   h1,
   h2,
   h3,
   h4 {
      margin-bottom: 20px;
      font-weight: 700;
      line-height: 1.3;
   }

   h1 {
      font-size: 2.8rem;
      color: #222;
   }

   h2 {
      font-size: 2.2rem;
      color: var(--primary);
      position: relative;
      padding-bottom: 15px;
      margin-bottom: 30px;
   }

   h2:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 80px;
      height: 4px;
      background: var(--primary);
      border-radius: 2px;
   }

   h2.text-center:after {
      left: 50%;
      transform: translateX(-50%);
   }

   h3 {
      font-size: 1.6rem;
      color: #222;
   }

   h4 {
      font-size: 1.15rem;
      color: #444;
      margin-bottom: 12px;
   }

   .text-center {
      text-align: center;
   }

   .fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease;
   }

   .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
   }

   /* ===== КНОПКИ ===== */
   .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background-color: var(--primary);
      color: #ffffff;
      padding: 14px 34px;
      border-radius: 6px;
      font-weight: 700;
      border: none;
      cursor: pointer;
      transition: all 0.35s ease;
      text-align: center;
      font-size: 1.05rem;
      position: relative;
      overflow: hidden;
      z-index: 1;
      line-height: 1.2;
   }

   .btn:before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.22), transparent);
      transition: left 0.7s ease;
      z-index: -1;
   }

   .btn:hover:before {
      left: 100%;
   }

   .btn:hover {
      background-color: #004494;
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0, 86, 184, 0.3);
   }

   .btn-outline {
      background-color: transparent;
      border: 2px solid var(--primary);
      color: var(--primary);
   }

   .btn-outline:hover {
      background-color: var(--primary);
      color: #ffffff;
      box-shadow: 0 10px 25px rgba(0, 86, 184, 0.18);
   }

   .btn-light {
      background: rgba(255, 255, 255, 0.14);
      border: 1px solid rgba(255, 255, 255, 0.28);
      color: #ffffff;
      backdrop-filter: blur(8px);
   }

   .btn-light:hover {
      background: rgba(255, 255, 255, 0.22);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
      transform: translateY(-3px);
   }

   .btn-light-outline {
      background: transparent;
      border: 1px solid rgba(255, 255, 255, 0.58);
      color: #ffffff;
   }

   .btn-light-outline:hover {
      background: rgba(255, 255, 255, 0.12);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.16);
      transform: translateY(-3px);
   }

   .btn-small {
      padding: 12px 22px;
      font-size: 0.98rem;
      border-radius: 8px;
   }

   /* ===== ХЛЕБНЫЕ КРОШКИ ===== */
   .breadcrumbs {
      background-color: var(--bg);
      padding: 15px 0;
      font-size: 0.9rem;
      border-bottom: 1px solid rgba(0, 0, 0, 0.06);
   }

   .breadcrumbs a {
      color: var(--primary);
   }

   .breadcrumbs a:hover {
      text-decoration: underline;
   }

   .breadcrumbs span {
      color: #666;
      margin: 0 8px;
   }

   /* ===== HERO ===== */
   .ps-hero {
      background:
         linear-gradient(rgba(0, 86, 184, 0.9), rgba(0, 86, 184, 0.82)),
         url('https://images.iimg.live/images/amazing-shot-8342.webp?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
      color: #ffffff;
      padding: 120px 0 85px;
      overflow: hidden;
   }

   .ps-hero:before {
      content: '';
      position: absolute;
      inset: 0;
      background:
         radial-gradient(1200px 600px at 10% 15%, rgba(255, 255, 255, 0.14), transparent 60%),
         radial-gradient(900px 520px at 85% 10%, rgba(0, 0, 0, 0.18), transparent 60%),
         radial-gradient(800px 520px at 35% 80%, rgba(0, 163, 255, 0.18), transparent 65%);
      pointer-events: none;
   }

   .ps-hero .container {
      position: relative;
      z-index: 1;
   }

   .ps-hero-grid {
      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 50px;
      align-items: center;
   }

   .ps-kicker {
      display: inline-flex;
      gap: 10px;
      align-items: center;
      padding: 8px 14px;
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.12);
      border: 1px solid rgba(255, 255, 255, 0.22);
      margin-bottom: 18px;
      font-weight: 700;
      letter-spacing: 0.2px;
      backdrop-filter: blur(8px);
   }

   .ps-kicker i {
      color: #ffffff;
      opacity: 0.9;
   }

   .ps-hero h1 {
      color: #ffffff;
      text-align: left;
      margin-bottom: 18px;
      font-size: 3rem;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.22);
   }

   .ps-hero p {
      font-size: 1.18rem;
      opacity: 0.96;
      line-height: 1.7;
      margin-bottom: 30px;
      max-width: 640px;
   }

   .ps-hero-features {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 16px 18px;
      margin-bottom: 28px;
   }

   .ps-feature {
      display: flex;
      gap: 14px;
      align-items: flex-start;
      padding: 14px 14px;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.10);
      border: 1px solid rgba(255, 255, 255, 0.18);
      backdrop-filter: blur(8px);
   }

   .ps-feature i {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.14);
      flex-shrink: 0;
      font-size: 1.2rem;
   }

   .ps-feature h4 {
      color: #ffffff;
      margin: 0 0 4px 0;
      font-size: 1.05rem;
   }

   .ps-feature p {
      margin: 0;
      font-size: 0.92rem;
      opacity: 0.88;
      line-height: 1.5;
   }

   .ps-hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 8px;
   }

   .ps-hero-form {
      background: #ffffff;
      padding: 34px 32px;
      border-radius: 14px;
      box-shadow: var(--shadow-strong);
      border-top: 6px solid var(--primary);
      position: relative;
   }

   .ps-hero-form:before {
      content: '';
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      height: 6px;
      border-top-left-radius: 14px;
      border-top-right-radius: 14px;
      background: linear-gradient(90deg, var(--primary) 0%, var(--primary-2) 50%, var(--primary) 100%);
   }

   .ps-hero-form h3 {
      color: var(--primary);
      margin-bottom: 22px;
      text-align: center;
      font-size: 1.55rem;
   }

   .form-group {
      margin-bottom: 16px;
   }

   .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 700;
      color: #333;
      font-size: 0.95rem;
   }

   .form-control {
      width: 100%;
      padding: 14px 16px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 1rem;
      transition: all 0.25s;
   }

   .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(0, 86, 184, 0.12);
   }

   .ps-hero-form .btn {
      width: 100%;
      margin-top: 8px;
      padding: 15px;
      border-radius: 10px;
   }

   .ps-form-note {
      margin-top: 14px;
      font-size: 0.9rem;
      color: #666;
      text-align: center;
      line-height: 1.45;
   }

   .ps-form-note a {
      color: var(--primary);
      font-weight: 800;
   }

   /* ===== БЛОКИ РЕШЕНИЙ ===== */
   .ps-section--alt {
      background: var(--bg);
   }

   .ps-section-intro {
      max-width: 900px;
      margin: 0 auto 46px;
      text-align: center;
   }

   .ps-section-intro p {
      color: var(--muted);
      font-size: 1.1rem;
      line-height: 1.7;
      margin-top: -10px;
   }

   .solutions-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 26px;
   }

   .solution-card {
      background: var(--card);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      box-shadow: var(--shadow);
      overflow: hidden;
      transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
   }

   .solution-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 46px rgba(0, 0, 0, 0.12);
      border-color: rgba(0, 86, 184, 0.35);
   }

   details.solution-card[open] {
      border-color: rgba(0, 86, 184, 0.45);
      box-shadow: 0 22px 55px rgba(0, 86, 184, 0.10);
   }

   .solution-card > summary {
      list-style: none;
      cursor: pointer;
      padding: 26px 26px 18px;
      outline: none;
   }

   .solution-card > summary::-webkit-details-marker {
      display: none;
   }

   .solution-summary-top {
      display: flex;
      align-items: flex-start;
      gap: 16px;
   }

   .solution-icon {
      width: 54px;
      height: 54px;
      border-radius: 16px;
      background: linear-gradient(135deg, rgba(0, 86, 184, 0.10) 0%, rgba(0, 163, 255, 0.14) 100%);
      border: 1px solid rgba(0, 86, 184, 0.18);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      color: var(--primary);
      font-size: 1.35rem;
   }

   .solution-title {
      flex: 1;
      min-width: 0;
   }

   .solution-title h3 {
      margin: 0 0 8px 0;
      font-size: 1.38rem;
      line-height: 1.25;
   }

   .solution-title p {
      margin: 0;
      color: var(--muted);
      font-size: 0.98rem;
      line-height: 1.55;
   }

   .solution-toggle {
      width: 40px;
      height: 40px;
      border-radius: 12px;
      border: 1px solid rgba(0, 0, 0, 0.08);
      background: rgba(255, 255, 255, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary);
      flex-shrink: 0;
      transition: transform 0.25s ease, background 0.25s ease;
   }

   details[open] .solution-toggle {
      transform: rotate(45deg);
      background: rgba(0, 86, 184, 0.08);
   }

   .solution-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 16px;
   }

   .solution-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      border-radius: 999px;
      border: 1px solid rgba(0, 86, 184, 0.16);
      background: rgba(0, 86, 184, 0.06);
      color: var(--primary);
      font-weight: 800;
      font-size: 0.86rem;
      line-height: 1;
   }

   .solution-body {
      padding: 0 26px 26px;
   }

   .solution-body-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 18px 22px;
      padding-top: 16px;
      border-top: 1px solid rgba(0, 0, 0, 0.06);
   }

   .solution-list {
      margin-top: 10px;
      display: grid;
      gap: 10px;
   }

   .solution-list li {
      position: relative;
      padding-left: 28px;
      color: #444;
      line-height: 1.55;
      font-size: 0.98rem;
   }

   .solution-list li:before {
      content: '\f00c';
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      position: absolute;
      left: 0;
      top: 1px;
      color: var(--primary);
      opacity: 0.95;
   }

   .solution-cta {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 18px;
   }

   /* ===== CTA ===== */
   .ps-cta {
      background: linear-gradient(90deg, rgba(0, 86, 184, 0.10) 0%, rgba(0, 163, 255, 0.10) 50%, rgba(0, 86, 184, 0.10) 100%);
      border-top: 1px solid rgba(0, 0, 0, 0.06);
   }

   .ps-cta-box {
      background: #ffffff;
      border-radius: 18px;
      padding: 34px 32px;
      border: 1px solid rgba(0, 0, 0, 0.08);
      box-shadow: var(--shadow);
      display: grid;
      grid-template-columns: 1.3fr 0.7fr;
      gap: 20px;
      align-items: center;
   }

   .ps-cta-box p {
      margin: 0;
      color: var(--muted);
      font-size: 1.08rem;
      line-height: 1.65;
   }

   .ps-cta-actions {
      display: flex;
      flex-direction: column;
      gap: 12px;
      align-items: stretch;
   }

   /* ===== АДАПТИВ ===== */
   @media (max-width: 1100px) {
      .ps-hero-grid {
         grid-template-columns: 1fr;
         gap: 28px;
      }

      .ps-hero h1 {
         font-size: 2.6rem;
      }
   }

   @media (max-width: 992px) {
      .solutions-grid {
         grid-template-columns: repeat(2, minmax(0, 1fr));
      }

      .ps-cta-box {
         grid-template-columns: 1fr;
      }

      .ps-cta-actions {
         flex-direction: row;
         flex-wrap: wrap;
      }
   }

   @media (max-width: 600px) {
      section {
         padding: 65px 0;
      }

      .ps-hero {
         padding: 95px 0 70px;
      }

      .ps-hero h1 {
         font-size: 2.1rem;
      }

      .ps-hero p {
         font-size: 1.05rem;
      }

      .ps-hero-features {
         grid-template-columns: 1fr;
      }

      .solutions-grid {
         grid-template-columns: 1fr;
      }

      .solution-body-grid {
         grid-template-columns: 1fr;
      }
   }

   @media (prefers-reduced-motion: reduce) {
      .fade-in {
         transition: none;
         transform: none;
      }

      .btn,
      .solution-card {
         transition: none;
      }

      .solution-card:hover,
      .btn:hover {
         transform: none;
      }
   }
</style>

<main class="projects-solutions-page">
   <!-- ХЛЕБНЫЕ КРОШКИ -->
   <div class="breadcrumbs">
      <div class="container">
         <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a> <span>/</span> <strong><?php echo esc_html( get_the_title() ); ?></strong>
      </div>
   </div>

   <!-- HERO -->
   <section class="ps-hero">
      <div class="container">
         <div class="ps-hero-grid">
            <div class="ps-hero-text">
               <div class="ps-kicker">
                  <i class="fas fa-compass"></i>
                  Проекты и решения под ключ
               </div>

               <h1>Проекты и решения</h1>
               <p>Подбираем и внедряем промышленное холодоснабжение с учётом отрасли и типа объекта. Закладываем резервирование, автоматизацию и сервисную поддержку — чтобы система работала стабильно 24/7.</p>

               <div class="ps-hero-features">
                  <div class="ps-feature">
                     <i class="fas fa-drafting-compass"></i>
                     <div>
                        <h4>Инжиниринг</h4>
                        <p>ТЗ, расчёты, схемы, подбор оборудования</p>
                     </div>
                  </div>
                  <div class="ps-feature">
                     <i class="fas fa-bolt"></i>
                     <div>
                        <h4>Энергоэффективность</h4>
                        <p>Оптимизация режимов, автоматика, free-cooling</p>
                     </div>
                  </div>
                  <div class="ps-feature">
                     <i class="fas fa-shield-alt"></i>
                     <div>
                        <h4>Надёжность</h4>
                        <p>Резервирование, мониторинг, аварийные сценарии</p>
                     </div>
                  </div>
                  <div class="ps-feature">
                     <i class="fas fa-tools"></i>
                     <div>
                        <h4>Сервис 24/7</h4>
                        <p>Регламент, выезд, ремонт, запасные части</p>
                     </div>
                  </div>
               </div>

               <div class="ps-hero-actions">
                  <a href="#solutions-by-industry" class="btn btn-light js-scroll"><i class="fas fa-layer-group"></i> По отраслям</a>
                  <a href="#solutions-by-object" class="btn btn-light-outline js-scroll"><i class="fas fa-cubes"></i> По типу объектов</a>
               </div>
            </div>

            <div class="ps-hero-form" id="ps-request">
               <h3>Обсудить проект</h3>
               <form class="form-tel">
                  <input type="hidden" name="formType" value="Проекты и решения — заявка">
                  <div class="form-group">
                     <label for="ps-name">Ваше имя *</label>
                     <input type="text" id="ps-name" name="name" class="form-control" placeholder="Иванов Иван" required>
                  </div>
                  <div class="form-group">
                     <label for="ps-phone">Телефон *</label>
                     <input type="tel" id="ps-phone" name="phone" class="form-control" placeholder="+7 (___) ___-__-__" required>
                  </div>
                  <div class="form-group">
                     <label for="ps-message">Кратко опишите задачу</label>
                     <textarea id="ps-message" name="message" class="form-control" rows="4" placeholder="Например: склад 3500 м², зона +2…+6°C, нужна система с резервом и удалённым мониторингом"></textarea>
                  </div>
                  <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Получить консультацию</button>
                  <div class="ps-form-note">
                     Или позвоните: <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>"><?php echo esc_html( $termoservis_phone_raw ); ?></a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>

   <!-- 1) ПО ОТРАСЛЯМ -->
   <section class="ps-section" id="solutions-by-industry">
      <div class="container">
         <div class="ps-section-intro">
            <h2 class="text-center">По отраслям</h2>
            <p>Готовые подходы под разные бизнес-процессы: от температурных зон и пиковых нагрузок до требований к мониторингу и непрерывности работы.</p>
         </div>

         <div class="solutions-grid">
            <details class="solution-card fade-in" id="industry-logistics">
               <summary>
                  <div class="solution-summary-top">
                     <div class="solution-icon"><i class="fas fa-warehouse"></i></div>
                     <div class="solution-title">
                        <h3>Логистика и складские комплексы</h3>
                        <p>Мультитемпературные зоны, высокая оборачиваемость и стабильный холод при любой погоде.</p>
                     </div>
                     <div class="solution-toggle" aria-hidden="true"><i class="fas fa-plus"></i></div>
                  </div>
                  <div class="solution-tags" aria-hidden="true">
                     <span class="solution-tag"><i class="fas fa-snowflake"></i> Мультитемпература</span>
                     <span class="solution-tag"><i class="fas fa-satellite-dish"></i> Мониторинг</span>
                     <span class="solution-tag"><i class="fas fa-chart-line"></i> Энергоучёт</span>
                  </div>
               </summary>
               <div class="solution-body">
                  <div class="solution-body-grid">
                     <div>
                        <h4>Типовые задачи</h4>
                        <ul class="solution-list">
                           <li>Стабильная температура при частых открываниях ворот.</li>
                           <li>Резервирование мощности и минимизация простоя.</li>
                           <li>Удалённый контроль параметров и тревоги.</li>
                           <li>Экономия энергии в разных режимах работы.</li>
                        </ul>
                     </div>
                     <div>
                        <h4>Что включаем</h4>
                        <ul class="solution-list">
                           <li>Подбор схемы (централь/распределённая) под планировку объекта.</li>
                           <li>Автоматика и сценарии (пики, ночь, аварийные режимы).</li>
                           <li>Мониторинг и логирование ключевых параметров.</li>
                           <li>Сервисный регламент и план расширения мощностей.</li>
                        </ul>
                     </div>
                  </div>
                  <div class="solution-cta">
                     <a href="#ps-request" class="btn btn-small js-scroll"><i class="fas fa-calculator"></i> Запросить расчёт</a>
                     <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-outline btn-small"><i class="fas fa-phone"></i> Позвонить</a>
                  </div>
               </div>
            </details>

            <details class="solution-card fade-in" id="industry-retail">
               <summary>
                  <div class="solution-summary-top">
                     <div class="solution-icon"><i class="fas fa-store"></i></div>
                     <div class="solution-title">
                        <h3>Торговые сети и ритейл</h3>
                        <p>Холод для витрин, складов и залов с минимальным уровнем шума и простоя.</p>
                     </div>
                     <div class="solution-toggle" aria-hidden="true"><i class="fas fa-plus"></i></div>
                  </div>
                  <div class="solution-tags" aria-hidden="true">
                     <span class="solution-tag"><i class="fas fa-stopwatch"></i> Быстрый монтаж</span>
                     <span class="solution-tag"><i class="fas fa-volume-down"></i> Тихая работа</span>
                     <span class="solution-tag"><i class="fas fa-wrench"></i> Сервис</span>
                  </div>
               </summary>
               <div class="solution-body">
                  <div class="solution-body-grid">
                     <div>
                        <h4>Типовые задачи</h4>
                        <ul class="solution-list">
                           <li>Стабильный режим для витрин и камер 24/7.</li>
                           <li>Минимизация аварий и потерь продукта.</li>
                           <li>Снижение эксплуатационных расходов.</li>
                           <li>Удобство обслуживания и доступность узлов.</li>
                        </ul>
                     </div>
                     <div>
                        <h4>Что включаем</h4>
                        <ul class="solution-list">
                           <li>Подбор агрегатов/централей под нагрузки и формат магазина.</li>
                           <li>Шумоизоляция, виброразвязка и правильное размещение.</li>
                           <li>Плановое ТО и оперативные выезды по регламенту.</li>
                           <li>Мониторинг и отчётность по ключевым параметрам.</li>
                        </ul>
                     </div>
                  </div>
                  <div class="solution-cta">
                     <a href="#ps-request" class="btn btn-small js-scroll"><i class="fas fa-paper-plane"></i> Получить предложение</a>
                     <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-outline btn-small"><i class="fas fa-phone"></i> Позвонить</a>
                  </div>
               </div>
            </details>

            <details class="solution-card fade-in" id="industry-pharma">
               <summary>
                  <div class="solution-summary-top">
                     <div class="solution-icon"><i class="fas fa-notes-medical"></i></div>
                     <div class="solution-title">
                        <h3>Фармацевтика и медицина</h3>
                        <p>Точная поддержка температуры, логирование и повышенные требования к надёжности.</p>
                     </div>
                     <div class="solution-toggle" aria-hidden="true"><i class="fas fa-plus"></i></div>
                  </div>
                  <div class="solution-tags" aria-hidden="true">
                     <span class="solution-tag"><i class="fas fa-clipboard-check"></i> Логирование</span>
                     <span class="solution-tag"><i class="fas fa-shield-alt"></i> Резерв</span>
                     <span class="solution-tag"><i class="fas fa-user-shield"></i> Контроль</span>
                  </div>
               </summary>
               <div class="solution-body">
                  <div class="solution-body-grid">
                     <div>
                        <h4>Типовые задачи</h4>
                        <ul class="solution-list">
                           <li>Узкие диапазоны температуры и минимальные отклонения.</li>
                           <li>Тревоги, журналирование и отчётность для контроля качества.</li>
                           <li>Бесперебойность работы и резервирование критических узлов.</li>
                           <li>Планирование обслуживания без остановки объекта.</li>
                        </ul>
                     </div>
                     <div>
                        <h4>Что включаем</h4>
                        <ul class="solution-list">
                           <li>Системы с резервом (N+1) и аварийными сценариями.</li>
                           <li>Диспетчеризация, удалённый доступ и протоколирование.</li>
                           <li>Подбор компонентов под требования эксплуатации и сервиса.</li>
                           <li>Сервисная поддержка по согласованному SLA.</li>
                        </ul>
                     </div>
                  </div>
                  <div class="solution-cta">
                     <a href="#ps-request" class="btn btn-small js-scroll"><i class="fas fa-headset"></i> Получить консультацию</a>
                     <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-outline btn-small"><i class="fas fa-phone"></i> Позвонить</a>
                  </div>
               </div>
            </details>
         </div>
      </div>
   </section>

   <!-- 2) ПО ТИПУ ОБЪЕКТОВ -->
   <section class="ps-section ps-section--alt" id="solutions-by-object">
      <div class="container">
         <div class="ps-section-intro">
            <h2 class="text-center">По типу объектов</h2>
            <p>Подбираем архитектуру системы и состав оборудования под конкретный объект — от отдельных камер до централизованных систем холодоснабжения и технологических линий.</p>
         </div>

         <div class="solutions-grid">
            <details class="solution-card fade-in" id="object-cold-rooms">
               <summary>
                  <div class="solution-summary-top">
                     <div class="solution-icon"><i class="fas fa-snowflake"></i></div>
                     <div class="solution-title">
                        <h3>Холодильные камеры</h3>
                        <p>Камеры хранения, заморозки, экспедиции и технологические зоны с точным режимом.</p>
                     </div>
                     <div class="solution-toggle" aria-hidden="true"><i class="fas fa-plus"></i></div>
                  </div>
                  <div class="solution-tags" aria-hidden="true">
                     <span class="solution-tag"><i class="fas fa-thermometer-half"></i> Точный режим</span>
                     <span class="solution-tag"><i class="fas fa-door-open"></i> Ворота/завесы</span>
                     <span class="solution-tag"><i class="fas fa-cogs"></i> Автоматика</span>
                  </div>
               </summary>
               <div class="solution-body">
                  <div class="solution-body-grid">
                     <div>
                        <h4>Типовые задачи</h4>
                        <ul class="solution-list">
                           <li>Поддержка режима при высокой влажности и нагрузках.</li>
                           <li>Корректные оттайки и снижение обмерзания.</li>
                           <li>Безопасность продукта и защита от аварий.</li>
                           <li>Удобный сервисный доступ и обслуживание.</li>
                        </ul>
                     </div>
                     <div>
                        <h4>Что включаем</h4>
                        <ul class="solution-list">
                           <li>Расчёт теплопритоков и подбор агрегатов/ВО/автоматики.</li>
                           <li>Настройка режимов, защит и аварийных сценариев.</li>
                           <li>Пусконаладка и обучение персонала.</li>
                           <li>Плановое ТО и сервисное сопровождение.</li>
                        </ul>
                     </div>
                  </div>
                  <div class="solution-cta">
                     <a href="#ps-request" class="btn btn-small js-scroll"><i class="fas fa-calculator"></i> Рассчитать камеру</a>
                     <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-outline btn-small"><i class="fas fa-phone"></i> Позвонить</a>
                  </div>
               </div>
            </details>

            <details class="solution-card fade-in" id="object-central-systems">
               <summary>
                  <div class="solution-summary-top">
                     <div class="solution-icon"><i class="fas fa-network-wired"></i></div>
                     <div class="solution-title">
                        <h3>Централизованные системы холодоснабжения</h3>
                        <p>Единая система на объект: распределение холода, резервирование и диспетчеризация.</p>
                     </div>
                     <div class="solution-toggle" aria-hidden="true"><i class="fas fa-plus"></i></div>
                  </div>
                  <div class="solution-tags" aria-hidden="true">
                     <span class="solution-tag"><i class="fas fa-project-diagram"></i> Архитектура</span>
                     <span class="solution-tag"><i class="fas fa-shield-alt"></i> N+1</span>
                     <span class="solution-tag"><i class="fas fa-chart-pie"></i> Экономия</span>
                  </div>
               </summary>
               <div class="solution-body">
                  <div class="solution-body-grid">
                     <div>
                        <h4>Типовые задачи</h4>
                        <ul class="solution-list">
                           <li>Управляемая система для разных потребителей холода.</li>
                           <li>Стабильные параметры при изменении нагрузки.</li>
                           <li>Прозрачная эксплуатация: аварии, отчёты, мониторинг.</li>
                           <li>Оптимизация CAPEX/OPEX на жизненном цикле.</li>
                        </ul>
                     </div>
                     <div>
                        <h4>Что включаем</h4>
                        <ul class="solution-list">
                           <li>Проектирование схем, трасс и автоматики.</li>
                           <li>Резервирование, секционирование и аварийные переключения.</li>
                           <li>Диспетчеризация и интеграция с инженерными системами.</li>
                           <li>Оптимизация режимов и регламент сервиса.</li>
                        </ul>
                     </div>
                  </div>
                  <div class="solution-cta">
                     <a href="#ps-request" class="btn btn-small js-scroll"><i class="fas fa-paper-plane"></i> Запросить проект</a>
                     <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-outline btn-small"><i class="fas fa-phone"></i> Позвонить</a>
                  </div>
               </div>
            </details>

            <details class="solution-card fade-in" id="object-production-lines">
               <summary>
                  <div class="solution-summary-top">
                     <div class="solution-icon"><i class="fas fa-industry"></i></div>
                     <div class="solution-title">
                        <h3>Производственные линии</h3>
                        <p>Охлаждение технологических процессов: стабильность параметров и защита оборудования.</p>
                     </div>
                     <div class="solution-toggle" aria-hidden="true"><i class="fas fa-plus"></i></div>
                  </div>
                  <div class="solution-tags" aria-hidden="true">
                     <span class="solution-tag"><i class="fas fa-sliders-h"></i> Точное управление</span>
                     <span class="solution-tag"><i class="fas fa-microchip"></i> Интеграция</span>
                     <span class="solution-tag"><i class="fas fa-sync-alt"></i> Непрерывность</span>
                  </div>
               </summary>
               <div class="solution-body">
                  <div class="solution-body-grid">
                     <div>
                        <h4>Типовые задачи</h4>
                        <ul class="solution-list">
                           <li>Повторяемость параметров и качество продукции.</li>
                           <li>Защита оборудования от перегрева, контроль расхода.</li>
                           <li>Интеграция в автоматику и режимы производства.</li>
                           <li>Плановое обслуживание без простоев линии.</li>
                        </ul>
                     </div>
                     <div>
                        <h4>Что включаем</h4>
                        <ul class="solution-list">
                           <li>Подбор чиллеров/агрегатов и насосных групп.</li>
                           <li>Гидравлическая схема, буфер, фильтрация теплоносителя.</li>
                           <li>Мониторинг, уставки и аварийные алгоритмы.</li>
                           <li>Сервисная стратегия и запас критических компонентов.</li>
                        </ul>
                     </div>
                  </div>
                  <div class="solution-cta">
                     <a href="#ps-request" class="btn btn-small js-scroll"><i class="fas fa-headset"></i> Обсудить линию</a>
                     <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-outline btn-small"><i class="fas fa-phone"></i> Позвонить</a>
                  </div>
               </div>
            </details>
         </div>
      </div>
   </section>

   <!-- CTA -->
   <section class="ps-section ps-cta">
      <div class="container">
         <div class="ps-cta-box">
            <div>
               <h3 style="margin-bottom:10px;">Нужно решение под ваш объект?</h3>
               <p>Опишите задачу — мы предложим архитектуру системы, состав оборудования и предварительную оценку сроков и бюджета.</p>
            </div>
            <div class="ps-cta-actions">
               <a href="#ps-request" class="btn btn-small js-scroll"><i class="fas fa-paper-plane"></i> Оставить заявку</a>
               <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-outline btn-small"><i class="fas fa-phone"></i> Позвонить</a>
            </div>
         </div>
      </div>
   </section>
</main>

<?php
$projects_solutions_schema = array(
   '@context' => 'https://schema.org',
   '@type' => 'WebPage',
   'name' => 'Проекты и решения',
   'description' => 'Проекты и решения по промышленному холодоснабжению: по отраслям и по типу объектов. Инжиниринг, внедрение, сервис 24/7.',
   'url' => get_permalink(),
   'inLanguage' => 'ru-RU',
   'publisher' => array(
      '@type' => 'Organization',
      'name' => get_bloginfo( 'name' ),
      'url' => home_url( '/' ),
      'telephone' => $termoservis_phone_tel,
   ),
);
?>

<script type="application/ld+json">
   <?php echo wp_json_encode( $projects_solutions_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>
</script>

<script>
   document.addEventListener('DOMContentLoaded', function () {
      // Анимация появления при скролле
      const fadeElements = document.querySelectorAll('.fade-in');

      function fadeInOnScroll() {
         fadeElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < window.innerHeight - elementVisible) {
               element.classList.add('visible');
            }
         });
      }

      window.addEventListener('scroll', fadeInOnScroll);
      fadeInOnScroll();

      // Плавный скролл по якорям (только наши ссылки)
      document.querySelectorAll('.js-scroll').forEach(link => {
         link.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (!href || href.charAt(0) !== '#') return;

            const target = document.querySelector(href);
            if (!target) return;

            e.preventDefault();
            const offset = 90; // sticky header
            const y = target.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({ top: y, behavior: 'smooth' });
         });
      });

      // Аккордеон: открытая карточка закрывает остальные
      const cards = document.querySelectorAll('details.solution-card');
      cards.forEach(card => {
         card.addEventListener('toggle', () => {
            if (!card.open) return;
            cards.forEach(other => {
               if (other !== card) other.removeAttribute('open');
            });
         });
      });
   });
</script>

<?php get_footer(); ?>
