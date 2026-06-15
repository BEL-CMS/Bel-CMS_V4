
// >>---------------------------------------- //input marks  js Start// ---------------------------------------- <<
document.addEventListener('DOMContentLoaded', () => {

    // helper
    function initCleave(selector, options) {
        document.querySelectorAll(selector).forEach(el => {
            if (!(el instanceof HTMLInputElement)) return;
            if (el.cleaveInstance) return;

            try {
                el.cleaveInstance = new Cleave(el, options);
            } catch (err) {
                console.error(`Error initializing Cleave for ${selector}:`, err);
            }
        });
    }

    // >>------ 1 Date Input--------<<
    initCleave('.cleave-input-date', {
        date: true,
        delimiter: '/',
        datePattern: ['d', 'm', 'Y']
    });

    initCleave('.month-input', {
        date: true,
        delimiter: '/',
        datePattern: ['d', 'm']
    });

    initCleave('.formatting-input', {
        date: true,
        delimiter: '/',
        datePattern: ['d', 'm', 'Y']
    });

    initCleave('.formatting-delimter', {
        date: true,
        delimiter: '.',
        datePattern: ['d', 'm', 'Y']
    });

    // **------ 2 Time Input**
    initCleave('.time-input', {
        time: true,
        timePattern: ['h', 'm', 's']
    });

    initCleave('.min-sec-input', {
        time: true,
        timePattern: ['h', 'm']
    });

    initCleave('.hours-min-input', {
        time: true,
        timePattern: ['h', 'm']
    });

    // >>------ 3 Custom Input--------<<
    initCleave('.contact-input', {
        numeral: true,
        delimiter: '-',
        blocks: [3, 3, 4]
    });

    initCleave('.formatting-contact', {
        delimiters: ['(', ')', '(', ')', '(', ')'],
        blocks: [0, 3, 0, 3, 0, 4, 0],
        uppercase: true
    });

    initCleave('.credit-input', { creditCard: true });

    initCleave('.numeral-input', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    initCleave('.price-input', {
        numeral: true,
        prefix: '$',
        signBeforePrefix: true
    });

    initCleave('.price-formatting', {
        numeral: true,
        prefix: '€',
        tailPrefix: true
    });

    initCleave('.prefix-input', {
        blocks: [6, 3, 3, 3],
        prefix: '253874'
    });

    initCleave('.prefix-del-input', {
        prefix: 'PREFIX',
        delimiters: ['-', '-', '.'],
        blocks: [6, 3, 3, 3, 2],
        uppercase: true
    });

});
// >>---------------------------------------- //input marks  js End// ---------------------------------------- <<
