<?php

/**
 * Template Name: Компоненты и модули для чиллеров
 *
 * Профессиональный шаблон страницы каталога компонентов/модулей:
 * - Гидромодули и насосные группы
 * - Элементы системы управления
 * - Теплообменники и элементы холодильного контура
 * - Быстрый подбор и техническая заявка
 *
 * @package Termoservis
 */

get_header();

$components_parent_slugs = array( 'komponenty-i-moduli-dlya-chillerov', 'chiller-components' );
$components_parent_slug  = $components_parent_slugs[0];
$components_parent_term  = null;
$components_child_terms = array();

foreach ( $components_parent_slugs as $candidate_slug ) {
	$term = get_term_by( 'slug', $candidate_slug, 'product_cat' );
	if ( $term && ! is_wp_error( $term ) ) {
		$components_parent_slug = $candidate_slug;
		$components_parent_term = $term;
		break;
	}
}

$hydraulic_modules_page_slug = 'gidromoduli-gidrokoful';
$control_components_page_slug = 'elementy-sistemy-upravleniya';

$hydraulic_modules_page_url = '';
$control_components_page_url = '';

$hydraulic_modules_page = get_page_by_path( $hydraulic_modules_page_slug, OBJECT, 'page' );
if ( $hydraulic_modules_page ) {
	$hydraulic_modules_page_url = get_permalink( $hydraulic_modules_page );
}

$control_components_page = get_page_by_path( $control_components_page_slug, OBJECT, 'page' );
if ( $control_components_page ) {
	$control_components_page_url = get_permalink( $control_components_page );
}

if ( ! $hydraulic_modules_page_url ) {
	$hydraulic_modules_page_ids = get_posts(
		array(
			'post_type'              => 'page',
			'posts_per_page'         => 1,
			'no_found_rows'          => true,
			'ignore_sticky_posts'    => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'fields'                 => 'ids',
			'meta_key'               => '_wp_page_template',
			'meta_value'             => 'page-hydraulic-modules.php',
		)
	);

	if ( ! empty( $hydraulic_modules_page_ids ) ) {
		$hydraulic_modules_page_url = get_permalink( (int) $hydraulic_modules_page_ids[0] );
	}
}

if ( ! $control_components_page_url ) {
	$control_components_page_ids = get_posts(
		array(
			'post_type'              => 'page',
			'posts_per_page'         => 1,
			'no_found_rows'          => true,
			'ignore_sticky_posts'    => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'fields'                 => 'ids',
			'meta_key'               => '_wp_page_template',
			'meta_value'             => 'page-control-components.php',
		)
	);

	if ( ! empty( $control_components_page_ids ) ) {
		$control_components_page_url = get_permalink( (int) $control_components_page_ids[0] );
	}
}

if ( ! $hydraulic_modules_page_url ) {
	$hydraulic_modules_page_url = home_url( '/' . $hydraulic_modules_page_slug . '/' );
}

if ( ! $control_components_page_url ) {
	$control_components_page_url = home_url( '/' . $control_components_page_slug . '/' );
}

