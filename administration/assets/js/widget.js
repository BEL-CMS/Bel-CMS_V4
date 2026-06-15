const reachChartOptions = {
    chart: {
        type: 'bar',
        height: 165,
        stacked: true,
        toolbar: { show: false },
        fontFamily: 'Lexend Deca, sans-serif'
    },
    series: [
        {
            name: 'Orders',
            data: [1200, 1800, 1450, 2200, 1950, 2800]
        },
        {
            name: 'Revenue',
            data: [3200, 4500, 3900, 6100, 5400, 7200]
        }
    ],
    plotOptions: {
        bar: {
            borderRadius: 6,
            columnWidth: '40%',
        }
    },
    dataLabels: {
        enabled: false
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        labels: { show: false },
        axisBorder: { show: false },
        axisTicks: { show: false }
    },
    yaxis: {
        labels: {
            show: false,
            formatter: function (val) {
                return val >= 1000 ? (val / 1000) + 'k' : val;
            }
        }
    },
    grid: {
        strokeDashArray: 4
    },
    colors: [
        'rgba(var(--primary), 0.8)',
        'rgba(var(--success), 0.8)'
    ],
    tooltip: {
        x: {
            show: false
        },
        y: {
            formatter: function (val) {
                return val + ' orders';
            }
        }
    },
    legend: {
        show: false
    },
};

const chart = new ApexCharts(
    document.querySelector("#reachChart"),
    reachChartOptions
);
chart.render();

// >>----------  Chart js--------<<

const btcChartOptions = {
    chart: {
        type: 'area',
        height: 260,
        toolbar: { show: false },
        background: 'transparent',
        fontFamily: 'Lexend Deca, sans-serif'
    },

    series: [{
        name: 'BTC Price',
        data: [
            40250, 40020, 30220, 43580,
            35600, 32000, 43220, 38020, 42890,
        ]
    }],

    xaxis: {
        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue'],
        labels: {
            style: {
                colors: 'rgba(var(--dark),1)',
                fontSize: '12px'
            }
        },
        axisBorder: { show: false },
        axisTicks: { show: false }
    },

    yaxis: { show: false },

    stroke: {
        curve: 'smooth',
        width: 4
    },

    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            type: 'horizontal',
            shadeIntensity: 0.8,
            opacityFrom: 0.45,
            opacityTo: 0.05,
            stops: [0, 50, 100],
            colorStops: [
                { offset: 0, color: 'rgba(var(--danger),.4)' },
                { offset: 50, color: 'rgba(var(--success),.4)' },
                { offset: 100, color: 'rgba(var(--success),.4)' }
            ]
        }
    },

    grid: {
        borderColor: 'rgba(var(--secondary),.4)',
        strokeDashArray: 5
    },

    dataLabels: {
        enabled: true,
        formatter: val => `$${val.toLocaleString()}`,
        offsetY: -10,
        offsetX: 10,
        style: {
            fontSize: '11px',
            fontWeight: 600,
            colors: ['rgba(var(--white),.4)']
        },
        background: {
            enabled: true,
            borderRadius: 12,
            padding: 6,
            foreColor: 'rgba(var(--primary),1)',
            borderColor: 'rgba(var(--primary),1)',
        }
    },

    markers: {
        size: 5,
        strokeWidth: 3,
        borderColor: 'rgba(var(--primary),.5)'
    },

    tooltip: {
        theme: 'dark',
        y: {
            formatter: val => `$${val.toLocaleString()}`
        }
    },

    colors: ['rgba(var(--primary),1)']
};

new ApexCharts(
    document.querySelector("#btcChart"),
    btcChartOptions
).render();

// >>----------  Emoji js--------<<

document.addEventListener("DOMContentLoaded", () => {

    const emojis = document.querySelectorAll('.emoji');
    const label = document.getElementById('emojiLabel');

    emojis.forEach(emoji => {
        emoji.addEventListener('click', () => {

            emojis.forEach(e => e.classList.remove('active'));
            emoji.classList.add('active');

            label.innerText = emoji.dataset.label;
        });
    });

});

// >>--------------  js Fade js-------<<

document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".trader-slider .trader-item");
    let index = 0;

    if (!slides.length) return;

    slides[index].classList.add("active");

    setInterval(() => {
        slides[index].classList.remove("active");
        index = (index + 1) % slides.length;
        slides[index].classList.add("active");
    }, 2500);
});


//  >>--------  VolumeChart js -------<<

document.querySelectorAll(".volumeChart").forEach((el, index) => {
    const seriesLists = [
        [120, 125, 123, 130],
        [220, 210, 215, 205],
        [90, 95, 100, 98],
        [150, 155, 160, 158],
        [180, 175, 178, 182]
    ];

    const colorLists = [
        "rgba(var(--success))",
        "rgba(var(--danger))",
        "rgba(var(--primary))",
        "rgba(var(--warning))",
        "rgba(var(--info))"
    ];

    const marketChartOptions = {
        series: [{
            data: seriesLists[index]
        }],
        chart: {
            width: 60,
            height: 30,
            type: 'line',
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        colors: [colorLists[index]],
        fill: {
            opacity: 0.3
        },
        tooltip: {
            enabled: false
        }
    };

    new ApexCharts(el, marketChartOptions).render();
});


const tbody = document.getElementById("marketDraggableTable");
let draggedRow = null;

// >>--------  Draggable Row js-----------<<

tbody.querySelectorAll(".draggable-row").forEach(row => {

    row.addEventListener("dragstart", () => {
        draggedRow = row;
        row.classList.add("dragging");
    });

    row.addEventListener("dragend", () => {
        draggedRow = null;
        row.classList.remove("dragging");
    });

    row.addEventListener("dragover", e => {
        e.preventDefault();
        const targetRow = e.currentTarget;
        if (targetRow !== draggedRow) {
            const rect = targetRow.getBoundingClientRect();
            const next =
                (e.clientY - rect.top) / rect.height > 0.5;
            tbody.insertBefore(
                draggedRow,
                next ? targetRow.nextSibling : targetRow
            );
        }
    });
});


$(document).ready(function () {

    if ($.fn.DataTable) {
        $('#defaultDatatable').DataTable();
    } else {}

    document.addEventListener('click', function (e) {
        if (e.target.closest('.delete-btn')) {
            e.target.closest('tr').remove();
        }
    });

});