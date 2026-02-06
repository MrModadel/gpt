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

    <!-- ===== ПОДВАЛ ===== -->
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
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => '',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ));
                    ?>
                </div>

                <div class="footer-contacts">
                    <h4>Контакты</h4>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        <?php echo get_theme_mod('termoservis_address', 'г. Самара, ул. Заводская, 42'); ?>
                    </p>
                    <p>
                        <i class="fas fa-phone"></i>
                        <a href="tel:<?php echo get_theme_mod('termoservis_phone', '+79270013885'); ?>">
                            <?php echo get_theme_mod('termoservis_phone', '+7 (927) 001-38-85'); ?>
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
                    <a href="#">Политика конфиденциальности</a> |
                    <a href="#">Пользовательское соглашение</a> |
                    <a href="#">Декларации о соответствии</a>
                </p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>

    </html>