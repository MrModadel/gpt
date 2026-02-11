
let burgerMenu = document.querySelector('.burger-menu');
let burgerMenuClose = document.querySelector('.burger-menu__close');
let burgerModal = document.querySelector('.modal-menu ');
burgerMenu.onclick = () => {
   burgerModal.style.display = 'block';
   setTimeout(() => {
      burgerModal.style.opacity = '1';
      burgerModal.style.transform = 'translate(0, 0)';
   }, 200);
}
burgerMenuClose.onclick = () => {
   burgerModal.style.opacity = '0';
   burgerModal.style.transform = 'translate(100%, 0)';
   setTimeout(() => {
      burgerModal.style.display = 'none';
   }, 300);
}

// ===== ОБРАБОТЧИК ПРОСТЫХ ФОРМ =====
document.querySelectorAll('.form-tel').forEach(form => {
   form.addEventListener('submit', function (e) {
      e.preventDefault();

      const data = new FormData(form); // FormData автоматически берёт все поля + файлы
      if (!data.get('formType')) {
         data.set('formType', 'Форма обратной связи');
      }

      fetch('/wp-content/themes/termo/telegram-send.php', {
         method: 'POST',
         body: data
      })
         .then(res => {
            console.log('HTTP Status:', res.status);
            if (!res.ok) {
               throw new Error(`HTTP Error! Status: ${res.status}`);
            }
            return res.json();
         })
         .then(result => {
            console.log('Response from PHP:', result);
            if (result && result.success) {
               alert('Заявка отправлена!');
               form.reset();

               const modalOverlay = form.closest('.modal-overlay');
               if (modalOverlay) {
                  modalOverlay.classList.remove('active');
                  document.body.style.overflow = 'auto';
               }

               const closestProjectModal = form.closest('#projectModal');
               if (closestProjectModal) {
                  closestProjectModal.classList.remove('active');
               }
            } else {
               console.error('Unexpected response:', result);
               alert('Ошибка отправки. Проверьте консоль браузера (F12).');
            }
         })
         .catch(err => {
            console.error('Fetch error:', err);
            alert('Ошибка отправки: ' + err.message);
         });
   });
});