if ( $components_parent_term && ! is_wp_error( $components_parent_term ) ) {
	$components_child_terms = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'parent'     => $components_parent_term->term_id,
			'hide_empty' => false,
		)
	);
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
	/* ===== БАЗОВЫЕ СТИЛИ (микс page-specialized-chillers.php + page-chillers.php) ===== */
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	}

	:root {
		--ts-primary: #0056b8;
		--ts-primary-dark: #004494;
		--ts-accent: #4dabf7;
		--ts-bg: #ffffff;
		--ts-surface: #f8f9fa;
		--ts-text: #333333;
		--ts-muted: #666666;
		--ts-border: #eeeeee;
		--ts-radius: 14px;
	}

	body {
		background-color: var(--ts-bg);
		color: var(--ts-text);
		line-height: 1.6;
		overflow-x: hidden;
	}

	a {
		text-decoration: none;
		color: inherit;
		transition: all 0.3s ease;
	}

	ul {
		list-style: none;
	}

	.container {
		width: 100%;
		max-width: 1200px;
		margin: 0 auto;
		padding: 0 20px;
	}

	.btn {
		display: inline-block;
		background-color: var(--ts-primary);
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
		background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
		transition: left 0.7s ease;
		z-index: -1;
	}

	.btn:hover:before {
		left: 100%;
	}

	.btn:hover {
		background-color: var(--ts-primary-dark);
		transform: translateY(-3px);
		box-shadow: 0 10px 25px rgba(0, 86, 184, 0.3);
	}

	.btn-outline {
		background-color: transparent;
		border: 2px solid var(--ts-primary);
		color: var(--ts-primary);
	}

	.btn-outline:hover {
		background-color: var(--ts-primary);
		color: white;
	}

	.btn-small {
		padding: 10px 20px;
		font-size: 0.95rem !important;
	}

	section {
		padding: 80px 0;
		position: relative;
	}

	h1,
	h2,
	h3,
	h4 {
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
		color: var(--ts-primary);
		position: relative;
		padding-bottom: 15px;
		margin-bottom: 40px;
	}

	h3 {
		font-size: 1.6rem;
		color: #222;
	}

	h4 {
		font-size: 1.2rem;
		color: #444;
	}

	.text-center {
		text-align: center;
	}

	.mb-20 {
		margin-bottom: 20px;
	}

	.mb-30 {
		margin-bottom: 30px;
	}

	.mb-40 {
		margin-bottom: 40px;
	}

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
		background-color: var(--ts-surface);
		padding: 15px 0;
		font-size: 0.9rem;
		border-bottom: 1px solid var(--ts-border);
	}

	.breadcrumbs a {
		color: var(--ts-primary);
	}

	.breadcrumbs a:hover {
		text-decoration: underline;
	}

	.breadcrumbs span {
		color: var(--ts-muted);
		margin: 0 8px;
	}

	/* ===== СТИКИ-НАВИГАЦИЯ ===== */
	.sticky-nav {
		position: sticky;
		top: 0;
		background-color: white;
		box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
		z-index: 1000;
		display: none;
	}

	.sticky-nav.active {
		display: block;
		animation: slideDown 0.3s ease;
	}

	@keyframes slideDown {
		from {
			transform: translateY(-100%);
		}
		to {
			transform: translateY(0);
		}
	}

	.sticky-nav .container {
		display: flex;
		justify-content: center;
		gap: 25px;
		padding: 15px 20px;
		overflow-x: auto;
	}

	.sticky-nav a {
		color: #555;
		font-weight: 600;
		white-space: nowrap;
		padding: 5px 0;
		position: relative;
	}

	.sticky-nav a:hover {
		color: var(--ts-primary);
	}

	.sticky-nav a:after {
		content: '';
		position: absolute;
		bottom: 0;
		left: 0;
		width: 0;
		height: 2px;
		background-color: var(--ts-primary);
		transition: width 0.3s ease;
	}

	.sticky-nav a:hover:after {
		width: 100%;
	}

	/* ===== ГЕРОЙ (микс page-chillers.php + page-specialized-chillers.php) ===== */
	.components-hero {
		background: linear-gradient(rgba(0, 0, 0, 0.78), rgba(0, 0, 0, 0.78)), url('https://images.iimg.live/images/amazing-shot-8342.webp') center/cover no-repeat;
		color: white;
		padding: 120px 0 90px;
		position: relative;
	}

	.components-hero .container {
		position: relative;
		z-index: 1;
		max-width: 980px;
	}

	.components-hero h1 {
		color: white;
		margin-bottom: 25px;
		text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
		animation: fadeInDown 1s ease;
	}

	@keyframes fadeInDown {
		from {
			opacity: 0;
			transform: translateY(-30px);
		}
		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.hero-subtitle {
		font-size: 1.25rem;
		max-width: 820px;
		margin: 0 auto 40px;
		opacity: 0.92;
		line-height: 1.7;
		animation: fadeInUp 1s ease 0.25s both;
		color: white;
	}

	@keyframes fadeInUp {
		from {
			opacity: 0;
			transform: translateY(30px);
		}
		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.hero-features {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		gap: 18px;
		margin: 50px 0;
		animation: fadeInUp 1s ease 0.55s both;
	}

	.feature-item {
		text-align: center;
		padding: 20px;
		background: rgba(255, 255, 255, 0.1);
		border-radius: 12px;
		backdrop-filter: blur(5px);
		border: 1px solid rgba(255, 255, 255, 0.12);
	}

	.feature-item i {
		font-size: 2.4rem;
		margin-bottom: 14px;
		color: var(--ts-accent);
	}

	.feature-item h4 {
		color: white;
		margin-bottom: 10px;
		margin-top: 0;
	}

	.feature-item p {
		opacity: 0.9;
		font-size: 0.95rem;
		color: white;
	}

	.hero-actions {
		display: flex;
		gap: 15px;
		justify-content: center;
		flex-wrap: wrap;
		margin-top: 15px;
	}

	/* ===== ВВОДНЫЙ БЛОК ===== */
	.components-intro {
		background-color: white;
	}

	.intro-grid {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
		gap: 20px;
		margin-top: 35px;
	}

	.intro-card {
		display: block;
		background: var(--ts-surface);
		border-radius: var(--ts-radius);
		padding: 25px;
		border: 1px solid var(--ts-border);
		box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
		transition: all 0.35s ease;
	}

	.intro-card:hover {
		transform: translateY(-6px);
		box-shadow: 0 18px 40px rgba(0, 86, 184, 0.12);
		border-color: rgba(0, 86, 184, 0.35);
	}

	.intro-card .intro-icon {
		width: 64px;
		height: 64px;
		border-radius: 16px;
		background: linear-gradient(135deg, var(--ts-primary) 0%, var(--ts-primary-dark) 100%);
		color: #fff;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 1.8rem;
		margin-bottom: 18px;
	}

	.intro-card p {
		color: #555;
		margin: 0;
	}

	.intro-cta {
		margin-top: 18px;
	}

	/* ===== TS-CARDS (карточки как на page-chillers.php) ===== */
	.ts-root {
		--ts-accent: #0b5ed7;
		--ts-muted: #6b6f76;
		--ts-bg: #fff;
		--ts-radius: 10px;
	}

	.ts-section {
		max-width: 1100px;
		margin: 0 auto;
	}

	.ts-head {
		display: flex;
		justify-content: space-between;
		align-items: flex-start;
		gap: 18px;
		margin-bottom: 18px;
	}

	.ts-title {
		font-size: 22px;
		font-weight: 800;
		margin: 0;
	}

	.ts-sub {
		color: var(--ts-muted);
		font-size: 13px;
		margin-top: 6px;
	}

	.ts-controls {
		display: flex;
		gap: 10px;
		align-items: center;
		flex-wrap: wrap;
	}

	.ts-input,
	.ts-select {
		padding: 8px 10px;
		border-radius: 8px;
		border: 1px solid #e6e9ef;
		background: #fff;
	}

	.ts-grid {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
		gap: 16px;
	}

	.ts-card {
		background: var(--ts-bg);
		border-radius: var(--ts-radius);
		overflow: hidden;
		border: 1px solid #eef0f2;
		display: flex;
		flex-direction: column;
		box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
		transition: all 0.4s ease;
	}

	.ts-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 15px 35px rgba(0, 86, 184, 0.15);
	}

	.ts-media {
		height: 160px;
		display: flex;
		align-items: center;
		justify-content: center;
		background: linear-gradient(180deg, #fbfcff, #fff);
	}

	.ts-media img {
		max-width: 100%;
		max-height: 100%;
		object-fit: contain;
		transition: transform 0.5s ease;
	}

	.ts-card:hover .ts-media img {
		transform: scale(1.05);
	}

	.ts-body {
		padding: 12px;
		display: flex;
		flex-direction: column;
		gap: 8px;
	}

	.ts-kicker {
		font-size: 13px;
		color: var(--ts-muted);
	}

	.ts-name {
		font-size: 16px;
		font-weight: 800;
		margin: 0;
	}

	.ts-meta {
		display: flex;
		gap: 8px;
		flex-wrap: wrap;
	}

	.ts-tag {
		font-size: 13px;
		padding: 6px 8px;
		border-radius: 999px;
		background: #f7fbff;
		border: 1px solid #e8f0ff;
		color: var(--ts-muted);
	}

	.ts-foot {
		display: flex;
		gap: 10px;
		padding: 12px;
		border-top: 1px solid #f4f6f8;
	}

	.ts-title::after {
		left: 0 !important;
		transform: none !important;
	}

	@media (max-width: 720px) {
		.ts-media {
			height: 120px;
		}
		.ts-head {
			flex-direction: column;
			align-items: stretch;
		}
	}

	/* ===== БЫСТРЫЙ ПОДБОР (quick-diagnostic как на page-specialized-chillers.php) ===== */
	.quick-diagnostic {
		background-color: var(--ts-surface);
	}

	.diagnostic-header {
		text-align: center;
		margin-bottom: 40px;
	}

	.diagnostic-header p {
		max-width: 800px;
		margin: 0 auto;
		color: #555;
		font-size: 1.05rem;
	}

	.diagnostic-step {
		background: white;
		padding: 30px;
		border-radius: 16px;
		box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
		margin-bottom: 22px;
		border: 1px solid #eee;
	}

	.step-question h3 {
		margin: 0 0 18px;
		color: #222;
		font-size: 1.25rem;
		display: flex;
		align-items: center;
		gap: 10px;
	}

	.step-question i {
		color: var(--ts-primary);
	}

	.options-grid {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		gap: 14px;
	}

	.option-card {
		border: 2px solid #eee;
		border-radius: 14px;
		padding: 18px 16px;
		text-align: center;
		cursor: pointer;
		transition: all 0.3s ease;
		background: #fff;
	}

	.option-card:hover {
		border-color: rgba(0, 86, 184, 0.55);
		transform: translateY(-4px);
		box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06);
	}

	.option-card.selected {
		border-color: var(--ts-primary);
		background: #f0f7ff;
	}

	.option-card i {
		font-size: 2.1rem;
		color: var(--ts-primary);
		margin-bottom: 10px;
	}

	.option-card p {
		margin: 0;
		font-weight: 700;
		color: #333;
		font-size: 0.98rem;
	}

	.special-textarea {
		margin-top: 16px;
	}

	.special-textarea textarea {
		width: 100%;
		border: 1px solid #ddd;
		border-radius: 10px;
		padding: 14px;
		min-height: 110px;
		font-size: 1rem;
	}

	.diagnostic-actions {
		text-align: center;
		margin-top: 25px;
		display: flex;
		gap: 12px;
		justify-content: center;
		flex-wrap: wrap;
	}

	.diagnostic-result {
		display: none;
		margin-top: 30px;
		background: linear-gradient(135deg, var(--ts-primary) 0%, var(--ts-primary-dark) 100%);
		color: #fff;
		padding: 30px;
		border-radius: 18px;
		box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
	}

	.diagnostic-result h3 {
		color: #fff;
		margin-bottom: 18px;
		text-align: center;
	}

	.result-details {
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		gap: 16px;
		margin-top: 18px;
	}

	.result-item {
		background: rgba(255, 255, 255, 0.08);
		padding: 18px;
		border-radius: 12px;
		border: 1px solid rgba(255, 255, 255, 0.12);
	}

	.result-item h4 {
		color: rgba(255, 255, 255, 0.9);
		margin-bottom: 6px;
		font-size: 0.95rem;
		font-weight: 700;
	}

	.result-item p {
		color: #fff;
		font-size: 1.05rem;
		font-weight: 800;
		margin: 0;
		word-break: break-word;
	}

	/* ===== МНОГОШАГОВАЯ ФОРМА (из page-specialized-chillers.php) ===== */
	.multi-step-form {
		background: linear-gradient(135deg, var(--ts-primary) 0%, var(--ts-primary-dark) 100%);
		color: white;
		border-radius: 25px;
		overflow: hidden;
		position: relative;
	}

	.form-container {
		max-width: 900px;
		margin: 0 auto;
		position: relative;
		z-index: 2;
	}

	.form-header {
		text-align: center;
		margin-bottom: 40px;
	}

	.form-header h2 {
		color: white;
	}

	.form-progress {
		display: flex;
		justify-content: space-between;
		margin-bottom: 40px;
		position: relative;
	}

	.form-progress:before {
		content: '';
		position: absolute;
		top: 20px;
		left: 0;
		right: 0;
		height: 3px;
		background-color: rgba(255, 255, 255, 0.3);
		z-index: 1;
	}

	.progress-step {
		text-align: center;
		position: relative;
		z-index: 2;
		flex: 1;
	}

	.step-circle {
		width: 40px;
		height: 40px;
		background-color: rgba(255, 255, 255, 0.2);
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		margin: 0 auto 10px;
		font-weight: 700;
		transition: all 0.3s;
	}

	.progress-step.active .step-circle {
		background-color: white;
		color: var(--ts-primary);
		transform: scale(1.1);
	}

	.progress-step.completed .step-circle {
		background-color: var(--ts-accent);
		color: white;
	}

	.step-label {
		font-size: 0.9rem;
		opacity: 0.95;
	}

	.form-content {
		background-color: rgba(255, 255, 255, 0.95);
		padding: 40px;
		border-radius: 20px;
		box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
		color: #333;
	}

	.form-step-content {
		display: none;
	}

	.form-step-content.active {
		display: block;
		animation: fadeIn 0.5s ease;
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}

	.form-row {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 20px;
		margin-bottom: 20px;
	}

	.form-group {
		margin-bottom: 25px;
	}

	.form-group label {
		display: block;
		margin-bottom: 10px;
		font-weight: 700;
		color: #333;
		font-size: 1rem;
	}

	.form-control {
		width: 100%;
		padding: 15px;
		border: 1px solid #ddd;
		border-radius: 8px;
		font-size: 1rem;
		transition: all 0.3s;
		font-family: inherit;
	}

	.form-control:focus {
		outline: none;
		border-color: var(--ts-primary);
		box-shadow: 0 0 0 3px rgba(0, 86, 184, 0.1);
	}

	select.form-control {
		cursor: pointer;
	}

	textarea.form-control {
		resize: vertical;
		min-height: 120px;
	}

	.checkbox-grid {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
		gap: 14px;
	}

	.checkbox-label {
		display: flex;
		align-items: center;
		gap: 10px;
		background: #f8f9fa;
		padding: 12px 14px;
		border-radius: 10px;
		border: 1px solid #eee;
		cursor: pointer;
	}

	.checkbox-label input {
		width: 18px;
		height: 18px;
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
		border-radius: 10px;
		text-align: center;
		cursor: pointer;
		transition: all 0.3s;
	}

	.file-label:hover {
		border-color: var(--ts-primary);
		background-color: #f0f7ff;
	}

	.form-actions {
		display: flex;
		justify-content: space-between;
		gap: 12px;
		margin-top: 25px;
	}

	.form-actions .btn {
		min-width: 160px;
	}

	.guarantee-note {
		display: flex;
		align-items: flex-start;
		gap: 12px;
		background: #e9f5ff;
		padding: 16px;
		border-radius: 12px;
		border: 1px solid #d6ecff;
	}

	.guarantee-note i {
		color: var(--ts-primary);
		margin-top: 2px;
	}

	.form-success {
		display: none;
		text-align: center;
		padding: 30px;
	}

	.form-success i {
		font-size: 3rem;
		color: #2ecc71;
		margin-bottom: 15px;
	}

	/* ===== ПРОЦЕСС + FAQ + SEO ===== */
	.work-process {
		background-color: var(--ts-surface);
		padding: 80px 0;
	}

	.process-steps {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		gap: 30px;
		margin-top: 40px;
	}

	.process-step {
		text-align: center;
		padding: 30px 20px;
		background: white;
		border-radius: 15px;
		box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
		position: relative;
		transition: all 0.4s ease;
	}

	.process-step:hover {
		transform: translateY(-10px);
		box-shadow: 0 15px 35px rgba(0, 86, 184, 0.1);
	}

	.step-icon {
		width: 80px;
		height: 80px;
		background: linear-gradient(135deg, var(--ts-primary) 0%, var(--ts-primary-dark) 100%);
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		margin: 0 auto 20px;
		color: white;
		font-size: 2rem;
	}

	.step-number-large {
		position: absolute;
		top: -15px;
		right: -15px;
		width: 40px;
		height: 40px;
		background-color: var(--ts-primary);
		color: white;
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		font-weight: 800;
	}

	.guarantee-banner {
		background: linear-gradient(135deg, var(--ts-primary) 0%, var(--ts-primary-dark) 100%);
		color: white;
		padding: 40px;
		border-radius: 15px;
		margin-top: 50px;
		display: flex;
		justify-content: space-around;
		align-items: center;
		flex-wrap: wrap;
		gap: 30px;
	}

	.guarantee-item {
		text-align: center;
		flex: 1;
		min-width: 200px;
	}

	.guarantee-item i {
		font-size: 3rem;
		margin-bottom: 15px;
		color: rgba(255, 255, 255, 0.92);
	}

	.guarantee-item h3 {
		color: white;
		margin-bottom: 10px;
	}

	.faq-section {
		background-color: white;
		padding: 80px 0;
	}

	.faq-container {
		max-width: 900px;
		margin: 0 auto;
	}

	.faq-item {
		margin-bottom: 15px;
		border: 1px solid #eee;
		border-radius: 10px;
		overflow: hidden;
	}

	.faq-question {
		padding: 20px;
		background-color: var(--ts-surface);
		cursor: pointer;
		display: flex;
		justify-content: space-between;
		align-items: center;
		font-weight: 700;
		color: #333;
		transition: all 0.3s;
		margin: 0;
	}

	.faq-question:hover {
		background-color: #f0f7ff;
	}

	.faq-question i {
		transition: transform 0.3s ease;
	}

	.faq-question.active i {
		transform: rotate(180deg);
	}

	.faq-answer {
		padding: 0 20px;
		max-height: 0;
		overflow: hidden;
		transition: all 0.5s ease;
		color: #555;
		line-height: 1.7;
	}

	.faq-answer.active {
		padding: 20px;
		max-height: 1000px;
	}

	.seo-content {
		background-color: var(--ts-surface);
		border-radius: 15px;
		padding: 50px;
		margin: 80px 0;
	}

	.seo-text {
		max-width: 900px;
		margin: 0 auto;
	}

	.seo-text h2 {
		text-align: center;
	}

	.seo-text p {
		margin-bottom: 20px;
		font-size: 1.05rem;
		line-height: 1.8;
		color: #555;
		text-align: justify;
	}

	.keywords-grid {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
		gap: 15px;
		margin-top: 40px;
	}

	.keyword-item {
		background: white;
		padding: 20px;
		border-radius: 10px;
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
		display: flex;
		align-items: center;
		gap: 15px;
	}

	.keyword-item i {
		color: var(--ts-primary);
		font-size: 1.5rem;
	}

	.keyword-item strong {
		display: block;
		color: #222;
		margin-bottom: 5px;
	}

	/* ===== СТИКИ-ВИДЖЕТ ===== */
	.sticky-widget {
		position: fixed;
		right: 22px;
		bottom: 22px;
		width: 360px;
		background: white;
		border-radius: 15px;
		box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
		z-index: 999;
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
		background: linear-gradient(135deg, var(--ts-primary) 0%, var(--ts-primary-dark) 100%);
		color: white;
		padding: 18px 20px;
		text-align: left;
		position: relative;
	}

	.widget-header h4 {
		color: white;
		margin: 0 0 6px;
	}

	.widget-header p {
		color: white;
		margin: 0;
		font-size: 0.92rem;
		opacity: 0.95;
	}

	.widget-close {
		position: absolute;
		top: 12px;
		right: 12px;
		background: none;
		border: none;
		color: white;
		font-size: 1.2rem;
		cursor: pointer;
	}

	.widget-content {
		padding: 18px 20px 22px;
	}

	.widget-features {
		margin: 10px 0 14px;
	}

	.widget-feature {
		display: flex;
		align-items: center;
		gap: 10px;
		margin-bottom: 8px;
		color: #555;
		font-size: 0.9rem;
	}

	.widget-feature i {
		color: var(--ts-primary);
	}

	.widget-content .form-row {
		grid-template-columns: 1fr;
		gap: 12px;
		margin-bottom: 12px;
	}

	/* ===== ГРУППЫ КОМПОНЕНТОВ ===== */
	.component-groups {
		background-color: var(--ts-surface);
	}

	.groups-grid {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
		gap: 26px;
		margin-top: 40px;
	}

	.group-card {
		background: white;
		border-radius: 16px;
		overflow: hidden;
		box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
		transition: all 0.4s ease;
		border: 2px solid #eee;
	}

	.group-card:hover {
		transform: translateY(-10px);
		box-shadow: 0 20px 40px rgba(0, 86, 184, 0.15);
		border-color: var(--ts-primary);
	}

	.group-header {
		padding: 25px;
		background: linear-gradient(135deg, var(--ts-primary) 0%, var(--ts-primary-dark) 100%);
		color: white;
		display: flex;
		align-items: center;
		gap: 15px;
	}

	.group-header i {
		font-size: 2.4rem;
	}

	.group-header h3 {
		color: white;
		margin: 0;
	}

	.group-header p {
		color: white;
		opacity: 0.92;
		margin: 6px 0 0;
		font-size: 0.95rem;
	}

	.group-content {
		padding: 25px;
	}

	.group-features {
		margin: 18px 0 22px;
	}

	.group-feature {
		display: flex;
		align-items: flex-start;
		gap: 10px;
		margin-bottom: 10px;
		color: #555;
	}

	.group-feature i {
		color: var(--ts-primary);
		margin-top: 3px;
	}

	.group-cta {
		display: flex;
		gap: 10px;
		flex-wrap: wrap;
	}

	.group-chips {
		margin-top: 35px;
		display: flex;
		flex-wrap: wrap;
		gap: 10px;
		justify-content: center;
	}

	.group-chip {
		display: inline-flex;
		align-items: center;
		gap: 8px;
		background: #ffffff;
		border: 1px solid #e8eef7;
		color: #345;
		padding: 10px 14px;
		border-radius: 999px;
		font-weight: 600;
		font-size: 0.95rem;
		box-shadow: 0 6px 18px rgba(0, 0, 0, 0.04);
		transition: all 0.25s ease;
	}

	.group-chip:hover {
		border-color: rgba(0, 86, 184, 0.4);
		transform: translateY(-2px);
	}

	.group-chip i {
		color: var(--ts-primary);
	}

	/* ===== ТАБЛИЦА (на основе solutions-classification из page-specialized-chillers.php) ===== */
	.solutions-classification {
		background-color: white;
	}

	.solutions-table-container {
		overflow-x: auto;
		margin: 40px 0;
		border-radius: 15px;
		box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
		border: 1px solid #eee;
	}

	.solutions-table {
		width: 100%;
		border-collapse: collapse;
		background: white;
		min-width: 980px;
	}

	.solutions-table thead th {
		background-color: var(--ts-primary);
		color: white;
		padding: 20px 15px;
		text-align: left;
		font-weight: 600;
		position: sticky;
		top: 0;
		z-index: 10;
	}

	.solutions-table td,
	.solutions-table tbody th {
		padding: 20px 15px;
		border-bottom: 1px solid #eee;
		vertical-align: top;
		text-align: left;
	}

	.solutions-table tr:hover {
		background-color: var(--ts-surface);
	}

	.solution-type {
		font-weight: 700;
		color: var(--ts-primary);
	}

	.solution-apps {
		font-size: 0.95rem;
		color: #555;
	}

	.solution-complexity {
		display: inline-block;
		padding: 6px 12px;
		border-radius: 20px;
		font-size: 0.85rem;
		font-weight: 700;
	}

	.complexity-high {
		background-color: #ffe6e6;
		color: #d63031;
	}

	.complexity-medium {
		background-color: #fff9e6;
		color: #f39c12;
	}

	.complexity-low {
		background-color: #e9f5ff;
		color: var(--ts-primary);
	}

	.solution-action {
		text-align: center;
		white-space: nowrap;
	}

	.solutions-note {
		text-align: center;
		margin-top: 20px;
		color: #666;
		font-style: italic;
		font-size: 0.95rem;
	}

	@media (max-width: 992px) {
		h1 {
			font-size: 2.4rem;
		}
		h2 {
			font-size: 2rem;
		}
		.groups-grid {
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
		}
	}

	@media (max-width: 768px) {
		.components-hero {
			padding: 90px 0 70px;
		}
		.hero-actions {
			flex-direction: column;
			align-items: center;
		}
		.hero-actions .btn {
			width: 100%;
			max-width: 340px;
		}
		.form-row {
			grid-template-columns: 1fr;
		}
		.form-actions {
			flex-direction: column;
			align-items: stretch;
		}
		.form-actions .btn {
			width: 100%;
		}
		.result-details {
			grid-template-columns: 1fr;
		}
		.diagnostic-step {
			padding: 20px;
		}
		.sticky-widget {
			right: 12px;
			left: 12px;
			width: auto;
		}
	}

	@media (max-width: 480px) {
		h1 {
			font-size: 2.0rem;
		}
		h2 {
			font-size: 1.7rem;
		}
		.form-content {
			padding: 22px;
		}
	}
</style>

<!-- ХЛЕБНЫЕ КРОШКИ -->
<div class="breadcrumbs">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a>
		<span>/</span>
		<a href="<?php echo esc_url( home_url( '/catalog' ) ); ?>">Каталог</a>
		<span>/</span>
		<strong><?php the_title(); ?></strong>
	</div>
</div>

<!-- СТИКИ-НАВИГАЦИЯ -->
<div class="sticky-nav" id="stickyNav">
	<div class="container">
		<a href="#groups"><i class="fas fa-layer-group"></i> Группы</a>
		<a href="#classification"><i class="fas fa-table"></i> Таблица</a>
		<a href="#modules"><i class="fas fa-cubes"></i> Модули</a>
		<a href="#diagnostic"><i class="fas fa-stethoscope"></i> Подбор</a>
		<a href="#tz"><i class="fas fa-file-signature"></i> Заявка</a>
		<a href="#faq"><i class="fas fa-question-circle"></i> FAQ</a>
	</div>
</div>

<!-- ГЕРОЙ -->
<section class="components-hero hero">
	<div class="container">
		<h1 class="text-center">Компоненты и модули для чиллеров — подбор, поставка и сборка узлов под вашу задачу</h1>
		<p class="hero-subtitle text-center">Два основных направления раздела: гидромодули (гидрокофуль) и элементы системы управления. Подбор по параметрам, совместимость с существующим оборудованием, поставка со склада и под заказ.</p>

		<div class="hero-features">
			<div class="feature-item">
				<i class="fas fa-ruler-combined"></i>
				<h4>Подбор по расчету</h4>
				<p>Расход, ∆T, давления, среда, условия эксплуатации</p>
			</div>
			<div class="feature-item">
				<i class="fas fa-puzzle-piece"></i>
				<h4>Совместимость</h4>
				<p>Интеграция в существующие чиллеры и АСУ ТП</p>
			</div>
			<div class="feature-item">
				<i class="fas fa-warehouse"></i>
				<h4>Склад и поставка</h4>
				<p>Популярные позиции — быстро, редкие — под заказ</p>
			</div>
			<div class="feature-item">
				<i class="fas fa-shield-alt"></i>
				<h4>Гарантия и сервис</h4>
				<p>Консультации, сопровождение, запасные части</p>
			</div>
			<div class="feature-item">
				<i class="fas fa-microchip"></i>
				<h4>Элементы управления</h4>
				<p>Контроллеры, датчики, шкафы управления, частотники</p>
			</div>
			<div class="feature-item">
				<i class="fas fa-water"></i>
				<h4>Гидромодули</h4>
				<p>Насосные группы, баки, фильтрация, арматура</p>
			</div>
		</div>

		<div class="hero-actions">
			<a href="#diagnostic" class="btn"><i class="fas fa-stethoscope"></i> Быстрый подбор</a>
			<a href="#tz" class="btn btn-outline"><i class="fas fa-calculator"></i> Получить КП</a>
		</div>

		<?php if ( $hydraulic_modules_page_url || $control_components_page_url ) : ?>
			<div class="group-chips" style="margin-top: 26px;">
				<?php if ( $hydraulic_modules_page_url ) : ?>
					<a class="group-chip" href="<?php echo esc_url( $hydraulic_modules_page_url ); ?>"><i class="fas fa-water"></i> Гидромодули</a>
				<?php endif; ?>
				<?php if ( $control_components_page_url ) : ?>
					<a class="group-chip" href="<?php echo esc_url( $control_components_page_url ); ?>"><i class="fas fa-microchip"></i> Элементы системы управления</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<!-- ВВОДНЫЙ БЛОК -->
<section class="components-intro fade-in">
	<div class="container">
		<h2 class="text-center">Что входит в «компоненты и модули»</h2>
		<p class="text-center mb-30" style="color:#666; max-width:900px; margin:0 auto;">Раздел включает две подкатегории: «Гидромодули (гидрокофуль)» и «Элементы системы управления». Выберите нужный раздел, чтобы перейти на подробную страницу.</p>

		<div class="intro-grid">
			<a class="intro-card" href="<?php echo esc_url( $hydraulic_modules_page_url ); ?>">
				<div class="intro-icon"><i class="fas fa-water"></i></div>
				<h3>Гидромодули (гидрокофуль)</h3>
				<p>Насосные группы для воды/гликоля: подбор по расходу/напору, резервирование, фильтрация, защиты, автоматика.</p>
				<div class="intro-cta"><span class="btn btn-outline btn-small"><i class="fas fa-arrow-right"></i> Перейти</span></div>
			</a>
			<a class="intro-card" href="<?php echo esc_url( $control_components_page_url ); ?>">
				<div class="intro-icon"><i class="fas fa-microchip"></i></div>
				<h3>Элементы системы управления</h3>
				<p>Контроллеры, датчики, ЧРП, силовая часть и компоненты шкафов управления. Интеграция в SCADA/BMS.</p>
				<div class="intro-cta"><span class="btn btn-outline btn-small"><i class="fas fa-arrow-right"></i> Перейти</span></div>
			</a>
		</div>
	</div>
</section>

<!-- ГРУППЫ -->
<section id="groups" class="component-groups fade-in">
	<div class="container">
		<h2 class="text-center">Ключевые группы компонентов</h2>
		<p class="text-center mb-40" style="color:#666; max-width:900px; margin:0 auto;">Ниже — две подкатегории раздела. Перейдите на нужную страницу или оставьте заявку на подбор — инженеры уточнят параметры и подготовят КП.</p>

		<div class="groups-grid">
			<div class="group-card">
				<div class="group-header">
					<i class="fas fa-water"></i>
					<div>
						<h3>Гидромодули (гидрокофуль)</h3>
						<p>Насосные группы, баки, фильтрация, арматура</p>
					</div>
				</div>
				<div class="group-content">
					<div class="group-features">
						<div class="group-feature"><i class="fas fa-check-circle"></i> Подбор по расходу/напору и характеристике сети</div>
						<div class="group-feature"><i class="fas fa-check-circle"></i> Резервирование (1+1), частотное регулирование</div>
						<div class="group-feature"><i class="fas fa-check-circle"></i> Материалы: сталь/нержавейка/полимеры под среду</div>
						<div class="group-feature"><i class="fas fa-check-circle"></i> Защита от завоздушивания и кавитации</div>
					</div>
					<div class="group-cta">
						<a href="<?php echo esc_url( $hydraulic_modules_page_url ); ?>" class="btn btn-small"><i class="fas fa-arrow-right"></i> Перейти</a>
						<a href="#tz" class="btn btn-outline btn-small"><i class="fas fa-file-signature"></i> Запросить подбор</a>
					</div>
				</div>
			</div>

			<div class="group-card">
				<div class="group-header">
					<i class="fas fa-microchip"></i>
					<div>
						<h3>Элементы системы управления</h3>
						<p>Контроллеры, датчики, ЧРП, интеграция в SCADA</p>
					</div>
				</div>
				<div class="group-content">
					<div class="group-features">
						<div class="group-feature"><i class="fas fa-check-circle"></i> Логика управления насосами/вентиляторами/компрессорами</div>
						<div class="group-feature"><i class="fas fa-check-circle"></i> Протоколы: Modbus RTU/TCP, дискретные сигналы</div>
						<div class="group-feature"><i class="fas fa-check-circle"></i> Датчики температуры, давления, расхода, уровня</div>
						<div class="group-feature"><i class="fas fa-check-circle"></i> Удаленный мониторинг, журнал событий, уведомления</div>
					</div>
					<div class="group-cta">
						<a href="<?php echo esc_url( $control_components_page_url ); ?>" class="btn btn-small"><i class="fas fa-arrow-right"></i> Перейти</a>
						<a href="#tz" class="btn btn-outline btn-small"><i class="fas fa-file-signature"></i> Запросить подбор</a>
					</div>
				</div>
			</div>
		</div>

		<div class="group-chips">
			<a class="group-chip" href="<?php echo esc_url( $hydraulic_modules_page_url ); ?>"><i class="fas fa-water"></i> Гидромодули (гидрокофуль)</a>
			<a class="group-chip" href="<?php echo esc_url( $control_components_page_url ); ?>"><i class="fas fa-microchip"></i> Элементы системы управления</a>
		</div>
	</div>
</section>

<!-- ТАБЛИЦА -->
<section id="classification" class="solutions-classification fade-in">
	<div class="container">
		<h2 class="text-center">Модули и узлы: что выбрать под вашу задачу</h2>
		<p class="text-center mb-40" style="color:#666; max-width:900px; margin:0 auto;">Таблица помогает быстро понять, какие узлы обычно требуются для стабильной работы. Для точного подбора учитываем среду, температурный диапазон, гидравлическую схему и требования к автоматике.</p>

		<div class="solutions-table-container">
			<table class="solutions-table">
				<thead>
					<tr>
						<th style="width: 220px;">Модуль / узел</th>
						<th>Функция</th>
						<th>Когда применяют</th>
						<th style="width: 140px;">Сложность</th>
						<th style="width: 170px;">Действие</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th class="solution-type">Гидромодуль</th>
						<td class="solution-apps">Насосная группа + бак + фильтрация + арматура. Стабилизирует расход/давление и защищает контур.</td>
						<td class="solution-apps">Много потребителей, длинные трассы, разные режимы работы, нужна устойчивость по ∆T.</td>
						<td><span class="solution-complexity complexity-medium">Средняя</span></td>
						<td class="solution-action"><a class="btn btn-small" href="<?php echo esc_url( $hydraulic_modules_page_url ? $hydraulic_modules_page_url : '#tz' ); ?>">Подробнее</a></td>
					</tr>
					<tr>
						<th class="solution-type">Шкаф управления</th>
						<td class="solution-apps">Контроллер + силовая часть + защита + логика. Управление компрессорами, насосами, вентиляторами.</td>
						<td class="solution-apps">Нужно точное регулирование, частотники, удаленный мониторинг, интеграция с SCADA.</td>
						<td><span class="solution-complexity complexity-high">Высокая</span></td>
						<td class="solution-action"><a class="btn btn-small" href="<?php echo esc_url( $control_components_page_url ? $control_components_page_url : '#tz' ); ?>">Подробнее</a></td>
					</tr>
					<tr>
						<th class="solution-type">Модуль Freecooling</th>
						<td class="solution-apps">Снижение потребления энергии за счет «холода улицы» (в межсезонье/зимой).</td>
						<td class="solution-apps">Есть подходящие условия по наружной температуре и режиму теплоносителя.</td>
						<td><span class="solution-complexity complexity-medium">Средняя</span></td>
						<td class="solution-action"><a class="btn btn-small" href="#tz">Расчет</a></td>
					</tr>
					<tr>
						<th class="solution-type">Рекуперация тепла</th>
						<td class="solution-apps">Использование тепла конденсации для ГВС/отопления/подогрева процесса.</td>
						<td class="solution-apps">Есть потребитель тепла и важна окупаемость/энергоэффективность.</td>
						<td><span class="solution-complexity complexity-high">Высокая</span></td>
						<td class="solution-action"><a class="btn btn-small" href="#tz">Расчет</a></td>
					</tr>
					<tr>
						<th class="solution-type">Узел фильтрации</th>
						<td class="solution-apps">Защита теплообменника/насоса/клапанов от загрязнений и отложений.</td>
						<td class="solution-apps">Старые контуры, гликоль, технологические примеси, высокая цена простоя.</td>
						<td><span class="solution-complexity complexity-low">Низкая</span></td>
						<td class="solution-action"><a class="btn btn-small" href="#tz">Подобрать</a></td>
					</tr>
					<tr>
						<th class="solution-type">Резервирование N+1</th>
						<td class="solution-apps">Надежность: резервный насос/компрессор/контур, автоматическое переключение.</td>
						<td class="solution-apps">Критичные процессы 24/7, высокая стоимость остановки линии.</td>
						<td><span class="solution-complexity complexity-high">Высокая</span></td>
						<td class="solution-action"><a class="btn btn-small" href="#tz">Запросить</a></td>
					</tr>
				</tbody>
			</table>
		</div>

		<p class="solutions-note">Нужно быстро? Пришлите фото шильдика чиллера/схему подключения — подберем аналоги и предложим оптимизацию.</p>
	</div>
</section>

<!-- МОДУЛИ / ТОВАРЫ -->
<section id="modules" class="fade-in">
	<div class="container">
		<div class="ts-root ts-section" id="ts-components">
			<div class="ts-head">
				<div>
					<h2 class="ts-title">Готовые модули и компоненты</h2>
					<p class="ts-sub">Поиск по названию/назначению и фильтр по группе (если категории настроены в WooCommerce)</p>
				</div>
				<div class="ts-controls">
					<input id="ts-search" class="ts-input" type="search" placeholder="Поиск: гидромодуль, контроллер, датчик..." />
					<select id="ts-group" class="ts-select">
						<option value="all">Все группы</option>
						<?php if ( ! empty( $components_child_terms ) && ! is_wp_error( $components_child_terms ) ) : ?>
							<?php foreach ( $components_child_terms as $term ) : ?>
								<option value="<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></option>
							<?php endforeach; ?>
						<?php else : ?>
							<option value="hydromod">Гидромодули</option>
							<option value="control">Элементы системы управления</option>
						<?php endif; ?>
						<option value="other">Прочее</option>
					</select>
				</div>
			</div>

			<div id="ts-grid" class="ts-grid">
				<?php
				if ( function_exists( 'wc_get_product' ) ) {
					$query_args = array(
						'post_type'      => 'product',
						'posts_per_page' => -1,
						'tax_query'      => array(
							array(
								'taxonomy'         => 'product_cat',
								'field'            => 'slug',
								'terms'            => $components_parent_slug,
								'include_children' => true,
							),
						),
					);

					$products = new WP_Query( $query_args );

					if ( $products->have_posts() ) {
						while ( $products->have_posts() ) {
							$products->the_post();
							$product = wc_get_product( get_the_ID() );

							$image_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium' ) : 'https://via.placeholder.com/360x200?text=Component';

							$tags     = get_the_terms( get_the_ID(), 'product_tag' );
							$tag_html = '';
							if ( $tags && ! is_wp_error( $tags ) ) {
								foreach ( $tags as $tag ) {
									$tag_html .= '<span class="ts-tag">' . esc_html( $tag->name ) . '</span>';
								}
							}

							$group_slug = 'other';
							$group_name = 'Прочее';

							$cats = get_the_terms( get_the_ID(), 'product_cat' );
							if ( $cats && ! is_wp_error( $cats ) && $components_parent_term && ! is_wp_error( $components_parent_term ) ) {
								foreach ( $cats as $cat ) {
									if ( (int) $cat->term_id === (int) $components_parent_term->term_id ) {
										continue;
									}

									$ancestors = get_ancestors( $cat->term_id, 'product_cat' );
									$idx       = array_search( (int) $components_parent_term->term_id, $ancestors, true );
									if ( $idx === false ) {
										continue;
									}

									if ( 0 === (int) $idx ) {
										$group_slug = $cat->slug;
										$group_name = $cat->name;
										break;
									}

									$group_term_id = $ancestors[ $idx - 1 ];
									$group_term    = get_term( $group_term_id, 'product_cat' );
									if ( $group_term && ! is_wp_error( $group_term ) ) {
										$group_slug = $group_term->slug;
										$group_name = $group_term->name;
										break;
									}
								}
							}
							?>
							<article class="ts-card ts-product" data-group="<?php echo esc_attr( $group_slug ); ?>">
								<div class="ts-media">
									<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
								</div>
								<div class="ts-body">
									<div class="ts-kicker">Группа: <strong><?php echo esc_html( $group_name ); ?></strong></div>
									<h3 class="ts-name"><?php the_title(); ?></h3>
									<div class="ts-meta">
										<?php echo wp_kses_post( $tag_html ); ?>
									</div>
								</div>
								<div class="ts-foot">
									<a href="<?php the_permalink(); ?>" class="btn btn-outline btn-small">
										<i class="fas fa-info-circle"></i> Подробнее
									</a>
									<a href="#tz" class="btn btn-small">
										<i class="fas fa-paper-plane"></i> Подбор
									</a>
								</div>
							</article>
							<?php
						}
						wp_reset_postdata();
					} else {
						?>
						<div style="grid-column: 1/-1; text-align:center; padding: 35px; color:#666;">
							<i class="fas fa-box-open" style="font-size:2rem; color:#cbd5e1; display:block; margin-bottom:12px;"></i>
							<p style="margin:0;">Пока нет товаров в категории <strong><?php echo esc_html( $components_parent_slug ); ?></strong>. Добавьте товары в WooCommerce — и они автоматически появятся здесь.</p>
						</div>
						<?php
					}
				} else {
					?>
					<div style="grid-column: 1/-1; text-align:center; padding: 35px; color:#666;">
						<i class="fas fa-plug" style="font-size:2rem; color:#cbd5e1; display:block; margin-bottom:12px;"></i>
						<p style="margin:0;">WooCommerce не активен. Блок «Готовые модули» выводит товары из каталога, когда WooCommerce включен.</p>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>

<!-- БЫСТРЫЙ ПОДБОР -->
<section id="diagnostic" class="quick-diagnostic fade-in">
	<div class="container">
		<div class="diagnostic-header">
			<h2>Быстрый подбор комплекта за 2 минуты</h2>
			<p>Ответьте на 3 вопроса, и мы подскажем типовую конфигурацию узлов (а затем уточним детали и подготовим КП).</p>
		</div>

		<div class="diagnostic-step">
			<div class="step-question">
				<h3><i class="fas fa-bullseye"></i> 1. Что нужно сейчас?</h3>
			</div>
			<div class="options-grid" id="needOptions">
				<div class="option-card" data-value="new-build">
					<i class="fas fa-cubes"></i>
					<p>Сборка/проект</p>
				</div>
				<div class="option-card" data-value="upgrade">
					<i class="fas fa-wrench"></i>
					<p>Модернизация</p>
				</div>
				<div class="option-card" data-value="repair">
					<i class="fas fa-tools"></i>
					<p>Ремонт/замена</p>
				</div>
				<div class="option-card" data-value="spares">
					<i class="fas fa-clipboard-list"></i>
					<p>ЗИП/регламент</p>
				</div>
			</div>
		</div>

		<div class="diagnostic-step">
			<div class="step-question">
				<h3><i class="fas fa-thermometer-half"></i> 2. Среда и температурный режим</h3>
			</div>
			<div class="options-grid" id="mediaOptions">
				<div class="option-card" data-value="water">
					<i class="fas fa-tint"></i>
					<p>Вода +5…+20°C</p>
				</div>
				<div class="option-card" data-value="glycol">
					<i class="fas fa-vial"></i>
					<p>Гликоль -10…+10°C</p>
				</div>
				<div class="option-card" data-value="brine">
					<i class="fas fa-snowflake"></i>
					<p>Рассол -30…0°C</p>
				</div>
				<div class="option-card" data-value="oil">
					<i class="fas fa-oil-can"></i>
					<p>Масло/теплоноситель</p>
				</div>
			</div>
			<div class="special-textarea">
				<textarea id="specialRequirements" placeholder="Уточните: расход (м³/ч), температуры вход/выход, условия (улица/цех), требуемая точность, протоколы связи и т.д."></textarea>
			</div>
		</div>

		<div class="diagnostic-step">
			<div class="step-question">
				<h3><i class="fas fa-microchip"></i> 3. Уровень автоматизации</h3>
			</div>
			<div class="options-grid" id="automationOptions">
				<div class="option-card" data-value="basic">
					<i class="fas fa-toggle-on"></i>
					<p>Базовый</p>
				</div>
				<div class="option-card" data-value="precise">
					<i class="fas fa-crosshairs"></i>
					<p>Точный контроль</p>
				</div>
				<div class="option-card" data-value="scada">
					<i class="fas fa-network-wired"></i>
					<p>SCADA/Modbus</p>
				</div>
				<div class="option-card" data-value="atex">
					<i class="fas fa-radiation"></i>
					<p>Взрывозащита</p>
				</div>
			</div>
		</div>

		<div class="diagnostic-actions">
			<button class="btn" id="getComponentsEstimationBtn"><i class="fas fa-magic"></i> Получить рекомендацию</button>
			<a href="#tz" class="btn btn-outline"><i class="fas fa-file-signature"></i> Перейти к заявке</a>
		</div>

		<div class="diagnostic-result" id="diagnosticResult">
			<h3>Предварительная рекомендация по узлам</h3>
			<div class="result-details">
				<div class="result-item">
					<h4>Тип решения</h4>
					<p id="resultType">—</p>
				</div>
				<div class="result-item">
					<h4>Сложность</h4>
					<p id="resultComplexity">—</p>
				</div>
				<div class="result-item">
					<h4>Сроки оценки</h4>
					<p id="resultTimeline">—</p>
				</div>
				<div class="result-item">
					<h4>Рекомендуемые узлы</h4>
					<p id="resultComponents">—</p>
				</div>
			</div>
			<div class="diagnostic-actions" style="margin-top:22px;">
				<a class="btn btn-outline" href="#tz"><i class="fas fa-paper-plane"></i> Отправить заявку</a>
			</div>
		</div>
	</div>
</section>

<!-- МНОГОШАГОВАЯ ЗАЯВКА -->
<section id="tz" class="multi-step-form fade-in">
	<div class="container">
		<div class="form-container">
			<div class="form-header">
				<h2>Техническая заявка на подбор компонентов/модулей</h2>
				<p>Заполните форму — и мы подготовим спецификацию и коммерческое предложение. Если данных нет под рукой, заполните только контакты и краткое описание.</p>
			</div>

			<div class="form-progress">
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
					<div class="step-label">Состав</div>
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
					<!-- Шаг 1 -->
					<div class="form-step-content active" id="formStepContent1">
						<div class="form-row">
							<div class="form-group">
								<label>Ваше имя *</label>
								<input type="text" class="form-control" name="requestName" placeholder="Иванов Иван" required>
							</div>
							<div class="form-group">
								<label>Компания *</label>
								<input type="text" class="form-control" name="requestCompany" placeholder="ООО 'Ваша компания'" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group">
								<label>Телефон *</label>
								<input type="tel" class="form-control" name="requestPhone" placeholder="+7 (___) ___-__-__" required>
							</div>
							<div class="form-group">
								<label>Email *</label>
								<input type="email" class="form-control" name="requestEmail" placeholder="ivanov@company.ru" required>
							</div>
						</div>
						<div class="form-actions">
							<button type="button" class="btn btn-outline" disabled>Назад</button>
							<button type="button" class="btn" id="nextToStep2">Далее</button>
						</div>
					</div>

					<!-- Шаг 2 -->
					<div class="form-step-content" id="formStepContent2">
						<div class="form-group">
							<label>Температура теплоносителя на входе/выходе</label>
							<input type="text" class="form-control" name="requestTemp" placeholder="Пример: +20°C / +10°C">
						</div>
						<div class="form-row">
							<div class="form-group">
								<label>Расход теплоносителя, м³/ч</label>
								<input type="number" class="form-control" name="requestFlow" placeholder="10" min="0" step="0.1">
							</div>
							<div class="form-group">
								<label>Ориентировочная мощность, кВт</label>
								<input type="number" class="form-control" name="requestPower" placeholder="100" min="0">
							</div>
						</div>
						<div class="form-group">
							<label>Среда (теплоноситель) *</label>
							<select class="form-control" name="requestMedia" required>
								<option value="">-- Выберите --</option>
								<option value="water">Вода</option>
								<option value="glycol">Этилен/пропиленгликоль</option>
								<option value="brine">Рассол</option>
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
							<label>Какие узлы требуются? *</label>
							<div class="checkbox-grid">
								<label class="checkbox-label"><input type="checkbox" name="needUnits[]" value="hydromodule" required> Гидромодуль / насосная группа</label>
								<label class="checkbox-label"><input type="checkbox" name="needUnits[]" value="automation"> Элементы управления / шкаф управления</label>
								<label class="checkbox-label"><input type="checkbox" name="needUnits[]" value="heat-exchanger"> Теплообменник (испаритель/конденсатор)</label>
								<label class="checkbox-label"><input type="checkbox" name="needUnits[]" value="valves"> Арматура и клапаны</label>
								<label class="checkbox-label"><input type="checkbox" name="needUnits[]" value="sensors"> Датчики (T/P/расход/уровень)</label>
								<label class="checkbox-label"><input type="checkbox" name="needUnits[]" value="freecooling"> Freecooling / энергосбережение</label>
							</div>
						</div>
						<div class="form-group">
							<label>Краткое описание задачи</label>
							<textarea class="form-control" name="requestNotes" rows="4" placeholder="Марка/модель чиллера (если есть), что нужно заменить или собрать, ограничения по габаритам, условия (улица/цех), протоколы связи..."></textarea>
						</div>
						<div class="form-actions">
							<button type="button" class="btn btn-outline" id="backToStep2">Назад</button>
							<button type="button" class="btn" id="nextToStep4">Далее</button>
						</div>
					</div>

					<!-- Шаг 4 -->
					<div class="form-step-content" id="formStepContent4">
						<div class="form-group">
							<label>Загрузить ТЗ / перечень позиций (до 20 МБ)</label>
							<div class="file-upload">
								<input type="file" id="tzFile" name="tzFile" accept=".pdf,.doc,.docx,.xls,.xlsx">
								<div class="file-label">
									<i class="fas fa-file-alt"></i>
									<span id="tzFileName">Выберите файл...</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Фото шильдика / схемы / чертежи (до 50 МБ)</label>
							<div class="file-upload">
								<input type="file" id="drawingsFile" name="drawingsFile" accept=".jpg,.jpeg,.png,.pdf,.dwg,.dxf" multiple>
								<div class="file-label">
									<i class="fas fa-drafting-compass"></i>
									<span id="drawingsFileName">Выберите файлы...</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Спецификация / ведомость (если есть)</label>
							<div class="file-upload">
								<input type="file" id="specFile" name="specFile" accept=".pdf,.doc,.docx,.xls,.xlsx">
								<div class="file-label">
									<i class="fas fa-list-alt"></i>
									<span id="specFileName">Выберите файл...</span>
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
								<label>Желаемые сроки</label>
								<select class="form-control" name="requestTimeline">
									<option value="">-- Выберите --</option>
									<option value="urgent">Срочно (до 14 дней)</option>
									<option value="normal">Стандартно (14–45 дней)</option>
									<option value="planned">Планово (по графику)</option>
								</select>
							</div>
							<div class="form-group">
								<label>Ориентировочный бюджет, руб</label>
								<input type="text" class="form-control" name="requestBudget" placeholder="300 000">
							</div>
						</div>
						<div class="form-group">
							<label>Дополнительные комментарии</label>
							<textarea class="form-control" name="finalNotes" rows="3" placeholder="Тендер/поставка, требования к оплате, условия доступа на объект..."></textarea>
						</div>
						<div class="guarantee-note">
							<i class="fas fa-shield-alt"></i>
							<p><strong>Гарантия:</strong> если нужного узла нет в наличии — предложим технически корректную замену или альтернативное решение.</p>
						</div>
						<div class="form-actions">
							<button type="button" class="btn btn-outline" id="backToStep4">Назад</button>
							<button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Отправить заявку</button>
						</div>
					</div>
				</form>

				<div class="form-success" id="formSuccess">
					<i class="fas fa-check-circle"></i>
					<h3>Заявка отправлена!</h3>
					<p>Наш инженер свяжется с вами для уточнения деталей и подготовки спецификации.</p>
					<p><strong>Номер заявки:</strong> #CMP-<span id="requestNumber">001</span></p>
					<p style="margin-top:18px; color:#666; font-size:0.95rem;">Если вы прикрепили файлы — мы начнем анализ сразу после получения.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ПРОЦЕСС -->
<section id="process" class="work-process fade-in">
	<div class="container">
		<h2 class="text-center">Как мы работаем</h2>
		<p class="text-center mb-40" style="color:#666;">От запроса до поставки и интеграции — прозрачно и по шагам</p>

		<div class="process-steps">
			<div class="process-step">
				<div class="step-number-large">1</div>
				<div class="step-icon"><i class="fas fa-search"></i></div>
				<div class="step-content">
					<h4>Сбор исходных данных</h4>
					<p>Параметры теплоносителя, схема, ограничения, фото/перечень</p>
				</div>
			</div>
			<div class="process-step">
				<div class="step-number-large">2</div>
				<div class="step-icon"><i class="fas fa-calculator"></i></div>
				<div class="step-content">
					<h4>Подбор и расчет</h4>
					<p>Проверка совместимости, расчет узлов и подбор аналогов</p>
				</div>
			</div>
			<div class="process-step">
				<div class="step-number-large">3</div>
				<div class="step-icon"><i class="fas fa-handshake"></i></div>
				<div class="step-content">
					<h4>Согласование</h4>
					<p>Фиксируем спецификацию, сроки и условия, при необходимости — варианты</p>
				</div>
			</div>
			<div class="process-step">
				<div class="step-number-large">4</div>
				<div class="step-icon"><i class="fas fa-truck"></i></div>
				<div class="step-content">
					<h4>Поставка / изготовление</h4>
					<p>Склад / под заказ. Комплектация и упаковка под логистику</p>
				</div>
			</div>
			<div class="process-step">
				<div class="step-number-large">5</div>
				<div class="step-icon"><i class="fas fa-shield-alt"></i></div>
				<div class="step-content">
					<h4>Сопровождение</h4>
					<p>Консультации, рекомендации по монтажу, сервис и ЗИП</p>
				</div>
			</div>
		</div>

		<div class="guarantee-banner">
			<div class="guarantee-item">
				<i class="far fa-calendar-check"></i>
				<h3>Сроки</h3>
				<p>от 1 дня (склад) / под заказ</p>
			</div>
			<div class="guarantee-item">
				<i class="fas fa-shield-alt"></i>
				<h3>Гарантия</h3>
				<p>на комплектующие и узлы</p>
			</div>
			<div class="guarantee-item">
				<i class="fas fa-headset"></i>
				<h3>Поддержка</h3>
				<p>инженерная консультация</p>
			</div>
		</div>
	</div>
</section>

<!-- FAQ -->
<section id="faq" class="faq-section fade-in">
	<div class="container">
		<div class="faq-container">
			<h2 class="text-center">Частые вопросы</h2>
			<p class="text-center mb-40" style="color:#666;">Коротко отвечаем на то, что обычно спрашивают перед подбором компонентов</p>

			<div class="faq-item">
				<div class="faq-question">
					<span>Какие данные нужны для подбора гидромодуля?</span>
					<i class="fas fa-chevron-down"></i>
				</div>
				<div class="faq-answer">
					<p>Минимально: расход (м³/ч), требуемый напор или длина/схема трасс, среда (вода/гликоль), диапазон температур, количество потребителей и их режимы. Если данных нет — достаточно схемы или описания процесса, мы поможем собрать исходные параметры.</p>
				</div>
			</div>

			<div class="faq-item">
				<div class="faq-question">
					<span>Можно ли поставить автоматику для чиллера другой марки?</span>
					<i class="fas fa-chevron-down"></i>
				</div>
				<div class="faq-answer">
					<p>Да, часто возможно. Мы уточняем состав исполнительных механизмов и датчиков, схему силовой части, требования к протоколам связи и формируем решение: от базового управления до интеграции в SCADA.</p>
				</div>
			</div>

			<div class="faq-item">
				<div class="faq-question">
					<span>Что важно при подборе теплообменника?</span>
					<i class="fas fa-chevron-down"></i>
				</div>
				<div class="faq-answer">
					<p>Ключевые параметры: тепловая нагрузка, ∆T, давление, материал, загрязняемость среды, допустимое падение давления и требования по обслуживанию. Неправильный выбор может дать «недоохлаждение» или повышенные потери на насосах.</p>
				</div>
			</div>

			<div class="faq-item">
				<div class="faq-question">
					<span>Как быстро вы сможете поставить комплектующие?</span>
					<i class="fas fa-chevron-down"></i>
				</div>
				<div class="faq-answer">
					<p>Популярные позиции доступны со склада, редкие — под заказ. Срок зависит от производителя и текущей логистики. В заявке укажите желаемый срок — предложим варианты по срок/стоимость.</p>
				</div>
			</div>

			<div class="faq-item">
				<div class="faq-question">
					<span>Нужны ли фильтрация и водоподготовка?</span>
					<i class="fas fa-chevron-down"></i>
				</div>
				<div class="faq-answer">
					<p>В большинстве промышленных контуров — да. Фильтрация защищает теплообменники и арматуру, снижает риск засоров, а водоподготовка уменьшает накипь и коррозию. Мы подберем решение в зависимости от качества воды и условий эксплуатации.</p>
				</div>
			</div>

			<div class="faq-item">
				<div class="faq-question">
					<span>Можно ли начать с «минимального» набора данных?</span>
					<i class="fas fa-chevron-down"></i>
				</div>
				<div class="faq-answer">
					<p>Да. Оставьте контакты и кратко опишите задачу. Если есть фото шильдика оборудования или перечень позиций — приложите. Инженер уточнит параметры и предложит корректную конфигурацию.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- SEO -->
<section class="seo-content fade-in">
	<div class="container">
		<div class="seo-text">
			<h2>Компоненты и модули для промышленных чиллеров</h2>
			<p>Подбор компонентов для чиллера — это инженерная задача, а не просто «заказ по каталогу». Даже одинаковые по названию узлы могут отличаться по рабочим давлениям, материалам, совместимости по хладагенту, диапазонам температур и требованиям к автоматике. Мы рассматриваем систему целиком: холодильный контур, гидравлику, алгоритмы управления и реальную эксплуатацию на объекте.</p>
			<p>Если вы модернизируете существующий чиллер, мы поможем подобрать аналоги и совместимые решения: насосные группы и гидромодули, контроллеры и шкафы управления, датчики и арматуру, теплообменники и элементы энергосбережения (freecooling, рекуперация). Для новых проектов сформируем спецификацию узлов под заданные режимы и подготовим коммерческое предложение.</p>

			<div class="keywords-grid">
				<div class="keyword-item">
					<i class="fas fa-search"></i>
					<div>
						<strong>гидромодуль для чиллера</strong>
						<p style="margin:5px 0 0; font-size:0.9rem; color:#666;">насосная группа, бак, фильтрация, обвязка</p>
					</div>
				</div>
				<div class="keyword-item">
					<i class="fas fa-search"></i>
					<div>
						<strong>автоматика и шкаф управления</strong>
						<p style="margin:5px 0 0; font-size:0.9rem; color:#666;">контроллеры, датчики, частотники, SCADA</p>
					</div>
				</div>
				<div class="keyword-item">
					<i class="fas fa-search"></i>
					<div>
						<strong>теплообменники для чиллера</strong>
						<p style="margin:5px 0 0; font-size:0.9rem; color:#666;">испаритель, конденсатор, рекуперация</p>
					</div>
				</div>
				<div class="keyword-item">
					<i class="fas fa-search"></i>
					<div>
						<strong>комплектующие холодильного контура</strong>
						<p style="margin:5px 0 0; font-size:0.9rem; color:#666;">клапаны, ТРВ/ЭРВ, фильтры, ресиверы</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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

<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Fade-in on scroll
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

		// Smooth anchors
		document.querySelectorAll('a[href^=\"#\"]').forEach(anchor => {
			anchor.addEventListener('click', function(e) {
				const href = this.getAttribute('href');
				if (!href || href === '#' || href === '#!') return;
				const targetElement = document.querySelector(href);
				if (!targetElement) return;
				e.preventDefault();
				window.scrollTo({
					top: targetElement.offsetTop - 90,
					behavior: 'smooth'
				});
			});
		});

		// Sticky nav toggle
		const stickyNav = document.getElementById('stickyNav');
		const toggleStickyNav = function() {
			if (!stickyNav) return;
			const y = window.scrollY || window.pageYOffset;
			if (y > 500) stickyNav.classList.add('active');
			else stickyNav.classList.remove('active');
		};
		window.addEventListener('scroll', toggleStickyNav);
		toggleStickyNav();

		// TS grid filter (search + group)
		(function() {
			const root = document.getElementById('ts-components');
			if (!root) return;
			const grid = root.querySelector('#ts-grid');
			const search = root.querySelector('#ts-search');
			const group = root.querySelector('#ts-group');
			const selectors = ['.ts-product'];

			function hide(el) {
				if (!el.dataset._d) el.dataset._d = getComputedStyle(el).display;
				el.style.display = 'none';
			}

			function show(el) {
				el.style.display = el.dataset._d || '';
			}

			function apply() {
				const q = (search?.value || '').toLowerCase();
				const g = group?.value || 'all';
				const items = grid.querySelectorAll(selectors.join(','));

				items.forEach(el => {
					let ok = true;
					if (q && !el.textContent.toLowerCase().includes(q)) ok = false;
					if (g !== 'all') {
						const dg = el.dataset.group || 'other';
						if (dg !== g) ok = false;
					}
					ok ? show(el) : hide(el);
				});
			}

			search?.addEventListener('input', apply);
			group?.addEventListener('change', apply);
			apply();
		})();

		// Quick diagnostic (single choice per group)
		function bindSingleChoice(gridId) {
			const grid = document.getElementById(gridId);
			if (!grid) return;
			grid.querySelectorAll('.option-card').forEach(card => {
				card.addEventListener('click', function() {
					grid.querySelectorAll('.option-card').forEach(c => c.classList.remove('selected'));
					this.classList.add('selected');
				});
			});
		}
		bindSingleChoice('needOptions');
		bindSingleChoice('mediaOptions');
		bindSingleChoice('automationOptions');

		const btn = document.getElementById('getComponentsEstimationBtn');
		const result = document.getElementById('diagnosticResult');

		btn?.addEventListener('click', function() {
			const need = document.querySelector('#needOptions .option-card.selected p')?.textContent?.trim() || '';
			const media = document.querySelector('#mediaOptions .option-card.selected p')?.textContent?.trim() || '';
			const auto = document.querySelector('#automationOptions .option-card.selected p')?.textContent?.trim() || '';
			const notes = document.getElementById('specialRequirements')?.value?.trim() || '';

			if (!need || !media || !auto) {
				alert('Пожалуйста, выберите по одному варианту в каждом вопросе');
				return;
			}

			let complexity = 'Средняя';
			let timeline = '1–3 рабочих дня';
			let components = 'Гидромодуль (насос+фильтр), датчики потока/давления, базовая автоматика';
			let type = 'Подбор комплекта компонентов';

			if (need.includes('Ремонт') || need.includes('ЗИП')) {
				timeline = 'от 1 рабочего дня';
				type = 'Замена/аналог или сервисный комплект';
				components = 'Проверка совместимости, подбор аналогов, регламент обслуживания';
			}

			if (auto.includes('SCADA') || auto.includes('Взрывозащита')) {
				complexity = 'Высокая';
				timeline = '3–7 рабочих дней';
				components = 'Шкаф управления, датчики, логика, интеграция по протоколам';
			}

			if (media.includes('Рассол') || media.includes('Масло')) {
				complexity = 'Высокая';
				timeline = '3–7 рабочих дней';
				components += '; подбор материалов/уплотнений под среду и температурный режим';
			}

			if (notes.length > 0 && notes.toLowerCase().includes('freecool')) {
				complexity = 'Высокая';
				type = 'Энергоэффективное решение';
				components += '; модуль freecooling и узлы переключения режимов';
			}

			document.getElementById('resultType').textContent = type;
			document.getElementById('resultComplexity').textContent = complexity;
			document.getElementById('resultTimeline').textContent = timeline;
			document.getElementById('resultComponents').textContent = components;

			result.style.display = 'block';
			result.scrollIntoView({
				behavior: 'smooth',
				block: 'center'
			});

			console.log('Диагностика (компоненты):', {
				need,
				media,
				auto,
				notes
			});
		});

		// FAQ accordion
		document.querySelectorAll('.faq-question').forEach(question => {
			question.addEventListener('click', function() {
				const answer = this.nextElementSibling;
				answer?.classList.toggle('active');
				this.classList.toggle('active');
			});
		});

		// Sticky widget
		const stickyWidget = document.getElementById('stickyWidget');
		const closeWidget = document.getElementById('closeWidget');
		if (stickyWidget) {
			setTimeout(() => stickyWidget.classList.add('active'), 900);
		}
		closeWidget?.addEventListener('click', function() {
			stickyWidget?.classList.remove('active');
		});

		// Многошаговая форма #technicalRequestForm обрабатывается в /js/main.js
	});
</script>

<?php get_footer(); ?>
