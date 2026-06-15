// >>---------------------------------------- //Prism js Start// ---------------------------------------- <<
document.querySelectorAll(".toggle-code").forEach(input => {
    const target = document.querySelector(input.dataset.bsTarget);

    input.addEventListener("change", () => {
        if (input.checked) {
            target.style.display = "block";
            target.classList.add("code-overlay");
        } else {

            target.style.display = "none";
            target.classList.remove("code-overlay");
        }
    });
});
// >> ---------------------------------------- //Prism js End// ---------------------------------------- <<
