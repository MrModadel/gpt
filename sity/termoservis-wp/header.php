<?php

/**
 * Header Template
 * 
 * @package Termoservis
 */

$contacts_url = home_url('/contacts/');
$contacts_pages = get_pages(
   array(
      'meta_key'    => '_wp_page_template',
      'meta_value'  => 'page-contacts.php',
      'number'      => 1,
      'post_status' => 'publish',
   )
);

if (! empty($contacts_pages)) {
   $contacts_url = get_permalink($contacts_pages[0]->ID);
}

$user_agreement_url = home_url('/__user_agreement/');
$privacy_policy_url = home_url('/__privacy_policy/');

$declaration_url = home_url('/declaration-of-conformity/');
$declaration_pages = get_pages(
   array(
      'meta_key'    => '_wp_page_template',
      'meta_value'  => 'page-declaration-of-conformity.php',
      'number'      => 1,
      'post_status' => 'publish',
   )
);

if (! empty($declaration_pages)) {
   $declaration_url = get_permalink($declaration_pages[0]->ID);
}

$blog_url   = home_url('/blog/');
$blog_pages = get_pages(
   array(
      'meta_key'    => '_wp_page_template',
      'meta_value'  => 'page-blog.php',
      'number'      => 1,
      'post_status' => 'publish',
   )
);

