const hideAlert = document.querySelector('#alert');

setTimeout(() => {
    hideAlert.classList.remove('show');
    hideAlert.classList.add('hide');
    location.reload();
}, 2500);