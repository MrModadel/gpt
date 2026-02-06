<?php

/**
 * Template Name: Чиллеры с водяным охлаждением
 *
 * @package Termoservis
 */

get_header();
?>
<style>
    /* Hero секция */
    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('https://res.cloudinary.com/dbsm61hrr/image/upload/v1768714160/photo-1581094794329-c8112a89af12-_3_-_1__11zon_nazxqf.webp');
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
        color: #fff;
    }

    .hero p {
        font-size: 1.15rem;
        max-width: 900px;
        margin: 0 auto 30px;
    }

    .btn-primary {
        display: inline-block;
        background-color: #1a5fb4;
        color: white;
        padding: 15px 35px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.05rem;
        transition: background-color 0.3s, transform 0.3s;
        border: none;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0d4a9c;
        transform: translateY(-2px);
    }

    /* Секции */
    section {
        padding: 70px 0;
    }

    .container {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title h2 {
        font-size: 2.2rem;
        color: #1a5fb4;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-title h2:after {
        content: '';
        position: absolute;
        width: 70px;
        height: 3px;
        background-color: #1a5fb4;
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

    /* Подкатегории */
    .subcategories {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .subcategories-title {
        text-align: center;
        margin-bottom: 20px;
        color: #1a5fb4;
        font-size: 1.4rem;
    }

    .subcategories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
    }

    .subcategory-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        transition: all 0.25s ease;
        border-left: 4px solid #1a5fb4;
        cursor: pointer;
    }

    .subcategory-card.--active {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        background: linear-gradient(135deg, #e9f0fb 0%, #e0e9f6 100%);
    }

    .subcategory-icon {
        font-size: 2rem;
        color: #1a5fb4;
        margin-bottom: 12px;
    }

    .subcategory-card h3 {
        color: #333;
        margin-bottom: 8px;
    }

    .subcategory-card p {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 12px;
    }

    .subcategory-link {
        display: inline-block;
        color: #1a5fb4;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* Преимущества */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 24px;
    }

    .feature-card {
        background-color: white;
        padding: 22px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.04);
        text-align: center;
        transition: transform 0.25s;
        border-top: 4px solid #1a5fb4;
    }

    .feature-card:hover {
        transform: translateY(-6px);
    }

    .feature-icon {
        font-size: 2rem;
        color: #1a5fb4;
        margin-bottom: 14px;
    }

    .feature-card h3 {
        margin-bottom: 10px;
        color: #1a5fb4;
    }

    .feature-card p {
        color: #555;
        font-size: 0.95rem;
    }


    /* Применение */
    .applications {
        background-color: #f8f9fa;
        padding: 40px 0;
    }

    .applications-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
    }

    .application-item {
        background-color: white;
        padding: 18px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 5px 12px rgba(0, 0, 0, 0.04);
    }

    .application-icon {
        font-size: 1.8rem;
        color: #1a5fb4;
        margin-bottom: 10px;
    }

    .application-item h3 {
        color: #333;
        margin-bottom: 8px;
        font-size: 1.05rem;
    }

    .application-item p {
        color: #666;
        font-size: 0.95rem;
    }

    /* SEO */
    .seo-section {
        background-color: #fff;
        padding: 50px 0;
    }

    .seo-content {
        max-width: 900px;
        margin: 0 auto;
    }

    .seo-content h2 {
        color: #1a5fb4;
        margin-bottom: 18px;
        font-size: 1.7rem;
    }

    .seo-content p {
        margin-bottom: 16px;
        text-align: justify;
        line-height: 1.6;
        color: #444;
    }

    .final-cta {
        text-align: center;
        background-color: white;
        padding: 60px 0;
    }

    .btn-secondary {
        display: inline-block;
        background-color: transparent;
        color: #1a5fb4;
        border: 2px solid #1a5fb4;
        padding: 12px 28px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.25s;
    }

    .btn-secondary:hover {
        background-color: #1a5fb4;
        color: white;
    }

    footer {
        background-color: #1a1a1a;
        color: #ddd;
        padding: 50px 0 20px;
    }

    /* Анимации появления */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.7s cubic-bezier(.2, .9, .2, 1);
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    @media (max-width: 768px) {
        .hero {
            padding: 60px 0;
        }

        .hero h1 {
            font-size: 1.9rem;
        }

        .ts-media {
            height: 180px;
        }
    }

    @media (max-width: 480px) {
        .ts-grid {
            grid-template-columns: 1fr;
        }

        .subcategories-grid {
            grid-template-columns: 1fr;
        }

        .comparison {
            padding: 15px;
        }
    }
