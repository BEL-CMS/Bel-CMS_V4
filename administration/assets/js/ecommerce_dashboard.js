
// >>---------------------------------------- //E-commerce dashboard js Start// ---------------------------------------- <<
const options = {
    series: [
        {
            name: 'Profit',
            data: [18000, 21000, 15000, 19000, 17000]
        },
        {
            name: 'Spacer',
            data: [1500, 1500, 1500, 1500, 1500] // controls gap height
        },
        {
            name: 'Loss',
            data: [20000, 22000, 21000, 16000, 29000]
        }
    ],

    chart: {
        type: 'bar',
        height: 305,
        stacked: true,
        toolbar: { show: false },
        fontFamily: 'Lexend Deca, sans-serif'
    },

    plotOptions: {
        bar: {
            columnWidth: '60%',
            borderRadius: 10,
            borderRadiusApplication: 'around',
            borderRadiusWhenStacked: 'all'
        }
    },

    colors: ['rgba(var(--primary),1)', 'transparent', 'rgba(var(--info),1)'],

    fill: {
        type: ['solid', 'solid', 'pattern'],
        pattern: {
            style: 'slantedLines',
            width: 6,
            height: 6,
            strokeWidth: 2
        }
    },


    stroke: {
        width: 0
    },

    dataLabels: {
        enabled: false
    },

    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        axisBorder: { show: false },
        axisTicks: { show: false },
        labels: {
            style: {
                fontSize: '12px',
                colors: '#6c757d'
            }
        }
    },

    yaxis: {
        max: 50000,
        tickAmount: 5,
        labels: {
            formatter: val => `${val / 1000}k`,
            style: {
                fontSize: '12px',
                colors: '#6c757d'
            }
        }
    },

    grid: {
        strokeDashArray: 4,
        borderColor: '#e9ecef'
    },

    legend: {
        position: 'top',
        horizontalAlign: 'right',
        markers: {
            width: 8,
            height: 8,
            radius: 50
        }
    },

    tooltip: {
        shared: true,
        intersect: false
    },
    responsive: [
        {
            breakpoint: 1400,
            options: {
                chart: {
                    height: 285,
                },
            }
        },
    ]
};

new ApexCharts(document.querySelector("#eco-chart"), options).render();


const reachChartOptions = {
    chart: {
        type: 'bar',
        height: 180,
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


$(document).ready(function () {
    if ($.fn.slick) {
        $('.returning-customers-list').slick({
            vertical: true,
            slidesToShow: 3.5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            verticalSwiping: true,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 3,
                    }
                },
            ]
        });
    }
});
// >>---------------------------------------- //E-commerce dashboard js End// ---------------------------------------- <<
