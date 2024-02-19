document.addEventListener('DOMContentLoaded', function() {
    let searchForm = document.getElementById('searchForm');
    let searchInput = document.getElementById('searchInput');
    let dataTable = document.getElementById('dataTable');
    console.log(dataTable);

    searchForm.addEventListener('keyup', function(event) {
        event.preventDefault();
        let searchTerm = searchInput.value.trim().toLowerCase();
        let rows = dataTable.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            let nameCell = row.querySelector('td:nth-child(2)');
            if (nameCell.textContent.toLowerCase().includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});