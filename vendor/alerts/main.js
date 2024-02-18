const hideAlert = document.querySelector('#alert');

setTimeout(() => {
    hideAlert.classList.remove('show');
    hideAlert.classList.add('hide');
}, 3000);