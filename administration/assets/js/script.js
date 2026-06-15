// -----------------------------------------------------------------------------------

//     Template Name: alina Admin
//     Template URI: http://admin.la-themes.com/alina/theme
//     Description: This is Admin theme
//     Author: la-themes
//     Author URI: https://themeforest.net/user/la-themes

// -----------------------------------------------------------------------------------

/* ----------------

01. Sidebar js
    1.1 Sidebar Menu Active js
    1.2 Scroll js
    1.3 Main Side Nav Toggle  js

02. Loader Wrapper Js

03. Header js
    3.1 Flag dropdown js
    3.2 Maximize Screen js
    3.3 Dark Mode js
    3.4 Delete Notification Items js
    3.5 Cart Items js

04. Tap to top js


----------------   */

//* ------------------------------------------------------
//-----  01. Sidebar js ----------------
//* ------------------------------------------------------

// >>-- 1.1 Sidebar Menu Active js --<<

const navLinks = document.querySelectorAll('.semi-side-nav .nav-link');
const allMenus = document.querySelectorAll('.main-side-menu .main-menu');


// Handle left-side icon clicks
navLinks.forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
        activateMenu(link.getAttribute('data-target'));
    });
});

// Expand all parent collapses recursively
function expandParents(element) {
    let parentCollapse = element.closest(".main-side-menu ul.collapse");

    while (parentCollapse) {
        parentCollapse.classList.add("show");

        const trigger = parentCollapse.previousElementSibling;
        if (trigger) {
            trigger.classList.remove("collapsed");
            trigger.setAttribute("aria-expanded", "true");
        }

        parentCollapse = parentCollapse.parentElement.closest(".main-side-menu ul.collapse");
    }
}


document.addEventListener("DOMContentLoaded", () => {

    // initialize collapse for all first-level menus
    document.querySelectorAll('.main-menu > li > ul.collapse').forEach(menu => {
        new bootstrap.Collapse(menu, { toggle: false });
    });

    // accordion behavior
    document.querySelectorAll('.main-menu > li > a[data-bs-toggle="collapse"]')
        .forEach(link => {

            link.addEventListener('click', function () {

                const currentMenu = document.querySelector(this.getAttribute('href'));

                document.querySelectorAll('.main-menu > li > ul.collapse.show')
                    .forEach(openMenu => {
                        if (openMenu !== currentMenu) {
                            bootstrap.Collapse.getInstance(openMenu).hide();
                        }
                    });

            });
        });

});

window.addEventListener("DOMContentLoaded", () => {
    const currentPage = window.location.pathname.split("/").pop();
    const match = document.querySelector(`.main-side-menu a[href="${currentPage}"]`);

    if (match) {
        const parentMenu = match.closest(".main-menu");
        const targetId = parentMenu.id;

        activateMenu(targetId);
        expandParents(match);

        match.classList.add("active");
    }
});

function activateMenu(targetId) {
    const wrapper = document.querySelector(".app-wrapper");
    const isHorizontal = wrapper?.classList.contains("sidebar-horizontal");

    navLinks.forEach(n => n.classList.remove('active'));

    const icon = document.querySelector(`.nav-link[data-target="${targetId}"]`);
    if (icon) icon.classList.add("active");

    allMenus.forEach(menu => {
        if (isHorizontal) {
            menu.style.display = "block";
        } else {
            menu.style.display = (menu.id === targetId) ? "block" : "none";
        }
    });
}

// >>-- 1.2 Scroll js  --<<

const myElement = document.querySelector('.app-simple-bar');
if (myElement) {
    new SimpleBar(myElement, {autoHide: true });
}

// >>-- 1.3 Main Side Nav Toggle  js  --<<

const toggleBtn = document.querySelector('.main-side-toggle');
const sideToggle = document.querySelector('.side-toggle');
const appSidebar = document.querySelector('.app-navbar');
const sideNavLinks = document.querySelectorAll('.semi-side-nav .navbar-menu-list .nav-link');
const semiNav = document.querySelector('.semi-side-nav');

// Button toggle
function toggleSidebar() {
    appSidebar.classList.toggle('side-nav-toggle');
}

// Both buttons open/close sidebar
toggleBtn.addEventListener('click', toggleSidebar);

toggleBtn.addEventListener('click', () => {
    if (window.innerWidth <= 576) {
        semiNav.classList.toggle('semi-nav-toggle');
    }
});

sideToggle.addEventListener('click', toggleSidebar);

sideToggle.addEventListener('click', () => {
    if (window.innerWidth <= 576) {
        semiNav.classList.toggle('semi-nav-toggle');
    }
});


// Default state based on screen width
function applyDefaultSidebarState() {
    if (window.innerWidth <= 1199) {
        appSidebar.classList.add('side-nav-toggle');
        semiNav.classList.add('semi-nav-toggle');
    } else {
        appSidebar.classList.remove('side-nav-toggle');
        semiNav.classList.remove('semi-nav-toggle');
    }
}


window.addEventListener('load', applyDefaultSidebarState);
window.addEventListener('resize', applyDefaultSidebarState);


// Auto-close sidebar when nav-link is clicked on small screens
sideNavLinks.forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth <= 1199) {
            appSidebar.classList.remove('side-nav-toggle');
        }
    });
});

function applySemiSidebarState() {
    if (window.innerWidth <= 576) {
        semiNav.classList.add('semi-nav-toggle');
    } else {
        semiNav.classList.remove('semi-nav-toggle');
    }
}
window.addEventListener('load', applySemiSidebarState);
window.addEventListener('resize', applySemiSidebarState);




