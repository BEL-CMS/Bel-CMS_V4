
// >>---------misc js------------<<
function copyCode(btn) {
    const box = btn.closest(".snippet");
    const text = box.querySelector(".code").innerText;

    const showMsg = () => {
        let msg = box.querySelector(".copied-msg") ||
            Object.assign(document.createElement("div"), {
                className: "copied-msg",
                innerText: "Text copied!"
            });

        if (!box.querySelector(".copied-msg")) box.appendChild(msg);

        msg.classList.add("show");
        setTimeout(() => msg.classList.remove("show"), 2000);
    };

    const fallbackCopy = () => {
        const ta = document.createElement("textarea");
        ta.value = text;
        ta.style.position = "fixed";
        ta.style.opacity = "0";

        document.body.appendChild(ta);
        ta.focus();
        ta.select();

        try {
            document.execCommand("copy");
            showMsg();
        } catch (e) {
            console.error("Copy failed", e);
        }

        ta.remove();
    };

    navigator.clipboard?.writeText(text)
        .then(showMsg)
        .catch(fallbackCopy) || fallbackCopy();
}