</style>

<!-- Хлебные крошки -->
<div class="breadcrumbs">
    <div class="container">
        <a href="/">Главная</a> <span>/</span>
        <a href="/catalog/">Каталог</a> <span>/</span>
        <a href="/industrial-chillers/">Промышленные чиллеры</a> <span>/</span>
        <a href="/condenser-cooling-types/">По типу охлаждения конденсатора</a> <span>/</span>
        <strong><?php the_title(); ?></strong>
    </div>
</div>

<!-- Hero -->
<section class="hero fade-in">
    <div class="container">
        <h1>Промышленные чиллеры с водяным охлаждением</h1>
        <p>Надёжные решения для крупных технологических процессов: высокая стабильность выхода, экономия энергоресурсов и возможность интеграции с системами рециркуляции воды.</p>
        <a href="/#cta" class="btn-primary btn" id="openCalcModal">Подобрать чиллер с водяным охлаждением</a>
    </div>
</section>


<section class="ts-root ts-section fade-in" id="ts-chillers">
    <div class="ts-head">
        <div>
            <h2 class="ts-title">Чиллеры с водяным охлаждением</h2>
        </div>
        <div class="ts-controls">
            <input id="ts-search" class="ts-input" type="search" placeholder="Поиск: модель, назначение" />
            <select id="ts-power" class="ts-select">
                <option value="all">Все мощности</option>
                <option value="0-50">до 50 кВт</option>
                <option value="51-150">51–150 кВт</option>
                <option value="151-300">151–300 кВт</option>
                <option value="301-9999">301+ кВт</option>
            </select>
        </div>
    </div>

    <div id="ts-grid" class="ts-grid">
        <?php
        // Получаем товары из категории standard-chiller-line
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'water-cooled-chillers'
                )
            )
        );

        $products = new WP_Query($args);

        if ($products->have_posts()) {
            while ($products->have_posts()) {
                $products->the_post();
                $product = wc_get_product(get_the_ID());

                // Получаем атрибут "Мощность"
                $power = $product->get_attribute('мощность');
                if (!$power) {
                    $power = $product->get_attribute('power');
                }

                // Извлекаем число для data-power
                $power_number = preg_replace('/[^0-9]/', '', $power);
                $power_number = $power_number ? $power_number : '0';

                // Получаем теги товара (product_tag)
                $tags = get_the_terms(get_the_ID(), 'product_tag');
                $tag_html = '';
                if ($tags && !is_wp_error($tags)) {
                    foreach ($tags as $tag) {
                        $tag_html .= '<span class="ts-tag">' . esc_html($tag->name) . '</span>';
                    }
                }

                // Получаем изображение
                $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : 'https://via.placeholder.com/360x200?text=Chiller';
        ?>
                <article class="ts-card ts-product" data-power="<?php echo esc_attr($power_number); ?>">
                    <div class="ts-media">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                    <div class="ts-body">
                        <div class="ts-kicker">Чиллер — <strong><?php echo esc_html($power); ?></strong></div>
                        <h3 class="ts-name"><?php the_title(); ?></h3>
                        <div class="ts-meta">
                            <?php echo wp_kses_post($tag_html); ?>
                        </div>
                    </div>
                    <div class="ts-foot">
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-small">
                            <i class="fas fa-info-circle"></i> Подробнее
                        </a>
                    </div>
                </article>
        <?php
            }
            wp_reset_postdata();
        } else {
            echo '<p style="grid-column: 1/-1; text-align: center; padding: 40px;">Товары не найдены в категории</p>';
        }
        ?>
    </div>
</section>
<!-- Преимущества -->
<section class="fade-in" style="background-color:#f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2>Преимущества чиллеров с водяным охлаждением</h2>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-tint"></i></div>
                <h3>Высокая эффективность теплообмена</h3>
                <p>Водяные конденсаторы обеспечивают лучший теплоперенос, что повышает КПД оборудования.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-snowflake"></i></div>
                <h3>Стабильность температуры</h3>
                <p>Поддержка требуемой температуры независимо от колебаний температуры окружающего воздуха.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                <h3>Оптимально для больших мощностей</h3>
                <p>Применяются в установках от десятков киловатт до мегаваттных систем.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-recycle"></i></div>
                <h3>Возможность вторичного использования тепла</h3>
                <p>Подключение рекуперационных схем для подогрева воды или технологических нужд.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-tools"></i></div>
                <h3>Долговечность и ремонтопригодность</h3>
                <p>Использование проверенных материалов и модульная конструкция для простоты обслуживания.</p>
            </div>
        </div>
    </div>
