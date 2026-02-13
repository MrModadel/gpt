<?php

/**
 * Template Name: О компании
 *
 * @package Termoservis
 */
$termoservis_phone_raw = get_theme_mod( 'termoservis_phone', '+7 (927) 001-38-85' );
$termoservis_phone_tel = preg_replace( '/[^\d+]/', '', $termoservis_phone_raw );
$theme_version         = wp_get_theme()->get( 'Version' );

get_header();
?>
<style>
   /* ===== О КОМПАНИИ ===== */

:root {
  --ac-primary: #0056b8;
  --ac-primary-2: #00a3ff;
  --ac-text: #333333;
  --ac-muted: #666666;
  --ac-bg: #f8f9fa;
  --ac-card: #ffffff;
  --ac-border: rgba(0, 0, 0, 0.08);
  --ac-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  --ac-shadow-strong: 0 20px 50px rgba(0, 0, 0, 0.14);
  --ac-radius: 14px;
}

/* Центрирование линии у H2 с .text-center */
h2.text-center:after {
  left: 50%;
  transform: translateX(-50%);
}

.section-lead {
  max-width: 900px;
  margin: 0 auto 40px;
  color: var(--ac-muted);
  font-size: 1.1rem;
  line-height: 1.7;
}

/* ===== ХЛЕБНЫЕ КРОШКИ ===== */
.breadcrumbs {
  background-color: #f8f9fa;
  padding: 15px 0;
  font-size: 0.9rem;
  border-bottom: 1px solid #eee;
}

.breadcrumbs a {
  color: var(--ac-primary);
}

.breadcrumbs a:hover {
  text-decoration: underline;
}

.breadcrumbs span {
  color: #666;
  margin: 0 8px;
}

/* ===== КНОПКИ (варианты) ===== */
.about-company-page .btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  line-height: 1.2;
}

.about-company-page .btn-light {
  background: rgba(255, 255, 255, 0.14);
  border: 1px solid rgba(255, 255, 255, 0.28);
  color: #ffffff;
  backdrop-filter: blur(8px);
}

.about-company-page .btn-light:hover {
  background: rgba(255, 255, 255, 0.22);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
}

.about-company-page .btn-light-outline {
  background: transparent;
  border: 2px solid rgba(255, 255, 255, 0.7);
  color: #ffffff;
}

.about-company-page .btn-light-outline:hover {
  background: rgba(255, 255, 255, 0.16);
  border-color: #ffffff;
}

.about-company-page .btn-small {
  padding: 12px 18px;
  border-radius: 10px;
  font-size: 0.95rem;
  gap: 8px;
}

.form-note {
  font-size: 0.85rem;
  color: #666;
  margin-top: 12px;
  text-align: center;
}

/* ===== HERO ===== */
.about-hero {
  background:
    linear-gradient(105deg, rgba(0, 86, 184, 0.92) 0%, rgba(0, 86, 184, 0.78) 100%),
    url('../img/convertio.in_photo-1581094794329-c8112a89af12.webp') center/cover no-repeat;
  color: #ffffff;
  padding: 120px 0 80px;
  position: relative;
  overflow: hidden;
}

.about-hero:before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(1200px 600px at 10% 15%, rgba(255, 255, 255, 0.14), transparent 60%),
    radial-gradient(900px 520px at 85% 10%, rgba(0, 0, 0, 0.18), transparent 60%);
  pointer-events: none;
}

.about-hero .container {
  position: relative;
  z-index: 1;
}

.about-hero-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: 50px;
  align-items: center;
}

.about-kicker {
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

.about-hero h1 {
  text-align: left;
  color: #ffffff;
  margin-bottom: 20px;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
}

.about-hero p {
  font-size: 1.15rem;
  opacity: 0.95;
  line-height: 1.75;
  margin-bottom: 26px;
}

.about-hero-highlights {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 16px;
  margin-top: 14px;
}

.highlight {
  display: flex;
  gap: 14px;
  align-items: flex-start;
  padding: 16px;
  background: rgba(255, 255, 255, 0.10);
  border: 1px solid rgba(255, 255, 255, 0.16);
  border-radius: 12px;
  transition: transform 0.25s ease, background 0.25s ease, border-color 0.25s ease;
}

.highlight:hover {
  transform: translateY(-3px);
  background: rgba(255, 255, 255, 0.14);
  border-color: rgba(255, 255, 255, 0.26);
}

.highlight i {
  font-size: 1.2rem;
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.14);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.highlight h4 {
  color: #ffffff;
  margin-bottom: 6px;
  font-size: 1.02rem;
}

.highlight p {
  margin: 0;
  opacity: 0.9;
  font-size: 0.95rem;
  line-height: 1.6;
}

.about-hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 14px;
  margin-top: 26px;
}

