(function () {
    "use strict"

    // Sample Data
    const customersData = [
        ['192.168.1.1', 'John Doe', '../assets/images/faces/9.jpg', 'Active', 'Jan 15, 2025', 'john.doe@example.com'],
        ['192.168.1.2', 'Jane Smith', '../assets/images/faces/1.jpg', 'Blocked', 'Feb 3, 2025', 'jane.smith@example.com'],
        ['192.168.1.3', 'Michael Brown', '../assets/images/faces/10.jpg', 'Active', 'Mar 10, 2025', 'michael.brown@example.com'],
        ['192.168.1.4', 'Emily White', '../assets/images/faces/2.jpg', 'Active', 'Mar 12, 2025', 'emily.white@example.com'],
        ['192.168.1.5', 'Chris Johnson', '../assets/images/faces/11.jpg', 'Active', 'Jan 25, 2025', 'chris.johnson@example.com'],
        ['192.168.1.6', 'Sarah Lee', '../assets/images/faces/3.jpg', 'Blocked', 'Feb 14, 2025', 'sarah.lee@example.com'],
        ['192.168.1.7', 'David Green', '../assets/images/faces/13.jpg', 'Active', 'Mar 17, 2025', 'david.green@example.com'],
        ['192.168.1.8', 'Olivia Davis', '../assets/images/faces/4.jpg', 'Active', 'Feb 22, 2025', 'olivia.davis@example.com'],
        ['192.168.1.9', 'James Wilson', '../assets/images/faces/14.jpg', 'Active', 'Mar 5, 2025', 'james.wilson@example.com'],
        ['192.168.1.10', 'Sophia Martinez', '../assets/images/faces/5.jpg', 'Blocked', 'Jan 30, 2025', 'sophia.martinez@example.com']
    ];

    const grid = new gridjs.Grid({
        columns: [
            {
                name: '#',
                formatter: (_, row) => gridjs.html(
                    `<input class="form-check-input" type="checkbox" id="customer-${row.cells[0].data}" value="" aria-label="...">`
                )
            },
            {
                name: 'Customer IP',
                formatter: (_, row) => gridjs.html(
                    `<a href="javascript:void(0);">${row.cells[0].data}</a>`  // Correctly map to Customer Ip (row[0])
                )
            },
            {
                name: 'Customer Name',
                formatter: (_, row) => gridjs.html(
                    `<div class="d-flex align-items-center gap-3 position-relative">
                        <a href="javascript:void(0);" class="stretched-link"></a>
                        <div class="lh-1">
                            <span class="avatar avatar-md">
                                <img src="${row.cells[2].data}" alt="Customer Image">
                            </span>
                        </div>
                        <div>
                            <span class="d-block fw-semibold">${row.cells[1].data}</span>
                            <span class="text-muted fs-13">${row.cells[5].data}</span>
                        </div>
                    </div>`
                )
            },
            {
                name: 'Status',
                formatter: (_, row) => gridjs.html(
                    `<span class="badge bg-${row.cells[3].data === 'Active' ? 'success' : 'danger'}-transparent">${row.cells[3].data}</span>`
                )
            },
            'Joining Date',
            {
                name: 'Actions',
                formatter: (_, row) => gridjs.html(`
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light border" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i>Edit</a></li>
                            <li><a class="dropdown-item btn-delete" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li>
                        </ul>
                    </div>
                `)
            }
        ],
        data: customersData,
        pagination: true,
        search: false,
        sort: true,
    }).render(document.getElementById('customers-list'));

    // Filter functionality: event listeners for input and filter dropdowns
    document.getElementById('search-input').addEventListener('input', (e) => applyFilters());
    document.getElementById('status-filter').addEventListener('change', (e) => applyFilters());

    // Function to apply search and filter logic
    function applyFilters() {
        const searchInput = document.getElementById('search-input').value.toLowerCase();
        const statusFilter = document.getElementById('status-filter').value;

        const filteredData = customersData.filter(row => {
            const customerName = row[1].toLowerCase();
            const status = row[3].toLowerCase();

            let formattedStock = "";
            if (row[3] === "Active") {
                formattedStock = "active";
            } else if (row[3] === "Blocked") {
                formattedStock = "blocked";
            }

            const searchCondition = customerName.includes(searchInput);
            const statusCondition = statusFilter === '' || statusFilter === 'all' || formattedStock === statusFilter;

            return searchCondition && statusCondition;
        });


        grid.updateConfig({
            data: filteredData
        }).forceRender();

        // Handle the display of the "No matches found" row
        const gridContainer = document.getElementById('customers-list');
        const tableBody = gridContainer.querySelector('.gridjs-tbody');

        // Clear previous "No matches found" row
        const notFoundElement = document.querySelector('.gridjs-notfound');
        if (notFoundElement) {
            notFoundElement.style.display = 'none';  // Hide it using JavaScript
        }

        const noMatchesRow = document.getElementById('no-matches-row');
        if (noMatchesRow) {
            noMatchesRow.remove();
        }

        // If no results after filtering, create and append a "No matches found" row
        if (filteredData.length === 0) {
            const tr = document.createElement('tr');
            tr.id = 'no-matches-row';

            // Create a single cell spanning all columns
            const td = document.createElement('td');
            td.colSpan = 6; // Adjust the colspan to match the number of columns
            td.style.textAlign = 'center';
            td.textContent = 'No matching records found';
            td.style.fontWeight = '500';
            td.style.color = 'var(--default-text-color)';
            td.style.padding = '12px';

            tr.appendChild(td);
            tableBody.appendChild(tr);
        }
    }

    // Add a listener for delete actions in the table with SweetAlert confirmation
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('btn-delete')) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Find the row index of the customer to delete
                    const rowIndex = e.target.closest('tr').rowIndex - 1; // Subtract 1 to account for the header row

                    // Remove the customer from the customersData array
                    customersData.splice(rowIndex, 1);

                    // Update the grid with the new data
                    grid.updateConfig({
                        data: customersData
                    }).forceRender();

                    Swal.fire(
                        'Deleted!',
                        'Customer has been deleted.',
                        'success'
                    );
                }
            });
        }
    });

    flatpickr("#joiningDate", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

})();