<?php

/**
 * Template Name: Каталог
 * 
 * @package Termoservis
 */

get_header();
?>
<!-- ХЛЕБНЫЕ КРОШКИ -->
<div class="breadcrumbs">
    <div class="container">
        <a href="<?php echo esc_url(home_url('/')); ?>">Главная</a> <span>/</span> <strong><?php the_title(); ?></strong>
    </div>
</div>

<!-- 1. ГЕРОЙ-НАВИГАТОР -->
<section class="catalog-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <p class="hero-description">Официальный каталог производителя. Здесь собраны серийные и специальные решения для точного поддержания температуры в технологических процессах пищевой, химической, металлообрабатывающей и других отраслей промышленности. Подберите оборудование по параметрам или обратитесь за индивидуальным расчетом.</p>
        <div class="hero-actions">
            <a href="#filters" class="btn">Подобрать по параметрам</a>
            <a href="#cta" class="btn btn-outline">Получить консультацию</a>
        </div>
    </div>
</section>

<!-- 2. БЫСТРЫЕ ФИЛЬТРЫ (SMART-ПАНЕЛЬ) -->
<section id="filters" class="smart-filters fade-in">
    <div class="container">
        <h2>Быстрый подбор по ключевым параметрам</h2>
        <p class="mb-30" style="color:#666;">Сэкономьте время. Если вы знаете основные критерии — выберите нужные параметры, чтобы сразу перейти к подходящим решениям. Или воспользуйтесь полной системной навигацией ниже.</p>

        <div id="dynamicFilters" class="dynamic-filters-container">
            <!-- Фильтры загружаются динамически через JavaScript -->
            <div style="text-align:center; padding:20px; color:#666;">
                <i class="fas fa-spinner fa-spin"></i> Загрузка фильтров...
            </div>
        </div>

        <div class="filter-results">
            <div class="active-filters" id="activeFilters"></div>

            <!-- Кнопки действий для фильтров -->
            <div class="filter-actions" id="filterActions" style="display:none;">
                <button class="btn" id="showResultsBtn">
                    <i class="fas fa-eye"></i> Показать товары
                </button>
                <a href="#" class="btn btn-outline" id="resetFiltersBtn">
                    <i class="fas fa-redo"></i> Сбросить фильтры
                </a>
            </div>

            <!-- Сетка для отображения отфильтрованных товаров -->
            <div id="filteredProducts" class="products-grid" style="display:none;"></div>

            <div class="clear-filters" id="clearFilters">
                <i class="fas fa-times"></i> Сбросить все фильтры
            </div>
        </div>
    </div>
</section>
<?php
// Массив кастомных ссылок: 'slug' => '/путь/на/сайте/'
$custom_links = array(
    'standard-chiller-line' => '/industrial-chillers/',
);

/**
 * Вернуть корректную ссылку для термина:
 * 1) если есть $custom_links[slug] -> home_url(custom)
 * 2) если есть страница с таким slug -> permalink страницы
 * 3) fallback -> home_url('/' . $slug . '/')
 *
 * Возвращает НЕ-экранированную ссылку — экранируем при выводе в href.
 */
function get_custom_or_term_link( $term, $custom_links = array() ) {
    if ( is_object( $term ) && isset( $term->slug ) ) {
        $slug = $term->slug;
    } else {
        $slug = (string) $term;
    }

    // 1) кастомная ссылка (заданы в массиве)
    if ( isset( $custom_links[ $slug ] ) && $custom_links[ $slug ] !== '' ) {
        return home_url( $custom_links[ $slug ] );
    }

    // 2) если есть страница с таким slug — ведём на страницу
    $page = get_page_by_path( $slug );
    if ( $page && ! is_wp_error( $page ) ) {
        return get_permalink( $page );
    }

    // 3) fallback — простая ссылка по slug в корне сайта
    return home_url( '/' . $slug . '/' );
}
?>