.about-hero-form {
  background: rgba(255, 255, 255, 0.96);
  padding: 34px;
  border-radius: 16px;
  box-shadow: 0 22px 50px rgba(0, 0, 0, 0.18);
  border: 1px solid rgba(0, 0, 0, 0.08);
  position: relative;
  overflow: hidden;
}

.about-hero-form:before {
  content: '';
  position: absolute;
  top: -90px;
  right: -110px;
  width: 220px;
  height: 220px;
  background: radial-gradient(circle, rgba(0, 86, 184, 0.16), transparent 70%);
  border-radius: 50%;
  pointer-events: none;
}

.about-hero-form h3 {
  color: var(--ac-primary);
  text-align: center;
  margin-bottom: 22px;
  font-size: 1.45rem;
}

.about-hero-form .form-row {
  gap: 14px;
  margin-bottom: 14px;
}

.about-hero-form .btn {
  width: 100%;
}

/* ===== СЕКЦИИ ===== */
.about-block {
  background: #ffffff;
}

.about-block--alt {
  background: var(--ac-bg);
}

/* ===== СТАТИСТИКА ===== */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 18px;
  margin-bottom: 40px;
}

.stat-card {
  background: var(--ac-card);
  border: 1px solid var(--ac-border);
  border-radius: 14px;
  padding: 22px 18px;
  box-shadow: var(--ac-shadow);
  text-align: center;
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
}

.stat-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--ac-shadow-strong);
  border-color: rgba(0, 86, 184, 0.22);
}

.stat-value {
  font-size: 1.9rem;
  font-weight: 900;
  color: var(--ac-primary);
  margin-bottom: 6px;
  line-height: 1.1;
}

.stat-label {
  color: var(--ac-muted);
  font-weight: 600;
  font-size: 0.95rem;
}

/* ===== TIMELINE ===== */
.timeline {
  position: relative;
  display: grid;
  gap: 18px;
  margin-top: 10px;
}

.timeline:before {
  content: '';
  position: absolute;
  left: 18px;
  top: 8px;
  bottom: 8px;
  width: 2px;
  background: rgba(0, 86, 184, 0.18);
}

.timeline-item {
  display: grid;
  grid-template-columns: 80px 1fr;
  gap: 20px;
  align-items: start;
}

.timeline-year {
  font-weight: 900;
  color: var(--ac-primary);
  font-size: 1.05rem;
  position: relative;
  padding-left: 42px;
}

.timeline-year:before {
  content: '';
  position: absolute;
  left: 10px;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background: #ffffff;
  border: 3px solid var(--ac-primary);
  box-shadow: 0 0 0 6px rgba(0, 86, 184, 0.10);
}

.timeline-card {
  background: var(--ac-card);
  border: 1px solid var(--ac-border);
  border-radius: 14px;
  padding: 22px;
  box-shadow: var(--ac-shadow);
}

.timeline-card p {
  margin: 0;
  color: var(--ac-muted);
  line-height: 1.7;
}

/* ===== ПРОИЗВОДСТВО ===== */
.split-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 22px;
  margin-top: 10px;
}

.split-card {
  background: var(--ac-card);
  border: 1px solid var(--ac-border);
  border-radius: 14px;
  padding: 26px 24px;
  box-shadow: var(--ac-shadow);
}

.checklist {
  display: grid;
  gap: 10px;
  margin-top: 14px;
}

.checklist li {
  display: flex;
  gap: 10px;
  align-items: flex-start;
  color: var(--ac-muted);
}

.checklist i {
  color: var(--ac-primary);
  margin-top: 3px;
}

.capabilities {
  display: grid;
  gap: 14px;
  margin-top: 16px;
}

.capability {
  display: flex;
  gap: 14px;
  align-items: flex-start;
  padding: 14px;
  border-radius: 12px;
  border: 1px dashed rgba(0, 0, 0, 0.10);
  background: rgba(0, 86, 184, 0.03);
}

.capability i {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: rgba(0, 86, 184, 0.10);
  color: var(--ac-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  font-size: 1.15rem;
}

.capability p {
  margin: 0;
  color: var(--ac-muted);
  line-height: 1.65;
}

.steps-grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 18px;
  margin-top: 26px;
}

.step-card {
  background: var(--ac-card);
  border: 1px solid var(--ac-border);
  border-radius: 14px;
  padding: 22px 18px;
  box-shadow: var(--ac-shadow);
  transition: transform 0.25s ease, box-shadow 0.25s ease;
  position: relative;
  overflow: hidden;
}

