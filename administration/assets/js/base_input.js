
// >>---------------------------------------- //Base Input  js Start// ---------------------------------------- <<
document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".js-email").forEach(input => {
        const clearBtn = input.closest(".form-floating").querySelector(".js-clear");

        input.addEventListener("input", () => {
            clearBtn.classList.toggle("d-none", input.value === "");
        });

        clearBtn.addEventListener("click", () => {
            input.value = "";
            clearBtn.classList.add("d-none");
            input.focus();
        });
    });


    document.querySelectorAll(".js-password").forEach(input => {
        const toggleBtn = input.closest(".form-floating").querySelector(".js-toggle-password");
        const icon = toggleBtn.querySelector("i");

        toggleBtn.addEventListener("click", () => {
            const show = input.type === "password";
            input.type = show ? "text" : "password";
            icon.classList.toggle("ti-eye");
            icon.classList.toggle("ti-eye-off");
        });
    });

});
// >> ---------------------------------------- //Base Input  js End// ---------------------------------------- <<
