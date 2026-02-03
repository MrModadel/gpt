# Структура CSS файлов

## Разделение стилей

### 1. **common.css** - Общие стили (базовые, переиспользуемые)
Содержит:
- Reset стили (*, body, a, ul)
- Базовые переменные и классы (.container, .btn, .text-center и т.д.)
- Стили заголовков (h1-h4)
- Стили форм и утилит
- Стили футера
- Базовая адаптивность

**Подключение в header.php:**
```php
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
```

---

### 2. **header.css** - Шапка, меню, burger и modal
Содержит:
- Стили .main-header
- Стили логотипа и контактов
- Стили главного меню (.nav-links, .dropdown-menu)
- Стили burger меню (.burger-menu)
- Стили modal меню (.modal-menu)
- Адаптивные стили для мобильных устройств

**Подключение в header.php:**
```php
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/header.css">
```

---

### 3. **home.css** - Стили главной страницы
Содержит:
- .hero-section (главный экран)
- .catalog-section (каталог)
- .about-section (о компании)
- .marketing-kit (маркетинг-кит)
- .faq-section (часто задаваемые вопросы)
- .projects-section (проекты)
- .seo-section (SEO текст)

**Подключение в home.php:**
```php
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/home.css">
```

---

### 4. **catalog.css** - Стили страницы каталога
Содержит:
- .breadcrumbs (хлебные крошки)
- .catalog-hero (герой каталога)
- .smart-filters (фильтры товаров)
- .nav-accordion (аккордеон категорий)
- .categories-preview (превью категорий)
- .catalog-cta (призыв к действию)
- .seo-foundation (SEO фундамент)

**Подключение в page-catalog.php:**
```php
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/catalog.css">
```

---

## Полный пример подключения в functions.php

```php
<?php
// Подключение стилей в правильном порядке
function termoservis_enqueue_styles() {
    // 1. Общие стили (всегда подключаются)
    wp_enqueue_style('termoservis-common', 
        get_template_directory_uri() . '/css/common.css',
        array(),
        wp_get_theme()->get('Version'),
        'all'
    );

    // 2. Стили шапки (всегда подключаются)
    wp_enqueue_style('termoservis-header',
        get_template_directory_uri() . '/css/header.css',
        array('termoservis-common'),
        wp_get_theme()->get('Version'),
        'all'
    );

    // 3. Стили главной страницы (только на главной)
    if (is_front_page()) {
        wp_enqueue_style('termoservis-home',
            get_template_directory_uri() . '/css/home.css',
            array('termoservis-common'),
            wp_get_theme()->get('Version'),
            'all'
        );
    }

    // 4. Стили каталога (только на странице каталога)
    if (is_page('catalog') || is_page_template('page-catalog.php')) {
        wp_enqueue_style('termoservis-catalog',
            get_template_directory_uri() . '/css/catalog.css',
            array('termoservis-common'),
            wp_get_theme()->get('Version'),
            'all'
        );
    }

    // Font Awesome
    wp_enqueue_style('font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0',
        'all'
    );
}

add_action('wp_enqueue_scripts', 'termoservis_enqueue_styles');
?>
```

---

## Преимущества такого разделения

✅ **Разделение ответственности** - каждый файл отвечает за свою область  
✅ **Легче поддерживать** - при изменении стилей шапки не нужно искать в огромном файле  
✅ **Оптимизация загрузки** - на главной странице не загружаются стили каталога  
✅ **Переиспользование** - common.css используется везде  
✅ **Масштабируемость** - легко добавить новые страницы с новыми стилями  

---

## Локация файлов

```
termoservis-wp/
├── css/
│   ├── common.css      (базовые стили)
│   ├── header.css      (шапка, меню, burger, modal)
│   ├── home.css        (главная страница)
│   └── catalog.css     (страница каталога)
├── header.php
├── home.php
├── page-catalog.php
└── functions.php
```