<section class="system-nav fade-in">
    <div class="container">
        <h2>Полная система холодильного оборудования ТЕРМОСИСТЕМЫ-С</h2>
        <p class="mb-30" style="color:#666;">Изучите нашу продукцию как единый технологический комплекс. Категории выстроены по принципу от центрального холодоснабжения к конечным применениям. Кликните на любой раздел, чтобы увидеть модели, характеристики и типовые решения.</p>

        <div class="nav-accordion">
            <?php
            // Исключаем категории "Misc" и "Отраслевые решения"
            $exclude_slugs = array('misc', 'special-way-of-solving');
            $exclude_ids = array();

            foreach ($exclude_slugs as $slug) {
                $term = get_term_by('slug', $slug, 'product_cat');
                if ($term && ! is_wp_error($term)) {
                    $exclude_ids[] = $term->term_id;
                }
            }

            $categories = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
                'parent' => 0,
                'exclude' => ! empty($exclude_ids) ? $exclude_ids : array(),
            ));

            if (! empty($categories) && ! is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $count = $category->count;
            ?>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <?php echo esc_html($category->name); ?>
                            <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="accordion-content">
                            <div class="subcategory-list">
                                <div class="subcategory-item">
                                    <a href="<?php echo get_custom_or_term_link($category, $custom_links); ?>">
                                        <span class="item-count"><?php echo esc_html($count); ?></span>
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                </div>
                                <?php
                                // Получаем подкатегории
                                $subcategories = get_terms(array(
                                    'taxonomy' => 'product_cat',
                                    'parent' => $category->term_id,
                                    'hide_empty' => false,
                                ));

                                if (! empty($subcategories) && ! is_wp_error($subcategories)) {
                                    foreach ($subcategories as $subcat) {
                                ?>
                                        <div class="subcategory-item">
                                            <a href="<?php echo get_custom_or_term_link($subcat, $custom_links); ?>">
                                                <span class="item-count"><?php echo esc_html($subcat->count); ?></span>
                                                <?php echo esc_html($subcat->name); ?>
                                            </a>
                                        </div>
                                        <?php
                                        // Третий уровень
                                        $sub_subcategories = get_terms(array(
                                            'taxonomy' => 'product_cat',
                                            'parent' => $subcat->term_id,
                                            'hide_empty' => false,
                                        ));

                                        if (! empty($sub_subcategories) && ! is_wp_error($sub_subcategories)) {
                                            foreach ($sub_subcategories as $sub_subcat) {
                                        ?>
                                                <div class="subcategory-item" style="padding-left: 30px;">
                                                    <a href="<?php echo get_custom_or_term_link($sub_subcat, $custom_links); ?>">
                                                        <span class="item-count"><?php echo esc_html($sub_subcat->count); ?></span>
                                                        <?php echo esc_html($sub_subcat->name); ?>
                                                    </a>
                                                </div>
                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div style="padding:20px; text-align:center; color:#999;">
                    <i class="fas fa-box" style="font-size:2rem; margin-bottom:15px; color:#ddd; display:block;"></i>
                    <p>Категории не найдены. Добавьте категории товаров в WooCommerce.</p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- 4. КЛЮЧЕВЫЕ КАТЕГОРИИ (ПРЕВЬЮ) -->
<section class="categories-preview fade-in">
    <div class="container">
        <h2>Ключевые категории оборудования с подробным описанием</h2>
        <p class="mb-30" style="color:#666; max-width:900px; margin:0 auto 30px;">Ниже представлены основные группы нашего каталога с детальными техническими особенностями, областями применения и типовыми схемами внедрения. Для каждой категории мы подготовили руководство по выбору.</p>

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
                                    <a href="/<?php echo esc_html($subcat->slug); ?>" class="card-link">
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
                            <a href="#cta" class="btn">Обсудить решение</a>
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
    </div>
</section>

<!-- 5. ПРИЗЫВ К ДЕЙСТВИЮ -->
<section id="cta" class="catalog-cta fade-in">
    <div class="container">
        <div class="cta-content">
            <h2>Не нашли нужную модель или есть особые требования?</h2>
            <p>Более 40% наших проектов — это разработка индивидуальных решений под нестандартные задачи. Пришлите техническое задание, и наши инженеры спроектируют и рассчитают стоимость оборудования специально для вас в течение 24 часов.</p>

            <div class="cta-form">
                <h3 style="color:#0056b8; text-align:center; margin-bottom:25px;">Рассчитайте индивидуальное решение</h3>
                <form id="catalogForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Ваше имя *</label>
                            <input type="text" name="name" class="form-control" placeholder="Иванов Иван" required>
                        </div>
                        <div class="form-group">
                            <label>Телефон *</label>
                            <input type="tel" name="phone" class="form-control" placeholder="+7 (___) ___-__-__" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="ivanov@example.com">
                        </div>
                        <div class="form-group">
                            <label>Прикрепить ТЗ (до 10 МБ)</label>
                            <div class="file-upload">
                                <input type="file" id="fileUpload" name="file1">
                                <div class="file-label">
                                    <i class="fas fa-paperclip"></i>
                                    <span id="fileName">Выберите файл...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Опишите вашу задачу</label>
                        <textarea name="message" class="form-control" rows="4" placeholder="Технические требования, условия эксплуатации, желаемые сроки..." required></textarea>
                    </div>
                    <button type="submit" class="btn" style="width:100%;">
                        <i class="fas fa-calculator"></i> Получить КП
                    </button>
                </form>
            </div>


        </div>
    </div>
</section>

<!-- 6. SEO-ФУНДАМЕНТ -->
<section class="seo-foundation fade-in">
    <div class="container">
        <div class="seo-content">
            <h2>Промышленное холодильное оборудование от производителя в Самаре</h2>

            <p>Компания «ТЕРМОСИСТЕМЫ-С» с 2010 года специализируется на проектировании, производстве и поставке промышленного холодильного оборудования по всей России и странам СНГ. Наш каталог включает широкий ассортимент чиллеров, холодильных агрегатов, комплектующих и специализированных решений для различных отраслей промышленности.</p>

            <p>Мы работаем с проверенными компонентами мировых лидеров, что обеспечивает надежность и долговечность нашего оборудования. Каждая единица техники проходит многоступенчатый контроль качества на собственном производстве в Самаре, что позволяет нам предоставлять расширенную гарантию до 3 лет.</p>

            <p>Наши специалисты помогут подобрать оптимальное решение для ваших задач: от стандартного чиллера для охлаждения воды до сложной системы холодоснабжения для химического производства. Мы обеспечиваем полный цикл услуг: от теплотехнического расчета и проектирования до монтажа, пусконаладки и сервисного обслуживания.</p>

            <div class="keywords">
                <div class="keyword-tag">купить чиллер промышленный</div>
                <div class="keyword-tag">холодильный агрегат цена</div>
                <div class="keyword-tag">производство холодильных систем</div>
                <div class="keyword-tag">чиллер для пресс-формы</div>
                <div class="keyword-tag">охлаждение реакторов</div>
                <div class="keyword-tag">холодильное оборудование для пищевого производства</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
    /**
     * Catalog Page JS - Dynamic AJAX Filters
     * 
     * @package Termoservis
     */

    document.addEventListener('DOMContentLoaded', function() {
        // Анимация появления элементов при скролле
        const fadeElements = document.querySelectorAll('.fade-in');

        const fadeInOnScroll = function() {
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;

                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('visible');
                }
            });
        };

        window.addEventListener('scroll', fadeInOnScroll);
        fadeInOnScroll();

        // ===== ДИНАМИЧЕСКАЯ СИСТЕМА ФИЛЬТРОВ =====
        const dynamicFiltersContainer = document.getElementById('dynamicFilters');
        const activeFiltersContainer = document.getElementById('activeFilters');
        const clearFiltersBtn = document.getElementById('clearFilters');
        const filterActions = document.getElementById('filterActions');
        const showResultsBtn = document.getElementById('showResultsBtn');
        const resetFiltersBtn = document.getElementById('resetFiltersBtn');
        const filteredProducts = document.getElementById('filteredProducts');

        let availableFilters = [];
        let activeFilters = [];

        // Загруженные товары (для кэша)
        let cachedProducts = null;
        let currentPage = 1;
        let totalPages = 1;

        // Загрузить доступные фильтры из серверной части
        function loadAvailableFilters() {
            fetch(termoservisData.ajaxUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=get_available_filters&nonce=' + termoservisData.catalogNonce,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.data && data.data.length > 0) {
                        availableFilters = data.data;
                        renderFilters();
                    } else {
                        // Если товаров нет - показываем сообщение
                        dynamicFiltersContainer.innerHTML = `
                        <div style="padding:30px; text-align:center; background:#f9f9f9; border-radius:8px; color:#666;">
                            <i class="fas fa-box" style="font-size:2rem; margin-bottom:15px; color:#ddd; display:block;"></i>
                            <h3 style="color:#666; margin-bottom:10px;">Товары временно недоступны</h3>
                            <p>Фильтры появятся после добавления товаров в каталог.</p>
                            <p style="font-size:0.9em; margin-top:15px;">
                                <a href="#cta" style="color:#0056b8;">Оставить заявку</a> на индивидуальный расчет
                            </p>
                        </div>
                    `;
                    }
                })
                .catch(error => {
                    console.error('Error loading filters:', error);
                    dynamicFiltersContainer.innerHTML = `
                    <div style="padding:20px; text-align:center; color:#999;">
                        <p style="font-size:0.9em;">Не удалось загрузить фильтры</p>
                    </div>
                `;
                });
        }

        // Отрисовать фильтры на основе загруженных данных
        function renderFilters() {
            dynamicFiltersContainer.innerHTML = '';

            availableFilters.forEach(filter => {
                const filterGroup = document.createElement('div');
                filterGroup.className = 'filter-group';
                filterGroup.innerHTML = `
                    <h3><i class="fas fa-filter"></i> ${filter.label}</h3>
                    <div class="filter-buttons" data-filter-name="${filter.name}">
                        ${filter.values.map(value => `
                            <div class="filter-btn" data-filter="${filter.name}" data-value="${value.value}">
                                ${value.label} <span style="font-size:0.8em; color:#999;">(${value.count})</span>
                            </div>
                        `).join('')}
                    </div>
                `;
                dynamicFiltersContainer.appendChild(filterGroup);
            });

            // Добавить обработчики кликов
            attachFilterListeners();
        }

        // Подключить обработчики к кнопкам фильтров
        function attachFilterListeners() {
            const filterButtons = document.querySelectorAll('.filter-btn');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filterType = this.dataset.filter;
                    const filterValue = this.dataset.value;
                    const filterText = this.textContent.split('(')[0].trim();

                    const existingFilterIndex = activeFilters.findIndex(
                        f => f.name === filterType && f.value === filterValue
                    );

                    if (existingFilterIndex >= 0) {
                        activeFilters.splice(existingFilterIndex, 1);
                        this.classList.remove('active');
                    } else {
                        // Оставить только один фильтр по типу
                        activeFilters = activeFilters.filter(f => f.name !== filterType);
                        activeFilters.push({
                            name: filterType,
                            value: filterValue,
                            text: filterText
                        });
                        this.classList.add('active');

                        // Убрать активный класс у других кнопок этого фильтра
                        document.querySelectorAll(`.filter-btn[data-filter="${filterType}"]`).forEach(btn => {
                            if (btn !== this) btn.classList.remove('active');
                        });
                    }

                    updateActiveFiltersDisplay();
                    updateFilterResults();
                });
            });
        }

        // Обновить отображение активных фильтров
        function updateActiveFiltersDisplay() {
            activeFiltersContainer.innerHTML = '';

            if (activeFilters.length === 0) {
                activeFiltersContainer.innerHTML = '<div style="color:#666; font-style:italic;">Фильтры не выбраны</div>';
                return;
            }

            activeFilters.forEach(filter => {
                const filterElement = document.createElement('div');
                filterElement.className = 'active-filter';
                filterElement.innerHTML = `
                    ${filter.text}
                    <i class="fas fa-times" data-name="${filter.name}" data-value="${filter.value}"></i>
                `;
                activeFiltersContainer.appendChild(filterElement);

                filterElement.querySelector('i').addEventListener('click', function() {
                    const name = this.dataset.name;
                    const value = this.dataset.value;

                    activeFilters = activeFilters.filter(
                        f => !(f.name === name && f.value === value)
                    );

                    document.querySelector(`.filter-btn[data-filter="${name}"][data-value="${value}"]`)
                        .classList.remove('active');

                    updateActiveFiltersDisplay();
                    updateFilterResults();
                });
            });
        }

        // Обновить результаты фильтра и показать количество
        function updateFilterResults() {
            if (filterActions) {
                if (activeFilters.length > 0) {
                    filterActions.style.display = 'flex';

                    // Запросить количество товаров
                    countFilteredProducts();

                    // Автоматически загрузить если 2+ фильтра
                    if (activeFilters.length >= 2) {
                        setTimeout(() => {
                            applyFiltersAndShowProducts(1);
                        }, 300);
                    }
                } else {
                    filterActions.style.display = 'none';
                }
            }
        }

        // Посчитать количество товаров с текущими фильтрами
        function countFilteredProducts() {
            if (availableFilters.length === 0) {
                return; // Если фильтров нет - не считаем
            }

            const filtersData = prepareFiltersData();

            fetch(termoservisData.ajaxUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=count_filtered_products&nonce=' + termoservisData.catalogNonce +
                        '&filters=' + encodeURIComponent(JSON.stringify(filtersData)),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.data) {
                        const count = data.data.count;
                        const pluralForm = getPluralForm(count);
                        showResultsBtn.innerHTML = `<i class="fas fa-eye"></i> Показать ${count} ${pluralForm}`;
                    }
                })
                .catch(error => console.error('Error counting products:', error));
        }

        // Применить фильтры и показать товары
        function applyFiltersAndShowProducts(page = 1) {
            if (activeFilters.length === 0 || availableFilters.length === 0) {
                filteredProducts.style.display = 'none';
                filteredProducts.innerHTML = '';
                return;
            }

            const filtersData = prepareFiltersData();

            filteredProducts.innerHTML = '<div style="grid-column:1/-1; text-align:center; padding:40px;"><i class="fas fa-spinner fa-spin"></i> Загрузка товаров...</div>';
            filteredProducts.style.display = 'grid';

            fetch(termoservisData.ajaxUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=filter_products&nonce=' + termoservisData.catalogNonce +
                        '&filters=' + encodeURIComponent(JSON.stringify(filtersData)) +
                        '&page=' + page,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.data) {
                        filteredProducts.innerHTML = data.data.html;
                        currentPage = page;
                        totalPages = data.data.total_pages;

                        setTimeout(() => {
                            filteredProducts.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }, 100);
                    } else {
                        filteredProducts.innerHTML = '<div style="grid-column:1/-1; text-align:center; padding:40px;"><p>Ошибка при загрузке товаров</p></div>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                    filteredProducts.innerHTML = '<div style="grid-column:1/-1; text-align:center; padding:40px;"><p>Ошибка подключения</p></div>';
                });
        }

        // Подготовить данные фильтров для отправки
        function prepareFiltersData() {
            const filters = {};

            activeFilters.forEach(filter => {
                const filterObj = availableFilters.find(f => f.name === filter.name);
                if (filterObj) {
                    if (!filters[filterObj.name]) {
                        filters[filterObj.name] = {
                            name: filterObj.name,
                            label: filterObj.label,
                            values: []
                        };
                    }
                    filters[filterObj.name].values.push(filter.value);
                }
            });

            return Object.values(filters);
        }

        // Получить правильную форму слова
        function getPluralForm(count) {
            const mod10 = count % 10;
            const mod100 = count % 100;

            if (mod10 === 1 && mod100 !== 11) {
                return 'товара';
            } else if (mod10 >= 2 && mod10 <= 4 && (mod100 < 10 || mod100 >= 20)) {
                return 'товара';
            } else {
                return 'товаров';
            }
        }

        // Обработчики кнопок
        clearFiltersBtn.addEventListener('click', function() {
            activeFilters = [];
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            updateActiveFiltersDisplay();
            updateFilterResults();
            filteredProducts.style.display = 'none';
            filteredProducts.innerHTML = '';
        });

        if (showResultsBtn) {
            showResultsBtn.addEventListener('click', function() {
                applyFiltersAndShowProducts(1);
            });
        }

        if (resetFiltersBtn) {
            resetFiltersBtn.addEventListener('click', function(e) {
                e.preventDefault();
                activeFilters = [];
                document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                updateActiveFiltersDisplay();
                updateFilterResults();
                filteredProducts.style.display = 'none';
                filteredProducts.innerHTML = '';
            });
        }

        // Работа с файлом в форме
        const fileInput = document.getElementById('fileUpload');
        const fileName = document.getElementById('fileName');

        if (fileInput && fileName) {
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    fileName.textContent = this.files[0].name;
                } else {
                    fileName.textContent = 'Выберите файл...';
                }
            });
        }

        // ===== ИНИЦИАЛИЗАЦИЯ =====
        // Загрузить фильтры при загрузке страницы
        loadAvailableFilters();
        updateActiveFiltersDisplay();
    });
</script>