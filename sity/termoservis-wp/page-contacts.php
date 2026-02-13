<?php

/**
 * Template Name: Контакты
 *
 * @package Termoservis
 */

$termoservis_phone_raw = get_theme_mod( 'termoservis_phone', '+7 (927) 001-38-85' );
$termoservis_phone_tel = preg_replace( '/[^\d+]/', '', $termoservis_phone_raw );
$termoservis_email     = get_theme_mod( 'termoservis_email', 'info@termoservice63.ru' );
$termoservis_address   = get_theme_mod( 'termoservis_address', 'г. Самара, ул. Заводская, 42' );
$termoservis_work_time = get_theme_mod( 'termoservis_work_time', 'Пн-Пт: 9:00-18:00, Сб-Вс: выходной' );
$theme_version         = wp_get_theme()->get( 'Version' );

$theme_uri   = get_template_directory_uri();
$hero_bg_url = $theme_uri . '/img/convertio.in_photo-1581094794329-c8112a89af12.webp';

$encoded_address = rawurlencode( wp_strip_all_tags( $termoservis_address ) );
$google_maps_url = 'https://www.google.com/maps?q=' . $encoded_address;
$yandex_maps_url = 'https://yandex.ru/maps/?text=' . $encoded_address;
$dgis_url        = 'https://2gis.ru/search/' . $encoded_address;

$requisites = array(
	'Полное наименование' => 'ООО «ТермоСервис»',
	'ИНН'                 => 'по запросу',
	'КПП'                 => 'по запросу',
	'ОГРН'                => 'по запросу',
	'Юридический адрес'   => $termoservis_address,
	'Фактический адрес'   => $termoservis_address,
	'Р/с'                 => 'по запросу',
	'Банк'                => 'по запросу',
	'БИК'                 => 'по запросу',
	'К/с'                 => 'по запросу',
);

$managers = array(
	array(
		'department' => 'Отдел продаж',
		'name'       => 'Менеджер',
		'phone'      => $termoservis_phone_raw,
		'phone_tel'  => $termoservis_phone_tel,
		'email'      => $termoservis_email,
	),
	array(
		'department' => 'Сервис',
		'name'       => 'Инженер',
		'phone'      => $termoservis_phone_raw,
		'phone_tel'  => $termoservis_phone_tel,
		'email'      => $termoservis_email,
	),
	array(
		'department' => 'Запчасти и комплектующие',
		'name'       => 'Специалист',
		'phone'      => $termoservis_phone_raw,
		'phone_tel'  => $termoservis_phone_tel,
		'email'      => $termoservis_email,
	),
);

get_header();
?>

