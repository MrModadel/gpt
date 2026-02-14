<?php

/**
 * Template Name: Услуги
 *
 * @package Termoservis
 */

get_header();

$termoservis_phone_raw = get_theme_mod('termoservis_phone', '+79270013885');
$termoservis_phone_tel = preg_replace('/[^\d+]/', '', $termoservis_phone_raw);
?>

<style>
   /* ===== 6. ПРОЕКТЫ ===== */
   .projects-section {
      background: white;
   }

   .projects-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
      margin-top: 40px;
   }

   .project-card {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      transition: all 0.3s;
      border: 1px solid #eee;
   }

   .project-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border-color: #0056b8;
   }

   .project-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
   }

   .project-card-content {
      padding: 25px;
      background: white;
   }

   .project-card-content h3 {
      font-size: 1.3rem;
      margin-bottom: 10px;
   }

   .project-card-content p {
      color: #666;
      margin-bottom: 15px;
      font-size: 0.95rem;
   }

   .project-card-content a {
      color: #0056b8;
      font-weight: 600;
      display: inline-block;
      transition: all 0.3s;
   }

   .project-card-content a:hover {
      transform: translateX(5px);
   }

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
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
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

   .btn-outline-white {
      background-color: transparent;
      border-color: white;
      color: white;
   }

   .btn-outline-white:hover {
      background-color: rgba(255, 255, 255, 0.15);
      border-color: white;
      color: white;
   }

   .btn-light {
      background-color: white;
      color: #0056b8;
   }

   .btn-light:hover {
      background-color: #0056b8;
      color: white;
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
      color: #0056b8;
      position: relative;
      padding-bottom: 15px;
      margin-bottom: 40px;
   }



   @keyframes expandLine {
      from {
         width: 0;
      }

      to {
         width: 80px;
      }
   }

   h2.text-center:after {
      left: 50%;
      transform: translateX(-50%);
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

   .section-lead {
      max-width: 800px;
      margin: 0 auto 40px;
      color: #666;
      font-size: 1.1rem;
   }

   .section-cta {
      margin-top: 50px;
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
   .services-hero {
      background: linear-gradient(rgba(0, 86, 184, 0.9), rgba(0, 86, 184, 0.85)), url('https://images.iimg.live/images/amazing-shot-8342.webp') center/cover no-repeat;
      color: white;
      padding: 120px 0 80px;
      position: relative;
      overflow: hidden;
   }

   .services-hero:before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 100%;
      background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23004494' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
      opacity: 0.3;
      z-index: 0;
   }

   .hero-content {
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
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
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

   .hero-text p {
      font-size: 1.2rem;
      margin-bottom: 35px;
      opacity: 0.95;
      line-height: 1.7;
      animation: fadeInUp 1s ease 0.3s both;
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

   .hero-benefits {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      margin-top: 40px;
      animation: fadeInUp 1s ease 0.6s both;
   }

   .hero-benefit {
      display: flex;
      align-items: flex-start;
      gap: 15px;
   }

   .hero-benefit i {
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

   .hero-benefit h4 {
      font-size: 1.1rem;
      margin-bottom: 5px;
      color: white;
   }

   .hero-benefit p {
      font-size: 0.9rem;
      opacity: 0.85;
      margin: 0;
   }

   .hero-actions {
      display: flex;
      gap: 20px;
      margin-top: 30px;
      animation: fadeInUp 1s ease 0.9s both;
   }

   .hero-form {
      background: white;
      padding: 35px;
      border-radius: 12px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      animation: fadeInUp 1s ease 1.2s both;
   }

   .hero-form h3 {
      color: #0056b8;
      margin-bottom: 25px;
      text-align: center;
      font-size: 1.5rem;
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

   .form-select:focus {
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

   textarea.form-control {
      min-height: 120px;
      resize: vertical;
   }

   .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 20px;
   }

   .form-actions {
      display: flex;
      gap: 15px;
      margin-top: 25px;
   }

   .form-actions .btn {
      flex: 2;
   }

   .form-actions .emergency-call {
      flex: 1;
      width: auto;
      padding: 14px 20px;
   }

   .emergency-call {
      background-color: #ff4d4d;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      gap: 8px;
      justify-content: center;
      text-align: center;
      width: 100%;
   }

   .emergency-call:hover {
      background-color: #ff3333;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(255, 77, 77, 0.3);
   }

   /* ===== 2. ПРЕВЬЮ УСЛУГ ===== */
   .services-preview {
      background-color: #f8f9fa;
   }

   .services-intro {
      max-width: 900px;
      margin: 0 auto 50px;
      text-align: center;
   }

   .services-intro h2 {
      margin-bottom: 20px;
   }

   .services-intro h2:after {
      left: 50%;
      transform: translateX(-50%);
   }

   .services-intro p {
      font-size: 1.1rem;
      color: #666;
      max-width: 800px;
      margin: 0 auto;
   }

   .services-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
      gap: 30px;
      margin-bottom: 50px;
   }

   @media (max-width: 1100px) {
      .services-grid {
         grid-template-columns: 1fr;
      }
   }

   .service-group {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      border: 1px solid #eee;
      transition: all 0.4s ease;
      height: 100%;
   }

   .service-group:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 50px rgba(0, 86, 184, 0.15);
      border-color: #0056b8;
   }

   .group-header {
      background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
      color: white;
      padding: 25px 30px;
      display: flex;
      align-items: center;
      gap: 20px;
   }

   .group-icon {
      background: rgba(255, 255, 255, 0.15);
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      flex-shrink: 0;
   }

   .group-title h3 {
      color: white;
      margin-bottom: 5px;
   }

   .group-title p {
      opacity: 0.9;
      font-size: 0.95rem;
      margin: 0;
   }

   .group-content {
      padding: 30px;
   }

   .group-content p {
      margin-bottom: 25px;
      color: #666;
      line-height: 1.7;
   }

   .services-list {
      margin-bottom: 25px;
   }

   .service-item {
      padding: 12px 0;
      border-bottom: 1px solid #f0f0f0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: all 0.3s;
   }

   .service-item:last-child {
      border-bottom: none;
   }

   .service-name {
      display: flex;
      align-items: center;
      gap: 10px;
      font-weight: 600;
      color: #444;
   }

   .service-name i {
      color: #0056b8;
      width: 18px;
      text-align: center;
   }

   .service-link {
      color: #0056b8;
      font-size: 0.9rem;
      font-weight: 600;
      opacity: 0;
      transform: translateX(-10px);
      transition: all 0.3s;
   }

   .service-item:focus-within .service-link,
   .service-link:focus {
      opacity: 1;
      transform: translateX(0);
   }

   @media (hover: hover) {
      .service-item:hover {
         background-color: #f8f9fa;
         padding-left: 10px;
         padding-right: 10px;
         margin-left: -10px;
         margin-right: -10px;
         border-radius: 6px;
      }

      .service-item:hover .service-link {
         opacity: 1;
         transform: translateX(0);
      }
   }

   @media (hover: none) {
      .service-link {
         opacity: 1;
         transform: none;
      }
   }

   .group-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid #eee;
   }

   .group-cta .btn {
      padding: 10px 25px;
      font-size: 1rem;
   }

   .related-links {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      justify-content: end;
   }

   .related-link {
      color: #666;
      font-size: 0.85rem;
      padding: 4px 10px;
      background-color: #f8f9fa;
      border-radius: 15px;
      transition: all 0.3s;
   }

   .related-link:hover {
      background-color: #e9ecef;
      color: #0056b8;
   }

   /* ===== 3. ПРОЦЕСС РАБОТЫ ===== */
   .work-process {
      background-color: white;
   }

   .process-container {
      max-width: 1000px;
      margin: 0 auto;
   }

   .process-steps {
      display: flex;
      justify-content: space-between;
      position: relative;
      margin-top: 60px;
   }

   .process-steps:before {
      content: '';
      position: absolute;
      top: 40px;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, #0056b8 0%, rgba(0, 86, 184, 0.3) 100%);
      z-index: 1;
   }

   .process-step {
      position: relative;
      z-index: 2;
      text-align: center;
      width: 16%;
      flex-shrink: 0;
   }

   .step-number {
      width: 80px;
      height: 80px;
      background: #0056b8;
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      font-weight: 800;
      margin: 0 auto 25px;
      box-shadow: 0 10px 25px rgba(0, 86, 184, 0.3);
      transition: all 0.4s;
   }

   .process-step:hover .step-number {
      transform: scale(1.1) rotate(5deg);
      box-shadow: 0 15px 35px rgba(0, 86, 184, 0.4);
   }

   .step-content h4 {
      margin-bottom: 10px;
      font-size: 1.1rem;
      min-height: 55px;
   }

   .step-content p {
      color: #666;
      font-size: 0.9rem;
   }

   @media (max-width: 900px) {
      .process-steps {
         flex-wrap: wrap;
         gap: 40px;
         justify-content: center;
      }

      .process-steps:before {
         display: none;
      }

      .process-step {
         width: 45%;
      }
   }

   @media (max-width: 600px) {
      .process-step {
         width: 100%;
      }
   }

   .process-cta {
      text-align: center;
      margin-top: 60px;
   }

   /* ===== 4. КЕЙСЫ И РЕЗУЛЬТАТЫ ===== */
   .cases-section {
      background-color: #f8f9fa;
   }

   .cases-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      margin-top: 40px;
   }

   .case-card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: all 0.4s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
   }

   .case-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 50px rgba(0, 86, 184, 0.15);
   }

   .case-image {
      height: 200px;
      background-color: #f0f0f0;
      overflow: hidden;
      position: relative;
   }

   .case-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.7s;
   }

   .case-card:hover .case-image img {
      transform: scale(1.05);
   }

   .case-badge {
      position: absolute;
      top: 15px;
      left: 15px;
      background-color: #0056b8;
      color: white;
      padding: 5px 12px;
      border-radius: 4px;
      font-size: 0.8rem;
      font-weight: 600;
   }

   .case-content {
      padding: 25px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
   }

   .case-content h3 {
      margin-bottom: 15px;
      font-size: 1.3rem;
   }

   .case-content p {
      color: #666;
      margin-bottom: 20px;
      flex-grow: 1;
   }

   .case-metrics {
      display: flex;
      gap: 20px;
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid #eee;
   }

   .metric {
      text-align: center;
      flex: 1;
   }

   .metric-value {
      font-size: 1.5rem;
      font-weight: 700;
      color: #0056b8;
      display: block;
   }

   .metric-label {
      font-size: 0.8rem;
      color: #666;
      margin-top: 5px;
   }

   /* ===== 5. СРАВНЕНИЕ ===== */
   .comparison-section {
      background-color: white;
   }

   .comparison-table {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      margin-top: 40px;
   }

   .table-header {
      background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
      color: white;
      padding: 20px 30px;
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 20px;
      font-weight: 700;
   }

   .table-header div {
      color: #fff;
   }

   .table-row {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 20px;
      padding: 20px 30px;
      border-bottom: 1px solid #eee;
      align-items: center;
      transition: background-color 0.3s;
   }

   .table-row:hover {
      background-color: #f8f9fa;
   }

   .table-row:last-child {
      border-bottom: none;
   }

   .parameter {
      font-weight: 600;
      color: #444;
   }

   .with-us {
      color: #0056b8;
      font-weight: 600;
   }

   .without-us {
      color: #666;
   }

   .check {
      color: #28a745;
      font-weight: 600;
   }

   .cross {
      color: #dc3545;
      font-weight: 600;
   }

   @media (max-width: 768px) {

      .table-header,
      .table-row {
         grid-template-columns: 1fr;
         gap: 10px;
      }

      .parameter {
         font-weight: 700;
         padding-bottom: 10px;
         border-bottom: 1px dashed #eee;
      }
   }

   /* ===== 6. СЕРТИФИКАТЫ ===== */
   .certificates-section {
      background-color: #f8f9fa;
   }

   .certificates-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 30px;
      margin-top: 40px;
   }

   .certificate-card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      transition: all 0.4s ease;
      padding: 25px;
      text-align: center;
      border: 1px solid #eee;
   }

   .certificate-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 86, 184, 0.1);
      border-color: #0056b8;
   }

   .certificate-icon {
      font-size: 3rem;
      color: #0056b8;
      margin-bottom: 20px;
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: center;
   }

   .certificate-card h4 {
      margin-bottom: 10px;
      font-size: 1.1rem;
      min-height: 55px;
   }

   .certificate-card p {
      color: #666;
      font-size: 0.9rem;
   }

   /* ===== 7. КАЛЬКУЛЯТОР УСЛУГ ===== */
   .calculator-section {
      background: linear-gradient(135deg, #0056b8 0%, #004494 100%);
      color: white;
      border-radius: 16px;
      overflow: hidden;
      position: relative;
   }

   .calculator-content {
      position: relative;
      z-index: 2;
      text-align: center;
      max-width: 900px;
      margin: 0 auto;
   }

   .calculator-content h2 {
      color: white;
   }

   .calculator-content h2:after {
      background-color: white;
      left: 50%;
      transform: translateX(-50%);
   }

   .calculator-content p {
      font-size: 1.1rem;
      margin-bottom: 30px;
      opacity: 0.9;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
   }

   .calculator-form {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 35px;
      border-radius: 12px;
      max-width: 800px;
      margin: 0 auto;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
   }

   .calculator-form h3 {
      color: #0056b8;
      text-align: center;
      margin-bottom: 25px;
   }

   #calculateBtn {
      width: 100%;
      margin-top: 25px;
   }

   .calculator-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 25px;
      margin-bottom: 25px;
   }

   .calculator-group {
      margin-bottom: 25px;
   }

   .calculator-group label {
      margin-bottom: 10px;
      font-weight: 600;
      color: #333;
      font-size: 1rem;
   }

   .radio-group {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      margin-top: 10px;
   }

   .radio-label {
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      padding: 10px 15px;
      background-color: #f8f9fa;
      border-radius: 6px;
      transition: all 0.3s;
      flex: 1;
      min-width: 150px;
      justify-content: center;
      position: relative;
   }

   .radio-label:hover {
      background-color: #e9ecef;
   }

   .radio-label input {
      position: absolute;
      opacity: 0;
      width: 1px;
      height: 1px;
      overflow: hidden;
   }

   .radio-label:focus-within {
      box-shadow: 0 0 0 3px rgba(0, 86, 184, 0.2);
   }

   .radio-label input:checked+.radio-custom {
      background-color: #0056b8;
   }

   .radio-label input:checked+.radio-custom:after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 10px;
      height: 10px;
      background-color: white;
      border-radius: 50%;
   }

   .radio-custom {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      border: 2px solid #ddd;
      position: relative;
      flex-shrink: 0;
   }

   .radio-label input[type="checkbox"]+.radio-custom {
      border-radius: 4px;
   }

   .radio-label input[type="checkbox"]:checked+.radio-custom:after {
      width: 6px;
      height: 10px;
      background-color: transparent;
      border-radius: 0;
      border: solid white;
      border-width: 0 2px 2px 0;
      transform: translate(-50%, -60%) rotate(45deg);
   }

   .calculator-result {
      background-color: #e9f5ff;
      border: 2px solid #0056b8;
      border-radius: 8px;
      padding: 20px;
      margin-top: 25px;
      text-align: center;
      display: none;
   }

   .result-title {
      color: #0056b8;
      font-weight: 700;
      margin-bottom: 15px;
      font-size: 1.2rem;
   }

   .result-value {
      font-size: 1.8rem;
      font-weight: 800;
      color: #222;
      margin-bottom: 10px;
   }

   .result-note {
      color: #666;
      font-size: 0.9rem;
      font-style: italic;
   }

   /* ===== 8. FAQ ===== */
   .faq-section {
      background-color: #f8f9fa;
   }

   .faq-container {
      max-width: 900px;
      margin: 0 auto;
   }

   .faq-categories {
      display: flex;
      gap: 15px;
      margin-bottom: 30px;
      flex-wrap: wrap;
      justify-content: center;
   }

   .faq-category {
      padding: 10px 20px;
      background-color: white;
      border: 2px solid #e9ecef;
      border-radius: 30px;
      font-weight: 600;
      color: #555;
      cursor: pointer;
      transition: all 0.3s;
   }

   .faq-category:hover,
   .faq-category.active {
      background-color: #0056b8;
      color: white;
      border-color: #0056b8;
   }

   .faq-list {
      display: flex;
      flex-direction: column;
      gap: 15px;
   }

   .faq-item {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
      border: 1px solid #eee;
      transition: all 0.3s;
   }

   .faq-item:hover {
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
   }

   .faq-question {
      padding: 20px;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: all 0.3s;
      font-size: 1.05rem;
   }

   .faq-question:hover {
      background-color: #f8f9fa;
   }

   .faq-question i {
      transition: transform 0.3s;
      font-size: 0.9rem;
   }

   .faq-question.active i {
      transform: rotate(180deg);
   }

   .faq-answer {
      padding: 0 20px;
      max-height: 0;
      overflow: hidden;
      transition: all 0.3s ease;
   }

   .faq-answer.active {
      padding: 0 20px 20px;
      max-height: 1000px;
   }

   /* ===== 9. SEO-КОНТЕНТ ===== */
   .seo-section {
      background-color: white;
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

   .footer-links h4,
   .footer-contacts h4 {
      color: white;
      margin-bottom: 25px;
      font-size: 1.1rem;
      position: relative;
      padding-bottom: 10px;
   }

   .footer-links h4:after,
   .footer-contacts h4:after {
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
      .hero-content {
         grid-template-columns: 1fr;
         gap: 40px;
      }

      .hero-text h1 {
         font-size: 2.4rem;
      }

      .calculator-row {
         grid-template-columns: 1fr;
      }

      .sticky-widget {
         width: 300px;
         right: 20px;
      }

      h1 {
         font-size: 2.4rem;
      }

      h2 {
         font-size: 2rem;
      }
   }

   @media (max-width: 768px) {
      section {
         padding: 60px 0;
      }

      .services-hero {
         padding: 100px 0 60px;
      }

      .sticky-widget {
         display: none !important;
      }

      .services-grid {
         grid-template-columns: 1fr;
      }

      .hero-benefits {
         grid-template-columns: 1fr;
      }

      .hero-actions {
         flex-direction: column;
         align-items: stretch;
      }

      .hero-form {
         padding: 25px;
      }

      .group-header {
         flex-direction: column;
         text-align: center;
         gap: 15px;
         padding: 20px;
      }

      .group-footer {
         flex-direction: column;
         gap: 20px;
         align-items: stretch;
      }

      .group-cta .btn {
         width: 100%;
      }

      .seo-section {
         padding: 30px 20px;
      }

      .form-actions {
         flex-direction: column;
      }

      .form-row {
         grid-template-columns: 1fr;
      }

      .form-actions .btn,
      .form-actions .emergency-call {
         flex: initial;
         width: 100%;
      }

      .seo-content p {
         text-align: left;
      }
   }

   @media (max-width: 480px) {
      h1 {
         font-size: 2rem;
      }

      h2 {
         font-size: 1.7rem;
      }

      .service-item {
         flex-direction: column;
         align-items: flex-start;
         gap: 8px;
      }

      .faq-question {
         align-items: flex-start;
         gap: 12px;
      }

      .step-number {
         width: 60px;
         height: 60px;
         font-size: 1.4rem;
      }

      .calculator-form {
         padding: 20px;
      }

      .radio-group {
         flex-direction: column;
      }
   }

   @media (max-width: 360px) {
      .container {
         padding: 0 15px;
      }

      .services-hero {
         padding: 90px 0 50px;
      }

      .hero-text p {
         font-size: 1.05rem;
      }

      .btn {
         padding: 12px 20px;
         font-size: 1rem;
      }

      .hero-actions {
         gap: 12px;
      }

      .hero-form {
         padding: 20px;
      }

      .form-control,
      .form-select {
         padding: 12px 14px;
         font-size: 0.95rem;
      }

      .seo-section {
         padding: 25px 15px;
      }
   }

   @media (max-width: 320px) {
      h1 {
         font-size: 1.75rem;
      }

      h2 {
         font-size: 1.55rem;
      }
   }
</style>

<main class="services-page">
   <!-- ХЛЕБНЫЕ КРОШКИ -->
   <div class="breadcrumbs">
      <div class="container">
         <a href="<?php echo esc_url(home_url('/')); ?>">Главная</a> <span>/</span> <strong><?php echo esc_html(get_the_title()); ?></strong>
      </div>
   </div>

   <!-- 1. ГЕРОЙ-СЕКЦИЯ -->
   <section class="services-hero">
      <div class="container">
         <div class="hero-content">
            <div class="hero-text">
               <h1>Комплексные услуги по проектированию, монтажу и обслуживанию промышленных холодильных систем</h1>
               <p>От расчета тепловой нагрузки до круглосуточного сервиса. Обеспечиваем бесперебойную работу вашего оборудования 24/7. Работаем по всей России.</p>

               <div class="hero-benefits">
                  <div class="hero-benefit">
                     <i class="fas fa-shield-alt"></i>
                     <div>
                        <h4>Гарантия 3 года</h4>
                        <p>На все работы и оборудование собственного производства</p>
                     </div>
                  </div>
                  <div class="hero-benefit">
                     <i class="fas fa-clock"></i>
                     <div>
                        <h4>Аварийный выезд за 2-4 часа</h4>
                        <p>Круглосуточная служба поддержки</p>
                     </div>
                  </div>
                  <div class="hero-benefit">
                     <i class="fas fa-industry"></i>
                     <div>
                        <h4>Собственное производство</h4>
                        <p>Полный контроль качества на всех этапах</p>
                     </div>
                  </div>
                  <div class="hero-benefit">
                     <i class="fas fa-map-marked-alt"></i>
                     <div>
                        <h4>Работаем по всей России</h4>
                        <p>Более 500 реализованных проектов</p>
                     </div>
                  </div>
               </div>

               <div class="hero-actions">
                  <a href="#calculator" class="btn btn-light">
                     <i class="fas fa-calculator"></i> Рассчитать стоимость
                  </a>
               </div>
            </div>

            <div class="hero-form" id="consult-form">
               <h3>Бесплатная консультация инженера</h3>
               <form id="consultationForm" class="form-tel">
                  <input type="hidden" name="formType" value="Услуги — консультация инженера">
                  <div class="form-group">
                     <label for="consult-name">Ваше имя *</label>
                     <input type="text" id="consult-name" name="name" class="form-control" placeholder="Иванов Иван" required>
                  </div>
                  <div class="form-group">
                     <label for="consult-phone">Телефон *</label>
                     <input type="tel" id="consult-phone" name="phone" class="form-control" placeholder="+7 (___) ___-__-__" required>
                  </div>
                  <div class="form-group">
                     <label for="consult-service">Интересующая услуга</label>
                     <select id="consult-service" name="service" class="form-select">
                        <option value="">Выберите услугу</option>
                        <option value="engineering">Инженерные услуги</option>
                        <option value="installation">Монтаж и пусконаладка</option>
                        <option value="service">Сервис и обслуживание</option>
                        <option value="other">Другое</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="consult-message">Опишите задачу</label>
                     <textarea id="consult-message" name="message" class="form-control" placeholder="Опишите кратко вашу задачу или вопрос..."></textarea>
                  </div>
                  <div class="form-actions">
                     <button type="submit" class="btn">
                        <i class="fas fa-paper-plane"></i> Получить консультацию
                     </button>
                     <button type="button" class="emergency-call" id="emergencyBtn">
                        <i class="fas fa-ambulance"></i> Срочный вызов
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>

   <!-- 2. ПРЕВЬЮ УСЛУГ -->
   <section class="services-preview fade-in">
      <div class="container">
         <div class="services-intro">
            <h2>Полный спектр услуг для промышленных холодильных систем</h2>
            <p>Мы обеспечиваем полный цикл — от проектирования и поставки оборудования до монтажа, пусконаладки и круглосуточного сервисного обслуживания. Выберите нужную услугу или закажите комплексное решение под ключ.</p>
         </div>

         <div class="services-grid">
            <!-- Группа 1: Инженерные услуги -->
            <div class="service-group">
               <div class="group-header">
                  <div class="group-icon">
                     <i class="fas fa-drafting-compass"></i>
                  </div>
                  <div class="group-title">
                     <h3>Инженерные услуги</h3>
                     <p>Проектирование, расчеты, подбор оборудования</p>
                  </div>
               </div>
               <div class="group-content">
                  <p>Разработка оптимальных технических решений для вашего производства. Точные расчеты, 3D-моделирование, подбор оборудования с учетом всех технологических особенностей.</p>

                  <div class="services-list">
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-drafting-compass"></i>
                           Проектирование холодильных систем
                        </div>
                        <a href="/uslugi/inzhenernye-uslugi/" class="service-link">Подробнее →</a>
                     </div>
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-calculator"></i>
                           Теплотехнический расчет
                        </div>
                        <a href="/uslugi/inzhenernye-uslugi/" class="service-link">Подробнее →</a>
                     </div>
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-clipboard-check"></i>
                           Индивидуальный подбор оборудования
                        </div>
                        <a href="/uslugi/inzhenernye-uslugi/" class="service-link">Подробнее →</a>
                     </div>
                  </div>

                  <div class="group-footer">
                     <div class="group-cta">
                        <a href="/uslugi/inzhenernye-uslugi/" class="btn">Все инженерные услуги</a>
                     </div>
                     <div class="related-links">
                        <a href="#" class="related-link">Для пищевой промышленности</a>
                        <a href="#" class="related-link">Для химического производства</a>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Группа 2: Монтаж и пусконаладка -->
            <div class="service-group">
               <div class="group-header">
                  <div class="group-icon">
                     <i class="fas fa-tools"></i>
                  </div>
                  <div class="group-title">
                     <h3>Монтаж и пусконаладка</h3>
                     <p>Установка, наладка, ввод в эксплуатацию</p>
                  </div>
               </div>
               <div class="group-content">
                  <p>Профессиональный монтаж холодильного оборудования любой сложности. Пусконаладочные работы, настройка автоматики, обучение персонала.</p>

                  <div class="services-list">
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-tools"></i>
                           Монтаж холодильного оборудования
                        </div>
                        <a href="/uslugi/montazh-i-puskonaladka/" class="service-link">Подробнее →</a>
                     </div>
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-play-circle"></i>
                           Пусконаладочные работы
                        </div>
                        <a href="/uslugi/montazh-i-puskonaladka/" class="service-link">Подробнее →</a>
                     </div>
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-hard-hat"></i>
                           Шеф-монтаж
                        </div>
                        <a href="/uslugi/montazh-i-puskonaladka/" class="service-link">Подробнее →</a>
                     </div>
                  </div>

                  <div class="group-footer">
                     <div class="group-cta">
                        <a href="/uslugi/montazh-i-puskonaladka/" class="btn">Все монтажные работы</a>
                     </div>
                     <div class="related-links">
                        <a href="#" class="related-link">Монтаж чиллеров</a>
                        <a href="#" class="related-link">Монтаж агрегатов</a>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Группа 3: Сервис и обслуживание -->
            <div class="service-group">
               <div class="group-header">
                  <div class="group-icon">
                     <i class="fas fa-clipboard-list"></i>
                  </div>
                  <div class="group-title">
                     <h3>Сервис и обслуживание</h3>
                     <p>Техобслуживание, ремонт, аварийный выезд</p>
                  </div>
               </div>
               <div class="group-content">
                  <p>Регулярное техническое обслуживание, диагностика, ремонт любой сложности. Круглосуточная служба поддержки. Минимальное время реагирования на аварии.</p>

                  <div class="services-list">
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-clipboard-list"></i>
                           Техническое обслуживание
                        </div>
                        <a href="/uslugi/servis-i-obsluzhivanie/" class="service-link">Подробнее →</a>
                     </div>
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-wrench"></i>
                           Ремонт холодильного оборудования
                        </div>
                        <a href="/uslugi/servis-i-obsluzhivanie/" class="service-link">Подробнее →</a>
                     </div>
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-ambulance"></i>
                           Аварийный выезд
                        </div>
                        <a href="/uslugi/servis-i-obsluzhivanie/" class="service-link">Подробнее →</a>
                     </div>
                  </div>

                  <div class="group-footer">
                     <div class="group-cta">
                        <a href="/uslugi/servis-i-obsluzhivanie/" class="btn">Все сервисные услуги</a>
                     </div>
                     <div class="related-links">
                        <a href="#" class="related-link">Сервисные контракты</a>
                        <a href="#" class="related-link">Диагностика онлайн</a>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Группа 4: Дополнительные услуги -->
            <div class="service-group">
               <div class="group-header">
                  <div class="group-icon">
                     <i class="fas fa-hands-helping"></i>
                  </div>
                  <div class="group-title">
                     <h3>Дополнительные услуги</h3>
                     <p>Обучение, диагностика, консультации</p>
                  </div>
               </div>
               <div class="group-content">
                  <p>Специализированные услуги для повышения эффективности работы вашего оборудования. Обучение персонала, профилактические мероприятия, консультационная поддержка.</p>

                  <div class="services-list">
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-graduation-cap"></i>
                           Обучение персонала
                        </div>
                        <a href="/uslugi/dopolnitelnye-uslugi/" class="service-link">Подробнее →</a>
                     </div>
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-history"></i>
                           Диагностика и профилактика
                        </div>
                        <a href="/uslugi/dopolnitelnye-uslugi/" class="service-link">Подробнее →</a>
                     </div>
                     <div class="service-item">
                        <div class="service-name">
                           <i class="fas fa-file-contract"></i>
                           Сервисные контракты
                        </div>
                        <a href="/uslugi/dopolnitelnye-uslugi/servisnye-kontrakty/" class="service-link">Подробнее →</a>
                     </div>
                  </div>

                  <div class="group-footer">
                     <div class="group-cta">
                        <a href="/uslugi/dopolnitelnye-uslugi/" class="btn">Все дополнительные услуги</a>
                     </div>
                     <div class="related-links">
                        <a href="#" class="related-link">Аудит систем</a>
                        <a href="#" class="related-link">Модернизация</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- 3. ПРОЦЕСС РАБОТЫ -->
   <section class="work-process fade-in">
      <div class="container">
         <h2 class="text-center">Как мы работаем</h2>
         <p class="section-lead text-center">
            Прозрачный и отлаженный процесс сотрудничества, который обеспечивает качественный результат и соблюдение сроков на каждом этапе.
         </p>

         <div class="process-container">
            <div class="process-steps">
               <div class="process-step">
                  <div class="step-number">1</div>
                  <div class="step-content">
                     <h4>Заявка и консультация</h4>
                     <p>Вы оставляете заявку, наш специалист связывается с вами для уточнения деталей</p>
                  </div>
               </div>
               <div class="process-step">
                  <div class="step-number">2</div>
                  <div class="step-content">
                     <h4>Выезд и обследование</h4>
                     <p>Инженер выезжает на объект, проводит замеры и обследование</p>
                  </div>
               </div>
               <div class="process-step">
                  <div class="step-number">3</div>
                  <div class="step-content">
                     <h4>Предложение и договор</h4>
                     <p>Подготовка коммерческого предложения и заключение договора</p>
                  </div>
               </div>
               <div class="process-step">
                  <div class="step-number">4</div>
                  <div class="step-content">
                     <h4>Выполнение работ</h4>
                     <p>Проектирование, поставка оборудования, монтажные работы</p>
                  </div>
               </div>
               <div class="process-step">
                  <div class="step-number">5</div>
                  <div class="step-content">
                     <h4>Сдача и обучение</h4>
                     <p>Пусконаладка, сдача объекта, обучение вашего персонала</p>
                  </div>
               </div>
               <div class="process-step">
                  <div class="step-number">6</div>
                  <div class="step-content">
                     <h4>Сервис и поддержка</h4>
                     <p>Гарантийное и постгарантийное обслуживание 24/7</p>
                  </div>
               </div>
            </div>

            <div class="process-cta">
               <a href="#consult-form" class="btn">
                  <i class="fas fa-play-circle"></i> Начать сотрудничество
               </a>
            </div>
         </div>
      </div>
   </section>

   <!-- ===== 7. ПРОЕКТЫ ===== -->
   <section class="projects-section" id="projects">
      <div class="container">
         <h2 style="text-align: center;
    margin-bottom: 50px;">Реализованные проекты</h2>
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
               'tax_query' => array(
                  array(
                     'taxonomy' => 'category',
                     'field' => 'slug',
                     'terms' => 'kejsy-i-obzory'
                  )
               )
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

   <!-- 5. СРАВНЕНИЕ "С НАМИ / БЕЗ НАС" -->
   <section class="comparison-section fade-in">
      <div class="container">
         <h2 class="text-center">Почему выбирают нас</h2>
         <p class="section-lead text-center">
            Сравните преимущества работы с профессиональной компанией и самостоятельного решения задач.
         </p>

         <div class="comparison-table">
            <div class="table-header">
               <div class="parameter">Параметр</div>
               <div class="with-us">С ТЕРМОСИСТЕМЫ-С</div>
               <div class="without-us">Самостоятельно / с другими</div>
            </div>

            <div class="table-row">
               <div class="parameter">Гарантия на работы</div>
               <div class="with-us"><span class="check">✓</span> 3 года</div>
               <div class="without-us"><span class="cross">✗</span> 1 год (если есть)</div>
            </div>

            <div class="table-row">
               <div class="parameter">Реакция на аварии</div>
               <div class="with-us"><span class="check">✓</span> 2-4 часа</div>
               <div class="without-us"><span class="cross">✗</span> 1-3 дня</div>
            </div>

            <div class="table-row">
               <div class="parameter">Комплектность услуг</div>
               <div class="with-us"><span class="check">✓</span> Полный цикл "под ключ"</div>
               <div class="without-us"><span class="cross">✗</span> Частичная, у разных подрядчиков</div>
            </div>

            <div class="table-row">
               <div class="parameter">Контроль качества</div>
               <div class="with-us"><span class="check">✓</span> 5-ступенчатый контроль</div>
               <div class="without-us"><span class="cross">✗</span> Выборочный, на глаз</div>
            </div>

            <div class="table-row">
               <div class="parameter">Экспертиза специалистов</div>
               <div class="with-us"><span class="check">✓</span> Инженеры с опытом 10+ лет</div>
               <div class="without-us"><span class="cross">✗</span> Разношерстная команда</div>
            </div>

            <div class="table-row">
               <div class="parameter">Сервисное сопровождение</div>
               <div class="with-us"><span class="check">✓</span> Круглосуточно 24/7</div>
               <div class="without-us"><span class="cross">✗</span> В рабочее время</div>
            </div>
         </div>
      </div>
   </section>

   <!-- 6. СЕРТИФИКАТЫ -->
   <section class="certificates-section fade-in">
      <div class="container">
         <h2 class="text-center">Наши сертификаты и лицензии</h2>
         <p class="section-lead text-center">
            Все работы выполняются в соответствии с требованиями законодательства и стандартами качества.
         </p>

         <div class="certificates-grid">
            <div class="certificate-card">
               <div class="certificate-icon">
                  <i class="fa-solid fa-certificate"></i>
               </div>
               <h4>Лицензия СРО</h4>
               <p>Саморегулируемая организация в области проектирования и строительства</p>
            </div>

            <div class="certificate-card">
               <div class="certificate-icon">
                  <i class="fas fa-award"></i>
               </div>
               <h4>Сертификат ISO 9001</h4>
               <p>Международный стандарт системы менеджмента качества</p>
            </div>

            <div class="certificate-card">
               <div class="certificate-icon">
                  <i class="fas fa-user-tie"></i>
               </div>
               <h4>Квалификация персонала</h4>
               <p>Сертифицированные специалисты с допусками к работам</p>
            </div>

            <div class="certificate-card">
               <div class="certificate-icon">
                  <i class="fas fa-shield-alt"></i>
               </div>
               <h4>Страхование ответственности</h4>
               <p>Застрахована ответственность на сумму 10 млн рублей</p>
            </div>
         </div>
      </div>
   </section>

   <!-- 7. КАЛЬКУЛЯТОР УСЛУГ -->
   <section id="calculator" class="calculator-section fade-in">
      <div class="container">
         <div class="calculator-content">
            <h2>Рассчитайте стоимость услуг онлайн</h2>
            <p>Ориентировочный расчет стоимости услуг на основе ваших параметров. Для точного расчета потребуется выезд специалиста.</p>

            <div class="calculator-form">
               <h3>Калькулятор услуг</h3>

               <div class="calculator-row">
                  <div class="calculator-group">
                     <label>Тип услуги *</label>
                     <select class="form-control" id="serviceType">
                        <option value="">Выберите тип услуги</option>
                        <option value="project">Проектирование</option>
                        <option value="installation">Монтаж</option>
                        <option value="service">Обслуживание</option>
                        <option value="repair">Ремонт</option>
                        <option value="complex">Комплекс "под ключ"</option>
                     </select>
                  </div>

                  <div class="calculator-group">
                     <label>Срочность выполнения</label>
                     <div class="radio-group">
                        <label class="radio-label">
                           <input type="radio" name="urgency" value="standard" checked>
                           <span class="radio-custom"></span>
                           <span>Стандартная</span>
                        </label>
                        <label class="radio-label">
                           <input type="radio" name="urgency" value="urgent">
                           <span class="radio-custom"></span>
                           <span>Срочная</span>
                        </label>
                        <label class="radio-label">
                           <input type="radio" name="urgency" value="emergency">
                           <span class="radio-custom"></span>
                           <span>Аварийная</span>
                        </label>
                     </div>
                  </div>
               </div>

               <div class="calculator-row">
                  <div class="calculator-group">
                     <label>Мощность оборудования</label>
                     <select class="form-control" id="equipmentPower">
                        <option value="">Выберите диапазон</option>
                        <option value="low">До 50 кВт</option>
                        <option value="medium">50-200 кВт</option>
                        <option value="high">От 200 кВт</option>
                        <option value="unknown">Не знаю</option>
                     </select>
                  </div>

                  <div class="calculator-group">
                     <label>Тип объекта</label>
                     <select class="form-control" id="objectType">
                        <option value="">Выберите тип объекта</option>
                        <option value="food">Пищевое производство</option>
                        <option value="chemical">Химическое производство</option>
                        <option value="metal">Металлообработка</option>
                        <option value="warehouse">Склад/логистика</option>
                        <option value="other">Другое</option>
                     </select>
                  </div>
               </div>

               <div class="calculator-group">
                  <label>Дополнительные услуги</label>
                  <div class="radio-group">
                     <label class="radio-label">
                        <input type="checkbox" name="additional" value="design">
                        <span class="radio-custom"></span>
                        <span>Проектная документация</span>
                     </label>
                     <label class="radio-label">
                        <input type="checkbox" name="additional" value="training">
                        <span class="radio-custom"></span>
                        <span>Обучение персонала</span>
                     </label>
                     <label class="radio-label">
                        <input type="checkbox" name="additional" value="warranty">
                        <span class="radio-custom"></span>
                        <span>Расширенная гарантия</span>
                     </label>
                  </div>
               </div>

               <div class="calculator-result" id="calculatorResult">
                  <div class="result-title">Ориентировочная стоимость</div>
                  <div class="result-value" id="resultValue">от 150 000 ₽</div>
                  <div class="result-note">Точную стоимость рассчитает наш инженер после выезда на объект</div>
               </div>

               <button type="button" class="btn" id="calculateBtn">
                  <i class="fas fa-calculator"></i> Рассчитать стоимость
               </button>
            </div>
         </div>
      </div>
   </section>

   <!-- 8. FAQ -->
   <section class="faq-section fade-in">
      <div class="container">
         <h2 class="text-center">Частые вопросы по услугам</h2>
         <p class="section-lead text-center">
            Ответы на самые популярные вопросы о сотрудничестве, сроках, гарантиях и процессе работы.
         </p>

         <div class="faq-container">
            <div class="faq-categories">
               <div class="faq-category active" data-category="all">Все вопросы</div>
               <div class="faq-category" data-category="cost">Стоимость и сроки</div>
               <div class="faq-category" data-category="warranty">Гарантии</div>
               <div class="faq-category" data-category="process">Процесс работы</div>
               <div class="faq-category" data-category="service">Сервис</div>
            </div>

            <div class="faq-list">
               <div class="faq-item" data-category="cost">
                  <div class="faq-question">
                     Как формируется стоимость услуг?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>Стоимость формируется на основе следующих факторов: сложность работ, требуемое оборудование, срочность выполнения, удаленность объекта, необходимость разработки проектной документации. Мы предоставляем детальную смету с постатейным описанием всех работ.</p>
                  </div>
               </div>

               <div class="faq-item" data-category="warranty">
                  <div class="faq-question">
                     Какая гарантия предоставляется на работы?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>На все монтажные и пусконаладочные работы мы предоставляем гарантию 3 года. На оборудование собственного производства — также 3 года. На комплектующие — согласно гарантии производителя. Гарантийные обязательства фиксируются в договоре.</p>
                  </div>
               </div>

               <div class="faq-item" data-category="process">
                  <div class="faq-question">
                     Какой срок выполнения работ?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>Сроки зависят от объема работ: проектирование — 5-10 рабочих дней, монтаж стандартного оборудования — 3-7 дней, комплексные решения — 2-4 недели. Аварийные работы выполняются в течение 2-4 часов после обращения. Все сроки согласовываются в договоре.</p>
                  </div>
               </div>

               <div class="faq-item" data-category="service">
                  <div class="faq-question">
                     Есть ли у вас сервисные контракты?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>Да, мы предлагаем различные варианты сервисных контрактов: "Базовый" (плановое обслуживание 2 раза в год), "Стандарт" (плановое обслуживание + выезд по заявке), "Премиум" (круглосуточная поддержка + аварийный выезд). Стоимость контракта зависит от сложности оборудования.</p>
                  </div>
               </div>

               <div class="faq-item" data-category="cost">
                  <div class="faq-question">
                     Можно ли получить скидку при большом объеме работ?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>Да, мы предоставляем скидки при комплексном заказе (проектирование + монтаж + обслуживание) и при больших объемах работ. Также действуют сезонные акции и специальные предложения для постоянных клиентов. Уточняйте актуальные условия у менеджеров.</p>
                  </div>
               </div>

               <div class="faq-item" data-category="process">
                  <div class="faq-question">
                     Как происходит оплата?
                     <i class="fas fa-chevron-down"></i>
                  </div>
                  <div class="faq-answer">
                     <p>Для физических лиц возможна оплата наличными или банковской картой. Для юридических лиц — безналичный расчет с НДС. При крупных проектах возможна поэтапная оплата: 30% предоплата, 40% после поставки оборудования, 30% после сдачи объекта.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- 9. SEO-КОНТЕНТ -->
   <section class="seo-section fade-in">
      <div class="container">
         <div class="seo-content">
            <h2>Услуги по промышленному холодильному оборудованию от производителя</h2>

            <p>Компания «ТЕРМОСИСТЕМЫ-С» с 2010 года предоставляет полный комплекс услуг по проектированию, монтажу и обслуживанию промышленных холодильных систем по всей России и странам СНГ. Мы работаем как с серийным оборудованием, так и разрабатываем индивидуальные решения для предприятий пищевой, химической, металлообрабатывающей и других отраслей промышленности.</p>

            <p><strong>Инженерные услуги</strong> — это основа нашего подхода. Мы начинаем с глубокого анализа технологических процессов заказчика, проводим теплотехнические расчеты, разрабатываем 3D-модели будущих систем и подбираем оптимальное оборудование. Наши специалисты имеют опыт работы с объектами любой сложности: от небольших производственных цехов до крупных логистических центров площадью более 5000 м².</p>

            <p><strong>Монтажные и пусконаладочные работы</strong> выполняются квалифицированными бригадами с использованием современного оборудования. Мы обеспечиваем полный цикл — от доставки и разгрузки до установки, подключения и настройки автоматики. Особое внимание уделяем безопасности и соблюдению всех строительных норм и правил.</p>

            <p><strong>Сервисное обслуживание</strong> — это гарантия бесперебойной работы вашего оборудования. Мы предлагаем различные форматы сотрудничества: от разовых выездов по необходимости до круглосуточных сервисных контрактов. Наши специалисты оперативно реагируют на аварийные ситуации, проводят плановое техническое обслуживание и своевременно заменяют изношенные компоненты.</p>

            <p><strong>Преимущества работы с нами:</strong></p>

            <ul>
               <li>Собственное производство оборудования — контроль качества на всех этапах</li>
               <li>Команда инженеров с опытом работы более 10 лет в промышленном холоде</li>
               <li>Расширенная гарантия 3 года на все работы и оборудование</li>
               <li>Круглосуточная служба поддержки и аварийный выезд</li>
               <li>Работаем с оборудованием любых производителей</li>
               <li>Полный пакет документации и обучение персонала заказчика</li>
            </ul>

            <p>География наших услуг охватывает всю территорию России: Москва, Санкт-Петербург, Самара, Екатеринбург, Новосибирск, Казань, Нижний Новгород и другие города. Мы имеем все необходимые лицензии и сертификаты, включая допуск СРО и сертификат ISO 9001. Страхование ответственности на сумму 10 млн рублей гарантирует защиту интересов наших клиентов.</p>

            <p>Если вам необходимо спроектировать новую холодильную систему, выполнить монтаж оборудования или обеспечить его бесперебойную работу — обратитесь к нашим специалистам. Мы проведем бесплатный выезд инженера, разработаем оптимальное техническое решение и предоставим коммерческое предложение в течение 24 часов.</p>
         </div>
      </div>
   </section>
</main>

<?php
$services_schema = array(
   '@context' => 'https://schema.org',
   '@type' => 'Service',
   'name' => 'Услуги по промышленному холодильному оборудованию',
   'description' => 'Комплексные услуги по проектированию, монтажу и обслуживанию промышленных холодильных систем',
   'provider' => array(
      '@type' => 'Organization',
      'name' => get_bloginfo('name'),
      'url' => home_url('/'),
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
      'name' => 'Каталог услуг',
      'itemListElement' => array(
         array(
            '@type' => 'Offer',
            'itemOffered' => array(
               '@type' => 'Service',
               'name' => 'Инженерные услуги',
               'description' => 'Проектирование, теплотехнический расчет, подбор оборудования',
            ),
         ),
         array(
            '@type' => 'Offer',
            'itemOffered' => array(
               '@type' => 'Service',
               'name' => 'Монтаж и пусконаладка',
               'description' => 'Установка оборудования, пусконаладочные работы, шеф-монтаж',
            ),
         ),
         array(
            '@type' => 'Offer',
            'itemOffered' => array(
               '@type' => 'Service',
               'name' => 'Сервис и обслуживание',
               'description' => 'Техническое обслуживание, ремонт, аварийный выезд',
            ),
         ),
      ),
   ),
);
?>

<!-- СКРИПТ ДЛЯ СТРУКТУРИРОВАННЫХ ДАННЫХ (Schema.org) -->
<script type="application/ld+json">
   <?php echo wp_json_encode($services_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>
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

      // ===== FAQ СИСТЕМА =====
      const faqQuestions = document.querySelectorAll('.faq-question');
      const faqCategories = document.querySelectorAll('.faq-category');

      // Обработка кликов по вопросам
      faqQuestions.forEach(question => {
         question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const isActive = this.classList.contains('active');

            // Закрываем все открытые ответы
            document.querySelectorAll('.faq-answer.active').forEach(activeAnswer => {
               activeAnswer.classList.remove('active');
               activeAnswer.previousElementSibling.classList.remove('active');
            });

            // Открываем текущий, если был закрыт
            if (!isActive) {
               this.classList.add('active');
               answer.classList.add('active');
            }
         });
      });

      // Фильтрация FAQ по категориям
      faqCategories.forEach(category => {
         category.addEventListener('click', function() {
            const categoryName = this.dataset.category;

            // Активный класс для категорий
            faqCategories.forEach(cat => cat.classList.remove('active'));
            this.classList.add('active');

            // Показ/скрытие вопросов
            const allItems = document.querySelectorAll('.faq-item');

            if (categoryName === 'all') {
               allItems.forEach(item => {
                  item.style.display = 'block';
               });
            } else {
               allItems.forEach(item => {
                  if (item.dataset.category === categoryName) {
                     item.style.display = 'block';
                  } else {
                     item.style.display = 'none';
                  }
               });
            }
         });
      });

      // ===== КАЛЬКУЛЯТОР УСЛУГ =====
      const calculateBtn = document.getElementById('calculateBtn');
      const resultDiv = document.getElementById('calculatorResult');
      const resultValue = document.getElementById('resultValue');

      if (calculateBtn) {
         calculateBtn.addEventListener('click', function() {
            const serviceType = document.getElementById('serviceType').value;
            const urgency = document.querySelector('input[name="urgency"]:checked').value;
            const equipmentPower = document.getElementById('equipmentPower').value;
            const objectType = document.getElementById('objectType').value;

            // Базовая цена
            let basePrice = 0;

            switch (serviceType) {
               case 'project':
                  basePrice = 50000;
                  break;
               case 'installation':
                  basePrice = 150000;
                  break;
               case 'service':
                  basePrice = 30000;
                  break;
               case 'repair':
                  basePrice = 40000;
                  break;
               case 'complex':
                  basePrice = 300000;
                  break;
               default:
                  basePrice = 0;
            }

            // Наценка за срочность
            let urgencyMultiplier = 1;
            switch (urgency) {
               case 'urgent':
                  urgencyMultiplier = 1.3;
                  break;
               case 'emergency':
                  urgencyMultiplier = 1.7;
                  break;
               default:
                  urgencyMultiplier = 1;
            }

            // Наценка за мощность
            let powerMultiplier = 1;
            switch (equipmentPower) {
               case 'medium':
                  powerMultiplier = 1.5;
                  break;
               case 'high':
                  powerMultiplier = 2.5;
                  break;
               default:
                  powerMultiplier = 1;
            }

            // Наценка за тип объекта
            let objectMultiplier = 1;
            switch (objectType) {
               case 'chemical':
                  objectMultiplier = 1.4;
                  break;
               case 'warehouse':
                  objectMultiplier = 1.3;
                  break;
               default:
                  objectMultiplier = 1;
            }

            // Дополнительные услуги
            let additionalCost = 0;
            document.querySelectorAll('input[name="additional"]:checked').forEach(checkbox => {
               switch (checkbox.value) {
                  case 'design':
                     additionalCost += 20000;
                     break;
                  case 'training':
                     additionalCost += 15000;
                     break;
                  case 'warranty':
                     additionalCost += 25000;
                     break;
               }
            });

            // Итоговый расчет
            let finalPrice = 0;
            if (serviceType && basePrice > 0) {
               finalPrice = Math.round((basePrice * urgencyMultiplier * powerMultiplier * objectMultiplier) + additionalCost);
               resultValue.textContent = `от ${finalPrice.toLocaleString('ru-RU')} ₽`;
               resultDiv.style.display = 'block';

               // Прокрутка к результату
               setTimeout(() => {
                  resultDiv.scrollIntoView({
                     behavior: 'smooth',
                     block: 'center'
                  });
               }, 300);
            } else {
               alert('Пожалуйста, выберите тип услуги для расчета');
            }
         });
      }

      // ===== КНОПКА СРОЧНОГО ВЫЗОВА =====
      const emergencyBtn = document.getElementById('emergencyBtn');
      if (emergencyBtn) {
         emergencyBtn.addEventListener('click', function() {
            const phoneNumber = <?php echo wp_json_encode($termoservis_phone_tel); ?>;

            if (confirm('Вы действительно хотите совершить срочный вызов инженера? Мы перезвоним вам в течение 5 минут.')) {
               window.location.href = `tel:${phoneNumber}`;

               // Запись в localStorage для отслеживания срочных вызовов
               const emergencyCall = {
                  timestamp: new Date().toISOString(),
                  type: 'emergency',
                  userAgent: navigator.userAgent
               };
               localStorage.setItem('lastEmergencyCall', JSON.stringify(emergencyCall));
            }
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

      // ===== ТАЙМЕР ДЛЯ СРОЧНОГО ВЫЗОВА =====
      function updateEmergencyTimer() {
         const now = new Date();
         const emergencyElement = document.getElementById('emergencyBtn');

         if (emergencyElement) {
            // Показываем текущее время в формате ЧЧ:ММ
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');

            // Меняем текст кнопки в рабочее время
            if (now.getHours() >= 9 && now.getHours() < 18 && now.getDay() >= 1 && now.getDay() <= 5) {
               emergencyElement.innerHTML = `<i class="fas fa-ambulance"></i> Срочный вызов (работаем до 18:00)`;
            } else {
               emergencyElement.innerHTML = `<i class="fas fa-ambulance"></i> Срочный выезд 24/7`;
            }
         }
      }

      // Обновляем таймер каждую минуту
      updateEmergencyTimer();
      setInterval(updateEmergencyTimer, 60000);
   });
</script>

<?php get_footer(); ?>