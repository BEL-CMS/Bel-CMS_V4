(function () {
    'use strict';

    var swiper = new Swiper(".swiper-view-details", {
        centeredSlides: true,
        centeredSlidesBounds: true,
        slidesPerView: 4,
        watchOverflow: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        direction: 'vertical',
        breakpoints: {
            0: {
              direction: "horizontal",
              spaceBetween: 5,
            },
            768: {
              direction: "vertical"
            }
          }
    });
    var swiper2 = new Swiper(".swiper-preview-details", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        }
    });

})();