if (! empty($blog_pages)) {
   $blog_url = get_permalink($blog_pages[0]->ID);
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php wp_head(); ?>
   <style>
      .modal-menu .has-dropdown:has(.dropdown-menu:not(.active))>a::before {
         width: 0% !important;
      }

      .modal-menu .has-dropdown:has(.dropdown-menu:not(.active))>a::after {
         transform: translateY(-50%) rotate(0deg);
      }

      .modal-menu .has-dropdown:has(.dropdown-menu:not(.active))>a {
         background-color: transparent;
         color: #444 ;
      }
   </style>
</head>

<body <?php body_class(); ?>>
   <?php wp_body_open(); ?>

   <!-- ===== ШАПКА С ПОЛНЫМ МЕНЮ ===== -->
   <header class="main-header">
      <div class="container header-top">
         <div class="logo">
            <i class="fas fa-snowflake"></i>
            <?php bloginfo('name'); ?>
            <div class="logo-text"><?php bloginfo('description'); ?></div>
         </div>
         <div class="contact-header --desktop-only">
            <div class="phone-block">
               <a href="tel:<?php echo get_theme_mod('termoservis_phone', '+79270013885'); ?>">
                  <?php echo get_theme_mod('termoservis_phone', '+7 (927) 001-38-85'); ?>
               </a>
               <div class="work-time"><?php echo get_theme_mod('termoservis_work_time', 'Пн-Пт: 9:00-18:00, Сб-Вс: выходной'); ?></div>
            </div>
            <div class="header-cta">
               <a href="#marketing-kit" class="btn"><i class="fas fa-file-alt"></i> Получить КП</a>
            </div>
         </div>
         <div class="burger-header --mobile-only">
            <button class="burger-menu">
               <span></span>
               <span></span>
               <span></span>
            </button>
         </div>
      </div>
      <nav class="main-nav">
         <div class="container nav-container --desktop-only">
            <ul class="nav-links">
               <li><a href="/"><i class="fas fa-home"></i> Главная</a></li>

               <!-- КАТАЛОГ ОБОРУДОВАНИЯ -->
               <li class="has-dropdown">
                  <a href="/catalog/"><i class="fas fa-sitemap"></i> Каталог</a>
                  <div class="dropdown-menu catalog-dropdown">
                     <!-- Левая колонка -->
                     <div class="dropdown-column catalog-dropdown">
                        <h4><i class="fas fa-industry"></i> Промышленные чиллеры</h4>
                        <ul>
                           <li><a href="/condenser-cooling-types/"><i class="fas fa-fan"></i> По типу охлаждения конденсатора</a></li>
                           <li><a href="/air-cooled-chillers/"><i class="fas fa-fan"></i> Чиллеры с воздушным охлаждением</a></li>
                           <li><a href="/air-cooled-chillers/"><i class="fas fa-cubes"></i> Модульные чиллеры</a></li>
                           <li><a href="/air-cooled-chillers/"><i class="fas fa-external-link-alt"></i> Чиллеры с выносным конденсатором</a></li>
                           <li><a href="/water-cooled-chillers/"><i class="fas fa-tint"></i> Чиллеры с водяным охлаждением</a></li>
                           <li><a href="/specialized-chillers/"><i class="fas fa-cog"></i> Специализированные и нестандартные чиллеры</a></li>
                           <li><a href="/ekstruderov/"><i class="fas fa-compress-alt"></i> Для экструдеров</a></li>
                           <li><a href="/dlya-tpa-termoplastavtomatov/"><i class="fas fa-dice-d20"></i> Для ТПА (термопластавтоматов)</a></li>
                           <li><a href="/dlya-press-form/"><i class="fas fa-dice-d20"></i> Для пресс-форм</a></li>
                           <li><a href="/dlya-reaktorov/"><i class="fas fa-flask"></i> Для реакторов</a></li>
                           <li><a href="/dlya-pishhevoj-promyshlennosti-moloko-napitki-maslo/"><i class="fas fa-utensils"></i> Для пищевой промышленности</a></li>
                           <li><a href="/chiller-s-frikulingom/"><i class="fas fa-snowflake"></i> Чиллер с фрикулингом</a></li>
                           <li><a href="/nestandartnogo-ispolneniya-pod-zakaz/"><i class="fas fa-cogs"></i> Нестандартного исполнения (под заказ)</a></li>
                        </ul>
                     </div>

                     <!-- Центральная колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-cogs"></i> Компоненты и модули для чиллеров</h4>
                        <ul>
                           <li><a href="/gidromoduli-gidrokoful/"><i class="fas fa-water"></i> Гидромодули (гидрокофуль)</a></li>
                           <li><a href="/elementy-sistemy-upravleniya/"><i class="fas fa-tachometer-alt"></i> Элементы системы управления</a></li>
                        </ul>

                        <h4><i class="fas fa-compress-arrows-alt"></i> Холодильные агрегаты</h4>
                        <ul>
                           <li><a href="/agregaty-na-kompressorah-refcomp/"><i class="fas fa-cog"></i> Агрегаты на компрессорах RefComp</a></li>
                           <li><a href="/agregaty-na-kompressorah-frascold/"><i class="fas fa-cog"></i> Агрегаты на компрессорах Frascold</a></li>
                           <li><a href="/srednetemperaturnye-agregaty/"><i class="fas fa-temperature-low"></i> Среднетемпературные агрегаты</a></li>
                           <li><a href="/nizkotemperaturnye-agregaty/"><i class="fas fa-snowflake"></i> Низкотемпературные агрегаты</a></li>
                           <li><a href="/agregaty-dlya-hraneniya/"><i class="fas fa-warehouse"></i> Агрегаты для хранения</a></li>
                           <li><a href="/agregaty-dlya-hraneniya/"><i class="fas fa-apple-alt"></i> Для овощей и фруктов</a></li>
                           <li><a href="/agregaty-dlya-hraneniya/"><i class="fas fa-drumstick-bite"></i> Для мяса и рыбы</a></li>
                        </ul>
                     </div>

                     <!-- Правая колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-ice-cream"></i> Промышленные льдоаккумуляторы</h4>
                        <ul>
                           <li><a href="/generatory-ledyanoj-vody/"><i class="fas fa-ice-cream"></i> Генераторы ледяной воды</a></li>
                        </ul>

                        <h4><i class="fas fa-tools"></i> Дополнительное оборудование</h4>
                        <ul>
                           <li><a href="/promyshlennye-ldoakkumulyatory/я"><i class="fas fa-snowflake"></i> Льдоаккумуляторы</a></li>

                        </ul>
                     </div>
                  </div>
               </li>

               <!-- УСЛУГИ -->
               <li class="has-dropdown">
                  <a href="/uslugi/"><i class="fas fa-cogs"></i> Услуги</a>
                  <div class="dropdown-menu services-dropdown">
                     <!-- Левая колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-drafting-compass"></i> Инженерные услуги</h4>
                        <ul>
                           <li><a href="/inzhenernye-uslugi/"><i class="fas fa-drafting-compass"></i> Проектирование холодильных систем</a></li>
                           <li><a href="/inzhenernye-uslugi/"><i class="fas fa-calculator"></i> Теплотехнический расчет</a></li>
                           <li><a href="/inzhenernye-uslugi/"><i class="fas fa-clipboard-check"></i> Индивидуальный подбор оборудования</a></li>
                        </ul>

                        <h4><i class="fas fa-tools"></i> Монтаж и пусконаладка</h4>
                        <ul>
                           <li><a href="/montazh-i-puskonaladka/"><i class="fas fa-tools"></i> Монтаж холодильного оборудования</a></li>
                           <li><a href="/montazh-i-puskonaladka/"><i class="fas fa-play-circle"></i> Пусконаладочные работы</a></li>
                           <li><a href="/montazh-i-puskonaladka/"><i class="fas fa-hard-hat"></i> Шеф-монтаж</a></li>
                        </ul>
                     </div>

                     <!-- Центральная колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-clipboard-list"></i> Сервис и обслуживание</h4>
                        <ul>
                           <li><a href="/servis-i-obsluzhivanie/"><i class="fas fa-clipboard-list"></i> Техническое обслуживание</a></li>
                           <li><a href="/servis-i-obsluzhivanie/"><i class="fas fa-wrench"></i> Ремонт холодильного оборудования</a></li>
                           <li><a href="/servis-i-obsluzhivanie/"><i class="fas fa-ambulance"></i> Аварийный выезд</a></li>
                        </ul>

                        <h4><i class="fas fa-shipping-fast"></i> Поставка компонентов</h4>
                        <ul>
                           <li><a href="#"><i class="fas fa-shipping-fast"></i> Со склада в Самаре</a></li>
                           <li><a href="#"><i class="fas fa-clock"></i> Под заказ</a></li>
                        </ul>
                     </div>

                     <!-- Правая колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-hands-helping"></i> Дополнительные услуги</h4>
                        <ul>
                           <li><a href="/dopolnitelnye-uslugi/"><i class="fas fa-graduation-cap"></i> Обучение персонала</a></li>
                           <li><a href="/dopolnitelnye-uslugi/"><i class="fas fa-history"></i> Диагностика и профилактика</a></li>
                           <li><a href="/dopolnitelnye-uslugi/"><i class="fas fa-file-contract"></i> Сервисные контракты</a></li>
                        </ul>
                     </div>
                  </div>
               </li>

               <!-- ПРОЕКТЫ И РЕШЕНИЯ -->
               <li class="has-dropdown">
                  <a href="#projects"><i class="fas fa-industry"></i> Проекты</a>
                  <div class="dropdown-menu projects-dropdown dropdown-column">
                     <h4><i class="fas fa-clinic-medical"></i> По отраслям</h4>
                     <ul>
                        <li><a href="/proekty-i-resheniya/#solutions-by-industry"><i class="fas fa-truck-moving"></i> Логистика и складские комплексы</a></li>
                        <li><a href="/proekty-i-resheniya/#solutions-by-industry"><i class="fas fa-shopping-cart"></i> Торговые сети и ритейл</a></li>
                        <li><a href="/proekty-i-resheniya/#solutions-by-industry"><i class="fas fa-pills"></i> Фармацевтика и медицина</a></li>
                     </ul>

                     <h4><i class="fas fa-archive"></i> По типу объектов</h4>
                     <ul>
                        <li><a href="/proekty-i-resheniya/#solutions-by-object"><i class="fas fa-archive"></i> Холодильные камеры</a></li>
                        <li><a href="/proekty-i-resheniya/#solutions-by-object"><i class="fas fa-network-wired"></i> Централизованные системы холодоснабжения</a></li>
                        <li><a href="/proekty-i-resheniya/#solutions-by-object"><i class="fas fa-conveyor-belt"></i> Производственные линии</a></li>
                     </ul>
                  </div>
               </li>

               <!-- О КОМПАНИИ -->
               <li class="has-dropdown">
                  <a href="#about"><i class="fas fa-info-circle"></i> О компании</a>
                  <div class="dropdown-menu about-dropdown">
                     <ul>
                        <li><a href="/o-kompanii/#history"><i class="fas fa-history"></i> История и опыт</a></li>
                        <li><a href="/o-kompanii/#production"><i class="fas fa-industry"></i> Производство</a></li>
                        <li><a href="/o-kompanii/#certificates"><i class="fas fa-certificate"></i> Лицензии и сертификаты</a></li>
                        <li><a href="/o-kompanii/#vacancies"><i class="fas fa-briefcase"></i> Вакансии</a></li>
                     </ul>
                  </div>
               </li>

               <!-- КОНТАКТЫ -->
               <li class="has-dropdown">
                  <a href="<?php echo esc_url($contacts_url); ?>"><i class="fas fa-address-book"></i> Контакты</a>
                  <div class="dropdown-menu contacts-dropdown dropdown-column">
                     <ul>
                        <li><a href="<?php echo esc_url($contacts_url . '#requisites'); ?>"><i class="fas fa-file-contract"></i> Реквизиты</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#map'); ?>"><i class="fas fa-map-marked-alt"></i> Карта и схема проезда</a></li>
                     </ul>

                     <h4><i class="fas fa-clipboard-list"></i> Формы обратной связи</h4>
                     <ul>
                        <li><a href="<?php echo esc_url($contacts_url . '#chiller-survey'); ?>"><i class="fas fa-question-circle"></i> Опросный лист подбора чиллера</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#ice-water-generator'); ?>"><i class="fas fa-snowflake"></i> Подбор генератора ледяной воды</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#aircooler'); ?>"><i class="fas fa-wind"></i> Подбор воздухоохладителя</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#service-request'); ?>"><i class="fas fa-tools"></i> Заявка на сервисное обслуживание</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#cold-room'); ?>"><i class="fas fa-igloo"></i> Подбор холодильной камеры</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#refrigeration-unit'); ?>"><i class="fas fa-compress-arrows-alt"></i> Подбор холодильного агрегата</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#managers'); ?>"><i class="fas fa-user-tie"></i> Контактные данные менеджеров</a></li>
                     </ul>
                  </div>
               </li>

               <!-- БЛОГ -->
               <li class="has-dropdown">
                  <a href="<?php echo esc_url($blog_url); ?>"><i class="fas fa-newspaper"></i> Блог / Статьи</a>
                  <div class="dropdown-menu blog-dropdown">
                     <ul>
                        <li><a href="<?php echo esc_url($blog_url . '#company-news'); ?>"><i class="fas fa-newspaper"></i> Новости компании</a></li>
                        <li><a href="<?php echo esc_url($blog_url . '#technical-articles'); ?>"><i class="fas fa-file-alt"></i> Технические статьи</a></li>
                        <li><a href="<?php echo esc_url($blog_url . '#cases-reviews'); ?>"><i class="fas fa-project-diagram"></i> Кейсы и обзоры</a></li>
                     </ul>
                  </div>
               </li>

               <!-- ДОКУМЕНТЫ -->
               <li class="has-dropdown documents-menu">
                  <a href="#"><i class="fas fa-folder"></i> Документы</a>
                  <div class="dropdown-menu documents-dropdown dropdown-column">
                     <ul>
                        <li><a href="<?php echo esc_url($declaration_url); ?>"><i class="fas fa-award"></i> Декларации о соответствии</a></li>
                        <li><a href="<?php echo esc_url($user_agreement_url); ?>"><i class="fas fa-file-signature"></i> Пользовательское соглашение</a></li>
                        <li><a href="<?php echo esc_url($privacy_policy_url); ?>"><i class="fas fa-user-shield"></i> Политика конфиденциальности</a></li>
                     </ul>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
      <div class="modal-menu ">
         <div class="modal-menu__container">
            <ul class="nav-links">
               <li><a href="/"><i class="fas fa-home"></i> Главная</a></li>

               <!-- КАТАЛОГ ОБОРУДОВАНИЯ -->
               <li class="has-dropdown">
                  <a href="/catalog/"><i class="fas fa-sitemap"></i> Каталог</a>
                  <div class="dropdown-menu catalog-dropdown">
                     <!-- Левая колонка -->
                     <div class="dropdown-column catalog-dropdown">
                        <h4><i class="fas fa-industry"></i> Промышленные чиллеры</h4>
                        <ul>
                           <li><a href="/condenser-cooling-types/"><i class="fas fa-fan"></i> По типу охлаждения конденсатора</a></li>
                           <li><a href="/air-cooled-chillers/"><i class="fas fa-fan"></i> Чиллеры с воздушным охлаждением</a></li>
                           <li><a href="/air-cooled-chillers/"><i class="fas fa-cubes"></i> Модульные чиллеры</a></li>
                           <li><a href="/air-cooled-chillers/"><i class="fas fa-external-link-alt"></i> Чиллеры с выносным конденсатором</a></li>
                           <li><a href="/water-cooled-chillers/"><i class="fas fa-tint"></i> Чиллеры с водяным охлаждением</a></li>
                           <li><a href="/specialized-chillers/"><i class="fas fa-cog"></i> Специализированные и нестандартные чиллеры</a></li>
                           <li><a href="/ekstruderov/"><i class="fas fa-compress-alt"></i> Для экструдеров</a></li>
                           <li><a href="/dlya-tpa-termoplastavtomatov/"><i class="fas fa-dice-d20"></i> Для ТПА (термопластавтоматов)</a></li>
                           <li><a href="/dlya-press-form/"><i class="fas fa-dice-d20"></i> Для пресс-форм</a></li>
                           <li><a href="/dlya-reaktorov/"><i class="fas fa-flask"></i> Для реакторов</a></li>
                           <li><a href="/dlya-pishhevoj-promyshlennosti-moloko-napitki-maslo/"><i class="fas fa-utensils"></i> Для пищевой промышленности</a></li>
                           <li><a href="/chiller-s-frikulingom/"><i class="fas fa-snowflake"></i> Чиллер с фрикулингом</a></li>
                           <li><a href="/nestandartnogo-ispolneniya-pod-zakaz/"><i class="fas fa-cogs"></i> Нестандартного исполнения (под заказ)</a></li>
                        </ul>
                     </div>

                     <!-- Центральная колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-cogs"></i> Компоненты и модули для чиллеров</h4>
                        <ul>
                           <li><a href="/gidromoduli-gidrokoful/"><i class="fas fa-water"></i> Гидромодули (гидрокофуль)</a></li>
                           <li><a href="/elementy-sistemy-upravleniya/"><i class="fas fa-tachometer-alt"></i> Элементы системы управления</a></li>
                        </ul>

                        <h4><i class="fas fa-compress-arrows-alt"></i> Холодильные агрегаты</h4>
                        <ul>
                           <li><a href="/agregaty-na-kompressorah-refcomp/"><i class="fas fa-cog"></i> Агрегаты на компрессорах RefComp</a></li>
                           <li><a href="/agregaty-na-kompressorah-frascold/"><i class="fas fa-cog"></i> Агрегаты на компрессорах Frascold</a></li>
                           <li><a href="/srednetemperaturnye-agregaty/"><i class="fas fa-temperature-low"></i> Среднетемпературные агрегаты</a></li>
                           <li><a href="/nizkotemperaturnye-agregaty/"><i class="fas fa-snowflake"></i> Низкотемпературные агрегаты</a></li>
                           <li><a href="/agregaty-dlya-hraneniya/"><i class="fas fa-warehouse"></i> Агрегаты для хранения</a></li>
                           <li><a href="/agregaty-dlya-hraneniya/"><i class="fas fa-apple-alt"></i> Для овощей и фруктов</a></li>
                           <li><a href="/agregaty-dlya-hraneniya/"><i class="fas fa-drumstick-bite"></i> Для мяса и рыбы</a></li>
                        </ul>
                     </div>

                     <!-- Правая колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-ice-cream"></i> Промышленные льдоаккумуляторы</h4>
                        <ul>
                           <li><a href="/generatory-ledyanoj-vody/"><i class="fas fa-ice-cream"></i> Генераторы ледяной воды</a></li>
                        </ul>

                        <h4><i class="fas fa-tools"></i> Дополнительное оборудование</h4>
                        <ul>
                           <li><a href="/promyshlennye-ldoakkumulyatory/я"><i class="fas fa-snowflake"></i> Льдоаккумуляторы</a></li>

                        </ul>
                     </div>
                  </div>
               </li>

               <!-- УСЛУГИ -->
               <li class="has-dropdown">
                  <a href="/uslugi/"><i class="fas fa-cogs"></i> Услуги</a>
                  <div class="dropdown-menu services-dropdown">
                     <!-- Левая колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-drafting-compass"></i> Инженерные услуги</h4>
                        <ul>
                           <li><a href="/inzhenernye-uslugi/"><i class="fas fa-drafting-compass"></i> Проектирование холодильных систем</a></li>
                           <li><a href="/inzhenernye-uslugi/"><i class="fas fa-calculator"></i> Теплотехнический расчет</a></li>
                           <li><a href="/inzhenernye-uslugi/"><i class="fas fa-clipboard-check"></i> Индивидуальный подбор оборудования</a></li>
                        </ul>

                        <h4><i class="fas fa-tools"></i> Монтаж и пусконаладка</h4>
                        <ul>
                           <li><a href="/montazh-i-puskonaladka/"><i class="fas fa-tools"></i> Монтаж холодильного оборудования</a></li>
                           <li><a href="/montazh-i-puskonaladka/"><i class="fas fa-play-circle"></i> Пусконаладочные работы</a></li>
                           <li><a href="/montazh-i-puskonaladka/"><i class="fas fa-hard-hat"></i> Шеф-монтаж</a></li>
                        </ul>
                     </div>

                     <!-- Центральная колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-clipboard-list"></i> Сервис и обслуживание</h4>
                        <ul>
                           <li><a href="/servis-i-obsluzhivanie/"><i class="fas fa-clipboard-list"></i> Техническое обслуживание</a></li>
                           <li><a href="/servis-i-obsluzhivanie/"><i class="fas fa-wrench"></i> Ремонт холодильного оборудования</a></li>
                           <li><a href="/servis-i-obsluzhivanie/"><i class="fas fa-ambulance"></i> Аварийный выезд</a></li>
                        </ul>

                        <h4><i class="fas fa-shipping-fast"></i> Поставка компонентов</h4>
                        <ul>
                           <li><a href="#"><i class="fas fa-shipping-fast"></i> Со склада в Самаре</a></li>
                           <li><a href="#"><i class="fas fa-clock"></i> Под заказ</a></li>
                        </ul>
                     </div>

                     <!-- Правая колонка -->
                     <div class="dropdown-column">
                        <h4><i class="fas fa-hands-helping"></i> Дополнительные услуги</h4>
                        <ul>
                           <li><a href="/dopolnitelnye-uslugi/"><i class="fas fa-graduation-cap"></i> Обучение персонала</a></li>
                           <li><a href="/dopolnitelnye-uslugi/"><i class="fas fa-history"></i> Диагностика и профилактика</a></li>
                           <li><a href="/dopolnitelnye-uslugi/"><i class="fas fa-file-contract"></i> Сервисные контракты</a></li>
                        </ul>
                     </div>
                  </div>
               </li>

               <!-- ПРОЕКТЫ И РЕШЕНИЯ -->
               <li class="has-dropdown">
                  <a href="#projects"><i class="fas fa-industry"></i> Проекты</a>
                  <div class="dropdown-menu projects-dropdown dropdown-column">
                     <h4><i class="fas fa-clinic-medical"></i> По отраслям</h4>
                     <ul>
                        <li><a href="/proekty-i-resheniya/#solutions-by-industry"><i class="fas fa-truck-moving"></i> Логистика и складские комплексы</a></li>
                        <li><a href="/proekty-i-resheniya/#solutions-by-industry"><i class="fas fa-shopping-cart"></i> Торговые сети и ритейл</a></li>
                        <li><a href="/proekty-i-resheniya/#solutions-by-industry"><i class="fas fa-pills"></i> Фармацевтика и медицина</a></li>
                     </ul>

                     <h4><i class="fas fa-archive"></i> По типу объектов</h4>
                     <ul>
                        <li><a href="/proekty-i-resheniya/#solutions-by-object"><i class="fas fa-archive"></i> Холодильные камеры</a></li>
                        <li><a href="/proekty-i-resheniya/#solutions-by-object"><i class="fas fa-network-wired"></i> Централизованные системы холодоснабжения</a></li>
                        <li><a href="/proekty-i-resheniya/#solutions-by-object"><i class="fas fa-conveyor-belt"></i> Производственные линии</a></li>
                     </ul>
                  </div>
               </li>

               <!-- О КОМПАНИИ -->
               <li class="has-dropdown">
                  <a href="#about"><i class="fas fa-info-circle"></i> О компании</a>
                  <div class="dropdown-menu about-dropdown">
                     <ul>
                        <li><a href="/o-kompanii/#history"><i class="fas fa-history"></i> История и опыт</a></li>
                        <li><a href="/o-kompanii/#production"><i class="fas fa-industry"></i> Производство</a></li>
                        <li><a href="/o-kompanii/#certificates"><i class="fas fa-certificate"></i> Лицензии и сертификаты</a></li>
                        <li><a href="/o-kompanii/#vacancies"><i class="fas fa-briefcase"></i> Вакансии</a></li>
                     </ul>
                  </div>
               </li>

               <!-- КОНТАКТЫ -->
               <li class="has-dropdown">
                  <a href="<?php echo esc_url($contacts_url); ?>"><i class="fas fa-address-book"></i> Контакты</a>
                  <div class="dropdown-menu contacts-dropdown dropdown-column">
                     <ul>
                        <li><a href="<?php echo esc_url($contacts_url . '#requisites'); ?>"><i class="fas fa-file-contract"></i> Реквизиты</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#map'); ?>"><i class="fas fa-map-marked-alt"></i> Карта и схема проезда</a></li>
                     </ul>

                     <h4><i class="fas fa-clipboard-list"></i> Формы обратной связи</h4>
                     <ul>
                        <li><a href="<?php echo esc_url($contacts_url . '#chiller-survey'); ?>"><i class="fas fa-question-circle"></i> Опросный лист подбора чиллера</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#ice-water-generator'); ?>"><i class="fas fa-snowflake"></i> Подбор генератора ледяной воды</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#aircooler'); ?>"><i class="fas fa-wind"></i> Подбор воздухоохладителя</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#service-request'); ?>"><i class="fas fa-tools"></i> Заявка на сервисное обслуживание</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#cold-room'); ?>"><i class="fas fa-igloo"></i> Подбор холодильной камеры</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#refrigeration-unit'); ?>"><i class="fas fa-compress-arrows-alt"></i> Подбор холодильного агрегата</a></li>
                        <li><a href="<?php echo esc_url($contacts_url . '#managers'); ?>"><i class="fas fa-user-tie"></i> Контактные данные менеджеров</a></li>
                     </ul>
                  </div>
               </li>

               <!-- БЛОГ -->
               <li class="has-dropdown">
                  <a href="<?php echo esc_url($blog_url); ?>"><i class="fas fa-newspaper"></i> Блог / Статьи</a>
                  <div class="dropdown-menu blog-dropdown">
                     <ul>
                        <li><a href="<?php echo esc_url($blog_url . '#company-news'); ?>"><i class="fas fa-newspaper"></i> Новости компании</a></li>
                        <li><a href="<?php echo esc_url($blog_url . '#technical-articles'); ?>"><i class="fas fa-file-alt"></i> Технические статьи</a></li>
                        <li><a href="<?php echo esc_url($blog_url . '#cases-reviews'); ?>"><i class="fas fa-project-diagram"></i> Кейсы и обзоры</a></li>
                     </ul>
                  </div>
               </li>

               <!-- ДОКУМЕНТЫ -->
               <li class="has-dropdown documents-menu">
                  <a href="#"><i class="fas fa-folder"></i> Документы</a>
                  <div class="dropdown-menu documents-dropdown dropdown-column">
                     <ul>
                        <li><a href="<?php echo esc_url($declaration_url); ?>"><i class="fas fa-award"></i> Декларации о соответствии</a></li>
                        <li><a href="<?php echo esc_url($user_agreement_url); ?>"><i class="fas fa-file-signature"></i> Пользовательское соглашение</a></li>
                        <li><a href="<?php echo esc_url($privacy_policy_url); ?>"><i class="fas fa-user-shield"></i> Политика конфиденциальности</a></li>
                     </ul>
                  </div>
               </li>
            </ul>
            <div class="contact-header ">
               <div class="phone-block">
                  <a href="tel:<?php echo get_theme_mod('termoservis_phone', '+79270013885'); ?>">
                     <?php echo get_theme_mod('termoservis_phone', '+7 (927) 001-38-85'); ?>
                  </a>
                  <div class="work-time"><?php echo get_theme_mod('termoservis_work_time', 'Пн-Пт: 9:00-18:00, Сб-Вс: выходной'); ?></div>
               </div>
               <div class="header-cta">
                  <a href="#marketing-kit" class="btn"><i class="fas fa-file-alt"></i> Получить КП</a>
               </div>
            </div>
            <div class="burger-menu__close">
               X
            </div>
         </div>
      </div>
   </header>