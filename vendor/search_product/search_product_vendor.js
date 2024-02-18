
// Filler and search products//

document.addEventListener('DOMContentLoaded', function () {
    let searchForm = document.getElementById('searchForm');
    let searchInput = document.getElementById('searchInput');
    let categorySelect = document.getElementById('category');
    let dataTable = document.getElementById('dataTable');

    searchForm.addEventListener('keyup', function (event) {
        event.preventDefault();
        let searchTerm = searchInput.value.trim().toLowerCase();
        let rows = dataTable.querySelectorAll('tbody tr');

        rows.forEach(function (row) {
            let nameCell = row.querySelector('td:nth-child(2)');
            if (nameCell.textContent.toLowerCase().includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    /// Select product ///////
    categorySelect.addEventListener('change', function () {
        let selectedCity = categorySelect.value;
        let rows = dataTable.querySelectorAll('tbody tr');

        for (let row of rows) {
            
            let categoryCellText = row.children[4].textContent.trim();
            console.log(categoryCellText);

            if (selectedCity !== 'All') {
                if (categoryCellText === selectedCity) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            } else {
                row.style.display = '';
            }
        }
    });
});
