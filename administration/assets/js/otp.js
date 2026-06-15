
// >>---------------------------------------- //Otp js Start// ---------------------------------------- <<
document.addEventListener('DOMContentLoaded', () => {

    const inputs = document.querySelectorAll('.otp-input');
    const verifyBtn = document.querySelector('.verify-btn');

    inputs.forEach((input, index) => {

        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^0-9]/g, '');

            if (input.value && inputs[index + 1]) {
                inputs[index + 1].focus();
            }

            // Auto submit when all filled
            if (isOTPComplete()) {
                redirectToReset();
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !input.value && inputs[index - 1]) {
                inputs[index - 1].focus();
            }
        });
    });

    verifyBtn.addEventListener('click', redirectToReset);

    function isOTPComplete() {
        return [...inputs].every(input => input.value !== '');
    }

    function redirectToReset() {
        if (!isOTPComplete()) {
            alert('Please enter complete OTP');
            return;
        }

        const otp = [...inputs].map(input => input.value).join('');

        window.location.href = 'password_create.html';
    }

});
// >>---------------------------------------- //Otp js End// ---------------------------------------- <<
