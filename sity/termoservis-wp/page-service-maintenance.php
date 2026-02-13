<?php

/**
 * Template Name: Сервис и обслуживание
 *
 * @package Termoservis
 */

get_header();

$termoservis_phone_raw = get_theme_mod( 'termoservis_phone', '+79270013885' );
$termoservis_phone_tel = preg_replace( '/[^\d+]/', '', $termoservis_phone_raw );

$services_page = get_page_by_path( 'uslugi' );
if ( ! $services_page || is_wp_error( $services_page ) ) {
    $services_page = get_page_by_path( 'services' );
}
$services_url = $services_page && ! is_wp_error( $services_page ) ? get_permalink( $services_page ) : home_url( '/uslugi/' );
?>

<style>
        /* ===== БАЗОВЫЕ СТИЛИ ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #ffffff;
            color: #333333;
            line-height: 1.6;
            overflow-x: hidden;
        }
        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }
        ul { list-style: none; }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .btn {
            display: inline-block;
            background-color: #0056b8;
            color: white;
            padding: 14px 35px;
            border-radius: 4px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all 0.4s ease;
            text-align: center;
            font-size: 1.1rem;
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
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
            border: 2px solid #0056b8;
            color: #0056b8;
        }
        .btn-outline:hover {
            background-color: #0056b8;
            color: white;
        }
        section {
            padding: 80px 0;
            position: relative;
        }
        h1, h2, h3, h4 {
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
            color: #0056b8; 
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 40px;
        }
        @keyframes expandLine {
            from { width: 0; }
            to { width: 80px; }
        }
        h2.text-center:after {
            left: 50%;
            transform: translateX(-50%);
        }
        .section-lead {
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            color: #666;
            font-size: 1.1rem;
        }
        h3 { 
            font-size: 1.6rem; 
            color: #222; 
        }
        h4 {
            font-size: 1.2rem;
            color: #444;
        }
        .text-center { text-align: center; }
        .mb-20 { margin-bottom: 20px; }
        .mb-30 { margin-bottom: 30px; }
        .mb-40 { margin-bottom: 40px; }
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* ===== ХЛЕБНЫЕ КРОШКИ ===== */
        .breadcrumbs {
            background-color: #f8f9fa;
            padding: 15px 0;
            font-size: 0.9rem;
            border-bottom: 1px solid #eee;
        }
        .breadcrumbs a {
            color: #0056b8;
        }
        .breadcrumbs a:hover {
            text-decoration: underline;
        }
        .breadcrumbs span {
            color: #666;
            margin: 0 8px;
        }

        /* ===== 1. ГЕРОЙ-СЕКЦИЯ ===== */
        .service-maintenance-hero {
            background: linear-gradient(rgba(0, 86, 184, 0.9), rgba(0, 86, 184, 0.85)), url('https://images.iimg.live/images/amazing-shot-8342.webp?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }
        .service-maintenance-hero:before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(1200px 600px at 10% 15%, rgba(255, 255, 255, 0.14), transparent 60%),
                radial-gradient(900px 520px at 85% 10%, rgba(0, 0, 0, 0.18), transparent 60%);
            pointer-events: none;
        }
        .service-maintenance-hero .container {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }
        .hero-text h1 {
            color: white;
            margin-bottom: 25px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }
        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 35px;
            opacity: 0.95;
            line-height: 1.7;
        }
        .hero-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 40px;
        }
        .hero-feature {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 12px;
            transition: transform 0.25s ease, background 0.25s ease, border-color 0.25s ease;
        }
        .hero-feature:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.14);
            border-color: rgba(255, 255, 255, 0.26);
        }
        .hero-feature i {
            font-size: 1.8rem;
            color: white;
            background: rgba(255, 255, 255, 0.15);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .hero-feature h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: white;
        }
        .hero-feature p {
            font-size: 0.9rem;
            opacity: 0.85;
            margin: 0;
        }
        .hero-form {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-top: 6px solid #0056b8;
            position: relative;
        }
        .hero-form:before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 6px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background: linear-gradient(90deg, #0056b8 0%, #00a3ff 50%, #0056b8 100%);
        }
        .hero-form h3 {
            color: #0056b8;
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.5rem;
        }
        .hero-form .btn {
            width: 100%;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }
        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        .form-control:focus {
            outline: none;
            border-color: #0056b8;
            box-shadow: 0 0 0 3px rgba(0, 86, 184, 0.1);
        }
        .form-select {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            background-color: white;
            cursor: pointer;
        }
        .form-select:focus {
            outline: none;
            border-color: #0056b8;
            box-shadow: 0 0 0 3px rgba(0, 86, 184, 0.1);
        }
        .hero-form .btn {
            width: 100%;
            padding: 15px;
            font-size: 1.1rem;
            margin-top: 10px;
        }

        /* ===== 2. ВИДЫ МОНТАЖНЫХ РАБОТ ===== */
        .work-types {
            background-color: #f8f9fa;
        }
        .work-types-intro {
            max-width: 900px;
            margin: 0 auto 50px;
            text-align: center;
        }
        .work-types-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }
        .work-type-card {
            background: white;
            border-radius: 12px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #eee;
            transition: all 0.4s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
                display: flex;
    flex-direction: column;
    justify-content: space-between;
        }
        .work-type-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 86, 184, 0.15);
            border-color: #0056b8;
        }
        .work-type-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: #0056b8;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .work-type-card:hover:before {
            transform: scaleX(1);
        }
        .work-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 25px;
            transition: all 0.4s;
        }
        .work-type-card:hover .work-icon {
            transform: rotate(15deg) scale(1.1);
        }
        .work-type-card h3 {
            margin-bottom: 15px;
            min-height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .work-type-card p {
            color: #666;
            margin-bottom: 25px;
            line-height: 1.7;
        }
        .work-features {
            text-align: left;
            margin-bottom: 25px;
        }
        .work-feature {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            color: #555;
        }
        .work-feature i {
            color: #0056b8;
            font-size: 0.9rem;
        }
        .work-cta {
            margin-top: 20px;
        }

        /* ===== 3. ПРОЦЕСС МОНТАЖА ===== */
        .engineering-process {
            background-color: white;
        }
        .process-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .process-timeline {
            position: relative;
            padding-left: 50px;
            margin-top: 50px;
        }
        .process-timeline:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, #0056b8, rgba(0, 86, 184, 0.3));
        }
        .process-step {
            position: relative;
            margin-bottom: 50px;
            padding-left: 40px;
        }
        .process-step:last-child {
            margin-bottom: 0;
        }
        .step-number {
            position: absolute;
            left: -30px;
            top: 0;
            width: 40px;
            height: 40px;
            background: #0056b8;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.2rem;
            box-shadow: 0 5px 15px rgba(0, 86, 184, 0.3);
            z-index: 2;
        }
        .step-content {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            border-left: 4px solid #0056b8;
            transition: all 0.3s;
        }
        .process-step:hover .step-content {
            background: white;
            box-shadow: 0 10px 25px rgba(0, 86, 184, 0.1);
            transform: translateX(10px);
        }
        .step-content h4 {
            color: #0056b8;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }
        .step-content p {
            color: #666;
            margin-bottom: 15px;
        }
        .step-features {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        .step-feature {
            background: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            color: #0056b8;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }
        .process-step:hover .step-feature {
            background: #e9f5ff;
            border-color: #0056b8;
        }

        /* ===== 4. ОБОРУДОВАНИЕ ДЛЯ МОНТАЖА ===== */
        .equipment-section {
            background-color: #f8f9fa;
        }
        .equipment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .equipment-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #eee;
            transition: all 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .equipment-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 86, 184, 0.15);
            border-color: #0056b8;
        }
        .equipment-image {
            height: 200px;
            background-color: #f0f0f0;
            overflow: hidden;
            position: relative;
        }
        .equipment-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s;
        }
        .equipment-card:hover .equipment-image img {
            transform: scale(1.05);
        }
        .equipment-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .equipment-content h3 {
            margin-bottom: 15px;
            font-size: 1.3rem;
        }
        .equipment-content p {
            color: #666;
            margin-bottom: 20px;
            flex-grow: 1;
        }
        .equipment-specs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }
        .spec-item {
            background: #f8f9fa;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            color: #555;
        }

        /* ===== 5. ПРЕВЬЮ ВЛОЖЕННЫХ СТРАНИЦ ===== */
        .subpages-preview {
            background-color: white;
        }
        .subpages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .subpage-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #eee;
            transition: all 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .subpage-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 86, 184, 0.15);
            border-color: #0056b8;
        }
        .subpage-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #0056b8;
            color: white;
            padding: 5px 15px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }
        .subpage-image {
            height: 180px;
            background-color: #f0f0f0;
            overflow: hidden;
            position: relative;
        }
        .subpage-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s;
        }
        .subpage-card:hover .subpage-image img {
            transform: scale(1.05);
        }
        .subpage-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .subpage-content h3 {
            margin-bottom: 15px;
            font-size: 1.4rem;
            color: #222;
        }
        .subpage-content p {
            color: #666;
            margin-bottom: 20px;
            flex-grow: 1;
            line-height: 1.7;
        }
        .subpage-features {
            margin-bottom: 25px;
        }
        .subpage-feature {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            color: #555;
        }
        .subpage-feature i {
            color: #0056b8;
            font-size: 0.9rem;
            width: 18px;
        }
        .subpage-cta {
            margin-top: auto;
        }
        .subpage-cta .btn {
            width: 100%;
            text-align: center;
        }

        /* ===== 6. ГАРАНТИИ И СЕРТИФИКАТЫ ===== */
        .guarantees-section {
            background-color: #f8f9fa;
        }
        .guarantees-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            align-items: start;
        }
        .guarantee-card {
            background: white;
            border-radius: 12px;
            padding: 35px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #eee;
            transition: all 0.3s;
            height: 100%;
        }
        .guarantee-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 86, 184, 0.15);
            border-color: #0056b8;
        }
        .guarantee-icon {
            font-size: 3rem;
            color: #0056b8;
            margin-bottom: 20px;
            height: 80px;
            display: flex;
            align-items: center;
        }
        .guarantee-card h3 {
            margin-bottom: 15px;
            font-size: 1.4rem;
            color: #222;
        }
        .guarantee-card p {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.7;
        }
        .guarantee-list {
            margin-top: 20px;
        }
        .guarantee-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            color: #555;
        }
        .guarantee-item i {
            color: #28a745;
            font-size: 0.9rem;
        }

        /* ===== 7. ЦЕНЫ И ПАКЕТЫ УСЛУГ ===== */
        .pricing-section {
            background-color: white;
        }
        .pricing-tabs {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        .pricing-tab {
            padding: 12px 25px;
            background-color: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 6px;
            font-weight: 600;
            color: #555;
            cursor: pointer;
            transition: all 0.3s;
        }
        .pricing-tab:hover, .pricing-tab.active {
            background-color: #0056b8;
            color: white;
            border-color: #0056b8;
        }
        .pricing-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }
        .pricing-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 2px solid #eee;
            transition: all 0.4s ease;
            position: relative;
        }
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 86, 184, 0.15);
        }
        .pricing-card.popular {
            border-color: #0056b8;
            transform: scale(1.05);
        }
        .pricing-card.popular:hover {
            transform: scale(1.05) translateY(-10px);
        }
        .popular-badge {
            position: absolute;
            top: 15px;
            right: -35px;
            background: #0056b8;
            color: white;
            padding: 8px 40px;
            font-size: 0.9rem;
            font-weight: 600;
            transform: rotate(45deg);
        }
        .pricing-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        .pricing-card.popular .pricing-header {
            background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
            color: white;
        }
        .pricing-header h3 {
            margin-bottom: 10px;
            font-size: 1.5rem;
        }
        .pricing-header .price {
            font-size: 2.5rem;
            font-weight: 800;
            color: #0056b8;
        }
        .pricing-card.popular .pricing-header .price {
            color: white;
        }
        .price-period {
            color: #666;
            font-size: 0.9rem;
        }
        .pricing-card.popular .price-period {
            color: rgba(255, 255, 255, 0.9);
        }
        .pricing-features {
            padding: 30px;
        }
        .pricing-feature {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: #555;
        }
        .pricing-feature i {
            color: #28a745;
            font-size: 0.9rem;
        }
        .pricing-feature.disabled {
            color: #999;
        }
        .pricing-feature.disabled i {
            color: #ccc;
        }
        .pricing-footer {
            padding: 0 30px 30px;
            text-align: center;
        }

        /* ===== 8. ФОРМА ЗАЯВКИ ===== */
        .application-section {
            background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
            color: white;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
        }
        .application-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }
        .application-content h2 {
            color: white;
        }
        .application-content h2:after {
            background-color: white;
            left: 50%;
            transform: translateX(-50%);
        }
        .application-content p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            opacity: 0.9;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        .application-form {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 35px;
            border-radius: 12px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }
        .application-form h3 {
            color: #0056b8;
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.5rem;
        }
        .application-form .btn {
            width: 100%;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }
        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        .file-label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 16px;
            background-color: #f8f9fa;
            border: 2px dashed #ddd;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .file-label:hover {
            border-color: #0056b8;
            background-color: #f0f7ff;
        }
        .urgency-selector {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .urgency-option {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background-color: #f8f9fa;
            border: 2px solid #ddd;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
            flex: 1;
            min-width: 180px;
            justify-content: center;
        }
        .urgency-option:hover {
            background-color: #e9ecef;
        }
        .urgency-option.selected {
            background-color: #0056b8;
            color: white;
            border-color: #0056b8;
        }
        .urgency-option input {
            display: none;
        }

        /* ===== 9. SEO-КОНТЕНТ ===== */
        .seo-content-section {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 60px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
        .seo-content {
            max-width: 900px;
            margin: 0 auto;
        }
        .seo-content h2 {
            text-align: center;
        }
        .seo-content h2:after {
            left: 50%;
            transform: translateX(-50%);
        }
        .seo-content p {
            margin-bottom: 20px;
            font-size: 1.05rem;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }
        .seo-content ul {
            margin-left: 20px;
            margin-bottom: 20px;
        }
        .seo-content li {
            margin-bottom: 10px;
            color: #555;
            position: relative;
            padding-left: 25px;
        }
        .seo-content li:before {
            content: '•';
            color: #0056b8;
            font-size: 1.5rem;
            position: absolute;
            left: 0;
            top: -5px;
        }
        .keywords {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 30px;
            justify-content: center;
        }
        .keyword-tag {
            background-color: #e9f5ff;
            color: #0056b8;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* ===== MODAL: Обсуждение проекта (footer.php) ===== */
        #projectModal {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 3000;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.3s, visibility 0.3s;
        }
        #projectModal.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }
        #projectModal .modal-content {
            width: 100%;
            max-width: 560px;
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            transform: translateY(20px);
            transition: transform 0.3s ease;
            position: relative;
        }
        #projectModal.active .modal-content {
            transform: translateY(0);
        }
        #projectModal .modal-close {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.18);
            color: white;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }
        #projectModal .modal-close:hover {
            background: rgba(255, 255, 255, 0.28);
        }
        #projectModal .modal-header {
            background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
            color: white;
            padding: 22px 24px;
            text-align: center;
        }
        #projectModal .modal-body {
            padding: 24px;
        }

        /* ===== СТИКИ-ВИДЖЕТ (footer.php) ===== */
        .sticky-widget {
            position: fixed;
            right: 30px;
            bottom: 30px;
            width: 350px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            z-index: 1500;
            overflow: hidden;
            display: none;
        }
        .sticky-widget.active {
            display: block;
            animation: slideInRight 0.5s ease;
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .widget-header {
            background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .widget-header h4 {
            color: white;
            margin-bottom: 10px;
            margin-top: 0;
        }
        .widget-header p {
            color: white;
            margin: 0;
            font-size: 0.9rem;
        }
        .widget-content {
            padding: 25px;
        }
        .widget-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
        }
        .widget-features {
            margin: 15px 0;
        }
        .widget-feature {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            color: #555;
            font-size: 0.9rem;
        }
        .widget-feature i {
            color: #0056b8;
        }

        /* ===== ФУТЕР ===== */
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
            color: #0056b8;
        }
        .footer-about p {
            margin-bottom: 25px;
            line-height: 1.7;
            color: #aaa;
            font-size: 0.95rem;
        }
        .footer-links h4, .footer-contacts h4 {
            color: white;
            margin-bottom: 25px;
            font-size: 1.1rem;
            position: relative;
            padding-bottom: 10px;
        }
        .footer-links h4:after, .footer-contacts h4:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #0056b8;
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
            color: #0056b8;
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
            color: #0056b8;
            width: 18px;
            text-align: center;
        }
        .footer-contacts a {
            color: #ddd;
        }
        .footer-contacts a:hover {
            color: #0056b8;
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
            background-color: #0056b8;
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
            color: #0056b8;
        }

        /* ===== АДАПТИВНОСТЬ ===== */
        @media (max-width: 992px) {
            .service-maintenance-hero .container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .hero-text h1 {
                font-size: 2.4rem;
            }
            .form-row {
                grid-template-columns: 1fr;
            }
            h1 { font-size: 2.4rem; }
            h2 { font-size: 2rem; }
            .seo-content-section {
                padding: 30px 20px;
            }
            .sticky-widget {
                width: 300px;
                right: 20px;
            }
        }
        
        @media (max-width: 768px) {
            section { padding: 60px 0; }
            .service-maintenance-hero { padding: 100px 0 60px; }
            .sticky-widget { display: none !important; }
            .work-types-grid, .subpages-grid {
                grid-template-columns: 1fr;
            }
            .process-timeline {
                padding-left: 30px;
            }
            .process-step {
                padding-left: 30px;
            }
            .step-number {
                left: -20px;
                width: 30px;
                height: 30px;
                font-size: 1rem;
            }
            .pricing-cards {
                grid-template-columns: 1fr;
            }
            .pricing-card.popular {
                transform: none;
            }
            .pricing-card.popular:hover {
                transform: translateY(-10px);
            }
            .popular-badge {
                top: 10px;
                right: -25px;
                padding: 5px 30px;
                font-size: 0.8rem;
            }
            .urgency-selector {
                flex-direction: column;
            }
            .urgency-option {
                width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            h1 { font-size: 2rem; }
            h2 { font-size: 1.7rem; }
            .hero-form {
                padding: 25px;
            }
            .work-type-card, .guarantee-card {
                padding: 25px 20px;
            }
            .application-form {
                padding: 20px;
            }
            .hero-features {
                grid-template-columns: 1fr;
            }
            .btn {
                padding: 12px 26px;
                font-size: 1rem;
            }
        }

        @media (max-width: 360px) {
            .container { padding: 0 16px; }
            h1 { font-size: 1.9rem; }
            h2 { font-size: 1.6rem; }
            .hero-form { padding: 22px; }
        }

        @media (max-width: 320px) {
            .container { padding: 0 12px; }
            h1 { font-size: 1.75rem; }
            h2 { font-size: 1.5rem; }
            .hero-form h3,
            .application-form h3 { font-size: 1.3rem; }
            .work-type-card, .guarantee-card { padding: 20px 16px; }
            .application-form { padding: 18px; }
        }
    </style>

<main class="service-maintenance-page">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="breadcrumbs">
        <div class="container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a> <span>/</span>
            <a href="<?php echo esc_url( $services_url ); ?>">Услуги</a> <span>/</span>
            <strong><?php echo esc_html( get_the_title() ); ?></strong>
        </div>
    </div>

    <!-- 1. ГЕРОЙ-СЕКЦИЯ -->
    <section class="service-maintenance-hero">
        <div class="container">
            <div class="hero-text">
                <h1>Сервис и обслуживание промышленных холодильных систем</h1>
                <p>Плановое техническое обслуживание, диагностика, ремонт и аварийные выезды. Поддерживаем работоспособность чиллеров, холодильных агрегатов, камер, теплообменников и автоматики, чтобы ваше оборудование работало стабильно и без простоев.</p>
                
                <div class="hero-features">
                    <div class="hero-feature">
                        <i class="fas fa-clipboard-list"></i>
                        <div>
                            <h4>Техническое обслуживание</h4>
                            <p>Регламентное ТО по чек-листу</p>
                        </div>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-wrench"></i>
                        <div>
                            <h4>Ремонт оборудования</h4>
                            <p>Диагностика и устранение неисправностей</p>
                        </div>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-ambulance"></i>
                        <div>
                            <h4>Аварийный выезд</h4>
                            <p>Оперативная реакция 24/7</p>
                        </div>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-file-contract"></i>
                        <div>
                            <h4>Сервисные контракты</h4>
                            <p>Плановые выезды и приоритетная поддержка</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="hero-form">
                <h3>Заявка на сервис / аварийный выезд</h3>
                <form id="serviceMaintenanceForm" class="form-tel">
                    <input type="hidden" name="formType" value="Сервис и обслуживание — первичная заявка">
                    <div class="form-group">
                        <label for="service-maintenance-name">Ваше имя *</label>
                        <input type="text" id="service-maintenance-name" name="name" class="form-control" placeholder="Иванов Иван" required>
                    </div>
                    <div class="form-group">
                        <label for="service-maintenance-phone">Телефон *</label>
                        <input type="tel" id="service-maintenance-phone" name="phone" class="form-control" placeholder="+7 (___) ___-__-__" required>
                    </div>
                    <div class="form-group">
                        <label for="service-maintenance-type">Что нужно</label>
                        <select id="service-maintenance-type" name="serviceType" class="form-select">
                            <option value="">Выберите услугу</option>
                            <option value="maintenance">Техническое обслуживание</option>
                            <option value="repair">Ремонт холодильного оборудования</option>
                            <option value="emergency">Аварийный выезд</option>
                            <option value="diagnostics">Диагностика</option>
                            <option value="other">Другое</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service-maintenance-model">Оборудование / модель</label>
                        <input type="text" id="service-maintenance-model" name="model" class="form-control" placeholder="Например: чиллер 120 кВт, камера -18°C">
                    </div>
                    <button type="submit" class="btn">
                        <i class="fas fa-paper-plane"></i> Оставить заявку
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- 2. СЕРВИС И ОБСЛУЖИВАНИЕ -->
    <section class="work-types fade-in">
        <div class="container">
            <div class="work-types-intro">
                <h2>Сервис и обслуживание промышленных холодильных систем</h2>
                <p>Выполняем плановое ТО, диагностику и ремонт холодильного оборудования. Оперативно реагируем на аварийные ситуации и помогаем снизить риск простоев и потерь продукции.</p>
            </div>
            
            <div class="work-types-grid">
                <div class="work-type-card">
                    <div class="work-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h3>Техническое обслуживание</h3>
                    <p>Регламентное ТО по чек-листу: контроль параметров, профилактика утечек, очистка узлов и проверка автоматики. Подходит для разовых выездов и сервисных контрактов.</p>
                    
                    <div class="work-features">
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Осмотр и диагностика</span>
                        </div>
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Проверка утечек и давления</span>
                        </div>
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Чистка теплообменников</span>
                        </div>
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Протокол и рекомендации</span>
                        </div>
                    </div>
                    
                    <div class="work-cta">
                        <a href="#application" class="btn btn-outline">Заказать ТО</a>
                    </div>
                </div>
                
                <div class="work-type-card">
                    <div class="work-icon">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <h3>Ремонт холодильного оборудования</h3>
                    <p>Ищем и устраняем неисправности, выполняем замену узлов и комплектующих. Восстанавливаем работу системы и проверяем параметры в рабочих режимах.</p>
                    
                    <div class="work-features">
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Диагностика неисправности</span>
                        </div>
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Замена узлов и компонентов</span>
                        </div>
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Герметизация / опрессовка</span>
                        </div>
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Пуск и проверка параметров</span>
                        </div>
                    </div>
                    
                    <div class="work-cta">
                        <a href="#application" class="btn btn-outline">Заказать ремонт</a>
                    </div>
                </div>
                
                <div class="work-type-card">
                    <div class="work-icon">
                        <i class="fas fa-ambulance"></i>
                    </div>
                    <h3>Аварийный выезд</h3>
                    <p>Оперативный выезд сервисного инженера для диагностики и восстановления работы оборудования. Помогаем быстро стабилизировать режимы и минимизировать простой.</p>
                    
                    <div class="work-features">
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Выезд 24/7 по заявке</span>
                        </div>
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Оперативная диагностика</span>
                        </div>
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>Стабилизация и запуск</span>
                        </div>
                        <div class="work-feature">
                            <i class="fas fa-check"></i>
                            <span>План ремонта и запчасти</span>
                        </div>
                    </div>
                    
                    <div class="work-cta">
                        <a href="#application" class="btn btn-outline">Вызвать инженера</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. ПРОЦЕСС СЕРВИСНОГО ОБСЛУЖИВАНИЯ -->
    <section class="installation-process fade-in">
        <div class="container">
            <h2 class="text-center">Как проходит сервисное обслуживание</h2>
            <p class="text-center mb-40 section-lead">
                Прозрачный процесс — от заявки до восстановления работоспособности и отчета по выполненным работам.
            </p>
            
            <div class="process-container">
                <div class="process-timeline">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h4>Заявка и уточнение</h4>
                            <p>Фиксируем симптомы, тип оборудования и условия работы. По возможности просим фото/видео, ошибки контроллера и режимы — это ускоряет диагностику.</p>
                            <div class="step-features">
                                <span class="step-feature">Описание проблемы</span>
                                <span class="step-feature">Фото/видео</span>
                                <span class="step-feature">Модель и параметры</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h4>Выезд и диагностика</h4>
                            <p>Проверяем давление и температуру, работу компрессоров, вентиляторов и автоматики. При необходимости ищем утечки и анализируем причины остановок.</p>
                            <div class="step-features">
                                <span class="step-feature">Параметры системы</span>
                                <span class="step-feature">Ошибки контроллера</span>
                                <span class="step-feature">Поиск утечки</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h4>Смета и согласование</h4>
                            <p>Предлагаем варианты решения, согласуем объем работ, стоимость и сроки. При необходимости подбираем запчасти и расходные материалы.</p>
                            <div class="step-features">
                                <span class="step-feature">Стоимость и сроки</span>
                                <span class="step-feature">Запчасти</span>
                                <span class="step-feature">Гарантия</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <h4>Выполнение работ</h4>
                            <p>Проводим техническое обслуживание или ремонт: чистка узлов, регулировка параметров, замена компонентов, восстановление герметичности контура и настройка автоматики.</p>
                            <div class="step-features">
                                <span class="step-feature">ТО / ремонт</span>
                                <span class="step-feature">Замена узлов</span>
                                <span class="step-feature">Настройка</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="process-step">
                        <div class="step-number">5</div>
                        <div class="step-content">
                            <h4>Проверка и отчет</h4>
                            <p>Проверяем работу оборудования в заданных режимах, фиксируем параметры и оформляем документы. Даем рекомендации по дальнейшей эксплуатации и профилактике.</p>
                            <div class="step-features">
                                <span class="step-feature">Пуск/тест</span>
                                <span class="step-feature">Акт работ</span>
                                <span class="step-feature">Рекомендации</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- 6. ГАРАНТИИ И СЕРТИФИКАТЫ -->
    <section class="guarantees-section fade-in">
        <div class="container">
            <h2 class="text-center">Гарантии и безопасность</h2>
            <p class="text-center mb-40 section-lead">
                Фиксируем объем работ, предоставляем документы и отвечаем за качество сервиса.
            </p>
            
            <div class="guarantees-container">
                <div class="guarantee-card">
                    <div class="guarantee-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Гарантия на работы и отчетность</h3>
                    <p>После выезда предоставляем акт и рекомендации. Гарантия на выполненные работы и замененные узлы — по условиям договора и производителя.</p>
                    
                    <div class="guarantee-list">
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Акт выполненных работ</span>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Чек-лист ТО</span>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Фиксация параметров</span>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Рекомендации по эксплуатации</span>
                        </div>
                    </div>
                </div>
                
                <div class="guarantee-card">
                    <div class="guarantee-icon">
                        <i class="fa-solid fa-certificate"></i>
                    </div>
                    <h3>Квалификация специалистов</h3>
                    <p>Сервисные инженеры с опытом в промышленном холодоснабжении. Работаем с оборудованием разных производителей и знаем типовые причины отказов.</p>
                    
                    <div class="guarantee-list">
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Сервисные инженеры</span>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Диагностика и ремонт</span>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Автоматика и КИПиА</span>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Учет норм и требований</span>
                        </div>
                    </div>
                </div>
                
                <div class="guarantee-card">
                    <div class="guarantee-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Страхование ответственности</h3>
                    <p>Наша компания застраховала ответственность на сумму 10 млн рублей. Это гарантирует защиту интересов наших клиентов.</p>
                    
                    <div class="guarantee-list">
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Страхование ответственности</span>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Сумма страховки: 10 млн руб</span>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Все риски застрахованы</span>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check"></i>
                            <span>Быстрое урегулирование</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. ЦЕНЫ И ПАКЕТЫ УСЛУГ -->
    <section class="pricing-section fade-in">
        <div class="container">
            <h2 class="text-center">Стоимость сервисных работ</h2>
            <p class="text-center mb-40 section-lead">
                Стоимость зависит от типа оборудования, сложности неисправности, удаленности объекта и срочности. Точную цену сообщим после уточнения деталей или диагностики.
            </p>
            
            <div class="pricing-tabs">
                <div class="pricing-tab active" data-tab="all">Все пакеты</div>
                <div class="pricing-tab" data-tab="maintenance">ТО</div>
                <div class="pricing-tab" data-tab="repair">Ремонт</div>
                <div class="pricing-tab" data-tab="emergency">Аварийный выезд</div>
            </div>
            
            <div class="pricing-cards">
                <!-- Пакет: техническое обслуживание -->
                <div class="pricing-card" data-category="maintenance">
                    <div class="pricing-header">
                        <h3>Техническое обслуживание</h3>
                        <div class="price">по запросу</div>
                        <div class="price-period">за выезд / по договору</div>
                    </div>
                    <div class="pricing-features">
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Осмотр и диагностика</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Проверка параметров и утечек</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Чистка и профилактика</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Отчет и рекомендации</span>
                        </div>
                        <div class="pricing-feature disabled">
                            <i class="fas fa-times"></i>
                            <span>Замена узлов и компонентов</span>
                        </div>
                        <div class="pricing-feature disabled">
                            <i class="fas fa-times"></i>
                            <span>Выезд 24/7</span>
                        </div>
                    </div>
                    <div class="pricing-footer">
                        <a href="#application" class="btn btn-outline">Оставить заявку</a>
                    </div>
                </div>
                
                <!-- Популярный пакет: ремонт -->
                <div class="pricing-card popular" data-category="repair">
                    <div class="popular-badge">ПОПУЛЯРНО</div>
                    <div class="pricing-header">
                        <h3>Ремонт оборудования</h3>
                        <div class="price">по запросу</div>
                        <div class="price-period">по диагностике / смете</div>
                    </div>
                    <div class="pricing-features">
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Диагностика и поиск причины</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Устранение неисправности</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Замена узлов и комплектующих</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Проверка параметров и пуск</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Рекомендации по профилактике</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Подбор запчастей</span>
                        </div>
                    </div>
                    <div class="pricing-footer">
                        <a href="#application" class="btn">Оставить заявку</a>
                    </div>
                </div>
                
                <!-- Пакет: аварийный выезд -->
                <div class="pricing-card" data-category="emergency">
                    <div class="pricing-header">
                        <h3>Аварийный выезд</h3>
                        <div class="price">  </div>
                        <div class="price-period">срочный выезд 24/7</div>
                    </div>
                    <div class="pricing-features">
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Оперативный выезд инженера</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Первичная диагностика</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Стабилизация режимов</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>План дальнейшего ремонта</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Приоритет по запчастям</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <span>Отчет по работам</span>
                        </div>
                    </div>
                    <div class="pricing-footer">
                        <a href="#application" class="btn btn-outline">Оставить заявку</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. ФОРМА ЗАЯВКИ -->
    <section id="application" class="application-section fade-in">
        <div class="container">
            <div class="application-content">
                <h2>Оставьте заявку на сервис и обслуживание</h2>
                <p>Отправьте заявку — мы уточним детали и предложим оптимальный формат: техническое обслуживание, ремонт или аварийный выезд. Если есть фото/видео, ошибки контроллера или документация — приложите, это ускорит обработку.</p>
                
                <div class="application-form">
                    <h3>Заявка на сервис</h3>
                    
                    <form id="applicationForm" class="form-tel" enctype="multipart/form-data">
                        <input type="hidden" name="formType" value="Сервис и обслуживание — заявка">
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
                                <label>Что нужно</label>
                                <select name="serviceType" class="form-control">
                                    <option value="">Выберите услугу</option>
                                    <option value="maintenance">Техническое обслуживание</option>
                                    <option value="repair">Ремонт холодильного оборудования</option>
                                    <option value="emergency">Аварийный выезд</option>
                                    <option value="diagnostics">Диагностика</option>
                                    <option value="other">Другое</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Оборудование / модель</label>
                            <input type="text" name="model" class="form-control" placeholder="Например: чиллер 120 кВт, камера -18°C">
                        </div>
                        
                        <div class="form-group">
                            <label>Прикрепить фото / видео / документы (по желанию)</label>
                            <div class="file-upload">
                                <input type="file" id="projectFile" name="projectFile">
                                <div class="file-label">
                                    <i class="fas fa-paperclip"></i>
                                    <span id="projectFileName">Выберите файл (до 10 МБ)...</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Срочность выполнения работ</label>
                            <div class="urgency-selector">
                                <label class="urgency-option">
                                    <input type="radio" name="urgency" value="standard" checked>
                                    <i class="far fa-calendar"></i>
                                    <span>Плановая (1–3 дня)</span>
                                </label>
                                <label class="urgency-option">
                                    <input type="radio" name="urgency" value="urgent">
                                    <i class="fas fa-clock"></i>
                                    <span>Срочная (24–48 часов)</span>
                                </label>
                                <label class="urgency-option">
                                    <input type="radio" name="urgency" value="emergency">
                                    <i class="fas fa-ambulance"></i>
                                    <span>Аварийная (2–4 часа)</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Дополнительные пожелания</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="Опишите проблему (симптомы, ошибки), адрес объекта, тип/модель оборудования, режимы работы, когда удобно принять инженера..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn">
                            <i class="fas fa-paper-plane"></i> Отправить заявку
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. SEO-КОНТЕНТ -->
    <section class="seo-content-section fade-in">
        <div class="container">
            <div class="seo-content">
                <h2>Сервис и обслуживание промышленных холодильных систем от ТЕРМОСИСТЕМЫ-С</h2>
                
                <p>Компания «ТЕРМОСИСТЕМЫ-С» с 2010 года выполняет сервис и обслуживание промышленных холодильных систем. Мы помогаем поддерживать оборудование в рабочем состоянии, предотвращать аварии и снижать простои на предприятиях пищевой, химической, металлообрабатывающей и других отраслей.</p>
                
                <p><strong>Техническое обслуживание</strong> включает осмотр узлов, проверку параметров, контроль утечек, чистку теплообменников и диагностику автоматики. Регулярное ТО снижает риск внеплановых остановок и продлевает срок службы оборудования.</p>
                
                <p><strong>Ремонт холодильного оборудования</strong> начинаем с диагностики и поиска причины отказа. Согласуем объем работ, подбираем запчасти и восстанавливаем работоспособность системы с проверкой режимов после ремонта.</p>
                
                <p><strong>Аварийный выезд</strong> нужен, когда важно быстро стабилизировать работу системы и сохранить продукт. Оперативно выезжаем, проводим первичную диагностику, устраняем критичные неисправности и формируем план дальнейших работ.</p>
                
                <p><strong>Преимущества работы с нами:</strong></p>
                
                <ul>
                    <li>Опыт сервисных работ с промышленным холодом</li>
                    <li>Плановое ТО и сервисные контракты</li>
                    <li>Диагностика неисправностей и ремонт</li>
                    <li>Оперативный аварийный выезд</li>
                    <li>Отчетность и рекомендации по эксплуатации</li>
                    <li>Работаем по всей территории России</li>
                </ul>
                
                <p>Мы выполняем сервисные работы для объектов в Москве, Санкт-Петербурге, Самаре, Екатеринбурге, Новосибирске и других городах России. Работаем с оборудованием разных производителей, подбираем запчасти и предлагаем варианты ремонта с учетом бюджета и сроков.</p>
                
                <p>Если вам нужно техническое обслуживание, ремонт или аварийный выезд — оставьте заявку. Мы уточним детали и предложим решение с оценкой стоимости и сроков.</p>
                
                <div class="keywords">
                    <div class="keyword-tag">сервис холодильного оборудования</div>
                    <div class="keyword-tag">техническое обслуживание</div>
                    <div class="keyword-tag">ремонт холодильного оборудования</div>
                    <div class="keyword-tag">обслуживание чиллеров</div>
                    <div class="keyword-tag">аварийный выезд</div>
                    <div class="keyword-tag">ремонт промышленного холода</div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
$service_maintenance_schema = array(
   '@context' => 'https://schema.org',
   '@type' => 'Service',
   'name' => 'Сервис и обслуживание промышленных холодильных систем',
   'description' => 'Техническое обслуживание, ремонт холодильного оборудования и аварийные выезды',
   'provider' => array(
      '@type' => 'Organization',
      'name' => get_bloginfo( 'name' ),
      'url' => home_url( '/' ),
      'telephone' => $termoservis_phone_tel,
      'address' => array(
         '@type' => 'PostalAddress',
         'streetAddress' => 'ул. Заводская, 42',
         'addressLocality' => 'Самара',
         'addressCountry' => 'RU',
      ),
   ),
   'areaServed' => array(
      '@type' => 'Country',
      'name' => 'Россия',
   ),
   'hasOfferCatalog' => array(
      '@type' => 'OfferCatalog',
      'name' => 'Сервис и обслуживание',
      'itemListElement' => array(
         array(
            '@type' => 'Offer',
            'itemOffered' => array(
               '@type' => 'Service',
               'name' => 'Техническое обслуживание',
               'description' => 'Регламентное ТО, диагностика, профилактика и отчет по работам',
            ),
         ),
         array(
            '@type' => 'Offer',
            'itemOffered' => array(
               '@type' => 'Service',
               'name' => 'Ремонт холодильного оборудования',
               'description' => 'Диагностика, устранение неисправностей, замена узлов и пуск после ремонта',
            ),
         ),
         array(
            '@type' => 'Offer',
            'itemOffered' => array(
               '@type' => 'Service',
               'name' => 'Аварийный выезд',
               'description' => 'Срочный выезд 24/7, первичная диагностика и стабилизация работы оборудования',
            ),
         ),
      ),
   ),
);
?>

<!-- СКРИПТ ДЛЯ СТРУКТУРИРОВАННЫХ ДАННЫХ (Schema.org) -->
<script type="application/ld+json">
   <?php echo wp_json_encode( $service_maintenance_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>
</script>

    <script>
        // ===== ОСНОВНОЙ СКРИПТ =====
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
            fadeInOnScroll(); // Проверка при загрузке
            
            // ===== ТАБЫ ДЛЯ ЦЕНООБРАЗОВАНИЯ =====
            const pricingTabs = document.querySelectorAll('.pricing-tab');
            const pricingCards = document.querySelectorAll('.pricing-card');
            
            pricingTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabName = this.dataset.tab;
                    
                    // Активный класс для табов
                    pricingTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Показ/скрытие карточек
                    pricingCards.forEach(card => {
                        if (tabName === 'all') {
                            card.style.display = 'block';
                        } else if (card.dataset.category === tabName) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
            
            // ===== СЕЛЕКТОР СРОЧНОСТИ =====
            const urgencyOptions = document.querySelectorAll('.urgency-option');
            urgencyOptions.forEach(option => {
                const radio = option.querySelector('input[type="radio"]');
                
                option.addEventListener('click', function() {
                    urgencyOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                    radio.checked = true;
                });
                
                if (radio.checked) {
                    option.classList.add('selected');
                }
            });
            
            // ===== РАБОТА С ФАЙЛАМИ =====
            const projectFileInput = document.getElementById('projectFile');
            const projectFileName = document.getElementById('projectFileName');
            
            if (projectFileInput && projectFileName) {
                projectFileInput.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        const fileName = this.files[0].name;
                        if (fileName.length > 30) {
                            projectFileName.textContent = fileName.substring(0, 27) + '...';
                        } else {
                            projectFileName.textContent = fileName;
                        }
                    } else {
                        projectFileName.textContent = 'Выберите файл (до 10 МБ)...';
                    }
                });
            }
            
            // ===== СБРОС UI ФОРМ (после form.reset() из /js/main.js) =====
            const applicationForm = document.getElementById('applicationForm');
            if (applicationForm) {
                applicationForm.addEventListener('reset', function() {
                    if (projectFileName) {
                        projectFileName.textContent = 'Выберите файл (до 10 МБ)...';
                    }

                    urgencyOptions.forEach(opt => opt.classList.remove('selected'));
                    urgencyOptions.forEach(option => {
                        const radio = option.querySelector('input[type="radio"]');
                        if (radio && radio.checked) {
                            option.classList.add('selected');
                        }
                    });
                });
            }
            
            // ===== ПЛАВНАЯ ПРОКРУТКА =====
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href === '#' || href === '#!') return;
                    
                    const targetElement = document.querySelector(href);
                    if (targetElement) {
                        e.preventDefault();
                        const targetPosition = targetElement.offsetTop - 100;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // ===== КНОПКА "ЗАКАЗАТЬ РАСЧЕТ" ИЗ КАРТОЧЕК ЦЕН =====
            document.querySelectorAll('.pricing-footer a').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetElement = document.querySelector('#application');
                    if (targetElement) {
                        const targetPosition = targetElement.offsetTop - 100;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // ===== ИНИЦИАЛИЗАЦИЯ =====
            // Показываем все карточки при загрузке (таб "Все пакеты")
            pricingCards.forEach(card => {
                card.style.display = 'block';
            });
        });
    </script>

<?php get_footer(); ?>