//* ------------------------------------------------------
//-----  02. Loader Wrapper Js ----------------
//* ------------------------------------------------------

$('.loader-wrapper').fadeOut('slow', function () {
  $(this).remove();
});


//* ------------------------------------------------------
    //-----  03. Header js ----------------
//* ------------------------------------------------------

// >>-- 3.1  Flag dropdown js  --<<

document.querySelectorAll('.language-dropdown .dropdown-item').forEach(item => {
    item.addEventListener('click', function () {

        document.querySelectorAll('.language-dropdown .dropdown-item')
            .forEach(i => i.classList.remove('selected'));

        this.classList.add('selected');

        let newImgSrc = this.querySelector('img').getAttribute('src');

        document.querySelector('.head-icon img').setAttribute('src', newImgSrc);

    });
});

// >>-- 3.2  Maximize Screen js  --<<

document.querySelector('.head-maximize-screen .head-icon')
    .addEventListener('click', function () {

        if (!document.fullscreenElement) {
            // Enter fullscreen
            document.documentElement.requestFullscreen();
        } else {
            // Exit fullscreen
            document.exitFullscreen();
        }
    });


// >>-- 3.3  Dark Mode js  --<<

const icon = document.getElementById("theme-icon");

// Apply saved theme
(function () {
    const theme = localStorage.getItem("theme-mode") || "dark";
    document.body.className = theme;
    icon.className = theme === "dark" ? "ti ti-moon-stars" : "ti ti-sun";
})();

// Toggle theme
document.querySelector(".header-dark")?.addEventListener("click", () => {
    const isDark = document.body.classList.contains("dark");
    const newTheme = isDark ? "dark" : "dark";

    // Remove previous theme class
    document.body.classList.remove("dark");

    // Add new theme class
    document.body.classList.add(newTheme);

    // Save theme
    localStorage.setItem("theme-mode", newTheme);

    // Update icon
    icon.className = newTheme === "dark" ? "ti ti-moon-stars" : "ti ti-sun";
});


// >>-- 3.4  Delete Notification Items js  --<<

function initNotifications() {
    const boxes = document.querySelectorAll(".notification-message");

    boxes.forEach(box => {
        box.querySelector(".box-close").addEventListener("click", () => {

            // Smooth fade + slide animation
            box.style.transition = "opacity 0.3s ease, transform 0.3s ease";
            box.style.opacity = "0";
            box.style.transform = "translateX(-15px)";

            setTimeout(() => {
                box.remove();
                checkEmptyNotifications();
            }, 300);
        });
    });
}

function checkEmptyNotifications() {
    const notifications = document.querySelectorAll(".notification-message");
    const emptyBox = document.querySelector(".hidden-notification-massage");

    if (notifications.length === 0) {
        emptyBox.classList.remove("d-none");
    }
}

document.addEventListener("DOMContentLoaded", initNotifications);


// >>-- 3.5  Cart Items js  --<<

function initCart() {

    const totalPriceBox = document.querySelector('.offcanvas-footer h6');
    const cartCountEl = document.querySelector('.cartCount');
    const emptyMessage = document.querySelector('.hidden-cart-massage');

    function updateEmptyState() {
        const count = document.querySelectorAll('.cart-box').length;

        if (count === 0) {
            emptyMessage.classList.remove("d-none");
        } else {
            emptyMessage.classList.add("d-none");
        }
    }

    // Update item count
    function updateCartCount() {
        const count = document.querySelectorAll('.cart-box').length;
        cartCountEl.textContent = count;
        updateEmptyState();
    }

    function updateTotalPrice() {
        let total = 0;

        document.querySelectorAll('.cart-box .price').forEach(priceBox => {
            total += parseFloat(priceBox.textContent.replace('$', ''));
        });

        totalPriceBox.textContent = '$' + total.toFixed(2);
    }

    function attachDeleteEvents() {
        document.querySelectorAll('.cart-box-close').forEach((btn) => {
            btn.addEventListener('click', function () {
                const cartItem = this.closest('.cart-box');

                cartItem.style.transition = "opacity 0.3s ease, transform 0.3s ease";
                cartItem.style.opacity = "0";
                cartItem.style.transform = "translateX(-15px)";

                setTimeout(() => {
                    cartItem.remove();
                    updateCartCount();
                    updateTotalPrice();
                }, 300);
            });
        });
    }


    updateCartCount();
    updateTotalPrice();
    attachDeleteEvents();
}

initCart();

//* ------------------------------------------------------
//-----  04. Tap to top js ----------------
//* ------------------------------------------------------

let calcScrollValue = () => {
    const $scrollProgress = document.getElementsByClassName("go-top")[0];
    const docElement = document.documentElement;

    const pos = docElement.scrollTop;
    const calcHeight = docElement.scrollHeight - docElement.clientHeight;
    const scrollValue = Math.round((pos * 100) / calcHeight);

    if (pos > 100) {
        $scrollProgress.style.display = 'grid';
    } else {
        $scrollProgress.style.display = 'none';
    }

    $scrollProgress.addEventListener("click", () => {
        docElement.scrollTop = 0;
    });

    $scrollProgress.style.background = `conic-gradient(rgba(var(--dark), 1) ${scrollValue}%, rgba(var(--primary), 1) ${scrollValue}%)`;
};

window.onscroll = calcScrollValue;