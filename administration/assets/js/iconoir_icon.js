
// >>---------------------------------------- //Iconoir_icon js Start// ---------------------------------------- <<
// >>----------------- Notify function for iconoir-font icon copying-------------------<<
function iconoir_font(element) {
    copyTextToClipboard(`<i class="${element.children[0].className}"></i>`);
    showToast("Copied to the clipboard successfully", "success");
}

//>>----------Toastify wrapper for notifications----------<<
function showToast(message, type) {
    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: `rgba(var(--${type}), 1)`
        },
        onClick: function () {}
    }).showToast();
}

//>>----------- Handling input search for icons-----------<<
const input = document.querySelector('.icon-search-bar input');
const iconContainer = document.querySelector('ul.icon-list');
let icons = [];

document.querySelectorAll('li.icon-box').forEach(icon => {
    icons.push({
        el: icon,
        name: icon.querySelector('strong').innerHTML
    });
});

input.addEventListener('input', search);
function search(evt) {
    let searchValue = evt.target.value
    let iconsToShow = searchValue.length ? icons.filter(icon => {
        const existingName = icon.name.toLowerCase()
        return existingName.includes(searchValue.toLowerCase());
    }) : icons
    iconContainer.innerHTML = ''
    iconsToShow.forEach(icon => iconContainer.appendChild(icon.el))
}

function copyTextToClipboard(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
}

// >> ---------------------------------------- //Iconoir_icon js End// ---------------------------------------- <<
