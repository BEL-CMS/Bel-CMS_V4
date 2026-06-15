
//  >>-------------------------touch-spin js start -------------------------------<<
document.addEventListener('DOMContentLoaded', () => {

    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.increment, .decrement');
        if (!btn) return;


        const wrapper =
            btn.closest('.custom-touch-spin') ||
            btn.closest('.vertical-touch-spin') ||
            btn.closest('.simple-rounded') ||
            btn.closest('.touch-spin-with-dropdown') ||
            btn.closest('.touch-spin-with-PostPre') ||
            btn.closest('.quantity-touch-spin') ||
            btn.closest('.single-side-touch-spin');


        if (!wrapper) return;

        const input = wrapper.querySelector('.count');
        if (!input) return;

        let value = parseInt(input.value, 10);
        if (isNaN(value)) value = 0;

        // NORMAL increment
        if (btn.classList.contains('increment')) {
            value++;
        }


        else if (btn.classList.contains('decrement')) {

            // Quantity Inputs section (only + button visually)
            if (wrapper.classList.contains('quantity-touch-spin')) {
                value--;
            } else {
                value = Math.max(0, value - 1);
            }
        }

        input.value = value;
    });

});
//  >>--------------------------- touch-spin js end -----------------------------------<<
