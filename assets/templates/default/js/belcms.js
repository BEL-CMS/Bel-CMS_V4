    $(window).on("load", function () {
			var endloading = $('#endloading').text();
    $('#belcms_genered').append(endloading);
		});
    function afficherHeure() {
        const maintenant = new Date();
    const heure = String(maintenant.getHours()).padStart(2, '0');
    const minute = String(maintenant.getMinutes()).padStart(2, '0');
    const seconde = String(maintenant.getSeconds()).padStart(2, '0');

    document.getElementById('heure').textContent =
    heure + ':' + minute + ':' + seconde;
    }
    setInterval(afficherHeure, 1000);
    afficherHeure();
    document.addEventListener('DOMContentLoaded', () => {
    const consentBox = document.getElementById('belcms-cookie-consent');
    const analyticsCheckbox = document.getElementById('analytics-consent');
    const savedConsent = localStorage.getItem('belcms_cookie_consent');

    if (!savedConsent) {
        consentBox.classList.remove('belcms-cookie-hidden');
    } else {
        applyConsent(JSON.parse(savedConsent));
    }
    function saveConsent(consent) {
        localStorage.setItem(
            'belcms_cookie_consent',
            JSON.stringify(consent)
        );
    applyConsent(consent);
    consentBox.classList.add('belcms-cookie-hidden');
    }

    function applyConsent(consent) {
        // Google Consent Mode v2
        window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}

    gtag('consent', 'default', {
        analytics_storage: consent.analytics ? 'granted' : 'denied',
    ad_storage: 'denied',
    ad_user_data: 'denied',
    ad_personalization: 'denied'
        });

    if (consent.analytics) {
        loadGoogleAnalytics();
        }
    }

    function loadGoogleAnalytics() {
        if (window.gaLoaded) return;
    window.gaLoaded = true;
    const script = document.createElement('script');
    script.async = true;
    script.src ='https://www.googletagmanager.com/gtag/js?id=GTM-MRZHPNQ8';
    document.head.appendChild(script);
    window.dataLayer = window.dataLayer || [];
    function gtag(){
        dataLayer.push(arguments);
        }
    gtag('js', new Date());
    gtag('config', 'GTM-MRZHPNQ8 ', {
        anonymize_ip: true
        });
    }
    document.getElementById(
    'belcms-cookie-accept'
    ).addEventListener('click', () => {
        saveConsent({
            analytics: true
        });
    });
    document.getElementById(
    'belcms-cookie-refuse'
    ).addEventListener('click', () => {
        saveConsent({
            analytics: false
        });
    });
    document.getElementById(
    'belcms-cookie-save'
    ).addEventListener('click', () => {
        saveConsent({
            analytics: analyticsCheckbox.checked
        });
    });
});