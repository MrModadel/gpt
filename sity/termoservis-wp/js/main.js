
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

document.querySelectorAll('.form-tel').forEach(form=>{
  form.addEventListener('submit', function(e){
    e.preventDefault();

    const data = new FormData(form); // FormData автоматически берёт все поля + файлы

    fetch('/wp-content/themes/termo/telegram-send.php', {
      method: 'POST',
      body: data
    })
    .then(res => res.text())
    .then(result => {
      if(result.trim() === 'OK'){
        alert('Заявка отправлена!');
        form.reset();
      }else{
        alert('Ошибка отправки, проверьте PHP.');
      }
    })
    .catch(err => {
      console.error(err);
      alert('Ошибка отправки.');
    });
  });
});

        // Работа аккордеона
        const accordionHeaders = document.querySelectorAll('.accordion-header');
        accordionHeaders.forEach(header => {
            header.addEventListener('click', function() {
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