<style>
	.contacts-page {
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

	.contacts-page .breadcrumbs {
		background-color: #f8f9fa;
		padding: 15px 0;
		font-size: 0.9rem;
		border-bottom: 1px solid #eee;
	}

	.contacts-page .breadcrumbs a {
		color: var(--primary);
	}

	.contacts-page .breadcrumbs a:hover {
		text-decoration: underline;
	}

	.contacts-page .breadcrumbs span {
		color: #666;
		margin: 0 8px;
	}

	/* ===== Заголовки ===== */
	.contacts-page h2 {
		font-size: 2.2rem;
		color: var(--primary);
		position: relative;
		padding-bottom: 15px;
		margin-bottom: 30px;
	}

	.contacts-page h2:after {
		content: '';
		position: absolute;
		bottom: 0;
		left: 0;
		width: 80px;
		height: 4px;
		background: var(--primary);
		border-radius: 2px;
      transform: none;
	}

	.contacts-page h3 {
		font-size: 1.4rem;
		color: #222;
		margin-bottom: 16px;
	}

	/* ===== Кнопки ===== */
	.contacts-page .btn {
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

	.contacts-page .btn:before {
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

	.contacts-page .btn:hover:before {
		left: 100%;
	}

	.contacts-page .btn:hover {
		background-color: #004494;
		transform: translateY(-3px);
		box-shadow: 0 10px 25px rgba(0, 86, 184, 0.3);
	}

	.contacts-page .btn-outline {
		background-color: transparent;
		border: 2px solid var(--primary);
		color: var(--primary);
	}

	.contacts-page .btn-outline:hover {
		background-color: var(--primary);
		color: #ffffff;
		box-shadow: 0 10px 25px rgba(0, 86, 184, 0.18);
	}

	.contacts-page .btn-light {
		background: rgba(255, 255, 255, 0.14);
		border: 1px solid rgba(255, 255, 255, 0.28);
		color: #ffffff;
		backdrop-filter: blur(8px);
	}

	.contacts-page .btn-light:hover {
		background: rgba(255, 255, 255, 0.22);
		box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
		transform: translateY(-3px);
	}

	.contacts-page .btn-light-outline {
		background: transparent;
		border: 2px solid rgba(255, 255, 255, 0.7);
		color: #ffffff;
	}

	.contacts-page .btn-light-outline:hover {
		background: rgba(255, 255, 255, 0.16);
		border-color: #ffffff;
	}

	/* ===== Формы ===== */
	.contacts-page .form-group {
		margin-bottom: 20px;
	}

	.contacts-page .form-group label {
		display: block;
		margin-bottom: 8px;
		font-weight: 600;
		color: #333;
		font-size: 0.95rem;
	}

	.contacts-page .form-control {
		width: 100%;
		padding: 14px 16px;
		border: 1px solid #ddd;
		border-radius: 8px;
		font-size: 1rem;
		transition: all 0.3s;
		font-family: inherit;
	}

	.contacts-page textarea.form-control {
		resize: vertical;
		min-height: 120px;
	}

	.contacts-page select.form-control {
		cursor: pointer;
	}

	.contacts-page .form-control:focus {
		outline: none;
		border-color: var(--primary);
		box-shadow: 0 0 0 3px rgba(0, 86, 184, 0.1);
	}

	.contacts-hero {
		background:
			linear-gradient(105deg, rgba(0, 86, 184, 0.92) 0%, rgba(0, 86, 184, 0.78) 100%),
			url('<?php echo esc_url( $hero_bg_url ); ?>') center/cover no-repeat;
		color: #ffffff;
		padding: 110px 0 70px;
		position: relative;
		overflow: hidden;
	}

	.contacts-hero:before {
		content: '';
		position: absolute;
		inset: 0;
		background:
			radial-gradient(1200px 600px at 10% 15%, rgba(255, 255, 255, 0.14), transparent 60%),
			radial-gradient(900px 520px at 85% 10%, rgba(0, 0, 0, 0.18), transparent 60%);
		pointer-events: none;
	}

	.contacts-hero .container {
		position: relative;
		z-index: 1;
	}

	.contacts-hero-grid {
		display: grid;
		grid-template-columns: 1.05fr 0.95fr;
		gap: 42px;
		align-items: start;
	}

	.contacts-kicker {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		padding: 10px 16px;
		background: rgba(255, 255, 255, 0.12);
		border: 1px solid rgba(255, 255, 255, 0.18);
		border-radius: 999px;
		font-weight: 700;
		margin-bottom: 18px;
	}

	.contacts-hero h1 {
		color: #ffffff;
		margin-bottom: 16px;
		text-align: left;
		text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
	}

	.contacts-hero p {
		font-size: 1.12rem;
		opacity: 0.95;
		line-height: 1.75;
		margin-bottom: 20px;
		max-width: 62ch;
	}

	.contacts-quicklinks {
		display: flex;
		flex-wrap: wrap;
		gap: 10px;
		margin-top: 14px;
	}

	.contacts-quicklinks a {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		padding: 10px 14px;
		border-radius: 999px;
		background: rgba(255, 255, 255, 0.14);
		border: 1px solid rgba(255, 255, 255, 0.20);
		color: #ffffff;
	}

	.contacts-quicklinks a:hover {
		background: rgba(255, 255, 255, 0.20);
	}

	.contacts-cards {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 16px;
	}

	.contacts-card {
		background: rgba(255, 255, 255, 0.10);
		border: 1px solid rgba(255, 255, 255, 0.18);
		border-radius: 14px;
		padding: 18px;
		backdrop-filter: blur(10px);
	}

	.contacts-card-title {
		display: flex;
		align-items: center;
		gap: 12px;
		font-weight: 800;
		margin-bottom: 10px;
	}

	.contacts-card-title i {
		width: 36px;
		height: 36px;
		border-radius: 10px;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		background: rgba(255, 255, 255, 0.14);
	}

	.contacts-card a {
		color: #ffffff;
		font-weight: 700;
	}

	.contacts-card small {
		display: block;
		margin-top: 6px;
		opacity: 0.9;
		line-height: 1.5;
	}

	.contacts-hero-actions {
		display: flex;
		gap: 12px;
		flex-wrap: wrap;
		margin-top: 16px;
	}

	.contacts-section {
		padding: 80px 0;
	}

	.contacts-section.alt {
		background: var(--bg);
	}

	.section-intro {
		color: var(--muted);
		max-width: 900px;
		margin: 0 auto 26px;
		line-height: 1.75;
	}

	.contacts-grid-2 {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 22px;
		align-items: start;
	}

	.contacts-box {
		background: var(--card);
		border: 1px solid var(--border);
		border-radius: var(--radius);
		box-shadow: var(--shadow);
		padding: 22px;
	}

	.contacts-page .form-row {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 16px;
		margin-bottom: 16px;
	}

	.requisites-table {
		width: 100%;
		border-collapse: collapse;
	}

	.requisites-table tr {
		border-bottom: 1px solid rgba(0, 0, 0, 0.06);
	}

	.requisites-table th,
	.requisites-table td {
		padding: 12px 10px;
		text-align: left;
		vertical-align: top;
	}

	.requisites-table th {
		width: 44%;
		color: #222;
		font-weight: 700;
	}

	.requisites-table td {
		color: var(--muted);
	}

	.map-frame {
		width: 100%;
		height: 360px;
		border: 0;
		border-radius: 14px;
		background: #e9ecef;
	}

	.map-actions {
		display: flex;
		gap: 10px;
		flex-wrap: wrap;
		margin-top: 14px;
	}

	.map-note {
		color: var(--muted);
		font-size: 0.95rem;
		margin-top: 12px;
		line-height: 1.6;
	}

	.directions-list {
		display: grid;
		gap: 12px;
		margin-top: 12px;
	}

	.direction-item {
		display: flex;
		gap: 12px;
		align-items: flex-start;
		padding: 12px 14px;
		border: 1px solid rgba(0, 0, 0, 0.06);
		border-radius: 12px;
		background: #ffffff;
	}

	.direction-item i {
		width: 36px;
		height: 36px;
		border-radius: 10px;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		background: rgba(0, 86, 184, 0.08);
		color: var(--primary);
		flex-shrink: 0;
	}

	.direction-item strong {
		display: block;
		margin-bottom: 4px;
	}

	.manager-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 16px;
		margin-top: 28px;
	}

	.manager-card {
		background: var(--card);
		border: 1px solid var(--border);
		border-radius: 14px;
		box-shadow: var(--shadow);
		padding: 18px;
	}

	.manager-card h3 {
		margin-bottom: 8px;
		font-size: 1.2rem;
	}

	.manager-meta {
		color: var(--muted);
		margin-bottom: 14px;
	}

	.manager-links {
		display: grid;
		gap: 10px;
	}

	.manager-links a {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		color: #222;
		font-weight: 700;
	}

	.manager-links a i {
		color: var(--primary);
		width: 18px;
	}

	/* ===== Формы (аккордеон на <details>) ===== */
	.forms-accordion {
		display: grid;
		gap: 14px;
		margin-top: 26px;
	}

	.forms-accordion details {
		background: var(--card);
		border: 1px solid var(--border);
		border-radius: 14px;
		box-shadow: var(--shadow);
		overflow: hidden;
	}

	.forms-accordion summary {
		list-style: none;
		cursor: pointer;
		padding: 18px 18px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 14px;
		font-weight: 800;
	}

	.forms-accordion summary::-webkit-details-marker {
		display: none;
	}

	.form-summary-left {
		display: inline-flex;
		align-items: center;
		gap: 12px;
	}

	.form-summary-left i {
		width: 38px;
		height: 38px;
		border-radius: 12px;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		background: rgba(0, 86, 184, 0.08);
		color: var(--primary);
	}

	.form-summary-chevron {
		width: 36px;
		height: 36px;
		border-radius: 10px;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		background: rgba(0, 0, 0, 0.04);
		transition: transform 0.25s ease;
	}

	.forms-accordion details[open] .form-summary-chevron {
		transform: rotate(180deg);
	}

	.form-body {
		padding: 0 18px 18px;
		border-top: 1px solid rgba(0, 0, 0, 0.06);
	}

	.form-body p {
		color: var(--muted);
		line-height: 1.7;
		margin: 14px 0 16px;
	}

	.form-note {
		font-size: 0.9rem;
		color: var(--muted);
		margin-top: 10px;
	}

	/* ===== Многошаговая форма (опросный лист чиллера) ===== */
	.multi-step-form {
		background: linear-gradient(135deg, var(--primary) 0%, #004494 100%);
		color: #ffffff;
		border-radius: 22px;
		overflow: hidden;
		position: relative;
	}

	.multi-step-form .form-container {
		max-width: 900px;
		margin: 0 auto;
		position: relative;
		z-index: 2;
	}

	.multi-step-form .form-header {
		text-align: center;
		margin-bottom: 34px;
	}

	.multi-step-form .form-header h2 {
		color: #ffffff;
		margin-bottom: 10px;
	}

	.multi-step-form .form-header h2:after {
		background-color: #ffffff;
		left: 50%;
		transform: translateX(-50%);
	}

	.multi-step-form .form-progress {
		display: flex;
		justify-content: space-between;
		gap: 12px;
		margin-bottom: 30px;
		position: relative;
	}

	.multi-step-form .form-progress:before {
		content: '';
		position: absolute;
		top: 20px;
		left: 0;
		right: 0;
		height: 3px;
		background-color: rgba(255, 255, 255, 0.26);
		z-index: 1;
	}

	.multi-step-form .progress-step {
		text-align: center;
		position: relative;
		z-index: 2;
		flex: 1;
	}

	.multi-step-form .step-circle {
		width: 40px;
		height: 40px;
		background-color: rgba(255, 255, 255, 0.18);
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		margin: 0 auto 10px;
		font-weight: 800;
		transition: all 0.3s ease;
	}

	.multi-step-form .progress-step.active .step-circle {
		background-color: #ffffff;
		color: var(--primary);
		transform: scale(1.06);
	}

	.multi-step-form .progress-step.completed .step-circle {
		background-color: #4dabf7;
		color: #ffffff;
	}

	.multi-step-form .step-label {
		font-size: 0.85rem;
		opacity: 0.92;
		line-height: 1.2;
	}

	.multi-step-form .form-content {
		background-color: rgba(255, 255, 255, 0.96);
		padding: 36px;
		border-radius: 18px;
		box-shadow: 0 20px 50px rgba(0, 0, 0, 0.22);
	}

	.multi-step-form .form-step-content {
		display: none;
	}

	.multi-step-form .form-step-content.active {
		display: block;
		animation: contactsFadeIn 0.5s ease;
	}

	@keyframes contactsFadeIn {
		from { opacity: 0; }
		to { opacity: 1; }
	}

	.multi-step-form .form-row {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 16px;
		margin-bottom: 16px;
	}

	.multi-step-form .checkbox-grid {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
		gap: 12px;
	}

	.multi-step-form .checkbox-label {
		display: flex;
		align-items: center;
		gap: 10px;
		padding: 12px;
		background-color: #f8f9fa;
		border-radius: 10px;
		cursor: pointer;
		transition: background 0.25s ease;
	}

	.multi-step-form .checkbox-label:hover {
		background-color: #f0f7ff;
	}

	.multi-step-form .checkbox-label input {
		width: 18px;
		height: 18px;
	}

	.multi-step-form .file-upload {
		position: relative;
		overflow: hidden;
		display: inline-block;
		width: 100%;
	}

	.multi-step-form .file-upload input[type="file"] {
		position: absolute;
		left: 0;
		top: 0;
		opacity: 0;
		width: 100%;
		height: 100%;
		cursor: pointer;
	}

	.multi-step-form .file-label {
		display: flex;
		align-items: center;
		gap: 10px;
		padding: 14px;
		background-color: #f8f9fa;
		border: 2px dashed #ddd;
		border-radius: 12px;
		text-align: center;
		cursor: pointer;
		transition: all 0.25s ease;
	}

	.multi-step-form .file-label:hover {
		border-color: var(--primary);
		background-color: #f0f7ff;
	}

	.multi-step-form .form-actions {
		display: flex;
		justify-content: space-between;
		gap: 10px;
		margin-top: 26px;
		padding-top: 18px;
		border-top: 1px solid rgba(0, 0, 0, 0.08);
	}

	.multi-step-form .form-success {
		display: none;
		text-align: center;
		padding: 34px;
		background-color: #e9f5ff;
		border-radius: 16px;
		margin-top: 18px;
	}

	.multi-step-form .form-success h3 {
		color: var(--primary);
		margin-bottom: 14px;
	}

	.multi-step-form .form-success i {
		font-size: 3.6rem;
		color: #4dabf7;
		margin-bottom: 14px;
	}

	.multi-step-form .guarantee-note {
		background: linear-gradient(135deg, #4dabf7 0%, #339af0 100%);
		color: #ffffff;
		padding: 16px;
		border-radius: 12px;
		margin-top: 18px;
		text-align: center;
	}

	@media (max-width: 992px) {
		.contacts-hero-grid {
			grid-template-columns: 1fr;
		}

		.contacts-cards {
			grid-template-columns: 1fr;
		}

		.contacts-grid-2 {
			grid-template-columns: 1fr;
		}

		.contacts-page .form-row {
			grid-template-columns: 1fr;
		}

		.manager-grid {
			grid-template-columns: 1fr;
		}

		.multi-step-form .form-row {
			grid-template-columns: 1fr;
		}

		.multi-step-form .step-label {
			display: none;
		}
	}

	@media (prefers-reduced-motion: reduce) {
		.form-summary-chevron,
		.multi-step-form .step-circle {
			transition: none;
		}
	}
</style>

<main class="contacts-page" id="contacts">
	<div class="breadcrumbs">
		<div class="container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a> <span>/</span> <strong><?php echo esc_html( get_the_title() ); ?></strong>
		</div>
	</div>

	<section class="contacts-hero">
		<div class="container">
			<div class="contacts-hero-grid">
				<div class="contacts-hero-text">
					<div class="contacts-kicker">
						<i class="fas fa-address-book"></i>
						ТермоСервис
					</div>

					<h1>Контакты</h1>
					<p>Свяжитесь с нами удобным способом: консультация инженера, подбор оборудования, сервисное обслуживание и подготовка КП.</p>

					<div class="contacts-hero-actions">
						<a href="#feedback" class="btn btn-light"><i class="fas fa-paper-plane"></i> Написать нам</a>
						<a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-light-outline"><i class="fas fa-phone"></i> Позвонить</a>
					</div>

					<div class="contacts-quicklinks" aria-label="Быстрая навигация">
						<a href="#requisites"><i class="fas fa-file-contract"></i> Реквизиты</a>
						<a href="#map"><i class="fas fa-map-marked-alt"></i> Карта</a>
						<a href="#chiller-survey"><i class="fas fa-clipboard-list"></i> Опросный лист</a>
						<a href="#managers"><i class="fas fa-user-tie"></i> Менеджеры</a>
					</div>
				</div>

				<div class="contacts-hero-side">
					<div class="contacts-cards">
						<div class="contacts-card">
							<div class="contacts-card-title"><i class="fas fa-phone"></i> Телефон</div>
							<a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>"><?php echo esc_html( $termoservis_phone_raw ); ?></a>
							<small>Звонки в рабочее время. Если не дозвонились — оставьте заявку ниже.</small>
						</div>
						<div class="contacts-card">
							<div class="contacts-card-title"><i class="fas fa-envelope"></i> Email</div>
							<a href="mailto:<?php echo esc_attr( $termoservis_email ); ?>"><?php echo esc_html( $termoservis_email ); ?></a>
							<small>Прикрепляйте ТЗ, схемы и фото — мы ответим с уточнениями.</small>
						</div>
						<div class="contacts-card">
							<div class="contacts-card-title"><i class="fas fa-map-marker-alt"></i> Адрес</div>
							<a href="<?php echo esc_url( $google_maps_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $termoservis_address ); ?></a>
							<small>Открыть на карте и построить маршрут.</small>
						</div>
						<div class="contacts-card">
							<div class="contacts-card-title"><i class="far fa-clock"></i> Режим работы</div>
							<div style="font-weight:700;"><?php echo esc_html( $termoservis_work_time ); ?></div>
							<small>Аварийные обращения принимаем через форму сервиса.</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="contacts-section" id="requisites">
		<div class="container">
			<h2>Реквизиты</h2>
			<p class="section-intro">Реквизиты для договора/счёта предоставим по запросу. Для ускорения — оставьте заявку и укажите назначение (договор, счёт, тендер и т.д.).</p>

			<div class="contacts-grid-2">
				<div class="contacts-box">
					<h3 style="margin-top:0;">Данные организации</h3>
					<table class="requisites-table" aria-label="Реквизиты">
						<tbody>
							<?php foreach ( $requisites as $label => $value ) : ?>
								<tr>
									<th scope="row"><?php echo esc_html( $label ); ?></th>
									<td><?php echo esc_html( $value ); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="contacts-box" id="feedback">
					<h3 style="margin-top:0;">Формы обратной связи</h3>
					<p style="color: var(--muted); line-height: 1.7; margin-top: 6px;">Коротко опишите задачу, приложите ТЗ/схемы — инженер уточнит параметры и подготовит ответ.</p>

					<form class="form-tel" id="generalFeedbackForm" enctype="multipart/form-data">
						<input type="hidden" name="formType" value="Контакты — общий запрос">
						<div class="form-row">
							<div class="form-group">
								<label for="gf-name">Имя *</label>
								<input type="text" id="gf-name" name="name" class="form-control" placeholder="Иванов Иван" required>
							</div>
							<div class="form-group">
								<label for="gf-phone">Телефон *</label>
								<input type="tel" id="gf-phone" name="phone" class="form-control" placeholder="+7 (___) ___-__-__" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group">
								<label for="gf-email">Email</label>
								<input type="email" id="gf-email" name="email" class="form-control" placeholder="ivanov@company.ru">
							</div>
							<div class="form-group">
								<label for="gf-topic">Тема</label>
								<select id="gf-topic" name="topic" class="form-control">
									<option value="">— Выберите —</option>
									<option value="selection">Подбор оборудования</option>
									<option value="service">Сервис и ремонт</option>
									<option value="spare">Запчасти</option>
									<option value="doc">Реквизиты / документы</option>
									<option value="other">Другое</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="gf-message">Сообщение</label>
							<textarea id="gf-message" name="message" class="form-control" rows="4" placeholder="Коротко: что нужно подобрать/посчитать, сроки, условия, особенности объекта..."></textarea>
						</div>
						<div class="form-group">
							<label for="gf-file">Прикрепить файлы (ТЗ, схема, фото)</label>
							<input type="file" id="gf-file" name="files" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.dwg,.dxf,.png,.jpg,.jpeg" multiple>
						</div>
						<button type="submit" class="btn" style="width:100%;"><i class="fas fa-paper-plane"></i> Отправить</button>
						<div class="form-note">Нажимая кнопку, вы соглашаетесь на обработку персональных данных.</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<section class="contacts-section alt" id="map">
		<div class="container">
			<h2>Карта и схема проезда</h2>
			<p class="section-intro">Постройте маршрут до офиса/производства. Если планируете визит — предварительно согласуйте время с менеджером.</p>

			<div class="contacts-grid-2">
				<div class="contacts-box">
					<iframe
						class="map-frame"
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						src="<?php echo esc_url( 'https://www.google.com/maps?q=' . $encoded_address . '&output=embed' ); ?>"
						title="Карта проезда"
					></iframe>

					<div class="map-actions">
						<a class="btn" href="<?php echo esc_url( $google_maps_url ); ?>" target="_blank" rel="noopener"><i class="fas fa-map"></i> Google</a>
						<a class="btn btn-outline" href="<?php echo esc_url( $yandex_maps_url ); ?>" target="_blank" rel="noopener"><i class="fas fa-location-arrow"></i> Яндекс</a>
						<a class="btn btn-outline" href="<?php echo esc_url( $dgis_url ); ?>" target="_blank" rel="noopener"><i class="fas fa-route"></i> 2ГИС</a>
					</div>
					<div class="map-note"><i class="fas fa-info-circle"></i> Адрес: <strong><?php echo esc_html( $termoservis_address ); ?></strong></div>
				</div>

				<div class="contacts-box">
					<h3 style="margin-top:0;">Схема проезда</h3>
					<p style="color: var(--muted); line-height: 1.7;">Опишите, как удобнее добраться до вас, либо оставьте примечания — мы уточним маршрут и ориентиры.</p>

					<div class="directions-list">
						<div class="direction-item">
							<i class="fas fa-car"></i>
							<div>
								<strong>На автомобиле</strong>
								<div style="color: var(--muted);">Ориентиры, въезд на территорию, парковка (уточняется).</div>
							</div>
						</div>
						<div class="direction-item">
							<i class="fas fa-bus"></i>
							<div>
								<strong>Общественный транспорт</strong>
								<div style="color: var(--muted);">Ближайшие остановки и пеший маршрут (уточняется).</div>
							</div>
						</div>
						<div class="direction-item">
							<i class="fas fa-truck-loading"></i>
							<div>
								<strong>Отгрузка / приемка</strong>
								<div style="color: var(--muted);">Согласуйте время и тип транспорта — подготовим пропуск/площадку (по запросу).</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="contacts-section" id="chiller-survey">
		<div class="container">
			<h2>Опросный лист подбора чиллера</h2>
			<p class="section-intro">Форма собирает базовые параметры для расчёта: температурный график, расход, среда, требования к исполнению и документы.</p>

			<div class="multi-step-form">
				<div class="container" style="padding: 60px 20px;">
					<div class="form-container">
						<div class="form-header">
							<h2>Техническое задание на расчёт</h2>
							<p style="opacity:0.92; margin:0;">Заполните форму — подготовим КП и уточним детали при необходимости.</p>
						</div>

						<div class="form-progress" aria-label="Прогресс заполнения формы">
							<div class="progress-step active">
								<div class="step-circle">1</div>
								<div class="step-label">Контакты</div>
							</div>
							<div class="progress-step">
								<div class="step-circle">2</div>
								<div class="step-label">Параметры</div>
							</div>
							<div class="progress-step">
								<div class="step-circle">3</div>
								<div class="step-label">Требования</div>
							</div>
							<div class="progress-step">
								<div class="step-circle">4</div>
								<div class="step-label">Файлы</div>
							</div>
							<div class="progress-step">
								<div class="step-circle">5</div>
								<div class="step-label">Сроки</div>
							</div>
						</div>

						<div class="form-content">
							<form id="technicalRequestForm">
								<input type="hidden" name="formType" value="Контакты — опросный лист подбора чиллера">

								<!-- Шаг 1 -->
								<div class="form-step-content active" id="formStepContent1">
									<div class="form-row">
										<div class="form-group">
											<label for="requestName">Ваше имя *</label>
											<input type="text" class="form-control" id="requestName" name="requestName" placeholder="Иванов Иван" required>
										</div>
										<div class="form-group">
											<label for="requestPosition">Должность</label>
											<input type="text" class="form-control" id="requestPosition" name="requestPosition" placeholder="Технический директор">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group">
											<label for="requestPhone">Телефон *</label>
											<input type="tel" class="form-control" id="requestPhone" name="requestPhone" placeholder="+7 (___) ___-__-__" required>
										</div>
										<div class="form-group">
											<label for="requestEmail">Email *</label>
											<input type="email" class="form-control" id="requestEmail" name="requestEmail" placeholder="ivanov@company.ru" required>
										</div>
									</div>
									<div class="form-group">
										<label for="requestCompany">Компания *</label>
										<input type="text" class="form-control" id="requestCompany" name="requestCompany" placeholder="ООО «Компания»" required>
									</div>
									<div class="form-actions">
										<button type="button" class="btn btn-outline" disabled>Назад</button>
										<button type="button" class="btn" id="nextToStep2">Далее</button>
									</div>
								</div>

								<!-- Шаг 2 -->
								<div class="form-step-content" id="formStepContent2">
									<div class="form-group">
										<label for="requestTemp">Температура теплоносителя на входе/выходе *</label>
										<input type="text" class="form-control" id="requestTemp" name="requestTemp" placeholder="Пример: +25°C / +5°C" required>
									</div>
									<div class="form-row">
										<div class="form-group">
											<label for="requestFlow">Расход теплоносителя, м³/ч *</label>
											<input type="number" class="form-control" id="requestFlow" name="requestFlow" placeholder="10" min="0" step="0.1" required>
										</div>
										<div class="form-group">
											<label for="requestPower">Мощность охлаждения, кВт</label>
											<input type="number" class="form-control" id="requestPower" name="requestPower" placeholder="100" min="0">
										</div>
									</div>
									<div class="form-group">
										<label for="requestMedia">Среда (теплоноситель) *</label>
										<select class="form-control" id="requestMedia" name="requestMedia" required>
											<option value="">-- Выберите --</option>
											<option value="water">Вода</option>
											<option value="glycol">Этиленгликоль</option>
											<option value="brine">Пропиленгликоль</option>
											<option value="oil">Масло</option>
											<option value="other">Другое</option>
										</select>
									</div>
									<div class="form-actions">
										<button type="button" class="btn btn-outline" id="backToStep1">Назад</button>
										<button type="button" class="btn" id="nextToStep3">Далее</button>
									</div>
								</div>

								<!-- Шаг 3 -->
								<div class="form-step-content" id="formStepContent3">
									<div class="form-group">
										<label>Особые требования *</label>
										<div class="checkbox-grid">
											<label class="checkbox-label">
												<input type="checkbox" name="specialReq[]" value="explosion" required> Взрывозащищенное исполнение
											</label>
											<label class="checkbox-label">
												<input type="checkbox" name="specialReq[]" value="corrosion"> Антикоррозионная защита
											</label>
											<label class="checkbox-label">
												<input type="checkbox" name="specialReq[]" value="precision"> Высокая точность (±0.1°C)
											</label>
											<label class="checkbox-label">
												<input type="checkbox" name="specialReq[]" value="automation"> Интеграция с АСУ ТП
											</label>
											<label class="checkbox-label">
												<input type="checkbox" name="specialReq[]" value="lowNoise"> Низкий уровень шума
											</label>
											<label class="checkbox-label">
												<input type="checkbox" name="specialReq[]" value="reserve"> Резервирование
											</label>
										</div>
									</div>
									<div class="form-group">
										<label for="requestNotes">Дополнительные условия и пожелания</label>
										<textarea class="form-control" id="requestNotes" name="requestNotes" rows="4" placeholder="Условия эксплуатации, ограничения по габаритам, требования к автоматике, климат..."></textarea>
									</div>
									<div class="form-actions">
										<button type="button" class="btn btn-outline" id="backToStep2">Назад</button>
										<button type="button" class="btn" id="nextToStep4">Далее</button>
									</div>
								</div>

								<!-- Шаг 4 -->
								<div class="form-step-content" id="formStepContent4">
									<div class="form-group">
										<label>Загрузить ТЗ (до 20 МБ)</label>
										<div class="file-upload">
											<input type="file" id="tzFile" name="tzFile" accept=".pdf,.doc,.docx,.xls,.xlsx">
											<div class="file-label" role="button" tabindex="0">
												<i class="fas fa-file-alt"></i>
												<span id="tzFileName">Выберите файл ТЗ...</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Чертежи/схемы (до 50 МБ)</label>
										<div class="file-upload">
											<input type="file" id="drawingsFile" name="drawingsFile" accept=".dwg,.dxf,.pdf,.jpg,.png" multiple>
											<div class="file-label" role="button" tabindex="0">
												<i class="fas fa-drafting-compass"></i>
												<span id="drawingsFileName">Выберите файлы...</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Спецификация (если есть)</label>
										<div class="file-upload">
											<input type="file" id="specFile" name="specFile" accept=".pdf,.doc,.docx,.xls,.xlsx">
											<div class="file-label" role="button" tabindex="0">
												<i class="fas fa-list-alt"></i>
												<span id="specFileName">Выберите файл спецификации...</span>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<button type="button" class="btn btn-outline" id="backToStep3">Назад</button>
										<button type="button" class="btn" id="nextToStep5">Далее</button>
									</div>
								</div>

								<!-- Шаг 5 -->
								<div class="form-step-content" id="formStepContent5">
									<div class="form-row">
										<div class="form-group">
											<label for="requestTimeline">Желаемые сроки</label>
											<select class="form-control" id="requestTimeline" name="requestTimeline">
												<option value="">-- Выберите --</option>
												<option value="urgent">Срочно (до 30 дней)</option>
												<option value="normal">Нормальные (30–60 дней)</option>
												<option value="flexible">Гибкие (по согласованию)</option>
											</select>
										</div>
										<div class="form-group">
											<label for="requestBudget">Ориентировочный бюджет, ₽</label>
											<input type="text" class="form-control" id="requestBudget" name="requestBudget" placeholder="1 000 000">
										</div>
									</div>
									<div class="form-group">
										<label for="requestFunding">Источник финансирования</label>
										<select class="form-control" id="requestFunding" name="requestFunding">
											<option value="">-- Выберите --</option>
											<option value="own">Собственные средства</option>
											<option value="leasing">Лизинг</option>
											<option value="credit">Кредит</option>
											<option value="budget">Бюджет</option>
											<option value="other">Другое</option>
										</select>
									</div>
									<div class="form-group">
										<label for="finalNotes">Дополнительные комментарии</label>
										<textarea class="form-control" id="finalNotes" name="finalNotes" rows="3" placeholder="Тендер, условия оплаты, пожелания по срокам/поставке, прочее..."></textarea>
									</div>
									<div class="guarantee-note">
										<i class="fas fa-shield-alt"></i>
										<p style="margin: 0;"><strong>Важно:</strong> если по вашим параметрам потребуется уточнение — инженер свяжется и задаст вопросы.</p>
									</div>
									<div class="form-actions">
										<button type="button" class="btn btn-outline" id="backToStep4">Назад</button>
										<button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Отправить</button>
									</div>
								</div>
							</form>

							<div class="form-success" id="formSuccess">
								<i class="fas fa-check-circle"></i>
								<h3>Заявка успешно отправлена!</h3>
								<p style="color:#444; margin:0;">Мы свяжемся с вами для уточнения деталей.</p>
								<p style="margin-top:14px; color:#444;"><strong>Номер заявки:</strong> #TZ-<span id="requestNumber">001</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="contacts-section alt" id="equipment-forms">
		<div class="container">
			<h2>Подбор оборудования и заявки</h2>
			<p class="section-intro">Выберите нужную форму. Если сомневаетесь — используйте «Общий запрос» выше, мы перенаправим обращение в нужный отдел.</p>

			<div class="forms-accordion">
				<details id="ice-water-generator">
					<summary>
						<span class="form-summary-left"><i class="fas fa-snowflake"></i> Подбор генератора ледяной воды</span>
						<span class="form-summary-chevron"><i class="fas fa-chevron-down"></i></span>
					</summary>
					<div class="form-body">
						<p>Укажите желаемую температуру подачи/обратки и расход — подберём конфигурацию, буфер, насосную группу и автоматику.</p>
						<form class="form-tel" id="iceGeneratorForm" enctype="multipart/form-data">
							<input type="hidden" name="formType" value="Контакты — подбор генератора ледяной воды">
							<div class="form-row">
								<div class="form-group">
									<label for="ig-name">Имя *</label>
									<input type="text" id="ig-name" name="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="ig-phone">Телефон *</label>
									<input type="tel" id="ig-phone" name="phone" class="form-control" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="ig-email">Email</label>
									<input type="email" id="ig-email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label for="ig-media">Среда</label>
									<select id="ig-media" name="media" class="form-control">
										<option value="">—</option>
										<option value="water">Вода</option>
										<option value="glycol">Гликоль</option>
										<option value="other">Другое</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="ig-temp">Температура подачи/обратки</label>
									<input type="text" id="ig-temp" name="temp" class="form-control" placeholder="+2 / +6 °C">
								</div>
								<div class="form-group">
									<label for="ig-flow">Расход, м³/ч</label>
									<input type="number" id="ig-flow" name="flow" class="form-control" min="0" step="0.1" placeholder="10">
								</div>
							</div>
							<div class="form-group">
								<label for="ig-notes">Комментарий</label>
								<textarea id="ig-notes" name="notes" class="form-control" rows="3" placeholder="Назначение, условия установки, требования к резервированию/автоматике..."></textarea>
							</div>
							<div class="form-group">
								<label for="ig-file">Файлы (ТЗ/схема/план)</label>
								<input type="file" id="ig-file" name="files" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.dwg,.dxf,.png,.jpg,.jpeg" multiple>
							</div>
							<button type="submit" class="btn" style="width:100%;"><i class="fas fa-paper-plane"></i> Отправить заявку</button>
							<div class="form-note">Нажимая кнопку, вы соглашаетесь на обработку персональных данных.</div>
						</form>
					</div>
				</details>

				<details id="aircooler">
					<summary>
						<span class="form-summary-left"><i class="fas fa-wind"></i> Подбор воздухоохладителя</span>
						<span class="form-summary-chevron"><i class="fas fa-chevron-down"></i></span>
					</summary>
					<div class="form-body">
						<p>Для подбора нужны параметры камеры и режим: температура, продукт, оттайка и ориентировочная мощность (если известна).</p>
						<form class="form-tel" id="aircoolerForm" enctype="multipart/form-data">
							<input type="hidden" name="formType" value="Контакты — подбор воздухоохладителя">
							<div class="form-row">
								<div class="form-group">
									<label for="ac-name">Имя *</label>
									<input type="text" id="ac-name" name="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="ac-phone">Телефон *</label>
									<input type="tel" id="ac-phone" name="phone" class="form-control" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="ac-email">Email</label>
									<input type="email" id="ac-email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label for="ac-temp">Температура в камере</label>
									<input type="text" id="ac-temp" name="temp" class="form-control" placeholder="0…+5 °C / -18 °C">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="ac-volume">Объём/габариты камеры</label>
									<input type="text" id="ac-volume" name="volume" class="form-control" placeholder="Напр.: 6×4×3 м">
								</div>
								<div class="form-group">
									<label for="ac-defrost">Оттайка</label>
									<select id="ac-defrost" name="defrost" class="form-control">
										<option value="">—</option>
										<option value="air">Воздушная</option>
										<option value="electric">Электро</option>
										<option value="water">Вода</option>
										<option value="hotgas">Горячий газ</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="ac-notes">Комментарий</label>
								<textarea id="ac-notes" name="notes" class="form-control" rows="3" placeholder="Продукт, влажность/воздухообмен, хладагент (если известен), особенности монтажа..."></textarea>
							</div>
							<div class="form-group">
								<label for="ac-file">Файлы (план/ТЗ/фото)</label>
								<input type="file" id="ac-file" name="files" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg" multiple>
							</div>
							<button type="submit" class="btn" style="width:100%;"><i class="fas fa-paper-plane"></i> Отправить заявку</button>
							<div class="form-note">Нажимая кнопку, вы соглашаетесь на обработку персональных данных.</div>
						</form>
					</div>
				</details>

				<details id="service-request">
					<summary>
						<span class="form-summary-left"><i class="fas fa-tools"></i> Заявка на сервисное обслуживание</span>
						<span class="form-summary-chevron"><i class="fas fa-chevron-down"></i></span>
					</summary>
					<div class="form-body">
						<p>Опишите проблему и укажите объект. Можно прикрепить фото шильдика/ошибок и видео.</p>
						<form class="form-tel" id="serviceRequestForm" enctype="multipart/form-data">
							<input type="hidden" name="formType" value="Контакты — заявка на сервис">
							<div class="form-row">
								<div class="form-group">
									<label for="sr-name">Имя *</label>
									<input type="text" id="sr-name" name="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="sr-phone">Телефон *</label>
									<input type="tel" id="sr-phone" name="phone" class="form-control" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="sr-email">Email</label>
									<input type="email" id="sr-email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label for="sr-location">Город / адрес объекта</label>
									<input type="text" id="sr-location" name="location" class="form-control" placeholder="Самара, ...">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="sr-eqtype">Тип оборудования</label>
									<input type="text" id="sr-eqtype" name="equipment" class="form-control" placeholder="Чиллер / агрегат / камера ...">
								</div>
								<div class="form-group">
									<label for="sr-urgent">Срочность</label>
									<select id="sr-urgent" name="timeline" class="form-control">
										<option value="">—</option>
										<option value="urgent">Аварийно (как можно скорее)</option>
										<option value="normal">Планово</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="sr-message">Описание проблемы *</label>
								<textarea id="sr-message" name="message" class="form-control" rows="4" placeholder="Ошибка, симптомы, когда проявляется, что уже делали..." required></textarea>
							</div>
							<div class="form-group">
								<label for="sr-files">Файлы (фото/видео/шильдик)</label>
								<input type="file" id="sr-files" name="files" class="form-control" accept=".png,.jpg,.jpeg,.pdf,.mp4,.mov,.avi" multiple>
							</div>
							<button type="submit" class="btn" style="width:100%;"><i class="fas fa-paper-plane"></i> Отправить заявку</button>
							<div class="form-note">Нажимая кнопку, вы соглашаетесь на обработку персональных данных.</div>
						</form>
					</div>
				</details>

				<details id="cold-room">
					<summary>
						<span class="form-summary-left"><i class="fas fa-igloo"></i> Подбор холодильной камеры</span>
						<span class="form-summary-chevron"><i class="fas fa-chevron-down"></i></span>
					</summary>
					<div class="form-body">
						<p>Укажите габариты и температурный режим — предложим конструкцию камеры, толщину панелей, дверь и рекомендации по агрегату.</p>
						<form class="form-tel" id="coldRoomForm" enctype="multipart/form-data">
							<input type="hidden" name="formType" value="Контакты — подбор холодильной камеры">
							<div class="form-row">
								<div class="form-group">
									<label for="cr-name">Имя *</label>
									<input type="text" id="cr-name" name="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="cr-phone">Телефон *</label>
									<input type="tel" id="cr-phone" name="phone" class="form-control" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="cr-email">Email</label>
									<input type="email" id="cr-email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label for="cr-temp">Температурный режим</label>
									<input type="text" id="cr-temp" name="temp" class="form-control" placeholder="0…+5 °C / -18 °C">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="cr-size">Габариты (Д×Ш×В)</label>
									<input type="text" id="cr-size" name="size" class="form-control" placeholder="Напр.: 6×4×3 м">
								</div>
								<div class="form-group">
									<label for="cr-product">Продукт/назначение</label>
									<input type="text" id="cr-product" name="product" class="form-control" placeholder="Овощи, мясо, фарма...">
								</div>
							</div>
							<div class="form-group">
								<label for="cr-notes">Комментарий</label>
								<textarea id="cr-notes" name="notes" class="form-control" rows="3" placeholder="Место установки, требования к двери/пандусу, интенсивность открываний, влажность..."></textarea>
							</div>
							<div class="form-group">
								<label for="cr-file">Файлы (план, фото помещения)</label>
								<input type="file" id="cr-file" name="files" class="form-control" accept=".pdf,.doc,.docx,.dwg,.dxf,.png,.jpg,.jpeg" multiple>
							</div>
							<button type="submit" class="btn" style="width:100%;"><i class="fas fa-paper-plane"></i> Отправить заявку</button>
							<div class="form-note">Нажимая кнопку, вы соглашаетесь на обработку персональных данных.</div>
						</form>
					</div>
				</details>

				<details id="refrigeration-unit">
					<summary>
						<span class="form-summary-left"><i class="fas fa-compress-arrows-alt"></i> Подбор холодильного агрегата</span>
						<span class="form-summary-chevron"><i class="fas fa-chevron-down"></i></span>
					</summary>
					<div class="form-body">
						<p>Заполните параметры камеры/объекта — подберём агрегат под режим, холодопроизводительность и условия установки.</p>
						<form class="form-tel" id="refrigerationUnitForm" enctype="multipart/form-data">
							<input type="hidden" name="formType" value="Контакты — подбор холодильного агрегата">
							<div class="form-row">
								<div class="form-group">
									<label for="ru-name">Имя *</label>
									<input type="text" id="ru-name" name="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="ru-phone">Телефон *</label>
									<input type="tel" id="ru-phone" name="phone" class="form-control" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="ru-email">Email</label>
									<input type="email" id="ru-email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label for="ru-temp">Температурный режим</label>
									<input type="text" id="ru-temp" name="temp" class="form-control" placeholder="0…+15 °C / -10…-30 °C">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="ru-power">Требуемая холодопроизводительность, кВт</label>
									<input type="number" id="ru-power" name="power" class="form-control" min="0" step="0.1" placeholder="10">
								</div>
								<div class="form-group">
									<label for="ru-supply">Питание</label>
									<select id="ru-supply" name="supply" class="form-control">
										<option value="">—</option>
										<option value="220">220В</option>
										<option value="380">380В</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="ru-notes">Комментарий</label>
								<textarea id="ru-notes" name="notes" class="form-control" rows="3" placeholder="Условия установки, уличное/внутреннее размещение, требования к шуму, автоматика..."></textarea>
							</div>
							<div class="form-group">
								<label for="ru-file">Файлы (ТЗ/план/фото)</label>
								<input type="file" id="ru-file" name="files" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.dwg,.dxf,.png,.jpg,.jpeg" multiple>
							</div>
							<button type="submit" class="btn" style="width:100%;"><i class="fas fa-paper-plane"></i> Отправить заявку</button>
							<div class="form-note">Нажимая кнопку, вы соглашаетесь на обработку персональных данных.</div>
						</form>
					</div>
				</details>
			</div>
		</div>
	</section>

	<section class="contacts-section" id="managers">
		<div class="container">
			<h2>Контактные данные менеджеров</h2>
			<p class="section-intro">Если вы уже знаете направление обращения — свяжитесь напрямую. Иначе используйте форму «Общий запрос».</p>

			<div class="manager-grid">
				<?php foreach ( $managers as $m ) : ?>
					<div class="manager-card">
						<h3><?php echo esc_html( $m['department'] ); ?></h3>
						<div class="manager-meta"><?php echo esc_html( $m['name'] ); ?></div>
						<div class="manager-links">
							<a href="tel:<?php echo esc_attr( $m['phone_tel'] ); ?>"><i class="fas fa-phone"></i> <?php echo esc_html( $m['phone'] ); ?></a>
							<a href="mailto:<?php echo esc_attr( $m['email'] ); ?>"><i class="fas fa-envelope"></i> <?php echo esc_html( $m['email'] ); ?></a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
