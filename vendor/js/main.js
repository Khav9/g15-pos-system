const hideAlert = document.querySelector('#alert');

setTimeout(() => {
    hideAlert.classList.remove('show');
    hideAlert.classList.add('hide');
}, 2000);

// user data in admin part
new DataTable('#dataTable');

