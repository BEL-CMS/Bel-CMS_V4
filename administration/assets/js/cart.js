// Parse price string like "$519.10" -> 519.10
function parsePrice(str) {
    return parseFloat(str.replace(/[^0-9.]/g, '')) || 0;
}

// Update row total and recalculate cart summary
function updateCart() {
    let subTotal = 0;

    $('#example tbody tr').each(function () {
        const $row = $(this);
        const priceText = $row.find('td:nth-child(2)').text().trim();
        const price = parsePrice(priceText);
        const qty = parseInt($row.find('.count').val(), 10) || 1;
        const rowTotal = price * qty;

        $row.find('td:nth-child(4)').text('$' + rowTotal.toFixed(2));
        subTotal += rowTotal;
    });

    const discount = 53.00;
    const shipping = 65.00;
    const taxRate = 0.125;
    const tax = subTotal * taxRate;
    const total = subTotal - discount + shipping + tax;

    $('#cart-sub').text('$' + subTotal.toFixed(2));
    $('#cart-tax').text('$ ' + tax.toFixed(2));
    $('#cart-total').text('$' + total.toFixed(2));
}

// Increment / Decrement
$(document).on('click', '.decrement, .increment', function () {
    const $input = $(this).siblings('.count');
    let count = parseInt($input.val(), 10) || 1;
    const min = 1;

    count += $(this).hasClass('increment') ? 1 : -1;
    if (count >= min) {
        $input.val(count);
        updateCart();
    }
});

// Manual input change
$(document).on('change', '.count', function () {
    let val = parseInt($(this).val(), 10);
    if (isNaN(val) || val < 1) val = 1;
    $(this).val(val);
    updateCart();
});

// Delete row and recalculate
$(document).on('click', '.delete-btn', function () {
    $(this).closest('tr').remove();
    updateCart();
});

// Init on load
$(document).ready(function () {
    updateCart();
});
