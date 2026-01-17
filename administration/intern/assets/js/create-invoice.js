(function () {
    'use strict'

    // Date issued 
    flatpickr("#invoice-date-issued", {
        disableMobile: true
    });

    // Due date 
    flatpickr("#invoice-date-due", {
        disableMobile: true
    });

    // for nummber of products selected 

    var value = 1,
        minValue = 0,
        maxValue = 30;

    let productMinusBtn = document.querySelectorAll(".product-quantity-minus")
    let productPlusBtn = document.querySelectorAll(".product-quantity-plus")
    productMinusBtn.forEach((element) => {
        element.onclick = () => {
            value = Number(element.parentElement.childNodes[3].value)
            if (value > minValue) {
                value = Number(element.parentElement.childNodes[3].value) - 1;
                element.parentElement.childNodes[3].value = value;
            }
        }
    })
    productPlusBtn.forEach((element) => {
        element.onclick = () => {
            if (value < maxValue) {
                value = Number(element.parentElement.childNodes[3].value) + 1;
                element.parentElement.childNodes[3].value = value;
            }
        }
    })

    /* dropzone */
    let myDropzone = new Dropzone(".dropzone", {
        maxFiles: 1,  // Allow only 1 file to be uploaded
        addRemoveLinks: true,  // Adds a remove link to each file preview
        dictRemoveFile: 'Remove',  // Change the text on the remove button if needed
    });

})();