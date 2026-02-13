<?php

/**
 * Template Name: Политика конфиденциальности
 *
 * @package Termoservis
 */

$theme_uri   = get_template_directory_uri();
$hero_bg_url = $theme_uri . '/img/convertio.in_photo-1581094794329-c8112a89af12.webp';

get_header();
?>

<style>
   .legal-page {
      --primary: #0056b8;
      --text: #333333;
      --muted: #666666;
      --bg: #f8f9fa;
      --card: #ffffff;
      --border: rgba(0, 0, 0, 0.08);
      --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      --radius: 14px;
   }

   .legal-page .breadcrumbs {
      background-color: #f8f9fa;
      padding: 15px 0;
      font-size: 0.9rem;
      border-bottom: 1px solid #eee;
   }

   .legal-page .breadcrumbs a {
      color: var(--primary);
   }

   .legal-page .breadcrumbs a:hover {
      text-decoration: underline;
   }

   .legal-page .breadcrumbs span {
      color: #666;
      margin: 0 8px;
   }

   .legal-hero {
      background:
         linear-gradient(105deg, rgba(0, 86, 184, 0.92) 0%, rgba(0, 86, 184, 0.78) 100%),
         url('<?php echo esc_url($hero_bg_url); ?>') center/cover no-repeat;
      color: #ffffff;
      padding: 90px 0 50px;
      position: relative;
      overflow: hidden;
   }

   .legal-hero:before {
      content: '';
      position: absolute;
      inset: 0;
      background:
         radial-gradient(1200px 600px at 10% 15%, rgba(255, 255, 255, 0.14), transparent 60%),
         radial-gradient(900px 520px at 85% 10%, rgba(0, 0, 0, 0.18), transparent 60%);
      pointer-events: none;
   }

   .legal-hero .container {
      position: relative;
      z-index: 1;
   }

   .legal-kicker {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 10px 16px;
      background: rgba(255, 255, 255, 0.12);
      border: 1px solid rgba(255, 255, 255, 0.18);
      border-radius: 999px;
      font-weight: 700;
      margin-bottom: 14px;
   }

   .legal-hero h1 {
      color: #ffffff;
      text-align: left;
      margin: 0 0 10px;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
   }

   .legal-hero p {
      font-size: 1.08rem;
      opacity: 0.95;
      line-height: 1.75;
      margin: 0;
      max-width: 75ch;
   }

   .legal-content {
      background: var(--bg);
      padding: 70px 0;
   }

   .legal-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 34px;
   }

   .legal-text {
      color: var(--text);
      line-height: 1.85;
      font-size: 1.02rem;
   }

   .legal-text h2,
   .legal-text h3,
   .legal-text h4 {
      color: #222;
      margin-top: 26px;
      margin-bottom: 14px;
      line-height: 1.35;
   }

   .legal-text p {
      margin: 0 0 14px;
   }

   .legal-text ol,
   .legal-text ul {
      margin: 10px 0 18px;
      padding-left: 1.2rem;
   }

   .legal-text li {
      margin-bottom: 8px;
   }

   .legal-text a {
      color: var(--primary);
      text-decoration: underline;
   }

   .legal-empty {
      padding: 18px;
      border-radius: 12px;
      border: 2px dashed rgba(0, 86, 184, 0.35);
      background: rgba(0, 86, 184, 0.06);
      color: #0f2f5d;
      margin-bottom: 18px;
   }

   .legal-empty strong {
      display: block;
      margin-bottom: 6px;
   }

   @media (max-width: 768px) {
      .legal-card {
         padding: 22px;
      }
   }
</style>

