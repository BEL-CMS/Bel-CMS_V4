// >>------------ Data Table 1 -----------<<
$(function () {
    $('#defaultDatatable').DataTable();
});
// Delete btn JS
document.addEventListener('DOMContentLoaded', () => {
    const table = document.querySelector('table');

    if (table) {
        table.addEventListener('click', (event) => {
            const target = event.target;

            if (target.classList.contains('delete-btn')) {
                const row = target.closest('tr');
                if (row) {
                    row.remove();
                }
            }
        });
    }
});


$(function () {
    $('#datatableButtons').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });
});

$(function () {
    $('#columnHighlightDataTable').DataTable({
        createdRow: function (row, data) {

            const salaryText = String(data[5] || "").replace(/[\$,]/g, '');
            const salary = parseFloat(salaryText);

            if (!isNaN(salary) && salary > 150000) {
                $('td', row).eq(5).addClass('highlight');
            }
        }
    });
});


// <<--------Formatting function for row details - modify as needed -------->>
function format(d) {
    return `
        <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">
            <tr>
                <td>Full Name:</td>
                <td>${d.name}</td>
            </tr>
            <tr>
                <td>Position:</td>
                <td>${d.position}</td>
            </tr>
            <tr>
                <td>Extension:</td>
                <td>${d.extn}</td>
            </tr>
            <tr>
                <td>Extra Info:</td>
                <td>More details here...</td>
            </tr>
        </table>
    `;
}

$(function () {

    //>>----------------- 20 Custom Data--------------------<<
    const customData = [
        { id: 1, name: "John Doe", position: "Developer", office: "New York", salary: "$120,000", extn: "5421" },
        { id: 2, name: "Sarah Smith", position: "Manager", office: "London", salary: "$150,500", extn: "4123" },
        { id: 3, name: "Michael Brown", position: "Designer", office: "Tokyo", salary: "$98,000", extn: "6321" },
        { id: 4, name: "Emma Wilson", position: "Team Lead", office: "Sydney", salary: "$175,000", extn: "4411" },
        { id: 5, name: "David Miller", position: "QA Tester", office: "Toronto", salary: "$87,900", extn: "5543" },
        { id: 6, name: "Olivia Davis", position: "Accountant", office: "Paris", salary: "$110,400", extn: "6112" },
        { id: 7, name: "James Anderson", position: "Consultant", office: "Berlin", salary: "$143,000", extn: "7232" },
        { id: 8, name: "Sophia Johnson", position: "Marketing Lead", office: "Rome", salary: "$132,200", extn: "4875" },
        { id: 9, name: "Daniel Lee", position: "Sales Manager", office: "Madrid", salary: "$160,300", extn: "5623" },
        { id: 10, name: "Ava Taylor", position: "HR Specialist", office: "Dubai", salary: "$101,800", extn: "3321" },
        { id: 11, name: "William Thompson", position: "Architect", office: "Chicago", salary: "$190,000", extn: "7211" },
        { id: 12, name: "Mia White", position: "Analyst", office: "Boston", salary: "$115,000", extn: "5433" },
        { id: 13, name: "Benjamin Harris", position: "Support Lead", office: "Los Angeles", salary: "$99,900", extn: "2811" },
        { id: 14, name: "Charlotte Clark", position: "Coordinator", office: "Miami", salary: "$85,700", extn: "1234" },
        { id: 15, name: "Henry Lewis", position: "Operations Head", office: "San Francisco", salary: "$210,000", extn: "8976" },
        { id: 16, name: "Amelia Walker", position: "Researcher", office: "Seoul", salary: "$123,400", extn: "6452" },
        { id: 17, name: "Lucas Hall", position: "Security Lead", office: "Zurich", salary: "$155,700", extn: "9887" },
        { id: 18, name: "Harper Allen", position: "Content Writer", office: "Bangkok", salary: "$75,600", extn: "5512" },
        { id: 19, name: "Elijah Young", position: "Data Engineer", office: "Austin", salary: "$135,900", extn: "3332" },
        { id: 20, name: "Ella King", position: "Product Manager", office: "Houston", salary: "$182,000", extn: "4721" }
    ];

    // >>----------------- DataTable Initialization-------------------<<
    const table = $('#ChildRowsDatatable').DataTable({
        data: customData,
        rowId: "id",
        columns: [
            {
                className: "dt-control",
                orderable: false,
                data: null,
                defaultContent: ""
            },
            { data: "name" },
            { data: "position" },
            { data: "office" },
            { data: "salary" }
        ],
        order: [[1, "asc"]],
        dom: "Blfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"]
    });

    // >>-------------- Expand/Collapse Child Rows-------------<<
    $('#ChildRowsDatatable').on('click', 'td.dt-control', function () {
        const tr = $(this).closest('tr');
        const row = table.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });
});

// >>-------------  datatable ------------- <<
