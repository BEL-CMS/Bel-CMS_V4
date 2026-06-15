
// >>---------------------------------------- //Form-wizard js Start// ---------------------------------------- <<
jQuery(document).ready(function ($) {

    /* ===============================
       Helper: Validate current fieldset
    ================================ */
    function validateFieldset($fieldset) {
        let isValid = true;

        $fieldset.find('.wizard-required').each(function () {
            const $input = $(this);
            const $error = $input.siblings('.wizard-form-error');

            if (!$input.val()) {
                $error.slideDown();
                isValid = false;
            } else {
                $error.slideUp();
            }
        });

        return isValid;
    }

    /* ===============================
       NEXT BUTTON
    ================================ */
    $(document).on('click', '.next-btn', function () {
        const $fieldset = $(this).closest('.wizard-fieldset');
        const $wizard = $(this).closest('.form-wizard');

        if (!validateFieldset($fieldset)) return;

        $fieldset.removeClass('show')
            .next('.wizard-fieldset')
            .addClass('show');

        $wizard.find('.form-wizard-steps .active')
            .removeClass('active')
            .addClass('activated')
            .next()
            .addClass('active');

        $wizard.find('.vertica-wizard-steps .active')
            .removeClass('active')
            .addClass('activated')
            .next()
            .addClass('active');
    });

    /* ===============================
       PREVIOUS BUTTON
    ================================ */
    $(document).on('click', '.pre-btn', function () {
        const $fieldset = $(this).closest('.wizard-fieldset');
        const $wizard = $(this).closest('.form-wizard');

        $fieldset.removeClass('show')
            .prev('.wizard-fieldset')
            .addClass('show');

        $wizard.find('.form-wizard-steps .active')
            .removeClass('active')
            .prev()
            .removeClass('activated')
            .addClass('active');

        $wizard.find('.vertica-wizard-steps .active')
            .removeClass('active')
            .prev()
            .removeClass('activated')
            .addClass('active');
    });

    /* ===============================
       SUBMIT BUTTON
    ================================ */
    $(document).on('click', '.form-wizard-submit', function () {
        const $fieldset = $(this).closest('.wizard-fieldset');
        validateFieldset($fieldset);
    });

    /* ===============================
       INPUT FOCUS / BLUR
    ================================ */
    $(document).on('focus blur', '.form-control', function (e) {
        const $input = $(this);
        const $parent = $input.parent();
        const $error = $input.siblings('.wizard-form-error');

        if (e.type === 'focus' || $input.val()) {
            $parent.addClass('focus-input');
            $error.slideUp(200);
        } else {
            $parent.removeClass('focus-input');
        }
    });

});
// >> ---------------------------------------- //Form-wizard js End// ---------------------------------------- <<
