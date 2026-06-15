
//  >>-------------------------shadow js start --------------------------------<<
//---- code copy js---- //
function copyTextToClipboard(text) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text)
            .then(() => {
                showToast();
            })
            .catch(err => {
                console.error("Clipboard API failed:", err);
                fallbackCopy(text);
            });
    } else {
        fallbackCopy(text);
    }
}

function fallbackCopy(text) {
    const textarea = document.createElement("textarea");
    textarea.value = text;

    textarea.style.position = "fixed";
    textarea.style.left = "-9999px";

    document.body.appendChild(textarea);
    textarea.focus();
    textarea.select();

    try {
        document.execCommand("copy");
        showToast();
    } catch (err) {
        console.error("Fallback copy failed:", err);
    }

    document.body.removeChild(textarea);
}

function showToast() {
    Toastify({
        text: "Class name copied successfully",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "rgba(var(--success),1)"
        }
    }).showToast();
}

document.querySelectorAll(".box-shadow-box").forEach(element => {
    element.addEventListener("click", () => {
        const classNameToCopy = element.classList[1];

        if (classNameToCopy) {
            copyTextToClipboard(classNameToCopy);
        }
    });
});

//  >>-----------------------------shadow js end --------------------------------<<
