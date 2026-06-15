// >>---------------------------------------- //list_js  js Start// ---------------------------------------- <<
// <<------ Example 1 (Updated with let & const)------>>
(function initOrderList() {
    // >>----- Initialize List.js -----<<
    const options = {
        valueNames: ['id', 'customer', 'email', 'orderId', 'date', 'amount', 'status'],
        page: 5,
        pagination: {
            innerWindow: 1,
            outerWindow: 1,
            paginationClass: "list-js-pagination"
        }
    };

    const orderList = new List('myTable', options);

    // >>----- Bootstrap Modal -----<<
    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));

    // >>------- Add Order Button -------<<
    const addBtn = document.getElementById('add-btn');
    addBtn.addEventListener('click', () => {
        document.getElementById('add_order_form').reset();
        document.getElementById('id-field').value = '';
        document.getElementById('add-btn-modal').style.display = 'inline-block';
        document.getElementById('edit-btn-modal').style.display = 'none';
    });

    // >>----- Add Order Form Submit -----<<
    const addOrderForm = document.getElementById('add_order_form');
    addOrderForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const id = Date.now();
        orderList.add({
            id: id,
            customer: document.getElementById('customer-field').value,
            email: document.getElementById('email-field').value,
            orderId: document.getElementById('orderId-field').value,
            date: document.getElementById('date-field').value,
            amount: `$${document.getElementById('amount-field').value}`,
            status: `
                <span class="badge bg-${document.getElementById('status-field').value}-subtle 
                text-${document.getElementById('status-field').value}">
                    ${document.getElementById('status-field').selectedOptions[0].text}
                </span>`
        });

        modal.hide();
    });

    // >>----- Edit Order -----<<
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('edit-item-btn')) {
            const row = e.target.closest('tr');
            const item = orderList.get('id', row.querySelector('.id').innerText)[0];

            document.getElementById('id-field').value = item.values().id;
            document.getElementById('customer-field').value = item.values().customer;
            document.getElementById('email-field').value = item.values().email;
            document.getElementById('orderId-field').value = item.values().orderId;
            document.getElementById('date-field').value = item.values().date;
            document.getElementById('amount-field').value = item.values().amount.replace('$', '');

            document.getElementById('add-btn-modal').style.display = 'none';
            document.getElementById('edit-btn-modal').style.display = 'inline-block';

            modal.show();
        }
    });

    document.getElementById('edit-btn-modal').addEventListener('click', () => {
        const id = document.getElementById('id-field').value;
        const item = orderList.get('id', id)[0];

        item.values({
            customer: document.getElementById('customer-field').value,
            email: document.getElementById('email-field').value,
            orderId: document.getElementById('orderId-field').value,
            date: document.getElementById('date-field').value,
            amount: `$${document.getElementById('amount-field').value}`,
            status: `
                <span class="badge bg-${document.getElementById('status-field').value}-subtle 
                text-${document.getElementById('status-field').value}">
                    ${document.getElementById('status-field').selectedOptions[0].text}
                </span>`
        });

        modal.hide();
    });

    // >>----- Delete Order -----<<
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item-btn')) {
            const row = e.target.closest('tr');
            const id = row.querySelector('.id').innerText;
            orderList.remove('id', id);
        }
    });

    // >>----- Pagination Info -----<<
    const renderPaginationInfo = () => {
        const totalItems = orderList.matchingItems.length;
        const pageSize = orderList.page;
        const currentPage = orderList.i;
        const totalPages = Math.ceil(totalItems / pageSize);

        document.getElementById('pagination-info').innerText =
            `Showing page ${currentPage} of ${totalPages} results`;
    };

    orderList.on('updated', renderPaginationInfo);
    renderPaginationInfo();
})();


// >>------ Example 2------<<

const userList = {
    valueNames: [
        'name',
        'born',
        { data: ['id'] }
    ]
};
new List('users', userList);

// >>------ Example 3------<<

const existingList = {
    valueNames: ['side']
};

new List('sideList', existingList);

// >>------ Example 4------<<
const tableList = {
    valueNames: ['name'],
    page: 3,
    pagination: true
};

new List('user', tableList);
// ---------------------------------------- //list_js  js End// ---------------------------------------- <<


