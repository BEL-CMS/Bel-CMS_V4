// >>---------------------------whilst js start ----------------------------------<<
const heartIcons = document.querySelectorAll('.heart-icon');

heartIcons.forEach(function (icon) {
    icon.addEventListener('click', function () {
        this.classList.toggle('ti-heart-filled');
        this.classList.toggle('ti-heart');

        const wishlistBox = this.closest('.wishlist-product-box');
        if (wishlistBox) {
            wishlistBox.remove();
        }
    });
});
//  >>---------------------------whilst js end -------------------------------<<
