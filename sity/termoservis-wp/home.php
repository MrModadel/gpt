<?php

/**
 * Template Name: Главная страница
 * 
 * @package Termoservis
 */

get_header();
function get_custom_or_term_link($term, $custom_links = array())
{
   if (is_object($term) && isset($term->slug)) {
      $slug = $term->slug;
   } else {
      $slug = (string) $term;
   }

   // 1) кастомная ссылка (заданы в массиве)
   if (isset($custom_links[$slug]) && $custom_links[$slug] !== '') {
      return home_url($custom_links[$slug]);
   }

   // 2) если есть страница с таким slug — ведём на страницу
   $page = get_page_by_path($slug);
   if ($page && ! is_wp_error($page)) {
      return get_permalink($page);
   }

   // 3) fallback — простая ссылка по slug в корне сайта
   return home_url('/' . $slug . '/');
}
$custom_links = array(
   'standard-chiller-line' => '/industrial-chillers/',
);
?>
<!-- ===== ОСНОВНОЙ КОНТЕНТ ===== -->
<main>
   <!-- ===== 2. ГЛАВНЫЙ ЭКРАН ===== -->
   <section class="hero-section">
      <div class="container">
         <div class="hero-content">
            <div class="hero-text">
               <h1>Проектируем и производим промышленные холодильные системы под ключ</h1>
               <p>От расчета тепловой нагрузки до пусконаладки. Индивидуальные решения для бизнеса, где важен точный холод. Работаем по всей России.</p>

               <div class="hero-advantages">
                  <div class="hero-advantage">
                     <i class="fas fa-calculator"></i>
                     <div>
                        <h4>Расчет за 24 часа</h4>
                        <p>Подберем оптимальную конфигурацию под вашу задачу и бюджет</p>
                     </div>
                  </div>
                  <div class="hero-advantage">
                     <i class="fas fa-shield-alt"></i>
                     <div>
                        <h4>Гарантия 3 года</h4>
                        <p>На собственное производство. Сервисные центры в ключевых регионах</p>
                     </div>
                  </div>
                  <div class="hero-advantage">
                     <i class="fas fa-industry"></i>
                     <div>
                        <h4>Собственное производство</h4>
                        <p>Полный контроль качества на всех этапах изготовления</p>
                     </div>
                  </div>
                  <div class="hero-advantage">
                     <i class="fas fa-map-marked-alt"></i>
                     <div>
                        <h4>Опыт с 2010 года</h4>
                        <p>Более 500 реализованных проектов по всей России</p>
                     </div>
                  </div>
               </div>
            </div>

            <div class="hero-form" id="main-form">
               <h3>Бесплатный расчет вашего проекта</h3>
               <form class="form-tel">
                  <div class="form-group">
                     <label for="name">Ваше имя *</label>
                     <input type="text" id="name" name="name" placeholder="Иванов Иван" required>
                  </div>
                  <div class="form-group">
                     <label for="phone">Телефон *</label>
                     <input type="tel" id="phone" name="phone" placeholder="+7 (___) ___-__-__" required>
                  </div>
                  <div class="form-group">
                     <label for="task">Опишите вашу задачу</label>
                     <textarea id="task" name="message" placeholder="Например: нужно охладить цех площадью 200 м² до температуры +4°C..."></textarea>
                  </div>
                  <button type="submit" class="btn">
                     <i class="fas fa-paper-plane"></i> Получить коммерческое предложение
                  </button>
                  <p style="margin-top:15px; font-size:0.85rem; color:#666; text-align:center;">
                     Нажимая кнопку, вы соглашаетесь с <a href="#" style="color:#0056b8;">политикой конфиденциальности</a>
                  </p>
               </form>
            </div>
         </div>
      </div>
   </section>

   <!-- ===== 3. КАТАЛОГ ===== -->
   <section class="catalog-section" id="catalog">
      <div class="container">
         <div class="catalog-intro">
            <h2>Промышленное холодильное оборудование от производителя</h2>
            <p>Ознакомьтесь с нашими серийными моделями или закажите разработку уникального решения. В каталоге — только проверенное оборудование на компонентах мировых брендов.</p>
         </div>

         <div class="categories-grid">
            <?php
            // Показываем только три конкретные категории по slug
            $category_slugs = array('industrial-chillers', 'refrigeration-units', 'special-way-of-solving');
            $badges = array('ХИТ ПРОДАЖ', 'НАДЕЖНОСТЬ', 'ИНДИВИДУАЛЬНО');

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
                              <a href="<?php echo get_custom_or_term_link($subcat->slug, $custom_links); ?>" class="card-link">
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
                        <a href="#main-form" class="btn">Обсудить решение</a>
                     <?php
                     } else {
                     ?>
                        <a href="<?php echo get_page_or_term_link($category); ?>" class="btn">
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

         <div class="text-center" style="margin-top: 30px;">
            <a href="./catalog/" class="btn">Перейти в полный каталог</a>
         </div>
      </div>
   </section>

   <!-- ===== 4. О КОМПАНИИ ===== -->
   <section class="about-section" id="about">
      <div class="container about-container">
         <div class="about-image">
            <img src="http://termo63.beget.tech/wp-content/uploads/2026/01/full_OcvEgkXX.webp" alt="Наше производство">
         </div>

         <div class="about-content">
            <h2>ТЕРМОСИСТЕМЫ-С: холод как точная технология для вашего бизнеса</h2>

            <p><strong>Что мы предлагаем?</strong> Мы проектируем, производим и обслуживаем промышленные холодильные системы и чиллеры для предприятий, где температура — критический параметр технологического процесса.</p>

            <p><strong>Кто наши клиенты?</strong> Наши клиенты — это технологи и директора мясных и молочных комбинатов, складов заморозки, химических производств и металлообрабатывающих цехов, которые устали от простоев из-за ненадежного оборудования и ищут ответственного партнера.</p>

            <p><strong>Наша философия</strong> — мы инженеры-холодильщики по призванию. Наша миссия — создавать системы, которые работают годами без сбоев. Поэтому мы вкладываемся в современное оборудование цеха, обучаем специалистов и используем только лучшие компоненты. Наш рост — это успехи наших клиентов.</p>

            <div class="about-cta">
               <a href="#main-form" class="btn">
                  <i class="fas fa-handshake"></i> Стать нашим клиентом
               </a>
            </div>
         </div>
      </div>
   </section>

   <!-- ===== 5. МАРКЕТИНГ-КИТ ===== -->
   <section class="marketing-kit" id="marketing-kit">
      <div class="container">
         <h2>Начать работу с нами — просто</h2>
         <p class="text-center mb-40" style="max-width:800px; margin:0 auto 40px; color:#666; font-size:1.1rem;">
            Мы выстроили четкий процесс, чтобы сэкономить ваше время и обеспечить полное понимание на каждом этапе — от запроса до запуска системы.
         </p>

         <div class="kit-steps">
            <div class="kit-step">
               <div class="step-header">
                  <div class="step-number">1</div>
                  <h3>Свяжитесь с нами</h3>
               </div>
               <p>Заполните форму или позвоните по телефону <strong>+7 (927) 001-38-85</strong>. Так будет быстрее — мы сразу обсудим детали и сориентируем по срокам и бюджету.</p>
               <p><strong>Режим работы:</strong> Пн-Пт, 9:00-18:00</p>

               <form class="form-tel">
                  <div class="form-group">
                     <input type="text" name="name" placeholder="Ваше имя" required>
                  </div>
                  <div class="form-group">
                     <input type="tel" name="phone" placeholder="Ваш телефон" required>
                  </div>
                  <button type="submit" class="btn" style="width:100%;">Позвоните мне</button>
               </form>
            </div>

            <div class="kit-step">
               <div class="step-header">
                  <div class="step-number">2</div>
                  <h3>Что подготовить для диалога</h3>
               </div>
               <p>Чтобы подбор оборудования был точным, будьте готовы ответить на ключевые вопросы:</p>
               <ul style="color:#666; padding-left:20px; margin-bottom:20px;">
                  <li>1. Какой объект нужно охладить (цех, реактор, ТПА)?</li>
                  <li>2. Какие температурные режимы требуются?</li>
                  <li>3. Какие сроки реализации проекта?</li>
                  <li>4. Есть ли техническое задание или проект?</li>
               </ul>
               <p>Это поможет нам подготовить точное коммерческое предложение.</p>
            </div>

            <div class="kit-step">
               <div class="step-header">
                  <div class="step-number">3</div>
                  <h3>Вы получаете надежного партнера</h3>
               </div>
               <p>Мы благодарим каждого клиента за доверие. Наша работа на этом не заканчивается — мы обеспечиваем гарантийную и постгарантийную поддержку, помогаем с монтажом и обслуживанием.</p>
               <p>Если вы еще не с нами, сделайте первый шаг — заполните форму связи или позвоните нам прямо сейчас.</p>
               <div style="margin-top:25px;">
                  <a href="#main-form" class="btn" style="width:100%; text-align:center;">
                     <i class="fas fa-user-plus"></i> Стать нашим клиентом
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- ===== 6. FAQ ===== -->
   <section class="faq-section" id="faq">
      <div class="container">
         <h2>Часто задаваемые вопросы</h2>
         <p class="mb-40" style="color:#666; font-size:1.1rem; max-width:800px;">
            Мы собрали ответы на самые популярные вопросы о подборе, производстве и обслуживании промышленных холодильных систем.
         </p>

         <div class="faq-container">
            <div class="faq-list">
               <div class="faq-item">
                  <div class="faq-question">
                     Как происходит расчет стоимости чиллера?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>Расчет проводится на основе технического задания. Мы учитываем: требуемую холодопроизводительность, температуру на входе/выходе, тип охлаждения (воздушное/водяное), климатические условия эксплуатации и дополнительные требования.</p>
                  </div>
               </div>

               <div class="faq-item">
                  <div class="faq-question">
                     Какие бренды компрессоров вы используете и почему?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>Мы работаем с надежными брендами, которые зарекомендовали себя на рынке промышленного холодильного оборудования. Эти бренды отличаются надежностью, энергоэффективностью и наличием сервисной поддержки по всей России.</p>
                  </div>
               </div>

               <div class="faq-item">
                  <div class="faq-question">
                     Выполняете ли вы монтаж «под ключ» в других регионах?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>Да, мы выполняем монтажные работы по всей России. Наши специалисты выезжают на объект, проводят монтаж, пусконаладку и обучение персонала. Предоставляем полный пакет документов и гарантию на монтажные работы.</p>
                  </div>
               </div>

               <div class="faq-item">
                  <div class="faq-question">
                     Какова гарантия на оборудование?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>На оборудование собственного производства — гарантия до 3 лет. На комплектующие — согласно гарантии производителя. На монтажные работы — гарантия 2 года. Также предоставляем постгарантийное обслуживание.</p>
                  </div>
               </div>

               <div class="faq-item">
                  <div class="faq-question">
                     Можно ли модернизировать существующую холодильную установку?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>Да, мы проводим модернизацию и реконструкцию существующего холодильного оборудования. Это может включать замену компрессоров, установку современных контроллеров, повышение энергоэффективности системы.</p>
                  </div>
               </div>
            </div>

            <div class="faq-form">
               <div style="background:white; padding:30px; border-radius:10px; box-shadow:0 10px 25px rgba(0,0,0,0.05);">
                  <h3>Не нашли ответ?</h3>
                  <p style="margin-bottom:25px; color:#666;">Задайте свой вопрос нашему инженеру. Ответим в течение часа в рабочее время.</p>

                  <form class="form-tel">
                     <div class="form-group">
                        <input type="text" name="name" placeholder="Ваше имя" required>
                     </div>
                     <div class="form-group">
                        <input type="tel" name="phone" placeholder="Ваш телефон" required>
                     </div>
                     <div class="form-group">
                        <textarea name="message" placeholder="Ваш вопрос" rows="4" required></textarea>
                     </div>
                     <button type="submit" class="btn" style="width:100%;">
                        <i class="fas fa-question-circle"></i> Задать вопрос
                     </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- ===== 7. ПРОЕКТЫ ===== -->
   <section class="projects-section" id="projects">
      <div class="container">
         <h2>Реализованные проекты</h2>
         <p class="mb-40" style="color:#666; font-size:1.1rem; max-width:800px;">
            Ознакомьтесь с примерами наших работ в различных отраслях промышленности.
         </p>

         <div class="projects-grid">
            <?php
            $args = array(
               'posts_per_page' => 3,
               'post_type' => 'post',
               'orderby' => 'date',
               'order' => 'DESC',
            );
            $projects_query = new WP_Query($args);

            if ($projects_query->have_posts()) :
               while ($projects_query->have_posts()) :
                  $projects_query->the_post();
                  $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                  if (! $featured_image) {
                     $featured_image = 'https://images.iimg.live/images/amazing-shot-8342.webp&auto=format&fit=crop&w=600&q=80';
                  }
            ?>
                  <div class="project-card">
                     <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>">
                     <div class="project-card-content">
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" style="color:#0056b8; font-weight:600;">Подробнее о проекте →</a>
                     </div>
                  </div>
            <?php
               endwhile;
               wp_reset_postdata();
            else :
               echo '<p>Нет опубликованных проектов.</p>';
            endif;
            ?>
         </div>

         <div class="text-center" style="margin-top:50px;">
            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn btn-outline">Смотреть все проекты</a>
         </div>
      </div>
   </section>

   <!-- ===== 8. КОНТАКТЫ ===== -->
   <section id="contacts" style="background-color:#f8f9fa;">
      <div class="container">
         <h2>Контакты</h2>
         <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:40px; margin-top:30px;">
            <div>
               <h3>Наши реквизиты</h3>
               <p><strong>Адрес:</strong> <?php echo get_theme_mod('termoservis_address', 'г. Самара, ул. Заводская, 42'); ?></p>
               <p><strong>Телефон:</strong> <a href="tel:<?php echo get_theme_mod('termoservis_phone', '+79270013885'); ?>"><?php echo get_theme_mod('termoservis_phone', '+7 (927) 001-38-85'); ?></a></p>
               <p><strong>Email:</strong> <a href="mailto:<?php echo get_theme_mod('termoservis_email', 'info@termoservice63.ru'); ?>"><?php echo get_theme_mod('termoservis_email', 'info@termoservice63.ru'); ?></a></p>
               <p><strong>Режим работы:</strong> <?php echo get_theme_mod('termoservis_work_time', 'Пн-Пт: 9:00-18:00'); ?></p>
            </div>
            <div>
               <h3>Формы обратной связи</h3>
               <p>Выберите подходящую форму для вашего запроса:</p>
               <ul style="color:#666; margin-top:15px;">
                  <li><a href="#" style="color:#0056b8;">Опросный лист подбора чиллера</a></li>
                  <li><a href="#" style="color:#0056b8;">Подбор генератора ледяной воды</a></li>
                  <li><a href="#" style="color:#0056b8;">Подбор воздухоохладителя</a></li>
                  <li><a href="#" style="color:#0056b8;">Заявка на сервисное обслуживание</a></li>
               </ul>
            </div>
         </div>
      </div>
   </section>

   <!-- ===== 9. SEO-ТЕКСТ ===== -->
   <section class="seo-section">
      <div class="container seo-content">
         <h2>ТЕРМОСИСТЕМЫ-С — надежный партнер в промышленном холодоснабжении</h2>

         <p>Компания «ТЕРМОСИСТЕМЫ-С» с 2010 года специализируется на проектировании, производстве и внедрении промышленных холодильных систем для различных отраслей экономики. Наша география работы охватывает всю территорию России и страны СНГ, что позволяет нам успешно реализовывать проекты любой сложности в Москве, Санкт-Петербурге, Самаре, Екатеринбурге, Новосибирске и других городах.</p>

         <p>Мы работаем с ключевыми отраслями, где требуется надежное и точное холодоснабжение: пищевая промышленность (мясные и молочные комбинаты, рыбоперерабатывающие предприятия, овощехранилища), химическая промышленность (реакторы, производство пластмасс), металлообработка (пресс-формы, экструдеры, ТПА), логистика и складские комплексы, фармацевтика, а также серверные помещения и ЦОДы.</p>

         <p>Наша философия строится на индивидуальном подходе к каждому клиенту. Мы не просто продаем оборудование — мы предлагаем комплексные решения, которые включают тепловой расчет, проектирование, производство, поставку, монтаж и сервисное обслуживание. Использование качественных компонентов в сочетании с собственным производством позволяет нам контролировать качество на всех этапах и предлагать конкурентные цены.</p>

         <p>Если вы ищете, где купить промышленный чиллер, хотите заказать холодильную систему для производства или нуждаетесь в модернизации существующего оборудования — обратитесь к нашим специалистам. Мы проведем бесплатный расчет вашего проекта в течение 24 часов и подготовим коммерческое предложение, которое точно соответствует вашим техническим требованиям и бюджету. На все оборудование собственного производства предоставляем расширенную гарантию до 3 лет и полное сервисное сопровождение.</p>
      </div>
   </section>
</main>

<?php get_footer(); ?>
<script>
   /**
    * Termoservis Theme Main JS
    * 
    * @package Termoservis
    */

   document.addEventListener('DOMContentLoaded', function() {
      // FAQ functionality
      initFAQ();

      // Smooth scrolling for anchor links
      initSmoothScroll();

      // Mobile menu functionality
      initMobileMenu();
   });

   /**
    * Initialize FAQ toggle functionality
    */
   function initFAQ() {
      const faqQuestions = document.querySelectorAll('.faq-question');

      faqQuestions.forEach(question => {
         question.addEventListener('click', function() {
            // Close all other answers
            document.querySelectorAll('.faq-answer.active').forEach(answer => {
               answer.classList.remove('active');
               answer.previousElementSibling.classList.remove('active');
            });

            // Toggle current answer
            const answer = this.nextElementSibling;
            if (answer && answer.classList.contains('faq-answer')) {
               answer.classList.toggle('active');
               this.classList.toggle('active');
            }
         });
      });
   }

   /**
    * Initialize smooth scrolling for anchor links
    */
   function initSmoothScroll() {
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
         anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');

            if (targetId === '#' || targetId === '') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
               e.preventDefault();
               window.scrollTo({
                  top: targetElement.offsetTop - 100,
                  behavior: 'smooth'
               });
            }
         });
      });
   }

   /**
    * Initialize mobile menu functionality
    */
   function initMobileMenu() {
      if (window.innerWidth <= 768) {
         const dropdownParents = document.querySelectorAll('.has-dropdown');

         dropdownParents.forEach(parent => {
            const link = parent.querySelector('a');

            if (link) {
               link.addEventListener('click', function(e) {
                  if (window.innerWidth <= 768) {
                     e.preventDefault();
                     e.stopPropagation();

                     // Close other menus
                     dropdownParents.forEach(otherParent => {
                        if (otherParent !== parent) {
                           const otherMenu = otherParent.querySelector('.dropdown-menu');
                           if (otherMenu) {
                              otherMenu.classList.remove('active');
                           }
                        }
                     });

                     // Toggle current menu
                     const menu = parent.querySelector('.dropdown-menu');
                     if (menu) {
                        menu.classList.toggle('active');
                     }
                  }
               });
            }
         });

         // Close menu when clicking outside
         document.addEventListener('click', function(e) {
            if (!e.target.closest('.has-dropdown')) {
               document.querySelectorAll('.dropdown-menu.active').forEach(menu => {
                  menu.classList.remove('active');
               });
            }
         });
      }
   }

   /**
    * Handle window resize
    */
   window.addEventListener('resize', function() {
      if (window.innerWidth > 768) {
         // Remove active class on desktop
         document.querySelectorAll('.dropdown-menu.active').forEach(menu => {
            menu.classList.remove('active');
         });
      }
   });
</script>