// ===== ОБРАБОТЧИК МНОГОШАГОВОЙ ФОРМЫ =====
document.addEventListener('DOMContentLoaded', function () {
   const technicalForm = document.getElementById('technicalRequestForm');
   if (!technicalForm) return;

   let currentStep = 1;
   const totalSteps = 5;

   // Функция для отображения текущего шага
   function showStep(step) {
      document.querySelectorAll('.form-step-content').forEach(content => {
         content.classList.remove('active');
      });
      document.getElementById(`formStepContent${step}`).classList.add('active');

      // Обновляем прогресс
      document.querySelectorAll('.progress-step').forEach((el, index) => {
         const stepIndex = index + 1;
         if (stepIndex < step) {
            el.classList.add('completed');
            el.classList.remove('active');
         } else if (stepIndex === step) {
            el.classList.add('active');
            el.classList.remove('completed');
         } else {
            el.classList.remove('active', 'completed');
         }
      });

      // Скролл в начало формы
      document.querySelector('.form-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
   }

   // Валидация текущего шага
   function validateStep(step) {
      const currentContent = document.getElementById(`formStepContent${step}`);
      const requiredFields = currentContent.querySelectorAll('[required]');

      let isValid = true;
      requiredFields.forEach(field => {
         if (field.type === 'checkbox' || field.type === 'radio') {
            // Для checkboxes проверяем группу
            const group = document.querySelectorAll(`[name="${field.name}"]`);
            let isChecked = Array.from(group).some(f => f.checked);
            if (!isChecked) {
               isValid = false;
               field.parentElement.style.borderColor = 'red';
            } else {
               field.parentElement.style.borderColor = '';
            }
         } else {
            if (!field.value.trim()) {
               isValid = false;
               field.style.borderColor = 'red';
               field.style.borderWidth = '2px';
            } else {
               field.style.borderColor = '';
               field.style.borderWidth = '';
            }
         }
      });

      if (!isValid) {
         alert('Пожалуйста, заполните все обязательные поля');
      }
      return isValid;
   }

   // Обработчики кнопок "Далее"
   document.getElementById('nextToStep2')?.addEventListener('click', function () {
      if (validateStep(1)) {
         currentStep = 2;
         showStep(currentStep);
      }
   });

   document.getElementById('nextToStep3')?.addEventListener('click', function () {
      if (validateStep(2)) {
         currentStep = 3;
         showStep(currentStep);
      }
   });

   document.getElementById('nextToStep4')?.addEventListener('click', function () {
      if (validateStep(3)) {
         currentStep = 4;
         showStep(currentStep);
      }
   });

   document.getElementById('nextToStep5')?.addEventListener('click', function () {
      if (validateStep(4)) {
         currentStep = 5;
         showStep(currentStep);
      }
   });

   // Обработчики кнопок "Назад"
   document.getElementById('backToStep1')?.addEventListener('click', function () {
      currentStep = 1;
      showStep(currentStep);
   });

   document.getElementById('backToStep2')?.addEventListener('click', function () {
      currentStep = 2;
      showStep(currentStep);
   });

   document.getElementById('backToStep3')?.addEventListener('click', function () {
      currentStep = 3;
      showStep(currentStep);
   });

   document.getElementById('backToStep4')?.addEventListener('click', function () {
      currentStep = 4;
      showStep(currentStep);
   });

   // Обработка загрузки файлов
   const fileInputs = ['tzFile', 'drawingsFile', 'specFile'];
   fileInputs.forEach(inputId => {
      const fileInput = document.getElementById(inputId);
      if (!fileInput) return;

      fileInput.addEventListener('change', function (e) {
         const files = e.target.files;
         const labelId = inputId.replace('File', 'FileName');
         const label = document.getElementById(labelId);

         if (files.length > 0) {
            const fileNames = Array.from(files).map(f => f.name).join(', ');
            label.textContent = fileNames;
         }
      });
   });

   // Обработка отправки формы
   technicalForm.addEventListener('submit', function (e) {
      e.preventDefault();

      if (!validateStep(5)) return;

      const formData = new FormData(technicalForm);
      formData.append('formType', 'Техническое задание на расчет');

      const requestNumber = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
      formData.append('requestNumber', requestNumber);

      // Показываем лоадер
      const submitBtn = technicalForm.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Отправка...';
      submitBtn.disabled = true;

      fetch('/wp-content/themes/termo/telegram-send.php', {
         method: 'POST',
         body: formData
      })
         .then(res => {
            console.log('HTTP Status:', res.status);
            if (!res.ok) {
               throw new Error(`HTTP Error! Status: ${res.status}`);
            }
            return res.json();
         })
         .then(result => {
            console.log('Response from PHP:', result);
            if (result && result.success) {
               document.getElementById('requestNumber').textContent = requestNumber;

               // Показываем окно успеха
               document.querySelector('.form-content').style.display = 'none';
               document.getElementById('formSuccess').style.display = 'block';

               // Сбрасываем форму через 3 секунды
               setTimeout(() => {
                  technicalForm.reset();
                  document.querySelector('.form-content').style.display = 'block';
                  document.getElementById('formSuccess').style.display = 'none';
                  currentStep = 1;
                  showStep(currentStep);
                  submitBtn.innerHTML = originalText;
                  submitBtn.disabled = false;
               }, 3000);
            } else {
               console.error('Unexpected response:', result);
               alert('Ошибка отправки. Проверьте консоль браузера (F12).');
               submitBtn.innerHTML = originalText;
               submitBtn.disabled = false;
            }
         })
         .catch(err => {
            console.error('Fetch error:', err);
            alert('Ошибка подключения: ' + err.message);
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
         });
   });

   // Инициализация - показываем первый шаг
   showStep(1);
});

// Работа аккордеона
const accordionHeaders = document.querySelectorAll('.accordion-header');
accordionHeaders.forEach(header => {
   header.addEventListener('click', function () {
      const content = this.nextElementSibling;
      const isActive = this.classList.contains('active');

      document.querySelectorAll('.accordion-content.active').forEach(activeContent => {
         activeContent.classList.remove('active');
         activeContent.previousElementSibling.classList.remove('active');
      });

      if (!isActive) {
         this.classList.add('active');
         content.classList.add('active');
      }
   });
});
// ===== МОДАЛЬНЫЕ ОКНА =====
const projectModal = document.getElementById('projectModal');
const closeProjectModalButton = document.getElementById('closeProjectModal');
const projectButtons = document.querySelectorAll('.open-project-modal');

if (projectModal && closeProjectModalButton) {
   const modalProjectComment = document.getElementById('modalProjectComment');

   function closeModal() {
      projectModal.classList.remove('active');
   }

   function openModal(triggerElement) {
      if (modalProjectComment) {
         modalProjectComment.value = '';

         const row = triggerElement?.closest('tr');
         if (row) {
            const category = row.querySelector('.solution-type')?.textContent?.trim();
            const temperature = row.querySelector('.solution-temp')?.textContent?.trim();
            const complexity = row.querySelector('.solution-complexity')?.textContent?.trim();
            const duration = row.querySelector('.solution-duration')?.textContent?.trim();
            const applications = row.querySelector('.solution-apps')?.textContent?.trim();

            const parts = [];
            if (category) parts.push(`Категория: ${category}`);
            if (temperature) parts.push(`Температура: ${temperature}`);
            if (complexity) parts.push(`Сложность: ${complexity}`);
            if (duration) parts.push(`Срок реализации: ${duration}`);
            if (applications) parts.push(`Сферы применения: ${applications}`);

            if (parts.length) {
               modalProjectComment.value = parts.join('\n') + '\n\n';
            }
         }
      }

      projectModal.classList.add('active');
   }

   closeProjectModalButton.addEventListener('click', closeModal);

   projectButtons.forEach(button => {
      button.addEventListener('click', function () {
         openModal(button);
      });
   });

   projectModal.addEventListener('click', function (e) {
      if (e.target === projectModal) {
         closeModal();
      }
   });

   document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
         closeModal();
      }
   });
}

