
//  >>-----------------------------tabs  js start ----------------------------------<<
const checkboxes = document.querySelectorAll(".tab-position");
const cardBody = document.getElementById("cardBody");
const tabs = document.getElementById("tabs");
const tabContent = document.getElementById("tabContent"); // FIXED

checkboxes.forEach(chk => {
    chk.addEventListener("change", () => {

        // Allow only one checkbox
        checkboxes.forEach(c => {
            if (c !== chk) c.checked = false;
        });

        // Reset layout
        cardBody.classList.remove("flex-row", "vertical-right-tab", "vertical-tab");
        cardBody.insertBefore(tabs, tabContent);

        if (!chk.checked) return;

        switch (chk.value) {

            case "top":
                cardBody.insertBefore(tabs, tabContent);
                break;

            case "bottom":
                cardBody.appendChild(tabs);
                break;

            case "left":
                cardBody.classList.add("flex-row", "vertical-tab");
                cardBody.insertBefore(tabs, tabContent);
                break;

            case "right":
                cardBody.classList.add("flex-row", "vertical-right-tab");
                cardBody.appendChild(tabs);
                break;
        }
    });
});

// >>--------------------------tabs  js end --------------------------------<<
