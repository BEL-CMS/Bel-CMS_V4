/* total earnings */
var options = {
    series: [{
        name: 'Earnings',
        type: "column",
        data: [100, 210, 180, 454, -230, -320, 256, -430, - 350, -350, 210, 410],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 1,
                colorStops: [
                    {
                        offset: 0,
                        color: "#60a5fa",
                        opacity: 1,
                    },
                    {
                        offset: 100,
                        color: "#5a66f1",
                        opacity: 1,
                    },
                ],
            },
        },
    }, {
        name: "Stock Price",
        type: "line",
        data: [180, 620, 476, 220, 520, 780, 435, 515, 738, 454, 525, 230],
    }, {
        name: "Volume Of Trading",
        type: "line",
        data: [200, 530, 110, 130, 480, 520, 780, 435, 475, 738, 454, 480],
    }],
    chart: {
        redrawOnWindowResize: true,
        height: 335,
        type: 'bar',
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '20%',
            colors: {
                ranges: [{
                    from: -500,
                    to: 0,
                    color: 'var(--primary01)'
                }, {
                    from: 500,
                    to: 0,
                    color: 'var(--primary-color)'
                }]
            },
        },
    },
    grid: {
        borderColor: '#f1f1f1',
        strokeDashArray: 3
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [0, 1.5, 1.5],
        curve: "straight",
    },
    legend: {
        show: true,
        fontSize: "12px",
        position: 'bottom',
        horizontalAlign: 'center',
        fontWeight: 500,
        height: 40,
        offsetX: 0,
        offsetY: 20,
        labels: {
            colors: '#9ba5b7',
        },
        markers: {
            width: 7,
            height: 7,
            strokeWidth: 0,
            strokeColor: '#fff',
            fillColors: undefined,
            radius: 12,
            offsetX: 0,
            offsetY: 0
        },
    },
    colors: ["var(--primary-color)", "rgba(72, 247, 104)", 'rgb(255, 49, 49)'],
    yaxis: {
        title: {
            style: {
                color: '#adb5be',
                fontSize: '14px',
                fontFamily: 'poppins, sans-serif',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-label',
            },
        },
        labels: {
            formatter: function (y) {
                return y.toFixed(0) + "";
            },
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    xaxis: {
        type: "month",
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Dec'],
        axisBorder: {
            show: true,
            color: 'rgba(119, 119, 142, 0.05)',
            offsetX: 0,
            offsetY: 0,
        },
        axisTicks: {
            show: true,
            borderType: 'solid',
            color: 'rgba(119, 119, 142, 0.05)',
            width: 6,
            offsetX: 0,
            offsetY: 0
        },
        labels: {
            rotate: -90,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        shared: true,
        intersect: false,
        y: {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return y.toFixed(0);
                }
                return y;
            },
        },
    },
    fill: {
        colors: undefined,
        opacity: 0.025,
        type: ['solid', 'solid'],
        gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.5,
            gradientToColors: ['#fdc530'],
            inverseColors: true,
            opacityFrom: 0.35,
            opacityTo: 0.05,
            stops: [0, 50, 100],
            colorStops: ['#fdc530']
        }
    }
}
var chart = new ApexCharts(document.querySelector("#total-earnings"), options);
chart.render();
/* total earnings */

/* portfolio value */
var options = {
    series: [
        {
            name: "Portfolio Value",
            data: [15, 30, 22, 49, 32, 45, 30, 45, 65, 45, 25, 45],
        }
    ],
    chart: {
        type: "area",
        height: 260,
        toolbar: {
            show: false
        }
    },
    colors: [
        "var(--primary-color)"
    ],
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 0.9,
            opacityFrom: 0.4,
            opacityTo: 0.5,
            stops: [0, 75]
        }
    },
    grid: {
        show: false,
        xaxis: {
            lines: {
                show: false
            }
        },
        yaxis: {
            lines: {
                show: false
            }
        },
    },
    dataLabels: {
        enabled: false,
    },
    legend: {
        show: true,
        position: "top",
    },
    stroke: {
        curve: 'stepline',
        width: [1]
    },
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.4,
            opacityTo: 0.1,
            stops: [0, 90, 100],
            colorStops: [
                [
                    {
                        offset: 0,
                        color: "var(--primary005)",
                        opacity: 1
                    },
                    {
                        offset: 75,
                        color: "var(--primary005)",
                        opacity: 1
                    },
                    {
                        offset: 100,
                        color: "var(--primary005)",
                        opacity: 1
                    }
                ]
            ]
        }
    },
    yaxis: {
        min: 0,
        show: false
    },
    xaxis: {
        type: "month",
        categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "sep",
            "oct",
            "nov",
            "dec",
        ],
        axisBorder: {
            show: false,
            color: "rgba(119, 119, 142, 0.05)",
            offsetX: 0,
            offsetY: 0,
        },
        axisTicks: {
            show: false,
            borderType: "solid",
            color: "rgba(119, 119, 142, 0.05)",
            width: 6,
            offsetX: 0,
            offsetY: 0,
        },
        labels: {
            rotate: -90,
        },
    },
};
var chart = new ApexCharts(document.querySelector("#portfolio-value"), options);
chart.render();
/* portfolio value */

/* stock market value */
var spark4 = {
    chart: {
        type: 'line',
        height: 20,
        width: 120,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 0,
            left: 0,
            blur: 3,
            color: '#000',
            opacity: 0.1
        }
    },
    stroke: {
        show: true,
        curve: 'smooth',
        lineCap: 'butt',
        colors: undefined,
        width: 1.5,
        dashArray: 0,
    },
    fill: {
        gradient: {
            enabled: false
        }
    },
    tooltip: {
        enabled: false,
    },
    series: [{
        name: 'Value',
        data: [0, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46]
    }],
    yaxis: {
        min: 0,
        show: false
    },
    xaxis: {
        axisBorder: {
            show: false
        },
    },
    yaxis: {
        axisBorder: {
            show: false
        },
    },
    colors: ['rgb(72, 247, 104)'],

}
var spark4 = new ApexCharts(document.querySelector("#apple-stock-graph"), spark4);
spark4.render();

