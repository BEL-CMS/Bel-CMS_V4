(function () {
    'use strict';

    const secondary = getComputedStyle(document.documentElement).getPropertyValue('--secondary-rgb').trim();
    const warning = getComputedStyle(document.documentElement).getPropertyValue('--warning-rgb').trim();
    var options = {
        series: [1754, 1234, 878],
        labels: ["Mobile", "Tablet", "Desktop"],
        chart: {
            height: 260,
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
            curve: 'smooth',
            lineCap: 'round',
            colors: "#fff",
            width: 0,
            dashArray: 0,
        },
        plotOptions: {
            pie: {
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
                            fontFamily: "Montserrat, sans-serif",
                            offsetY: -5
                        },
                        value: {
                            show: true,
                            fontSize: '22px',
                            color: undefined,
                            offsetY: 5,
                            fontWeight: 600,
                            fontFamily: "Montserrat, sans-serif",
                            formatter: function (val) {
                                return val + "%"
                            }
                        },
                        total: {
                            show: true,
                            showAlways: true,
                            label: 'Total Audience',
                            fontSize: '14px',
                            fontWeight: 400,
                            color: '#495057',
                        }
                    }
                }
            }
        },
        colors: ["var(--primary-color)", `rgb(${secondary})`, `rgb(${warning})`],
    };
    var chart = new ApexCharts(document.querySelector("#sessions-device"), options);
    chart.render();
    /* Sessions By Device Chart */

    /* Audience Metrics */
    var options = {
        series: [
            {
                name: 'Views',
                type: 'column',
                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 45, 35]
            },
            {
                name: 'Followers',
                type: 'line',
                data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43, 27]
            },
        ],
        chart: {
            toolbar: {
                show: false
            },
            type: 'line',
            height: 330,
        },
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 3
        },
        colors: ["var(--primary-color)", "rgb(255, 73, 205)"],
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [1, 1.1],
            curve: ['straight', 'smooth'],
            dashArray: [0,2]
        },
        legend: {
            show: false,
        },
        xaxis: {
            axisBorder: {
                color: '#e9e9e9',
            },
        },
        plotOptions: {
            bar: {
                columnWidth: "30%",
                borderRadius: 2
            }
        },
    };
    var chart2 = new ApexCharts(document.querySelector("#audience-metrics"), options);
    chart2.render();
    /* Audience Metrics */

    /* Useres By Time */
    function generateData(count, yrange) {
        var i = 0;
        var series = [];
        while (i < count) {
            var x = (i + 1).toString();
            var y =
                Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

            series.push({
                x: x,
                y: y,
            });
            i++;
        }
        return series;
    }
    var options = {
        series: [
            {
                name: "1Am",
                data: generateData(7, {
                    min: 0,
                    max: 90,
                }),
            },
            {
                name: "4Am",
                data: generateData(7, {
                    min: 0,
                    max: 90,
                }),
            },
            {
                name: "8Am",
                data: generateData(7, {
                    min: 0,
                    max: 90,
                }),
            },
            {
                name: "12Am",
                data: generateData(7, {
                    min: 0,
                    max: 90,
                }),
            },
            {
                name: "3Pm",
                data: generateData(7, {
                    min: 0,
                    max: 90,
                }),
            },
            {
                name: "7Pm",
                data: generateData(7, {
                    min: 0,
                    max: 90,
                }),
            },
            {
                name: "12Pm",
                data: generateData(7, {
                    min: 0,
                    max: 90,
                }),
            },
        ],
        chart: {
            height: 262,
            type: "heatmap",
            toolbar: {
                show: false,
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: ["#32d484"],
        grid: {
            borderColor: "#f2f5f7",
        },
        xaxis: {
            categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            labels: {
                show: true,
                style: {
                    colors: "#8c9097",
                    fontSize: "11px",
                    fontWeight: 600,
                    cssClass: "apexcharts-xaxis-label",
                },
            },
        },
        yaxis: {
            labels: {
                show: true,
                style: {
                    colors: "#8c9097",
                    fontSize: "11px",
                    fontWeight: 600,
                    cssClass: "apexcharts-yaxis-label",
                },
            },
        },
    };
    var chart = new ApexCharts(document.querySelector("#users-by-time"), options);
    chart.render();
    /* Useres By Time */

    /* Avg Sessions Chart */
    var total = {
        chart: {
            type: 'bar',
            height: 280,
            toolbar: {
                show: false,
            }
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            dashArray: [0],
        },
        series: [{
            name: 'Value',
            data: [65, 38, 56, 22, 65, 96, 53]
        }],
        grid: {
            show: true,
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            },
            padding: {
                top: 2,
                right: 2,
                bottom: 2,
                left: 2
            },
            borderColor: '#f1f1f1',
            strokeDashArray: 3
        },
        yaxis: {
            min: 0,
            show: false,
            axisBorder: {
                show: false
            },
        },
        xaxis: {
            categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            axisBorder: {
                show: false
            },
        },
        plotOptions: {
            bar: {
                borderRadius: 2,
                columnWidth: "30%",
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: ["var(--primary-color)"],
        tooltip: {
            enabled: false,
        }
    }
    var total = new ApexCharts(document.querySelector("#analytics-avgsession"), total);
    total.render();
    /* Avg Sessions Chart */

})();