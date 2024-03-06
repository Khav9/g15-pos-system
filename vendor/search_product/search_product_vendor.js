
// Filler and search products//

document.addEventListener('DOMContentLoaded', function () {
    let categorySelect = document.getElementById('category');
    let dataTable = document.getElementById('dataTable');

    categorySelect.addEventListener('change', function () {
        let selectedCity = categorySelect.value;
        let rows = dataTable.querySelectorAll('tbody tr');

        for (let row of rows) {
            
            let categoryCellText = row.children[5].textContent.trim();

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