.step-card:before {
  content: '';
  position: absolute;
  top: -70px;
  right: -80px;
  width: 180px;
  height: 180px;
  background: radial-gradient(circle, rgba(0, 163, 255, 0.14), transparent 70%);
  border-radius: 50%;
  pointer-events: none;
}

.step-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--ac-shadow-strong);
}

.step-top {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 10px;
  position: relative;
  z-index: 1;
}

.step-top h4 {
  margin: 0;
}

.step-num {
  width: 38px;
  height: 38px;
  border-radius: 12px;
  background: var(--ac-primary);
  color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 900;
  flex-shrink: 0;
}

.step-card p {
  margin: 0;
  color: var(--ac-muted);
  line-height: 1.7;
  position: relative;
  z-index: 1;
}

/* ===== СЕРТИФИКАТЫ ===== */
.cert-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 18px;
  margin-top: 10px;
}

.cert-card {
  background: var(--ac-card);
  border: 1px solid var(--ac-border);
  border-radius: 14px;
  padding: 24px 22px;
  box-shadow: var(--ac-shadow);
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  display: grid;
  gap: 10px;
}

.cert-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--ac-shadow-strong);
  border-color: rgba(0, 86, 184, 0.22);
}

.cert-top {
  display: flex;
  align-items: center;
  gap: 12px;
}

.cert-icon {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  background: rgba(0, 86, 184, 0.10);
  color: var(--ac-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  font-size: 1.15rem;
}

.cert-card h3 {
  margin: 0;
  font-size: 1.25rem;
}

.cert-card p {
  margin: 0;
  color: var(--ac-muted);
  line-height: 1.65;
}

.cert-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  color: var(--ac-primary);
  font-weight: 800;
  margin-top: 4px;
  transition: transform 0.2s ease;
}

.cert-link:hover {
  transform: translateX(3px);
}

/* ===== ВАКАНСИИ ===== */
.vacancies-grid {
  display: grid;
  gap: 16px;
  margin-top: 6px;
}

details.vacancy-card {
  border-radius: 14px;
  background: var(--ac-card);
  border: 1px solid var(--ac-border);
  box-shadow: var(--ac-shadow);
  overflow: hidden;
  transition: box-shadow 0.25s ease, border-color 0.25s ease;
}

details.vacancy-card[open] {
  box-shadow: var(--ac-shadow-strong);
  border-color: rgba(0, 86, 184, 0.22);
}

details.vacancy-card summary {
  list-style: none;
  cursor: pointer;
  padding: 20px 22px;
  user-select: none;
}

details.vacancy-card summary::-webkit-details-marker {
  display: none;
}

.vacancy-summary {
  display: flex;
  justify-content: space-between;
  gap: 18px;
  align-items: flex-start;
}

.vacancy-summary h3 {
  margin: 0 0 8px;
  font-size: 1.25rem;
}

.vacancy-summary p {
  margin: 0;
  color: var(--ac-muted);
  font-size: 0.98rem;
}

.vacancy-toggle {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  background: rgba(0, 86, 184, 0.08);
  color: var(--ac-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: transform 0.25s ease, background 0.25s ease;
  margin-top: 2px;
}

details.vacancy-card[open] .vacancy-toggle {
  transform: rotate(45deg);
  background: rgba(0, 86, 184, 0.12);
}

.vacancy-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 14px;
}

.tag {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 12px;
  border-radius: 999px;
  background: rgba(0, 86, 184, 0.08);
  border: 1px solid rgba(0, 86, 184, 0.14);
  color: #244a7a;
  font-weight: 700;
  font-size: 0.9rem;
}

.vacancy-body {
  padding: 0 22px 22px;
  border-top: 1px solid rgba(0, 0, 0, 0.06);
}

.vacancy-columns {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  padding-top: 18px;
}

.vacancy-list {
  display: grid;
  gap: 10px;
  color: var(--ac-muted);
  margin-top: 10px;
}

.vacancy-list li {
  position: relative;
  padding-left: 18px;
}

.vacancy-list li:before {
  content: '';
  position: absolute;
  left: 0;
  top: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: rgba(0, 86, 184, 0.55);
}

.vacancy-cta {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 18px;
}

/* ===== ФОРМА РЕЗЮМЕ ===== */
.resume-form {
  margin-top: 26px;
  background: rgba(255, 255, 255, 0.96);
  border: 1px solid var(--ac-border);
  border-radius: 16px;
  padding: 30px 26px;
  box-shadow: var(--ac-shadow);
}

.resume-form h3 {
  color: var(--ac-primary);
  text-align: center;
  margin-bottom: 20px;
}

