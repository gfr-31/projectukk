document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.getElementById('table-body');
    const pagination = document.getElementById('pagination');
    const searchInput = document.getElementById('searchInput');
    let currentPage = 1;

    // Function to fetch data from Laravel backend
    function fetchData(page = 1, searchQuery = '') {
        fetch('/api/tahun-ajaran?page=${page}&search=${searchQuery}')
            .then(response => response.json())
            .then(data => {
                displayData(data.data);
                displayPagination(data);
            })
            .catch(error => console.error('Error:', error));
    }

    // Function to display data in table
    function displayData(data) {
        tableBody.innerHTML = ''; // Clear previous data

        data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.id}</td>
                <td>${item.tahun_ajaran}</td>
                <td>${item.keterangan}</td>
                <td>
                    <center>
                        <a href="/admin/edit/tahun-ajaran/${item.id}" class="btn btn-success btn-sm">
                            <i class="fa fa-pencil"></i>
                            Edit
                        </a>
                        |
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#konfirmasiModal${item.id}" onclick="submitDelete(${item.id})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </center>
                </td>
            `;
            tableBody.appendChild(row);
        });
    }

    // Function to display pagination
    function displayPagination(data) {
        pagination.innerHTML = ''; // Clear previous pagination

        for (let i = 1; i <= data.last_page; i++) {
            const link = document.createElement('a');
            link.href = '#';
            link.textContent = i;
            link.onclick = function () {
                currentPage = i;
                fetchData(i, searchInput.value);
            };
            pagination.appendChild(link);
        }
    }

    // Function to handle search input
    searchInput.addEventListener('input', function () {
        fetchData(1, this.value);
    });

    // Initial data fetch
    fetchData(currentPage);
});