// ===== МОДАЛЬНЫЕ ОКНА (modal-overlay) =====
(function () {
   function getOverlayById(id) {
      const el = document.getElementById(id);
      if (!el || !el.classList || !el.classList.contains('modal-overlay')) return null;
      return el;
   }

   function openOverlay(overlay) {
      if (!overlay) return;
      overlay.classList.add('active');
      document.body.style.overflow = 'hidden';
   }

   function closeOverlay(overlay) {
      if (!overlay) return;
      overlay.classList.remove('active');
      if (!document.querySelector('.modal-overlay.active')) {
         document.body.style.overflow = 'auto';
      }
   }

   function closeAllOverlays() {
      document.querySelectorAll('.modal-overlay.active').forEach(overlay => overlay.classList.remove('active'));
      document.body.style.overflow = 'auto';
   }

   document.addEventListener('click', function (e) {
      const openCalcTrigger = e.target.closest('.open-modal-calc');
      if (openCalcTrigger) {
         openOverlay(getOverlayById('calcModal'));
         return;
      }

      const openCallTrigger = e.target.closest('.open-modal-call');
      if (openCallTrigger) {
         openOverlay(getOverlayById('callModal'));
         return;
      }

      const closeTrigger = e.target.closest('.close-modal, .modal-close');
      if (closeTrigger) {
         closeOverlay(closeTrigger.closest('.modal-overlay'));
         return;
      }

      if (e.target.classList && e.target.classList.contains('modal-overlay')) {
         closeOverlay(e.target);
         return;
      }

      const faqQuestion = e.target.closest('.faq-question');
      if (faqQuestion) {
         const faqItem = faqQuestion.closest('.faq-item');
         if (!faqItem) return;

         document.querySelectorAll('.faq-item.active').forEach(item => {
            if (item !== faqItem) item.classList.remove('active');
         });

         faqItem.classList.add('active');
      }
   });

   document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
         closeAllOverlays();
      }
   });
   // Sticky widget
   const stickyWidget = document.getElementById('stickyWidget');
   const closeWidget = document.getElementById('closeWidget');
   if (stickyWidget) {
      setTimeout(() => stickyWidget.classList.add('active'), 900);
   }
   closeWidget?.addEventListener('click', function () {
      stickyWidget?.classList.remove('active');
   });
})();