.resume-form .btn {
  width: 100%;
  margin-top: 6px;
}

/* ===== CTA ===== */
.about-cta {
  padding: 70px 0;
  background:
    radial-gradient(900px 520px at 20% 20%, rgba(0, 163, 255, 0.16), transparent 60%),
    linear-gradient(105deg, rgba(0, 86, 184, 0.96), rgba(0, 86, 184, 0.84));
  color: #ffffff;
}

.about-cta h2,
.about-cta p {
  color: #ffffff;
}

.about-cta h2:after {
  background: rgba(255, 255, 255, 0.75);
}

.about-cta-card {
  background: rgba(255, 255, 255, 0.10);
  border: 1px solid rgba(255, 255, 255, 0.20);
  border-radius: 18px;
  padding: 34px 26px;
  text-align: center;
  backdrop-filter: blur(10px);
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.18);
}

.about-cta-actions {
  display: flex;
  justify-content: center;
  gap: 14px;
  flex-wrap: wrap;
  margin-top: 18px;
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
  background: #ffffff;
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
  color: #ffffff;
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
  color: #ffffff;
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
  background: #ffffff;
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
  color: #ffffff;
  padding: 20px;
  text-align: center;
}

.widget-header h4 {
  color: #ffffff;
  margin-bottom: 10px;
  margin-top: 0;
}

