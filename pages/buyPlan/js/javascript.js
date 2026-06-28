if (typeof jQuery === 'undefined') {
    throw new Error('BEL-CMS requires jQuery')
}
(function($) {
    tinymce.init({
        plugins: 'autoresize',
        autoresize_min_height: 400,
        autoresize_max_height: 800
    });

})(jQuery);



document.addEventListener("DOMContentLoaded", () => {

    let timer;

    document.querySelectorAll(".check_ndd").forEach(input => {

        input.addEventListener("keyup", () => {

            const valeur = input.value;
            const type = input.dataset.type;
            const resultBox = input.nextElementSibling;

            clearTimeout(timer);

            if (valeur.length < 3) {
                resultBox.innerHTML = "ndd.bel-cms.dev";
                return;
            }

            timer = setTimeout(() => {

                fetch("buyPlan/checkNDD&json", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `valeur=${encodeURIComponent(valeur)}&type=${encodeURIComponent(type)}`
                })
                    .then(response => response.text())
                    .then(data => {
                        resultBox.innerHTML = data;
                    })
                    .catch(error => {
                        console.error("Erreur :", error);
                    });

            }, 400);

        });

    });

});


document.addEventListener("DOMContentLoaded", () => {

    let timer;

    document.querySelectorAll(".check_mail").forEach(input => {

        input.addEventListener("keyup", () => {

            const valeur = input.value;
            const type = input.dataset.type;
            const resultBox = input.nextElementSibling;

            clearTimeout(timer);

            if (valeur.length < 3) {
                resultBox.innerHTML = "exemple@bel-cms.dev";
                return;
            }

            timer = setTimeout(() => {

                fetch("buyPlan/checkMails&json", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `valeur=${encodeURIComponent(valeur)}&type=${encodeURIComponent(type)}`
                })
                    .then(response => response.text())
                    .then(data => {
                        resultBox.innerHTML = data;
                    })
                    .catch(error => {
                        console.error("Erreur :", error);
                    });

            }, 400);

        });

    });

});