</section>

<!-- Сравнение -->
<section class="fade-in">
    <div class="container">
        <div class="comparison">
            <h2 class="comparison-title">Сравнение: воздушное vs водяное охлаждение</h2>

            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Характеристика</th>
                        <th>Воздушное охлаждение</th>
                        <th>Водяное охлаждение</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="feature-name">Расход воды</td>
                        <td class="air-cooling">0 м³/ч</td>
                        <td class="water-cooling">2–50 м³/ч (в зависимости от схемы)</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Энергоэффективность</td>
                        <td class="air-cooling">Ниже при высоких температурах</td>
                        <td class="water-cooling">Выше при больших нагрузках</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Стабильность</td>
                        <td class="air-cooling">Зависит от температуры воздуха</td>
                        <td class="water-cooling">Высокая, управляемая</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Эксплуатационные расходы</td>
                        <td class="air-cooling">Низкие (без воды)</td>
                        <td class="water-cooling">Умеренные (вода, очистка, реагенты)</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Шум</td>
                        <td class="air-cooling">Выше (вентиляторы)</td>
                        <td class="water-cooling">Ниже</td>
                    </tr>
                    <tr>
                        <td class="feature-name">Требования к месту</td>
                        <td class="air-cooling">Свободный приток воздуха</td>
                        <td class="water-cooling">Подвод воды, канализация или закрытый контур</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Области применения -->
<section class="applications fade-in">
    <div class="container">
        <div class="section-title">
            <h2>Области применения</h2>
        </div>

        <div class="applications-grid">
            <div class="application-item">
                <div class="application-icon"><i class="fas fa-industry"></i></div>
                <h3>Промышленное производство</h3>
                <p>Охлаждение пресс-форм, линий экструзии, термостатов и т.д.</p>
            </div>

            <div class="application-item">
                <div class="application-icon"><i class="fas fa-flask"></i></div>
                <h3>Химическая и фармацевтическая промышленность</h3>
                <p>Поддержание стабильных температур в реакторах и сушильных камерах.</p>
            </div>

            <div class="application-item">
                <div class="application-icon"><i class="fas fa-car"></i></div>
                <h3>Автомобилестроение</h3>
                <p>Испытательные стенды, покрасочные камеры и технологические линии.</p>
            </div>

            <div class="application-item">
                <div class="application-icon"><i class="fas fa-server"></i></div>
                <h3>Дата-центры и электронная промышленность</h3>
                <p>Охлаждение стендов, камер испытаний и прецизионного оборудования.</p>
            </div>
        </div>
    </div>
</section>

<!-- SEO блок -->
<section class="seo-section fade-in">
    <div class="container">
        <div class="seo-content">
            <h2>Чиллеры с водяным охлаждением: как подобрать и на что обратить внимание</h2>

            <p>Чиллеры с водяным охлаждением — оптимальное решение для предприятий с стабильным доступом к воде и высокими требованиями к температурной стабильности. Такие системы обеспечивают эффективный теплообмен, позволяют экономично работать при больших нагрузках и легко интегрируются в существующие системы центрального охлаждения.</p>

            <h3>Что важно при выборе</h3>
            <ul>
                <li><strong>Требуемая холодопроизводительность</strong> — рассчитывается на основе тепловой нагрузки оборудования с резервом 10–20%.</li>
                <li><strong>Температурный диапазон</strong> — убедитесь, что чиллер обеспечивает требуемую температуру на входе и выходе.</li>
                <li><strong>Схема циркуляции воды</strong> — открытая или замкнутая; наличие теплообменников и баков расширения.</li>
                <li><strong>Материалы конденсатора</strong> — выбирать антикоррозийные решения при агрессивной среде.</li>
                <li><strong>Сервис и доступность запчастей</strong> — важны для минимизации простоев.</li>
            </ul>

            <p>Наша команда проводит полный анализ технологических требований, выполняет тепловые расчёты и подбирает оптимальную схему подключения чиллера. Мы также предлагаем пусконаладочные работы и долгосрочное сервисное обслуживание.</p>
        </div>
    </div>
</section>

