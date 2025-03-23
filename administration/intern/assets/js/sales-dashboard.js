(function () {
    "use strict";

    /* sales statistics */
    var options = {
        series: [{
            name: 'Sales',
            type: "line",
            data: [100, 210, 180, 454, 230, 320, 656, 830, 350, 350, 210, 410]
        }, {
            name: "Profit",
            type: "line",
            data: [200, 530, 110, 130, 480, 520, 780, 435, 475, 738, 454, 480],
        }],
        chart: {
            redrawOnWindowResize: true,
            height: 328,
            type: 'line',
            toolbar: {
                show: false
            },
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 7,
                left: 0,
                blur: 1,
                color: ["transparent", "rgb(0, 227, 210)"],
                opacity: 0.05,
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
            width: [1.5, 1.5],
            curve: "straight",
            dashArray: [0, 3],
        },
        legend: {
            show: true,
            fontSize: "12px",
            position: 'bottom',
            horizontalAlign: 'center',
            fontWeight: 500,
            height: 40,
            offsetX: 0,
            offsetY: 10,
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
        colors: ["var(--primary-color)", "rgb(0, 227, 210)"],
        yaxis: {
            title: {
                style: {
                    color: '#adb5be',
                    fontSize: '14px',
                    fontFamily: 'Rajdhani',
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
                        return y.toFixed(0) + " points";
                    }
                    return y;
                },
            },
        },
    }

    document.querySelector("#sales-statistics").innerHTML = '';
    var chart = new ApexCharts(document.querySelector("#sales-statistics"), options);
    chart.render();
    /* sales statistics */

    /* male users */
    var options = {
        series: [{
            name: "Transactions",
            data: [42, 11, 51, 35, 51, 32],
        }],
        chart: {
            height: 110,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            },
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 2,
                left: 0,
                blur: 2,
                color: 'var(--primary-color)',
                opacity: 0.1
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["var(--primary-color)"],
        legend: {
            display: false
        },
        stroke: {
            curve: 'straight',
            width: 1.5,
        },
        tooltip: {
            enabled: false,
            marker: {
                show: false
            }
        },
        grid: {
            show: false,
            borderColor: "#4fb7e3",
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
            row: {
                colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            enabled: false,
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            show: false,
            display: false,
            labels: {
                show: false,
            },
            tooltip: {
                enabled: false
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            tooltip: {
                enabled: false
            }
        },
        yaxis: {
            show: false,
            display: false,
            labels: {
                show: false,
            },
            tooltip: {
                enabled: false
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            tooltip: {
                enabled: false
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#male-users"), options);
    chart.render();
    /* male users */

    /* female users */
    var options = {
        series: [{
            name: "Transactions",
            data: [32, 51, 35, 51, 11, 32],
        }],
        chart: {
            height: 110,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            },
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 2,
                left: 0,
                blur: 2,
                color: 'rgb(0, 227, 210)',
                opacity: 0.1
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ["rgb(0, 227, 210)"],
        legend: {
            display: false
        },
        stroke: {
            curve: 'straight',
            width: 1.5,
        },
        tooltip: {
            enabled: false,
            marker: {
                show: false
            }
        },
        grid: {
            show: false,
            borderColor: "#4fb7e3",
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
            row: {
                colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            enabled: false,
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            show: false,
            display: false,
            labels: {
                show: false,
            },
            tooltip: {
                enabled: false
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            tooltip: {
                enabled: false
            }
        },
        yaxis: {
            show: false,
            display: false,
            labels: {
                show: false,
            },
            tooltip: {
                enabled: false
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            tooltip: {
                enabled: false
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#female-users"), options);
    chart.render();
    /* female users */

    /* recent orders */
    var options = {
        series: [1754, 634],
        labels: ["Delivered", "Cancelled"],
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
            curve: 'smooth',
            lineCap: 'round',
            colors: "#fff",
            width: 1,
            dashArray: 0,
        },
        plotOptions: {
            pie: {
                startAngle: -90,
                endAngle: 90,
                offsetY: 10,
                expandOnClick: false,
                donut: {
                    size: '70%',
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
                bottom: -100
            }
        },
        colors: ["var(--primary-color)", "rgba(0, 227, 210, 1)"],
    };
    var chart = new ApexCharts(document.querySelector("#recent-orders"), options);
    chart.render();
    /* recent orders */

    /* visitors report */
    var options = {
        series: [
            {
                name: "This Week",
                data: [25, 50, 30, 55, 20, 45, 30]
            },
            {
                name: "Previous Week",
                data: [35, 25, 40, 30, 45, 35, 60]
            }
        ],
        chart: {
            height: 290,
            type: 'line',
            toolbar: {
                show: false
            },
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 7,
                left: 0,
                blur: 1,
                color: ["transparent", "rgb(0, 227, 210)"],
                opacity: 0.05,
            },
        },
        colors: ['var(--primary-color)', 'rgb(0, 227, 210)'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'straight',
            width: 1.5,
            dashArray: [0, 3],
        },
        grid: {
            show: false,
            borderColor: '#f9f9fb87',
            row: {
                colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            axisBorder: {
                color: 'rgba(119, 119, 142, 0.15)',
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
        legend: {
            show: false,
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5
        }
    };
    document.getElementById('visitors').innerHTML = '';
    var chart = new ApexCharts(document.querySelector("#visitors"), options);
    chart.render();
    /* visitors report */

})();