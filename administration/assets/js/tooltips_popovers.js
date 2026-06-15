//  >>---------------------------tooltips_popovers  js start -------------------------------<<
"use strict";

document.addEventListener("DOMContentLoaded", function () {

    const tooltipElements = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipElements.forEach(el => {
        new bootstrap.Tooltip(el);
    });

    const popoverElements = document.querySelectorAll('[data-bs-toggle="popover"]');
    popoverElements.forEach(el => {
        new bootstrap.Popover(el);
    });

});
//  >>---------------------------tooltips_popovers  js end ----------------------------------<<
