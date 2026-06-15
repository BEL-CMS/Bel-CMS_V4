//  >>--------------------------range_slider  js start --------------------------------<<
const sliders = [
    ['primary-slider', 40],
    ['secondary-slider', 55],
    ['success-slider', 65],
    ['danger-slider', 75]
];

sliders.forEach(([id, start]) => {
    const el = document.getElementById(id);
    if (el) {
        noUiSlider.create(el, {
            start,
            connect: 'lower',
            range: { min: 0, max: 100 }
        });
    }
});

// >>----------------------lockingSliders--------<<
function lockingSliders(slider1, slider2, val1, val2, btn) {
    let locked = false;

    noUiSlider.create(slider1, {
        start: 30,
        connect: 'lower',
        range: { min: 0, max: 100 }
    });

    noUiSlider.create(slider2, {
        start: 60,
        connect: 'lower',
        range: { min: 0, max: 100 }
    });

    slider1.noUiSlider.on('update', v => val1.textContent = Math.round(v));
    slider2.noUiSlider.on('update', v => val2.textContent = Math.round(v));

    const sync = (from, to) => {
        from.noUiSlider.on('slide', v => {
            if (locked) to.noUiSlider.set(v[0]);
        });
    };

    sync(slider1, slider2);
    sync(slider2, slider1);

    btn.addEventListener('click', () => {
        locked = !locked;
        btn.textContent = locked ? 'Unlock' : 'Lock';
    });
}

lockingSliders(
    document.getElementById('lockingSlider'),
    document.getElementById('lockingSlider2'),
    document.getElementById('val1'),
    document.getElementById('val2'),
    document.getElementById('lockBtn')
);

// >>-----------------values-slider------------------------<<

const valuesSlider = document.getElementById('values-slider');
const valuesForSlider = [1, 2, 3, 4, 5, 6, 7, 8, 10, 12, 14, 16, 20, 24, 28, 32];

const format = {
    to: function (value) {
        return valuesForSlider[Math.round(value)];
    },
    from: function (value) {
        return valuesForSlider.indexOf(Number(value));
    }
};

noUiSlider.create(valuesSlider, {
    start: 0,
    connect: 'lower',
    range: { min: 0, max: valuesForSlider.length - 1 },
    step: 2,
    tooltips: true,
    format: format,
    pips: { mode: 'steps', format: format },
});
valuesSlider.noUiSlider.set(5);

// >>------------------ hide-tooltips---------------------------<<

const sliderTooltip = document.getElementById('hide-tooltips');
noUiSlider.create(sliderTooltip, {
    start: 20,
    tooltips: true,
    connect: 'lower',
    range: { 'min': 0, 'max': 100 }
});

// >>-----------------slider-colored----------------------------<<

const coloredSlider = document.getElementById('slider-colored');
noUiSlider.create(coloredSlider, {
    start: [20, 32, 50, 70, 80, 90],
    connect: true,
    tooltips: [false, true, true, true, true, true],
    range: { 'min': 0, 'max': 100 }
});

const sliderConnects = coloredSlider.querySelectorAll('.noUi-connect');
const classes = ['c1-color', 'c2-color', 'c3-color', 'c4-color', 'c5-color'];

sliderConnects.forEach((slider, i) => {
    slider.classList.add(classes[i]);
});


// ---------------------------------------------

function colorPickerSliders(sliderSelector, resultEl) {
    const sliders = document.querySelectorAll(sliderSelector);
    const colors = [127, 127, 127];

    sliders.forEach((slider, i) => {
        noUiSlider.create(slider, {
            start: colors[i],
            connect: [true, false],
            orientation: 'vertical',
            direction: 'rtl',
            range: { min: 0, max: 255 }
        });

        slider.noUiSlider.on('update', (v) => {
            colors[i] = Math.round(v[0]);
            const rgb = `rgb(${colors.join(', ')})`;
            resultEl.style.backgroundColor = rgb;
            resultEl.textContent = rgb;
            resultEl.style.color = '#fff';
        });
    });
}

colorPickerSliders(
    '.vertical-sliders',
    document.getElementById('result')
);

//---------------------------------------------

const select = document.getElementById('select-input');
const numberInput = document.getElementById('number-input');
const slider = document.getElementById('html-input');

// >>---------------- Populate select options -------------<<
for (let i = -20; i <= 40; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    select.appendChild(option);
}

//>>-------------- Create slider ----------<<
noUiSlider.create(slider, {
    start: [10, 30],
    connect: true,
    range: {
        min: -20,
        max: 40
    }
});

//>>------------ Slider → Inputs -----------<<
slider.noUiSlider.on('update', (values, handle) => {
    const value = Math.round(values[handle]);

    if (handle === 0) {
        select.value = value;
    } else {
        numberInput.value = value;
    }
});

//>>----------- Select → Slider ------------<<
select.addEventListener('change', () => {
    slider.noUiSlider.set([select.value, null]);
});

// >>--------------- Number → Slider -----------------<<
numberInput.addEventListener('change', () => {
    slider.noUiSlider.set([null, numberInput.value]);
});
// >>--------------------------------------- // Range_slider  js End// ------------------------------------<< //
