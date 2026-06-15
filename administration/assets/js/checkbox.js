// >>---------------------------------------- //checkbox js Start// ---------------------------------------- <<

document.querySelectorAll('.filled-item input').forEach(cb => {
    const item = cb.closest('.filled-item');

    // initial state
    item.classList.toggle('active', cb.checked);

    // on change
    cb.addEventListener('change', () => {
        item.classList.toggle('active', cb.checked);
    });
});
// >> ---------------------------------------- //checkbox js End// ---------------------------------------- <<
