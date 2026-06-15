// >>--------------------------select js start ------------------------------<<
function initSelect2() {
    $('.basic-select2').select2({
        placeholder: 'Select option',
        allowClear: true,
        width: '100%'
    });

    $('.select-basic-multiple-four').select2({
        placeholder: 'Select options',
        width: '100%'
    });
    $('.select-primary').select2({
        placeholder: 'Select users',
        width: '100%'
    });
    $('.select-tags').select2({
        tags: true,
        placeholder: 'Add tags',
        width: '100%'
    });
    $('.select-disabled').select2({
        width: '100%'
    });
    $('.select-clear').select2({
        placeholder: 'Select status',
        allowClear: true,
        width: '100%'
    });
}

$(document).ready(function () {
    initSelect2();
});
//>>----------------------------select js end --------------------------------<<