.widget-header p {
  color: #ffffff;
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
  color: #ffffff;
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

/* ===== АДАПТИВ ===== */
@media (max-width: 992px) {
  .about-hero-grid {
    grid-template-columns: 1fr;
  }

  .stats-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .steps-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .cert-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .split-grid {
    grid-template-columns: 1fr;
  }

  .vacancy-columns {
    grid-template-columns: 1fr;
  }

  .sticky-widget {
    width: 300px;
    right: 20px;
  }
}

@media (max-width: 768px) {
  .about-hero {
    padding: 100px 0 60px;
  }

  .about-hero-highlights {
    grid-template-columns: 1fr;
  }

  .timeline-item {
    grid-template-columns: 1fr;
  }

  .timeline:before {
    display: none;
  }

  .timeline-year {
    padding-left: 0;
    padding-bottom: 6px;
  }

  .timeline-year:before {
    display: none;
  }

  .cert-grid {
    grid-template-columns: 1fr;
  }

  .sticky-widget {
    display: none !important;
  }
}

@media (prefers-reduced-motion: reduce) {
  .highlight,
  .stat-card,
  .step-card,
  .cert-card,
  details.vacancy-card,
  .cert-link {
    transition: none;
  }

  .highlight:hover,
  .stat-card:hover,
  .step-card:hover,
  .cert-card:hover {
    transform: none;
  }
}

</style>
<main class="about-company-page">
   <!-- ХЛЕБНЫЕ КРОШКИ -->
   <div class="breadcrumbs">
      <div class="container">
         <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a> <span>/</span> <strong><?php echo esc_html( get_the_title() ); ?></strong>
      </div>
   </div>

   <!-- HERO -->
   <section class="about-hero">
      <div class="container">
         <div class="about-hero-grid">
            <div class="about-hero-text">
               <div class="about-kicker">
                  <i class="fas fa-building"></i>
                  Термосервис
               </div>

               <h1>О компании</h1>
               <p>Проектируем, производим и внедряем промышленные холодильные системы под задачи бизнеса. Работаем «под ключ»: от инженерных расчётов и подбора оборудования до пусконаладки и сервисного сопровождения.</p>

               <div class="about-hero-highlights">
                  <div class="highlight">
                     <i class="fas fa-calendar-check"></i>
                     <div>
                        <h4>Опыт с 2010 года</h4>
                        <p>Практика в разных отраслях и типах объектов: от камер хранения до технологических линий.</p>
                     </div>
                  </div>
                  <div class="highlight">
                     <i class="fas fa-industry"></i>
                     <div>
                        <h4>Собственное производство</h4>
                        <p>Сборка узлов и агрегатов, контроль качества и тестирование перед отгрузкой.</p>
                     </div>
                  </div>
                  <div class="highlight">
                     <i class="fas fa-shield-alt"></i>
                     <div>
                        <h4>Надёжность</h4>
                        <p>Резервирование, автоматика, диспетчеризация и документация для эксплуатации.</p>
                     </div>
                  </div>
                  <div class="highlight">
                     <i class="fas fa-headset"></i>
                     <div>
                        <h4>Сервис и поддержка</h4>
                        <p>Регламентное обслуживание, выезд, ремонт и сопровождение по SLA.</p>
                     </div>
                  </div>
               </div>

               <div class="about-hero-actions">
                  <a href="#history" class="btn btn-light js-scroll"><i class="fas fa-history"></i> История и опыт</a>
                  <a href="#production" class="btn btn-light-outline js-scroll"><i class="fas fa-cogs"></i> Производство</a>
                  <a href="#certificates" class="btn btn-light js-scroll"><i class="fas fa-award"></i> Сертификаты</a>
                  <a href="#vacancies" class="btn btn-light-outline js-scroll"><i class="fas fa-briefcase"></i> Вакансии</a>
               </div>
            </div>

            <div class="about-hero-form" id="about-request">
               <h3>Запросить презентацию</h3>
               <form class="form-tel" enctype="multipart/form-data">
                  <input type="hidden" name="formType" value="О компании — запрос информации">
                  <div class="form-row">
                     <div class="form-group">
                        <label for="about-name">Имя *</label>
                        <input type="text" id="about-name" name="name" class="form-control" placeholder="Иванов Иван" required>
                     </div>
                     <div class="form-group">
                        <label for="about-phone">Телефон *</label>
                        <input type="tel" id="about-phone" name="phone" class="form-control" placeholder="+7 (___) ___-__-__" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="about-email">Email</label>
                     <input type="email" id="about-email" name="email" class="form-control" placeholder="ivanov@company.ru">
                  </div>
                  <div class="form-group">
                     <label for="about-message">Сообщение</label>
                     <textarea id="about-message" name="message" class="form-control" placeholder="Коротко: какая задача и какой объект?"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="about-file">Файл (необязательно)</label>
                     <input type="file" id="about-file" name="requestFile" class="form-control" accept=".pdf,.doc,.docx,.xlsx,.jpg,.png,.zip">
                  </div>
                  <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Отправить</button>
                  <div class="form-note">Ответим в рабочее время или перезвоним по указанному номеру.</div>
               </form>
            </div>
         </div>
      </div>
   </section>

   <!-- 1) ИСТОРИЯ И ОПЫТ -->
   <section class="about-block" id="history">
      <div class="container">
         <h2 class="text-center fade-in">История и опыт</h2>
         <p class="section-lead text-center fade-in">Мы строим работу вокруг результата: устойчивые температурные режимы, прозрачная логика управления, удобство обслуживания и прогнозируемая стоимость владения.</p>

         <div class="stats-grid">
            <div class="stat-card fade-in">
               <div class="stat-value">с 2010</div>
               <div class="stat-label">на рынке промышленного холода</div>
            </div>
            <div class="stat-card fade-in">
               <div class="stat-value">500+</div>
               <div class="stat-label">реализованных проектов</div>
            </div>
            <div class="stat-card fade-in">
               <div class="stat-value">24/7</div>
               <div class="stat-label">сервис и аварийные выезды</div>
            </div>
            <div class="stat-card fade-in">
               <div class="stat-value">3 года</div>
               <div class="stat-label">гарантия на решения</div>
            </div>
         </div>

         <div class="timeline fade-in" aria-label="История компании">
            <div class="timeline-item">
               <div class="timeline-year">2010</div>
               <div class="timeline-card">
                  <h3>Старт и первые объекты</h3>
                  <p>Начали с проектирования и внедрения холодильных систем для производственных и складских объектов. Сформировали инженерную базу и стандарты качества.</p>
               </div>
            </div>
            <div class="timeline-item">
               <div class="timeline-year">2014</div>
               <div class="timeline-card">
                  <h3>Расширение компетенций</h3>
                  <p>Развили направление автоматизации и мониторинга, усилили сервисную составляющую и поддержку клиентов на протяжении жизненного цикла оборудования.</p>
               </div>
            </div>
            <div class="timeline-item">
               <div class="timeline-year">2018</div>
               <div class="timeline-card">
                  <h3>Собственное производство</h3>
                  <p>Запустили сборку узлов и агрегатов, отладили контроль качества и тестирование, ускорили сроки поставки и повысили предсказуемость результата.</p>
               </div>
            </div>
            <div class="timeline-item">
               <div class="timeline-year">2024+</div>
               <div class="timeline-card">
                  <h3>Комплексные решения</h3>
                  <p>Проекты «под ключ» с резервированием, энергоэффективностью и сервисом. Подбираем архитектуру под отрасль и условия эксплуатации — без лишних затрат.</p>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- 2) ПРОИЗВОДСТВО -->
   <section class="about-block about-block--alt" id="production">
      <div class="container">
         <h2 class="text-center fade-in">Производство</h2>
         <p class="section-lead text-center fade-in">Собственная сборка и контроль качества позволяют держать сроки, управлять комплектацией и обеспечивать стабильную работу оборудования на объекте.</p>

         <div class="split-grid">
            <div class="split-card fade-in">
               <h3>Контроль качества и тестирование</h3>
               <p>Фиксируем ключевые параметры, используем проверенные компоненты и собираем решения с учётом доступности сервиса и запчастей.</p>
               <ul class="checklist">
                  <li><i class="fas fa-check"></i> Входной контроль комплектующих</li>
                  <li><i class="fas fa-check"></i> Сборка по технологическим картам</li>
                  <li><i class="fas fa-check"></i> Проверка автоматики и защит</li>
                  <li><i class="fas fa-check"></i> Испытания и подготовка документации</li>
               </ul>
            </div>
            <div class="split-card fade-in">
               <h3>Производственные возможности</h3>
               <p>Под задачи объекта подбираем конфигурацию и компоненты: компрессорные узлы, гидромодули, обвязка, шкафы управления и автоматика.</p>
               <div class="capabilities">
                  <div class="capability">
                     <i class="fas fa-cubes"></i>
                     <div>
                        <h4>Комплектация под проект</h4>
                        <p>Подбор оборудования с учётом режима, резервирования, энергоэффективности и бюджета.</p>
                     </div>
                  </div>
                  <div class="capability">
                     <i class="fas fa-microchip"></i>
                     <div>
                        <h4>Автоматика и управление</h4>
                        <p>Сценарии работы, аварийная логика, журналы и интеграция с диспетчеризацией.</p>
                     </div>
                  </div>
                  <div class="capability">
                     <i class="fas fa-tools"></i>
                     <div>
                        <h4>Сервисопригодность</h4>
                        <p>Проектируем доступ к узлам, закладываем удобство обслуживания и диагностики.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="steps-grid">
            <div class="step-card fade-in">
               <div class="step-top">
                  <div class="step-num">1</div>
                  <h4>ТЗ и расчёты</h4>
               </div>
               <p>Уточняем параметры, режимы и требования к надёжности, выполняем теплотехнические расчёты.</p>
            </div>
            <div class="step-card fade-in">
               <div class="step-top">
                  <div class="step-num">2</div>
                  <h4>Проектирование</h4>
               </div>
               <p>Формируем схему, спецификацию и рекомендации по монтажу и эксплуатации.</p>
            </div>
            <div class="step-card fade-in">
               <div class="step-top">
                  <div class="step-num">3</div>
                  <h4>Сборка</h4>
               </div>
               <p>Комплектуем и собираем узлы, выполняем проверку автоматики и защитных функций.</p>
            </div>
            <div class="step-card fade-in">
               <div class="step-top">
                  <div class="step-num">4</div>
                  <h4>Пуск и сервис</h4>
               </div>
               <p>Пусконаладка, обучение персонала, регламентное обслуживание и поддержка.</p>
            </div>
         </div>
      </div>
   </section>

   <!-- 3) ЛИЦЕНЗИИ И СЕРТИФИКАТЫ -->
   <section class="about-block" id="certificates">
      <div class="container">
         <h2 class="text-center fade-in">Лицензии и сертификаты</h2>
         <p class="section-lead text-center fade-in">Предоставляем документы по запросу и прикладываем необходимые подтверждения при подготовке коммерческого предложения и договора.</p>

         <div class="cert-grid">
            <div class="cert-card fade-in">
               <div class="cert-top">
                  <div class="cert-icon"><i class="fas fa-award"></i></div>
                  <div>
                     <h3>Сертификаты на оборудование</h3>
                  </div>
               </div>
               <p>Подтверждения соответствия и паспорта изделий по комплектующим и узлам.</p>
               <a href="#about-request" class="cert-link js-scroll"><i class="fas fa-paper-plane"></i> Запросить</a>
            </div>
            <div class="cert-card fade-in">
               <div class="cert-top">
                  <div class="cert-icon"><i class="fas fa-file-contract"></i></div>
                  <div>
                     <h3>Разрешительная документация</h3>
                  </div>
               </div>
               <p>Документы для выполнения работ и сервисного обслуживания на объектах.</p>
               <a href="#about-request" class="cert-link js-scroll"><i class="fas fa-paper-plane"></i> Запросить</a>
            </div>
            <div class="cert-card fade-in">
               <div class="cert-top">
                  <div class="cert-icon"><i class="fas fa-shield-alt"></i></div>
                  <div>
                     <h3>Гарантия и регламенты</h3>
                  </div>
               </div>
               <p>Регламент обслуживания, условия гарантии и рекомендации по эксплуатации.</p>
               <a href="#about-request" class="cert-link js-scroll"><i class="fas fa-paper-plane"></i> Запросить</a>
            </div>
         </div>
      </div>
   </section>

   <!-- 4) ВАКАНСИИ -->
   <section class="about-block about-block--alt" id="vacancies">
      <div class="container">
         <h2 class="text-center fade-in">Вакансии</h2>
         <p class="section-lead text-center fade-in">Мы растём и усиливаем команду. Если вам близки инженерный подход, аккуратность и ответственность за результат — будем рады познакомиться.</p>

         <div class="vacancies-grid">
