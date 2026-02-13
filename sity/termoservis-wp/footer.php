    <div class="modal " id="projectModal">
       <div class="modal-content">
          <button class="modal-close" id="closeProjectModal">
             <i class="fas fa-times"></i>
          </button>
          <div class="modal-header">
             <h3 style="color:white; margin:0;">Обсуждение проекта</h3>
             <p style="opacity:0.9; margin:10px 0 0;">Оставьте контакты, и наш инженер свяжется для консультации</p>
          </div>
          <form class="modal-body form-tel">
             <div class="form-group">
                <label>Ваше имя *</label>
                <input type="text" class="form-control" id="modalProjectName" name="name" placeholder="Иванов Иван">
             </div>
             <div class="form-group">
                <label>Телефон *</label>
                <input type="tel" class="form-control" id="modalProjectPhone" name="phone" placeholder="+7 (___) ___-__-__" required>
             </div>
             <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="modalProjectEmail" name="email" placeholder="ivanov@company.ru">
             </div>
             <div class="form-group">
                <label>Комментарий к проекту</label>
                <textarea class="form-control" id="modalProjectComment" name="message" rows="3" placeholder="Опишите вашу задачу..."></textarea>
             </div>
             <button class="btn" style="width:100%;" id="submitProjectRequest">
                <i class="fas fa-paper-plane"></i> Отправить запрос
             </button>
          </form>
       </div>
    </div>

    <!-- СТИКИ-ВИДЖЕТ -->
    <div class="sticky-widget" id="stickyWidget">
       <div class="widget-header">
          <button class="widget-close" id="closeWidget" aria-label="Закрыть"><i class="fas fa-times"></i></button>
          <h4>Нужен быстрый подбор?</h4>
          <p>Оставьте телефон — инженер перезвонит и уточнит параметры</p>
       </div>
       <div class="widget-content">
          <div class="widget-features">
             <div class="widget-feature"><i class="fas fa-check"></i> Подбор по расчету и совместимости</div>
             <div class="widget-feature"><i class="fas fa-check"></i> Аналоги под срок/стоимость</div>
             <div class="widget-feature"><i class="fas fa-check"></i> Спецификация и КП</div>
          </div>
          <form class="form-tel">
             <input type="hidden" name="formType" value="Компоненты и модули — быстрый звонок">
             <div class="form-row">
                <div class="form-group">
                   <label>Телефон *</label>
                   <input class="form-control" type="tel" name="phone" placeholder="+7 (___) ___-__-__" required>
                </div>
                <div class="form-group">
                   <label>Комментарий</label>
                   <input class="form-control" type="text" name="message" placeholder="Коротко: что подобрать?">
                </div>
             </div>
             <button type="submit" class="btn" style="width:100%;"><i class="fas fa-phone"></i> Заказать звонок</button>
          </form>
    </div>
    </div>
    <!-- ===== ПОДВАЛ ===== -->
    <?php
    $contacts_url   = home_url( '/contacts/' );
    $contacts_pages = get_pages(
       array(
          'meta_key'    => '_wp_page_template',
          'meta_value'  => 'page-contacts.php',
          'number'      => 1,
          'post_status' => 'publish',
       )
    );

    if ( ! empty( $contacts_pages ) ) {
       $contacts_url = get_permalink( $contacts_pages[0]->ID );
    }

    $blog_url   = home_url( '/blog/' );
    $blog_pages = get_pages(
       array(
          'meta_key'    => '_wp_page_template',
          'meta_value'  => 'page-blog.php',
          'number'      => 1,
          'post_status' => 'publish',
       )
    );

    if ( ! empty( $blog_pages ) ) {
       $blog_url = get_permalink( $blog_pages[0]->ID );
    }

    $declaration_url   = home_url( '/declaration-of-conformity/' );
    $declaration_pages = get_pages(
       array(
          'meta_key'    => '_wp_page_template',
          'meta_value'  => 'page-declaration-of-conformity.php',
          'number'      => 1,
          'post_status' => 'publish',
       )
    );

    if ( ! empty( $declaration_pages ) ) {
       $declaration_url = get_permalink( $declaration_pages[0]->ID );
    }

    $termoservis_address   = get_theme_mod( 'termoservis_address', 'г. Самара, ул. Заводская, 42' );
    $termoservis_phone_raw = get_theme_mod( 'termoservis_phone', '+7 (927) 001-38-85' );
    $termoservis_phone_tel = preg_replace( '/[^\d+]/', '', $termoservis_phone_raw );
    ?>
    <footer class="main-footer">
       <div class="container">
          <div class="footer-content">
             <div class="footer-about">
                <div class="footer-logo">
                   <i class="fas fa-snowflake"></i>
                   <?php bloginfo('name'); ?>
                </div>
                <p><?php echo get_theme_mod('termoservis_footer_text', 'Производство и комплексное внедрение промышленных холодильных систем. Надежные решения для вашего бизнеса с 2010 года.'); ?></p>

                <div class="social-links">
                   <?php
                     $telegram = get_theme_mod('termoservis_telegram', '#');
                     $whatsapp = get_theme_mod('termoservis_whatsapp', '#');
                     $vk = get_theme_mod('termoservis_vk', '#');
                     $youtube = get_theme_mod('termoservis_youtube', '#');

                     if ($telegram !== '#') {
                        echo '<a href="' . esc_url($telegram) . '" title="Telegram"><i class="fab fa-telegram"></i></a>';
                     }
                     if ($whatsapp !== '#') {
                        echo '<a href="' . esc_url($whatsapp) . '" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>';
                     }
                     if ($vk !== '#') {
                        echo '<a href="' . esc_url($vk) . '" title="ВКонтакте"><i class="fab fa-vk"></i></a>';
                     }
                     if ($youtube !== '#') {
                        echo '<a href="' . esc_url($youtube) . '" title="YouTube"><i class="fab fa-youtube"></i></a>';
                     }
                     ?>
                </div>
             </div>

             <div class="footer-links">
                <h4>Разделы сайта</h4>
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                   <?php
                     wp_nav_menu(
                        array(
                           'theme_location' => 'footer',
                           'menu_class'     => 'footer-menu',
                           'container'      => false,
                           'fallback_cb'    => false,
                           'depth'          => 1,
                        )
                     );
                     ?>
                <?php else : ?>
                   <ul class="footer-menu">
                      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a></li>
                      <li><a href="<?php echo esc_url( home_url( '/catalog/' ) ); ?>">Каталог</a></li>
                      <li><a href="<?php echo esc_url( home_url( '/uslugi/' ) ); ?>">Услуги</a></li>
                      <li><a href="<?php echo esc_url( home_url( '/o-kompanii/' ) ); ?>">О компании</a></li>
                      <li><a href="<?php echo esc_url( $blog_url ); ?>">Блог / Статьи</a></li>
                      <li><a href="<?php echo esc_url( $contacts_url ); ?>">Контакты</a></li>
                   </ul>
                <?php endif; ?>
             </div>

             <div class="footer-contacts">
                <h4>Контакты</h4>
                <p>
                   <i class="fas fa-map-marker-alt"></i>
                   <a href="<?php echo esc_url( $contacts_url . '#map' ); ?>"><?php echo esc_html( $termoservis_address ); ?></a>
                </p>
                <p>
                   <i class="fas fa-phone"></i>
                   <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>">
                      <?php echo esc_html( $termoservis_phone_raw ); ?>
                   </a>
                </p>
                <p>
                   <i class="fas fa-envelope"></i>
                   <a href="mailto:<?php echo get_theme_mod('termoservis_email', 'info@termoservice63.ru'); ?>">
                      <?php echo get_theme_mod('termoservis_email', 'info@termoservice63.ru'); ?>
                   </a>
                </p>
                <p>
                   <i class="far fa-clock"></i>
                   <?php echo get_theme_mod('termoservis_work_time', 'Пн-Пт: 9:00-18:00, Сб-Вс: выходной'); ?>
                </p>
             </div>
          </div>

          <div class="footer-bottom">
             <p>&copy; <?php echo date('Y'); ?> «<?php bloginfo('name'); ?>». Все права защищены.</p>
             <p style="margin-top:10px;">
                <a href="<?php echo esc_url( home_url( '/__privacy_policy/' ) ); ?>">Политика конфиденциальности</a> |
                <a href="<?php echo esc_url( home_url( '/__user_agreement/' ) ); ?>">Пользовательское соглашение</a> |
                <a href="<?php echo esc_url( $declaration_url ); ?>">Декларации о соответствии</a>
             </p>
          </div>
       </div>
    </footer>

    <?php wp_footer(); ?>
    </body>

    </html>
