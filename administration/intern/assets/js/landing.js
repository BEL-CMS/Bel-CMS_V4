"use strict";

//switcher color pickers
const pickrContainerPrimary = document.querySelector(
  ".pickr-container-primary"
);
const themeContainerPrimary = document.querySelector(
  ".theme-container-primary"
);
/* for theme primary */
const nanoThemes = [
  [
    "nano",
    {
      defaultRepresentation: "RGB",
      components: {
        preview: true,
        opacity: false,
        hue: true,

        interaction: {
          hex: false,
          rgba: true,
          hsva: false,
          input: true,
          clear: false,
          save: false,
        },
      },
    },
  ],
];
const nanoButtons = [];
let nanoPickr = null;
for (const [theme, config] of nanoThemes) {
  const button = document.createElement("button");
  button.innerHTML = theme;
  nanoButtons.push(button);

  button.addEventListener("click", () => {
    const el = document.createElement("p");
    pickrContainerPrimary.appendChild(el);

    /* Delete previous instance */
    if (nanoPickr) {
      nanoPickr.destroyAndRemove();
    }

    /* Apply active class */
    for (const btn of nanoButtons) {
      btn.classList[btn === button ? "add" : "remove"]("active");
    }

    /* Create fresh instance */
    nanoPickr = new Pickr(
      Object.assign(
        {
          el,
          theme,
          default: "rgb(0, 255, 190)",
        },
        config
      )
    );

    /* Set events */
    nanoPickr.on("changestop", (source, instance) => {
      let color = instance.getColor().toRGBA();
      let html = document.querySelector("html");
      html.style.setProperty(
        "--primary-rgb",
        `${Math.floor(color[0])}, ${Math.floor(color[1])}, ${Math.floor(
          color[2]
        )}`
      );
      /* theme color picker */
      localStorage.setItem(
        "primaryRGB",
        `${Math.floor(color[0])}, ${Math.floor(color[1])}, ${Math.floor(
          color[2]
        )}`
      );
      updateColors();
    });
  });

  themeContainerPrimary.appendChild(button);
}
nanoButtons[0].click();
/* for theme primary */

/* footer year */
document.getElementById("year").innerHTML = new Date().getFullYear();
/* footer year */

let mainContent;
(function () {
  let html = document.querySelector("html");
  mainContent = document.querySelector(".main-content");

  localStorageBackup();
  switcherClick();
  checkOptions();
  /* LTR to RTL */
  // html.setAttribute("dir" , "rtl") // for rtl version
})();