<main class="legal-page" id="privacy-policy">
   <div class="breadcrumbs">
      <div class="container">
         <a href="<?php echo esc_url(home_url('/')); ?>">Главная</a> <span>/</span> <strong><?php echo esc_html(get_the_title()); ?></strong>
      </div>
   </div>

   <section class="legal-hero">
      <div class="container">
         <div class="legal-kicker">
            <i class="fas fa-user-shield"></i>
            Документы
         </div>
         <h1><?php echo esc_html(get_the_title()); ?></h1>

      </div>
   </section>

   <section class="legal-content">
      <div class="container">
         <div class="legal-card">
            <div class="legal-text">

               <div class="legal-empty">
                  <div>Настоящая Политика конфиденциальности является составной частью Пользовательского соглашения Сайта и действует в отношении всей информации, в том числе персональных данных Пользователя, получаемых Администрацией Сайта в процессе работы Пользователя с Сайтом, исполнения Пользовательского соглашения и соглашений между Администрацией сайта и Пользователем. Использование Сайта означает безоговорочное согласие Пользователя с настоящей Политикой конфиденциальности и указанными в ней условиями обработки его персональных данных; в случае несогласия с этими условиями Пользователь должен воздержаться от использования Сайта.
                     Перед использованием Сайта Пользователю необходимо внимательно изучить настоящую Политику конфиденциальности.</div>
               </div>

               <div class="legal-empty">
                  <strong>Персональные данные </strong>
                  <div>
                     <ol>
                        <li>Предоставление в любой форме (регистрация на Сайте, осуществление заказов, подписка на рекламные рассылки и тд.) своих персональных данных Администрации сайта, Пользователь выражает согласие на обработку персональных данных Администрацией сайта в соответствии с Федеральным законом “О персональных данных” от 27.07.2006 №152-ФЗ. </li>
                        <li>Обработка персональных данных осуществляется в целях исполнения Пользовательского соглашения и иных соглашений между Администрацией сайта и Пользователем. </li>
                        <li>Обработка персональных данных производится исключительно на территории Российской Федерации, с соблюдением действующего законодательства Российской Федерации.</li>
                        <li>Согласие Пользователя на обработку его персональных данных дается Администрации сайта на срок исполнения обязательств между Пользователем и Администрацией сайта в рамках Пользовательского соглашения или других соглашений между Пользователем и Администрацией сайта.</li>
                        <li>В случае отзыва согласия на обработку персональных данных Пользователя, Пользователь уведомляет об этом Администрацию Сайта письменно или по электронной почте. После получения данного уведомления Администрация Сайта прекращает обработку персональных данных Пользователя и удаляет. </li>
                        <li>Сайт не имеет статуса оператора персональных данных. Персональные данные Пользователя не передаются каким-либо третьим лицам, за исключением случаев, прямо предусмотренных настоящей Политикой конфиденциальности. </li>

                     </ol>
                  </div>
               </div>

               <div class="legal-empty">
                  <strong>Меры по защите персональных данных
                  </strong>
                  <div>
                     <ol>
                        <li>В своей деятельности Администрация сайта руководствуется Федеральным законом “О персональных данных” от 27.07.2006 №152-ФЗ. </li>
                        <li>Администрация сайта принимает все разумные меры по защите персональных данных Пользователей и соблюдает права субъектов персональных данных, установленные действующим законодательством Российской Федерации. </li>
                        <li>Защита персональных данных Пользователя осуществляется с использованием физических, технических и административных мероприятий, нацеленных на предотвращение риска потери, неправильного использования, несанкционированного доступа, нарушения конфиденциальности и изменения данных. Меры обеспечения безопасности включают в себя межсетевую защиту и шифрование данных, контроль физического доступа к центрам обработки данных, а также контроль полномочий на доступ к данным.
                        </li>

                     </ol>
                  </div>
               </div>
               <div class="legal-empty">
                  <strong>Изменение политики конфиденциальности

                  </strong>
                  <div>
                     <ol>
                        <li>Администрация сайта оставляет за собой право в одностороннем порядке вносить любые изменения в Политику конфиденциальности без предварительного уведомления Пользователя. Актуальный текст Политики конфиденциальности размещен на данной странице.
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>

<?php get_footer(); ?>