<!-- Финальный CTA -->
<section class="final-cta fade-in">
    <div class="container">
        <h2>Нужна помощь с подбором чиллера?</h2>
        <p>Оставьте заявку — наши инженеры подберут решение под ваш бюджет и технические требования, подготовят КП и схему подключения.</p>

        <div style="display:flex; justify-content:center; gap:18px; flex-wrap:wrap; margin-top:18px;">
            <a href="/#cta" class="btn-primary btn" id="openProposalModal">Получить коммерческое предложение</a>
            <a href="/#cta" class="btn-secondary btn" id="openCallbackModal">Заказать звонок инженера</a>
        </div>
    </div>
</section>

<!-- Модальные окна (простая структура) -->
<div id="quickOrderModal" class="modal-overlay" style="display:none;">
    <div class="modal" style="max-width:600px;margin:80px auto;background:#fff;padding:20px;border-radius:8px;position:relative;">
        <button class="modal-close" style="position:absolute;right:12px;top:12px;">✕</button>
        <h3>Быстрый заказ</h3>
        <form id="quickOrderForm">
            <label>Товар:<br><input type="text" name="product" required></label><br><br>
            <label>Контактный телефон:<br><input type="text" name="phone" required></label><br><br>
            <button type="submit" class="btn-primary">Отправить</button>
        </form>
    </div>
</div>

<div id="proposalModal" class="modal-overlay" style="display:none;">
    <div class="modal" style="max-width:700px;margin:80px auto;background:#fff;padding:22px;border-radius:8px;position:relative;">
        <button class="modal-close" style="position:absolute;right:12px;top:12px;">✕</button>
        <h3>Запрос коммерческого предложения</h3>
        <form id="proposalForm">
            <label>Компания:<br><input type="text" name="company" required></label><br><br>
            <label>Email:<br><input type="email" name="email" required></label><br><br>
            <label>Краткое техническое задание:<br><textarea name="spec" rows="4"></textarea></label><br><br>
            <button type="submit" class="btn-primary">Отправить запрос</button>
        </form>
    </div>
</div>

<div id="callbackModal" class="modal-overlay" style="display:none;">
    <div class="modal" style="max-width:520px;margin:80px auto;background:#fff;padding:18px;border-radius:8px;position:relative;">
        <button class="modal-close" style="position:absolute;right:12px;top:12px;">✕</button>
        <h3>Заказать звонок инженера</h3>
        <form id="callbackForm">
            <label>Имя:<br><input type="text" name="name" required></label><br><br>
            <label>Телефон:<br><input type="text" name="phone" required></label><br><br>
            <label>Удобное время:<br><input type="text" name="time"></label><br><br>
            <button type="submit" class="btn-primary">Заказать звонок</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {



        // Анимация появления при скролле
        const fadeElems = document.querySelectorAll('.fade-in');
        const onScroll = () => {
            fadeElems.forEach(el => {
                const top = el.getBoundingClientRect().top;
                if (top < window.innerHeight - 120) el.classList.add('visible');
            });
        };
        window.addEventListener('scroll', onScroll);
        onScroll();
    });
    (function() {
        const root = document.getElementById('ts-chillers');
        const grid = root.querySelector('#ts-grid');
        const search = root.querySelector('#ts-search');
        const power = root.querySelector('#ts-power');

        const selectors = ['.ts-product'];

        function hide(el) {
            if (!el.dataset._d) el.dataset._d = getComputedStyle(el).display;
            el.style.display = 'none';
        }

        function show(el) {
            el.style.display = el.dataset._d || '';
        }

        function getPower(el) {
            if (el.dataset.power) {
                return Number(el.dataset.power);
            }
            const m = el.textContent.match(/(\d{1,4})\s*(?:квт|kW)/i);
            return m ? Number(m[1]) : null;
        }

        function apply() {
            const q = search.value.toLowerCase();
            const r = power.value;
            const items = grid.querySelectorAll(selectors.join(','));

            items.forEach(el => {
                let ok = true;
                if (q && !el.textContent.toLowerCase().includes(q)) ok = false;
                if (r !== 'all') {
                    const p = getPower(el);
                    if (p !== null) {
                        const [a, b] = r.split('-').map(Number);
                        if (p < a || p > b) ok = false;
                    }
                }
                ok ? show(el) : hide(el);
            });
        }

        search.addEventListener('input', apply);
        power.addEventListener('change', apply);

        const mo = new MutationObserver(() => apply());
        mo.observe(grid, {
            childList: true,
            subtree: true
        });

        apply();
    })();
</script>

<?php get_footer(); ?>