document.querySelectorAll('.bg-img-cls').forEach((el) => {
    const src = el.getAttribute('src');
    const parent = el.parentElement;

    if (src && parent) {
        Object.assign(parent.style, {
            backgroundImage: `url(${src})`,
            backgroundSize: 'cover',
            backgroundRepeat: 'no-repeat',
            backgroundPosition: 'center top',
            display: 'block',
        });

        el.style.display = 'none';
    }
});