<?php
            $vacancies = new WP_Query( array(
               'posts_per_page' => -1,
               'post_type' => 'post',
               'tax_query' => array(
                  array(
                     'taxonomy' => 'category',
                     'field' => 'slug',
                     'terms' => 'vakansii'
                  )
               )
            ) );

            if ( $vacancies->have_posts() ) :
               while ( $vacancies->have_posts() ) : $vacancies->the_post();
                  $vacancy_title = get_the_title();
                  $vacancy_city = get_post_meta( get_the_ID(), 'город', true );
                  $vacancy_type = get_post_meta( get_the_ID(), 'тип работы', true );
                  $vacancy_employment = get_post_meta( get_the_ID(), 'тип занятости', true );
                  $vacancy_experience = get_post_meta( get_the_ID(), 'требования по опыту', true );
                  $vacancy_salary = get_post_meta( get_the_ID(), 'запрлата', true );
                  $vacancy_tasks = get_post_meta( get_the_ID(), 'задачи', true );
                  $vacancy_requirements = get_post_meta( get_the_ID(), 'требования', true );
                  $vacancy_location = ( $vacancy_city ? $vacancy_city : 'Самара' ) . ( $vacancy_type ? ' / ' . $vacancy_type : '' );
?>
            <details class="vacancy-card fade-in">
               <summary>
                  <div class="vacancy-summary">
                     <div>
                        <h3><?php echo esc_html( $vacancy_title ); ?></h3>
                        <p><?php echo esc_html( $vacancy_location ); ?> • <?php echo esc_html( $vacancy_employment ); ?></p>
                     </div>
                     <div class="vacancy-toggle" aria-hidden="true"><i class="fas fa-plus"></i></div>
                  </div>
                  <div class="vacancy-tags">
                     <?php if ( $vacancy_experience ) : ?>
                     <span class="tag"><i class="fas fa-briefcase"></i> Опыт <?php echo esc_html( $vacancy_experience ); ?></span>
                     <?php endif; ?>
                     <?php if ( $vacancy_salary ) : ?>
                     <span class="tag"><i class="fas fa-ruble-sign"></i> <?php echo esc_html( $vacancy_salary ); ?></span>
                     <?php endif; ?>
                  </div>
               </summary>
               <div class="vacancy-body">
                  <div class="vacancy-columns">
                     <div>
                        <h4>Задачи</h4>
                        <?php if ( $vacancy_tasks ) : ?>
                           <?php echo wp_kses_post( $vacancy_tasks ); ?>
                        <?php else : ?>
                           <ul class="vacancy-list"><li>Информация не добавлена</li></ul>
                        <?php endif; ?>
                     </div>
                     <div>
                        <h4>Требования</h4>
                        <?php if ( $vacancy_requirements ) : ?>
                           <?php echo wp_kses_post( $vacancy_requirements ); ?>
                        <?php else : ?>
                           <ul class="vacancy-list"><li>Информация не добавлена</li></ul>
                        <?php endif; ?>
                     </div>
                  </div>
                  <div class="vacancy-cta">
                     <a href="#resume" class="btn btn-small js-scroll"><i class="fas fa-paper-plane"></i> Откликнуться</a>
                     <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-outline btn-small"><i class="fas fa-phone"></i> Позвонить</a>
                  </div>
               </div>
            </details>
