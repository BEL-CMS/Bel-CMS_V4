/* Total Revenue Chart */
let options1 = {
    series: [{
        data: [0, 32, 18, 58]
    }],
    chart: {
        height: 40,
        width: 100,
        type: 'area',
        fontFamily: 'Rajdhani',
        foreColor: '#5d6162',
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    tooltip: {
        enabled: true,
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [1],
        show: true,
        curve: 'straight',
    },
    title: {
        text: undefined,
    },
    grid: {
        borderColor: 'transparent',
    },
    xaxis: {
        crosshairs: {
            show: false,
        }
    },
    colors: ["var(--primary-color)"],
    stroke: {
        width: [1.5],
    },
    fill: {
        type: 'gradient',
        gradient: {
            opacityFrom: 0.5,
            opacityTo: 0.2,
            stops: [0, 60],
            colorStops: [
                [
                    {
                        offset: 0,
                        color: 'var(--primary02)',
                        opacity: 1
                    },
                    {
                        offset: 60,
                        color: 'var(--primary02)',
                        opacity: 0.1
                    }
                ],
            ]
        }
    },
};
const chart = new ApexCharts(document.querySelector("#total-revenue1"), options1);
chart.render();
/* Total Revenue Chart */

/* Total Customers Chart */
let options2 = {
    series: [{
        data: [0, 32, 18, 58]
    }],
    chart: {
        height: 40,
        width: 100,
        type: 'area',
        fontFamily: 'Rajdhani',
        foreColor: '#5d6162',
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    tooltip: {
        enabled: true,
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    title: {
        text: undefined,
    },
    grid: {
        borderColor: 'transparent',
    },
    xaxis: {
        crosshairs: {
            show: false,
        }
    },
    colors: ["var(--primary-color)"],
    stroke: {
        width: [1.5],
    },
    fill: {
        type: 'gradient',
        gradient: {
            opacityFrom: 0.5,
            opacityTo: 0.2,
            stops: [0, 60],
            colorStops: [
                [
                    {
                        offset: 0,
                        color: 'var(--primary02)',
                        opacity: 1
                    },
                    {
                        offset: 60,
                        color: 'var(--primary02)',
                        opacity: 0.1
                    }
                ],
            ]
        }
    },
};
const chart2 = new ApexCharts(document.querySelector("#total-customers"), options2);
chart2.render();
/* Total Customers Chart */

/* Conversion Ratio Chart */
let options3 = {
    series: [{
        data: [0, 32, 18, 58]
    }],
    chart: {
        height: 40,
        width: 100,
        type: 'area',
        fontFamily: 'Rajdhani',
        foreColor: '#5d6162',
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    tooltip: {
        enabled: true,
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    title: {
        text: undefined,
    },
    grid: {
        borderColor: 'transparent',
    },
    xaxis: {
        crosshairs: {
            show: false,
        }
    },
    colors: ["var(--primary-color)"],
    stroke: {
        width: [1.5],
    },
    fill: {
        type: 'gradient',
        gradient: {
            opacityFrom: 0.5,
            opacityTo: 0.2,
            stops: [0, 60],
            colorStops: [
                [
                    {
                        offset: 0,
                        color: 'var(--primary02)',
                        opacity: 1
                    },
                    {
                        offset: 60,
                        color: 'var(--primary02)',
                        opacity: 0.1
                    }
                ],
            ]
        }
    },
};
const chart3 = new ApexCharts(document.querySelector("#conversion-ratio"), options3);
chart3.render();
/* Conversion Ratio Chart */

/* Conversion Ratio Chart */
let options4 = {
    series: [{
        data: [0, 32, 18, 58]
    }],
    chart: {
        height: 40,
        width: 100,
        type: 'area',
        fontFamily: 'Rajdhani',
        foreColor: '#5d6162',
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    tooltip: {
        enabled: true,
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    title: {
        text: undefined,
    },
    grid: {
        borderColor: 'transparent',
    },
    xaxis: {
        crosshairs: {
            show: false,
        }
    },
    colors: ["var(--primary-color)"],
    stroke: {
        width: [1.5],
    },
    fill: {
        type: 'gradient',
        gradient: {
            opacityFrom: 0.5,
            opacityTo: 0.2,
            stops: [0, 60],
            colorStops: [
                [
                    {
                        offset: 0,
                        color: 'var(--primary02)',
                        opacity: 1
                    },
                    {
                        offset: 60,
                        color: 'var(--primary02)',
                        opacity: 0.1
                    }
                ],
            ]
        }
    },
};
const chart4 = new ApexCharts(document.querySelector("#total-deals"), options4);
chart4.render();
/* Conversion Ratio Chart */

/* Performance Chart */
var options = {
    series: [{
        name: "Profit",
        type: "column",
        data: [33, 21, 32, 37, 23, 32, 47, 31, 54, 32, 20, 38]
    }, {
        name: "Revenue",
        type: "area",
        data: [44, 55, 41, 42, 22, 43, 21, 35, 56, 27, 43, 27]
    }, {
        name: "Sales",
        type: "line",
        data: [30, 25, 36, 30, 45, 35, 64, 51, 59, 36, 39, 51]
    }],
    chart: {
        height: 285,
        type: "line",
        stacked: !1,
        toolbar: {
            show: !1
        }
    },
    stroke: {
        width: [0, 0, 1.5],
        dashArray: [0, 0, 2],
        show: true,
        curve: 'straight',
        lineCap: 'butt',
    },
    grid: {
        borderColor: '#f2f6f7',
    },
    xaxis: {
        axisBorder: {
            color: 'rgba(119, 119, 142, 0.05)',
            offsetX: 0,
            offsetY: 0,
        },
        axisTicks: {
            color: 'rgba(119, 119, 142, 0.05)',
            width: 6,
            offsetX: 0,
            offsetY: 0
        },
    },
    tooltip: {
        y: [{
            formatter: function (e) {
                return void 0 !== e ? "$" + e.toFixed(0) : e
            }
        }, {
            formatter: function (e) {
                return void 0 !== e ? "$" + e.toFixed(0) : e
            }
        }, {
            formatter: function (e) {
                return void 0 !== e ? e.toFixed(0) : e
            }
        }]
    },
    plotOptions: {
        bar: {
            columnWidth: "20%",
        }
    },
    legend: {
        position: "top"
    },
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    markers: {
        size: 0
    },
    colors: ["var(--primary-color)", "rgba(255 ,255 ,255 ,0.05)", "rgb(235, 247, 72)"]
};
document.getElementById('performance').innerHTML = '';
var chart1 = new ApexCharts(document.querySelector("#performance"), options);
chart1.render();
/* Performance Chart */

/* Lead Source Opportunities */
var options = {
    series: [1754, 634, 878, 470],
    labels: ["Call", "Email", "Website", "Organic"],
    chart: {
        height: 250,
        type: 'donut',
    },
    dataLabels: {
        enabled: false,
    },

    legend: {
        show: false,
    },
    stroke: {
        show: true,
        curve: 'straight',
        lineCap: 'round',
        colors: "#fff",
        width: 0,
        dashArray: 0,
    },
    plotOptions: {
        pie: {
            startAngle: -90,
            endAngle: 90,
            offsetY: 10,
            expandOnClick: false,
            donut: {
                size: '85%',
                background: 'transparent',
                labels: {
                    show: true,
                    name: {
                        show: true,
                        fontSize: '20px',
                        color: '#495057',
                        offsetY: -25
                    },
                    value: {
                        show: true,
                        fontSize: '15px',
                        color: undefined,
                        offsetY: -20,
                        formatter: function (val) {
                            return val + "%"
                        }
                    },
                    total: {
                        show: true,
                        showAlways: true,
                        label: 'Total',
                        fontSize: '22px',
                        fontWeight: 600,
                        color: '#495057',
                    }

                }
            }
        }
    },
    grid: {
        padding: {
            bottom: -90
        }
    },
    colors: ["var(--primary-color)", "var(--primary07)", "var(--primary04)", "var(--primary01)"],
};
var chart5 = new ApexCharts(document.querySelector("#lead_source"), options);
chart5.render();
/* Lead Source Opportunities */

/* Revenue By Country */
var options = {
    series: [{
        name: 'Total',
        data: [41, 38, 34, 26, 18, 15]
    }],
    chart: {
        height: 283,
        type: 'bar',
        toolbar: {
            show: false,
        }
    },
    colors: ['var(--primary-color)'],
    plotOptions: {
        bar: {
            barHeight: '35%',
            distributed: true,
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show: true,
        position: 'bottom',
        horizontalAlign: 'center',
        fontWeight: 400,
        fontSize: '11px',
        offsetX: 0,
        offsetY: 10,
        labels: {
            colors: '#74767c',
        },
        markers: {
            width: 6,
            height: 6,
            strokeWidth: 0,
            radius: 12,
            offsetX: 0,
            offsetY: 0
        },
        itemMargin: {
            horizontal: 5,
            vertical: 5
        },
    },
    grid: {
        borderColor: '#f1f1f1',
        strokeDashArray: 3
    },
    xaxis: {
        categories: [
            ['Usa'],
            ['Russia'],
            ['Canada'],
            ['Indonesia'],
            ['China'],
            ['Uae'],
        ],
        labels: {
            show: false,
            style: {
                fontSize: '12px'
            },
        }
    },
    yaxis: {
        offsetX: 30,
        offsetY: 30,
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 300,
                cssClass: 'apexcharts-yaxis-label',
            },
            offsetY: 8,
        }
    },
    fill: {
        type: 'pattern',
        opacity: 1,
        pattern: {
            style: ['verticalLines', 'verticalLines', 'verticalLines', 'verticalLines', 'verticalLines', 'verticalLines'], // string or array of strings
        }
    },
    tooltip: {
        enabled: true,
        shared: false,
        intersect: true,
        x: {
            show: false
        }
    },
};
var chart6 = new ApexCharts(document.querySelector("#revenue-target"), options);
chart6.render();
/* Revenue By Country */

/* Visitors By Country Map */
var markers = [
    {
        name: "Usa",
        coords: [40.3, -101.38],
    },
    {
        name: "India",
        coords: [20.5937, 78.9629],
    },
    {
        name: "Vatican City",
        coords: [41.9, 12.45],
    },
    {
        name: "Canada",
        coords: [56.1304, -106.3468],
    },
    {
        name: "Mauritius",
        coords: [-20.2, 57.5],
    },
    {
        name: "Palau",
        coords: [7.35, 134.46],
    }
];
var map = new jsVectorMap({
    map: "world_merc",
    selector: "#visitors-countries",
    markersSelectable: true,
    zoomOnScroll: false,
    zoomButtons: false,

    onMarkerSelected(index, isSelected, selectedMarkers) {
        console.log(index, isSelected, selectedMarkers);
    },

    // -------- Labels --------
    labels: {
        markers: {
            render: function (marker) {
                return marker.name;
            },
        },
    },

    // -------- Marker and label style --------
    markers: markers,
    regionStyle: {
        initial: {
            stroke: "var(--primary-color)",
            strokeWidth: .5,
        }
    },
    markerStyle: {
        initial: {
            r: 3,
        },
        hover: {
            stroke: "#DDD",
            strokeWidth: 3,
            fill: "#FFF",
        },
        selected: {
            fill: "#ff525d",
        },
    },
    markerLabelStyle: {
        initial: {
            fontFamily: 'Rajdhani',
            fontSize: 12,
            fontWeight: 500,
            fill: "#ffffff",
        },
    },
});
/* Visitors By Country Map */