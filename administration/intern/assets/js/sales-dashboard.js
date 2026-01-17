(function () {
    "use strict"

    /* Sales Overview */
    var options = {
        series: [{
            name: "Total Orders",
            type: 'bar',
            data: [74, 85, 57, 56, 76, 35, 61, 98, 36, 50, 48, 29]
        },
        {
            name: "Total Sales",
            type: 'bar',
            data: [46, 35, 101, 98, 44, 55, 57, 56, 55, 34, 79, 46]
        },
        {
            name: "Revenue",
            type: 'line',
            data: [26, 45, 41, 78, 34, 65, 27, 46, 37, 65, 49, 23]
        }],
        chart: {
            toolbar: {
                show: false
            },
            type: 'line',
            height: 365,
            // stacked: true,
        },
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
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: "smooth",
            width: [5, 5, 2.5],
            lineCap: "round"
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "left",
            markers: {
                size: 4,
                strokeWidth: 0,
            },
        },
        yaxis: {
            axisBorder: {
                show: false,
                color: "rgba(119, 119, 142, 0.05)",
                offsetX: 0,
                offsetY: 0,
            },
            axisTicks: {
                show: true,
                borderType: "solid",
                color: "rgba(119, 119, 142, 0.05)",
                width: 6,
                offsetX: 0,
                offsetY: 0,
            },
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
                show: false,
                // formatter: function (y) {
                //     return y.toFixed(0) + "";
                // }
            }
        },
        xaxis: {
            type: 'month',
            axisBorder: {
                show: true,
                color: "rgba(119, 119, 142, 0.05)",
                offsetX: 0,
                offsetY: 0,
            },
            title: {
                style: {
                    color: '#adb5be',
                    fontSize: '5px',
                    fontFamily: 'poppins, sans-serif',
                    fontWeight: 600,
                    cssClass: 'apexcharts-yaxis-label',
                },
            },
        },
        plotOptions: {
            bar: {
                columnWidth: "70%",
                borderRadius: 2
            }
        },

        colors: ["var(--primary-color)", 'rgb(255, 73, 205)', "rgb(50, 212, 132)"],
    };
    var chart2 = new ApexCharts(document.querySelector("#sales-overview"), options);
    chart2.render();
    /* Sales Overview */

    /* Visitors Report */
    var options = {
        series: [{
            name: 'Desktop',
            data: [80, 50, 100, 30, 40, 20, 40],
        }, {
            name: 'Mobile',
            data: [20, 30, 40, 80, 20, 90, 35],
        }, {
            name: 'Others',
            data: [40, 76, 28, 16, 8, 10, 80],
        }],
        chart: {
            height: 260,
            type: "radar",
            toolbar: {
                show: false,
            },
        },
        colors: ["var(--primary-color)", "rgb(50, 212, 132)", "rgb(253, 175, 34)"],
        stroke: {
            width: 1,
        },
        fill: {
            opacity: 1,
        },
        markers: {
            size: 0,
        },
        legend: {
            show: true,
            position: "bottom",
            offsetY: 30,
            markers: {
                size: 4,
                strokeWidth: 0,
            },
        },
        plotOptions: {
            radar: {
                size: 100,
                polygons: {
                    fill: {
                        colors: ['var(--primary005)', 'var(--primary005)']
                    },

                }
            }
        },
        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        xaxis: {
            axisBorder: { show: false },
            labels: {
                style: {
                    fontSize: '9px',
                },
            },
        },
        yaxis: {
            axisBorder: { show: false },
            tickAmount: 5,
        },
    };
    var chart = new ApexCharts(document.querySelector("#visitors-report"), options);
    chart.render();
    /* Visitors Report */

})();