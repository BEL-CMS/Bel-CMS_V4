
// >>---------------------------------------- //Form-validation js Start// ---------------------------------------- <<
(() => {
    'use strict';

    /* -----------------------------
       Normal Bootstrap Validation
    ------------------------------ */
    document.querySelectorAll('.needs-validation').forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });

    /* -----------------------------
       Tooltip Validation + Password Match
    ------------------------------ */
    const tooltipForm = document.querySelector('.tooltip-needs-validation');
    if (!tooltipForm) return;

    const password = tooltipForm.querySelector('[name="password"]');
    const confirmPassword = tooltipForm.querySelector('[name="confirm_password"]');

    tooltipForm.addEventListener('submit', event => {
        // Password match validation
        if (password && confirmPassword) {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity('Passwords do not match');
            } else {
                confirmPassword.setCustomValidity('');
            }
        }

        if (!tooltipForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        tooltipForm.classList.add('was-validated');
    });
})();

(() => {
    'use strict';

    const form = document.getElementById('disableSubmitForm');
    const submitBtn = form.querySelector('button[type="submit"]');
    const password = form.querySelectorAll('input[type="password"]')[0];
    const confirmPassword = form.querySelectorAll('input[type="password"]')[1];

    function validateForm() {
        // Password match validation
        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Passwords do not match');
        } else {
            confirmPassword.setCustomValidity('');
        }

        submitBtn.disabled = !form.checkValidity();
    }

    form.addEventListener('input', validateForm);

    form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
})();

// >> ---------------------------------------- //Form-validation js End// ---------------------------------------- <<
