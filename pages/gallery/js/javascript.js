$(function () {
    const $slides = $('.slide');
    const $dots = $('.dot');
    const slideCount = $slides.length;
    let index = 0;
    let autoPlayId = null;
    const intervalMs = 4000;

    function goTo(i) {
        index = (i + slideCount) % slideCount;
        $slides.removeClass('is-active').eq(index).addClass('is-active');
        $dots.removeClass('is-active').eq(index).addClass('is-active');
    }

    function next() { goTo(index + 1); }
    function prev() { goTo(index - 1); }

    $('.next').on('click', () => { next(); restartAutoPlay(); });
    $('.prev').on('click', () => { prev(); restartAutoPlay(); });

    $dots.each(function (i) {
        $(this).on('click', () => { goTo(i); restartAutoPlay(); });
    });

    function startAutoPlay() {
        stopAutoPlay();
        autoPlayId = setInterval(next, intervalMs);
    }
    function stopAutoPlay() {
        if (autoPlayId) clearInterval(autoPlayId);
        autoPlayId = null;
    }
    function restartAutoPlay() { startAutoPlay(); }

    // Pause au survol desktop
    $('.slider').on('mouseenter', stopAutoPlay).on('mouseleave', startAutoPlay);

    // Init
    goTo(0);
    startAutoPlay();
});