var spark5 = {
    chart: {
        type: 'line',
        height: 20,
        width: 120,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 0,
            left: 0,
            blur: 3,
            color: '#000',
            opacity: 0.1
        }
    },
    stroke: {
        show: true,
        curve: 'smooth',
        lineCap: 'butt',
        colors: undefined,
        width: 1.5,
        dashArray: 0,
    },
    fill: {
        gradient: {
            enabled: false
        }
    },
    tooltip: {
        enabled: false,
    },
    series: [{
        name: 'Value',
        data: [0, 45, 54, 38, 56, 24, 65, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 31, 37, 39, 62, 51, 35, 41]
    }],
    yaxis: {
        min: 0,
        show: false
    },
    xaxis: {
        axisBorder: {
            show: false
        },
    },
    yaxis: {
        axisBorder: {
            show: false
        },
    },
    colors: ['rgb(253, 77, 77)'],

}
var spark5 = new ApexCharts(document.querySelector("#nvidia-stock-graph"), spark5);
spark5.render();

var spark6 = {
    chart: {
        type: 'line',
        height: 20,
        width: 120,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 0,
            left: 0,
            blur: 3,
            color: '#000',
            opacity: 0.1
        }
    },
    stroke: {
        show: true,
        curve: 'smooth',
        lineCap: 'butt',
        colors: undefined,
        width: 1.5,
        dashArray: 0,
    },
    fill: {
        gradient: {
            enabled: false
        }
    },
    tooltip: {
        enabled: false,
    },
    series: [{
        name: 'Value',
        data: [61, 27, 54, 43, 19, 46, 31, 37, 39, 0, 45, 54, 38, 56, 24, 65, 35, 27, 93, 53, 62, 51, 35, 41]
    }],
    yaxis: {
        min: 0,
        show: false
    },
    xaxis: {
        axisBorder: {
            show: false
        },
    },
    yaxis: {
        axisBorder: {
            show: false
        },
    },
    colors: ['rgb(72, 247, 104)'],

}
var spark6 = new ApexCharts(document.querySelector("#amazon-stock-graph"), spark6);
spark6.render();

var spark7 = {
    chart: {
        type: 'line',
        height: 20,
        width: 120,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 0,
            left: 0,
            blur: 3,
            color: '#000',
            opacity: 0.1
        }
    },
    stroke: {
        show: true,
        curve: 'smooth',
        lineCap: 'butt',
        colors: undefined,
        width: 1.5,
        dashArray: 0,
    },
    fill: {
        gradient: {
            enabled: false
        }
    },
    tooltip: {
        enabled: false,
    },
    series: [{
        name: 'Value',
        data: [61, 27, 54, 43, 19, 56, 24, 65, 35, 27, 93, 53, 46, 31, 37, 39, 0, 45, 54, 38, 62, 51, 35, 41]
    }],
    yaxis: {
        min: 0,
        show: false
    },
    xaxis: {
        axisBorder: {
            show: false
        },
    },
    yaxis: {
        axisBorder: {
            show: false
        },
    },
    colors: ['rgb(72, 247, 104)'],

}
var spark7 = new ApexCharts(document.querySelector("#microsoft-stock-graph"), spark7);
spark7.render();

var spark8 = {
    chart: {
        type: 'line',
        height: 20,
        width: 120,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 0,
            left: 0,
            blur: 3,
            color: '#000',
            opacity: 0.1
        }
    },
    stroke: {
        show: true,
        curve: 'smooth',
        lineCap: 'butt',
        colors: undefined,
        width: 1.5,
        dashArray: 0,
    },
    fill: {
        gradient: {
            enabled: false
        }
    },
    tooltip: {
        enabled: false,
    },
    series: [{
        name: 'Value',
        data: [61, 27, 54, 37, 39, 0, 45, 54, 38, 62, 51, 35, 41, 43, 19, 56, 24, 65, 35, 27, 93, 53, 46, 31]
    }],
    yaxis: {
        min: 0,
        show: false
    },
    xaxis: {
        axisBorder: {
            show: false
        },
    },
    yaxis: {
        axisBorder: {
            show: false
        },
    },
    colors: ['rgb(253, 77, 77)'],

}
var spark8 = new ApexCharts(document.querySelector("#alphabet-stock-graph"), spark8);
spark8.render();

var spark9 = {
    chart: {
        type: 'line',
        height: 20,
        width: 120,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 0,
            left: 0,
            blur: 3,
            color: '#000',
            opacity: 0.1
        }
    },
    stroke: {
        show: true,
        curve: 'smooth',
        lineCap: 'butt',
        colors: undefined,
        width: 1.5,
        dashArray: 0,
    },
    fill: {
        gradient: {
            enabled: false
        }
    },
    tooltip: {
        enabled: false,
    },
    series: [{
        name: 'Value',
        data: [62, 51, 35, 41, 43, 19, 56, 24, 65, 35, 27, 93, 53, 46, 31, 61, 27, 54, 37, 39, 0, 45, 54, 38]
    }],
    yaxis: {
        min: 0,
        show: false
    },
    xaxis: {
        axisBorder: {
            show: false
        },
    },
    yaxis: {
        axisBorder: {
            show: false
        },
    },
    colors: ['rgb(253, 77, 77)'],

}
var spark9 = new ApexCharts(document.querySelector("#mastercard-stock-graph"), spark9);
spark9.render();
/* stock market value */