// >>---------------------------------------- //landing js Start// ---------------------------------------- <<

//* ------------------------------------------------------
//-----  01. ContentScroll js ----------------

const scrollBox = document.getElementById('contentScroll');
const tabs = document.querySelectorAll('#v-bg .nav-link');
const sections = document.querySelectorAll('.scroll-section');


tabs.forEach(tab => {
    tab.addEventListener('click', e => {
        e.preventDefault();
        const target = document.querySelector(tab.dataset.bsTarget);
        scrollBox.scrollTo({
            top: target.offsetTop,
            behavior: 'smooth'
        });
    });
});


scrollBox.addEventListener('scroll', () => {
    let current = null;

    sections.forEach(section => {
        if (scrollBox.scrollTop >= section.offsetTop - 200) {
            current = section.id;
        }
    });

    if (current) {
        tabs.forEach(tab => tab.classList.remove('active'));
        document
            .querySelector(`[data-bs-target="#${current}"]`)
            ?.classList.add('active');
    }
});


$(function () {
    const $navbar = $(".landing-navbar");
    const $container = $(".landing-navbar-container.container");

    const onScroll = () => {
        const isScrolled = $(window).scrollTop() > 0;
        $navbar.toggleClass("landing-navbar-active", isScrolled);
        $container.toggleClass("container-fluid", isScrolled);
    };

    $(window).on("scroll", onScroll);
});

//* ------------------------------------------------------
//-----  02.  Dark Mode Check Now js ----------------

function goToDarkMode() {
    localStorage.setItem("theme-mode", "dark");
    window.location.href = "index.html";
}

//* ------------------------------------------------------
//-----  03. Tap to top js ----------------

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

    $scrollProgress.style.background = `conic-gradient(rgba(var(--white), 1) ${scrollValue}%, rgba(var(--primary), 1) ${scrollValue}%)`;
};

window.onscroll = calcScrollValue;

//* ------------------------------------------------------
//-----  04. closeBtn js ----------------

document.querySelector(".landing-toggle-btn").addEventListener("click", function () {
    let nav = document.querySelector(".navbar-collapse");
    let bsCollapse = bootstrap.Collapse.getInstance(nav);

    if (bsCollapse) {
        bsCollapse.hide();
    }
});

// >> ---------------------------------------- //landing js End// ---------------------------------------- <<