<?php
               endwhile;
               wp_reset_postdata();
            else :
               echo '<p style="text-align: center; color: #999;">Вакансии не найдены</p>';
            endif;
?>
         </div>

         <div class="resume-form fade-in" id="resume">
            <h3>Откликнуться на вакансию</h3>
            <form class="form-tel" enctype="multipart/form-data">
               <input type="hidden" name="formType" value="Вакансии — отклик">

               <div class="form-row">
                  <div class="form-group">
                     <label for="cv-name">Имя *</label>
                     <input type="text" id="cv-name" name="name" class="form-control" placeholder="Иванов Иван" required>
                  </div>
                  <div class="form-group">
                     <label for="cv-phone">Телефон *</label>
                     <input type="tel" id="cv-phone" name="phone" class="form-control" placeholder="+7 (___) ___-__-__" required>
                  </div>
               </div>

               <div class="form-row">
                  <div class="form-group">
                     <label for="cv-email">Email</label>
                     <input type="email" id="cv-email" name="email" class="form-control" placeholder="ivanov@company.ru">
                  </div>
                  <div class="form-group">
                     <label for="cv-position">Вакансия</label>
                     <select id="cv-position" name="position" class="form-control">
                        <option value="">Выберите вакансию</option>
<?php
                        $all_vacancies = new WP_Query( array(
                           'posts_per_page' => -1,
                           'post_type' => 'post',
                           'tax_query' => array(
                              array(
                                 'taxonomy' => 'category',
                                 'field' => 'slug',
                                 'terms' => 'vacancies'
                              )
                           )
                        ) );

                        if ( $all_vacancies->have_posts() ) :
                           while ( $all_vacancies->have_posts() ) : $all_vacancies->the_post();
                              $vac_title = get_the_title();
                              $vac_city = get_post_meta( get_the_ID(), 'город', true );
                              $vac_type = get_post_meta( get_the_ID(), 'тип работы', true );
                              $vac_location = ( $vac_city ? $vac_city : 'Самара' ) . ( $vac_type ? ' / ' . $vac_type : '' );
                              $vac_display = $vac_title . ' (' . $vac_location . ')';