function switcherClick() {
  let ltrBtn,
    rtlBtn,
    primaryDefaultColor1Btn,
    primaryDefaultColor2Btn,
    primaryDefaultColor3Btn,
    primaryDefaultColor4Btn,
    primaryDefaultColor5Btn,
    ResetAll;
  let html = document.querySelector("html");
  ltrBtn = document.querySelector("#switcher-ltr");
  rtlBtn = document.querySelector("#switcher-rtl");
  primaryDefaultColor1Btn = document.querySelector("#switcher-primary");
  primaryDefaultColor2Btn = document.querySelector("#switcher-primary1");
  primaryDefaultColor3Btn = document.querySelector("#switcher-primary2");
  primaryDefaultColor4Btn = document.querySelector("#switcher-primary3");
  primaryDefaultColor5Btn = document.querySelector("#switcher-primary4");
  ResetAll = document.querySelector("#reset-all");

    // primary theme
    let primaryColor1Var = primaryDefaultColor1Btn.addEventListener('click', () => {
      localStorage.setItem("primaryRGB", "0, 255, 0");
      html.style.setProperty('--primary-rgb', `0, 255, 0`);
      document.querySelector('html').style.setProperty('--theme-bg-gradient', "#011a01");
      document.querySelector('html').style.setProperty('--light-rgb', "1, 26, 1");
  })
  let primaryColor2Var = primaryDefaultColor2Btn.addEventListener('click', () => {
      localStorage.setItem("primaryRGB", "255, 235, 59");
      html.style.setProperty('--primary-rgb', `255, 235, 59`);
      document.querySelector('html').style.setProperty('--theme-bg-gradient', "#181601");
      document.querySelector('html').style.setProperty('--light-rgb', "24, 22, 1");
  })
  let primaryColor3Var = primaryDefaultColor3Btn.addEventListener('click', () => {
      localStorage.setItem("primaryRGB", "0, 254, 252");
      html.style.setProperty('--primary-rgb', `0, 254, 252`);
      document.querySelector('html').style.setProperty('--theme-bg-gradient', "#011813");
      document.querySelector('html').style.setProperty('--light-rgb', "1, 24, 19");
  })
  let primaryColor4Var = primaryDefaultColor4Btn.addEventListener('click', () => {
      localStorage.setItem("primaryRGB", "0, 175, 255");
      html.style.setProperty('--primary-rgb', `0, 175, 255`);
      document.querySelector('html').style.setProperty('--theme-bg-gradient', "#011118");
      document.querySelector('html').style.setProperty('--light-rgb', "1, 17, 24");
  })
  let primaryColor5Var = primaryDefaultColor5Btn.addEventListener('click', () => {
      localStorage.setItem("primaryRGB", "209, 115, 255");
      html.style.setProperty('--primary-rgb', `209, 115, 255`);
      document.querySelector('html').style.setProperty('--theme-bg-gradient', "#110118");
      document.querySelector('html').style.setProperty('--light-rgb', "17, 1, 24");
  })

  /* rtl start */
  let rtlVar = rtlBtn.addEventListener("click", () => {
    localStorage.setItem("scifirtl", true);
    localStorage.removeItem("scifiltr");
    rtlFn();
  });
  /* rtl end */

  /* ltr start */
  let ltrVar = ltrBtn.addEventListener("click", () => {
    //    local storage
    localStorage.setItem("scifiltr", true);
    localStorage.removeItem("scifirtl");
    ltrFn();
  });
  /* ltr end */

  // reset all start
  let resetVar = ResetAll.addEventListener("click", () => {
    // clear primary & bg color
    html.style.removeProperty(`--primary-rgb`);

    // clear rtl
    html.removeAttribute("dir", "rtl");
    html.setAttribute("dir", "ltr");

    ResetAllFn();
  });
  // reset all start
}

function ltrFn() {
  let html = document.querySelector("html");
  document
    .querySelector("#style")
    ?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.min.css");
  html.setAttribute("dir", "ltr");
  document.querySelector("#switcher-ltr").checked = true;
  checkOptions();
}

function rtlFn() {
  let html = document.querySelector("html");
  html.setAttribute("dir", "rtl");
  document
    .querySelector("#style")
    ?.setAttribute(
      "href",
      "../assets/libs/bootstrap/css/bootstrap.rtl.min.css"
    );
  checkOptions();
}

if (localStorage.scifirtl) {
  rtlFn();
}

function ResetAllFn() {
  let html = document.querySelector("html");
  checkOptions();

  // clearing localstorage
  localStorage.clear();

  //To reset the light-rgb
  document.querySelector('html').removeAttribute("style")

  // reseting chart colors
  updateColors();

  // reseting rtl
  ltrFn();

  // resetting theme primary
  document.querySelector("#switcher-primary").checked = false
  document.querySelector("#switcher-primary1").checked = false
  document.querySelector("#switcher-primary2").checked = false
  document.querySelector("#switcher-primary3").checked = false
  document.querySelector("#switcher-primary4").checked = false

}

function checkOptions() {

  //RTL
  if (localStorage.getItem("scifirtl")) {
    document.querySelector("#switcher-rtl").checked = true;
  }
}

// chart colors
let myVarVal, primaryRGB;
function updateColors() {
  "use strict";
  primaryRGB = getComputedStyle(document.documentElement)
    .getPropertyValue("--primary-rgb")
    .trim();
}
updateColors();

