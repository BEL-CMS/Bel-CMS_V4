(function () {
    'use strict';
    if (localStorage.getItem("scifidarktheme")) {
        document.querySelector("html").setAttribute("data-theme-mode", "dark")
    }
    if (localStorage.scifirtl) {
        let html = document.querySelector('html');
        html.setAttribute("dir", "rtl");
        document.querySelector("#style")?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.rtl.min.css");
            // rtlFn();
    }
    if (localStorage.getItem("scifilayout") == "horizontal") {
        document.querySelector("html").setAttribute("data-nav-layout", "horizontal") 
    }
    function localStorageBackup() {

        // if there is a value stored, update color picker and background color
        // Used to retrive the data from local storage
        if (localStorage.primaryRGB) {
            if (document.querySelector('.theme-container-primary')) {
                document.querySelector('.theme-container-primary').value = localStorage.primaryRGB;
            }
            document.querySelector('html').style.setProperty('--primary-rgb', localStorage.primaryRGB);
        }
        if (localStorage.scifidarktheme) {
            let html = document.querySelector('html');
            html.setAttribute('data-theme-mode', 'dark');
        }
        if (localStorage.scifirtl) {
            let html = document.querySelector('html');
            html.setAttribute('dir', 'rtl');
            document.querySelector("#style")?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.rtl.min.css");
            setTimeout(() => {
                rtlFn();
            }, 10);
        }
        if (localStorage.bgpattern) {
          let html = document.querySelector("html");
          let patternvalue = localStorage.getItem("bgpattern");
          html.setAttribute("data-pattern-img", patternvalue);
        }
        if (localStorage.cardStyle) {
          let html = document.querySelector("html");
          let cardstylevalue = localStorage.getItem("cardStyle");
          html.setAttribute("data-card-style", cardstylevalue);
        }
        if (localStorage.cardBackground) {
          let html = document.querySelector("html");
          let cardbgvalue = localStorage.getItem("cardBackground");
          html.setAttribute("data-card-background", cardbgvalue);
        }
    }
    localStorageBackup()

})();


function ltrFn() {
    let html = document.querySelector('html')
    if(!document.querySelector("#style").href.includes('bootstrap.min.css')){
        document.querySelector("#style")?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.min.css");
    }
    html.setAttribute("dir", "ltr");
}

function rtlFn() {
    let html = document.querySelector('html');
    html.setAttribute("dir", "rtl");
    document.querySelector("#style")?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.rtl.min.css");
}