?>
                        <option value="<?php echo esc_attr( $vac_title ); ?>"><?php echo esc_html( $vac_display ); ?></option>
<?php
                           endwhile;
                           wp_reset_postdata();
                        endif;
?>
                     </select>
                  </div>
               </div>

               <div class="form-group">
                  <label for="cv-message">Сопроводительное письмо</label>
                  <textarea id="cv-message" name="message" class="form-control" placeholder="Коротко расскажите о своём опыте и чем хотите заниматься"></textarea>
               </div>

               <div class="form-group">
                  <label for="cv-file">Резюме (PDF/DOC, до 50 МБ)</label>
                  <input type="file" id="cv-file" name="resumeFile" class="form-control" accept=".pdf,.doc,.docx">
               </div>

               <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Отправить резюме</button>
               <div class="form-note">Мы свяжемся с вами в ближайшее рабочее время.</div>
            </form>
         </div>
      </div>
   </section>

   <!-- CTA -->
   <section class="about-cta">
      <div class="container">
         <div class="about-cta-card fade-in">
            <h2 class="text-center">Нужна презентация или консультация?</h2>
            <p class="section-lead text-center">Подготовим материалы, ответим на вопросы и предложим оптимальное решение под ваш объект и отрасль.</p>
            <div class="about-cta-actions">
               <a href="#about-request" class="btn btn-light js-scroll"><i class="fas fa-paper-plane"></i> Запросить материалы</a>
               <a href="tel:<?php echo esc_attr( $termoservis_phone_tel ); ?>" class="btn btn-light-outline"><i class="fas fa-phone"></i> Позвонить</a>
            </div>
         </div>
      </div>
   </section>
</main>

<?php
$about_company_schema = array(
   '@context' => 'https://schema.org',
   '@type' => 'AboutPage',
   'name' => get_the_title(),
   'url' => get_permalink(),
   'inLanguage' => 'ru-RU',
   'about' => array(
      '@type' => 'Organization',
      'name' => get_bloginfo( 'name' ),
      'url' => home_url( '/' ),
      'telephone' => $termoservis_phone_tel,
   ),
);
?>

<script type="application/ld+json">
   <?php echo wp_json_encode( $about_company_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>
</script>

<script>
   document.addEventListener('DOMContentLoaded', function () {
      // Анимация появления при скролле
      const fadeElements = document.querySelectorAll('.fade-in');

      function fadeInOnScroll() {
         fadeElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            if (elementTop < window.innerHeight - elementVisible) {
               element.classList.add('visible');
            }
         });
      }

      window.addEventListener('scroll', fadeInOnScroll);
      fadeInOnScroll();

      // Плавный скролл по якорям
      document.querySelectorAll('.js-scroll').forEach(link => {
         link.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (!href || href.charAt(0) !== '#') return;

            const target = document.querySelector(href);
            if (!target) return;

            e.preventDefault();
            const offset = 90; // sticky header
            const y = target.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({ top: y, behavior: 'smooth' });
         });
      });

      // Аккордеон вакансий: открытая карточка закрывает остальные
      const cards = document.querySelectorAll('details.vacancy-card');
      cards.forEach(card => {
         card.addEventListener('toggle', () => {
            if (!card.open) return;
            cards.forEach(other => {
               if (other !== card) other.removeAttribute('open');
            });
         });
      });
   });
</script>

<?php get_footer(); ?>