function localStorageBackup() {
  if (localStorage.primaryRGB) {
    if (document.querySelector(".theme-container-primary")) {
      document.querySelector(".theme-container-primary").value =
        localStorage.primaryRGB;
    }
    document
      .querySelector("html")
      .style.setProperty("--primary-rgb", localStorage.primaryRGB);
  }

  if (localStorage.primaryRGB) {
    if(localStorage.primaryRGB == "0, 255, 0"){
        document.querySelector("#switcher-primary").checked = true
        document.querySelector('html').style.setProperty('--theme-bg-gradient', "#011a01");
        document.querySelector('html').style.setProperty('--light-rgb', "1, 26, 1");
    }
    if(localStorage.primaryRGB == "255, 235, 59"){
        document.querySelector("#switcher-primary1").checked = true
        document.querySelector('html').style.setProperty('--theme-bg-gradient', "#181601");
        document.querySelector('html').style.setProperty('--light-rgb', "24, 22, 1");
    }
    if(localStorage.primaryRGB == "0, 254, 252"){
        document.querySelector("#switcher-primary2").checked = true
        document.querySelector('html').style.setProperty('--theme-bg-gradient', "#011813");
        document.querySelector('html').style.setProperty('--light-rgb', "1, 24, 19");
    }
    if(localStorage.primaryRGB == "0, 175, 255"){
        document.querySelector("#switcher-primary3").checked = true
        document.querySelector('html').style.setProperty('--theme-bg-gradient', "#011118");
        document.querySelector('html').style.setProperty('--light-rgb', "1, 17, 24");
    }
    if(localStorage.primaryRGB == "209, 115, 255"){
        document.querySelector("#switcher-primary4").checked = true
        document.querySelector('html').style.setProperty('--theme-bg-gradient', "#110118");
        document.querySelector('html').style.setProperty('--light-rgb', "17, 1, 24");
    }
  }

  if (localStorage.scifidarktheme) {
    let html = document.querySelector("html");
    html.setAttribute("data-theme-mode", "dark");
  }

  if (localStorage.scifirtl) {
    let html = document.querySelector("html");
    html.setAttribute("dir", "rtl");
  }
  if (localStorage.scifilayout) {
    let html = document.querySelector("html");
    let layoutValue = localStorage.getItem("scifilayout");
    html.setAttribute("data-nav-layout", "horizontal");
  }
}

// for menu target scroll on click
window.addEventListener("scroll", reveal);
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var cardTop = reveals[i].getBoundingClientRect().top;
    var cardRevealPoint = 150;
    if (cardTop < windowHeight - cardRevealPoint) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}
reveal();
const pageLink = document.querySelectorAll(".side-menu__item");
pageLink.forEach((elem) => {
  if (elem != "javascript:void(0);" && elem !== "#") {
    elem.addEventListener("click", (e) => {
      e.preventDefault();
      document.querySelector(elem.getAttribute("href"))?.scrollIntoView({
        behavior: "smooth",
        offsetTop: 1 - 60,
      });
    });
  }
});
// section menu active
function onScroll(event) {
  const sections = document.querySelectorAll(".side-menu__item");
  const scrollPos =
    window.pageYOffset ||
    document.documentElement.scrollTop ||
    document.body.scrollTop;

  sections.forEach((elem) => {
    const val = elem.getAttribute("href");
    let refElement;
    if (val != "javascript:void(0);" && val !== "#") {
      refElement = document.querySelector(val);
    }
    const scrollTopMinus = scrollPos + 73;
    if (
      refElement?.offsetTop <= scrollTopMinus &&
      refElement?.offsetTop + refElement.offsetHeight > scrollTopMinus
    ) {
      if (elem.parentElement.parentElement.classList.contains("child1")) {
        elem.parentElement.parentElement.parentElement.children[0].classList.add(
          "active"
        );
      }
      elem.classList.add("active");
      if (elem.closest(".child1")?.previousElementSibling) {
        elem.closest(".child1").previousElementSibling.classList.add("active");
      }
    } else {
      elem.classList.remove("active");
    }
  });
}
window.document.addEventListener("scroll", onScroll);
// for menu target scroll on click

// for testimonials
var swiper1 = new Swiper(".pagination-dynamic", {
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
    clickable: true,
  },
  slidesPerView: 1,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 50,
    },
    1400: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
  },
});

/* back to top */
const scrollToTop = document.querySelector(".scrollToTop");
const $rootElement = document.documentElement;
const $body = document.body;
window.onscroll = () => {
  const scrollTop = window.scrollY || window.pageYOffset;
  const clientHt = $rootElement.scrollHeight - $rootElement.clientHeight;
  if (window.scrollY > 100) {
    scrollToTop.style.display = "flex";
  } else {
    scrollToTop.style.display = "none";
  }
};
scrollToTop.onclick = () => {
  window.scrollTo(0, 0);
};
/* back to top */

 /* testimonial swiper service start */
 var swiper = new Swiper(".testimonialSwiperService", {
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
    clickable: true,
  },
  slidesPerView: 1,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 50,
    },
    1400: {
      slidesPerView: 2,
      spaceBetween: 50,
    },
  },
});
/* testimonial swiper service start */
