(function () {
    "use strict";

    /* School Revenue */
    var options = {
        series: [{
            name: 'This Year',
            type: "column",
            data: [44, 30, 57, 80, 90, 55, 70, 43, 23, 54, 77, 34]
        }, {
            name: 'Last Year',
            type: "area",
            data: [30, 25, 36, 30, 45, 35, 64, 51, 59, 36, 39, 51]
        }],
        chart: {
            height: 320,
            type: 'line',
            stacked: !1,
            toolbar: {
                show: !1
            },
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 6,
                left: 0,
                blur: 0,
                color: 'var(--primary-color)',
                opacity: 0.05
            },
        },
        grid: {
            borderColor: '#f2f6f7',
            borderColor: "#f1f1f1",
            strokeDashArray: 2,
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            position: 'top'
        },
        colors: ["var(--primary-color)", "rgb(255, 73, 205)"],
        fill: {
            type: ['solid', 'gradient'],
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.4,
                opacityTo: 0.1,
                stops: [0, 90, 100],
                colorStops: [
                    [
                        {
                            offset: 0,
                            color: "var(--primary-color)",
                            opacity: 1
                        },
                        {
                            offset: 75,
                            color: "var(--primary-color)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: 'var(--primary-color)',
                            opacity: 1
                        }
                    ],
                    [
                        {
                            offset: 0,
                            color: "rgba(255, 73, 205, 0.1)",
                            opacity: 0.1
                        },
                        {
                            offset: 75,
                            color: "rgba(255, 73, 205, 0.1)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: 'rgba(255, 73, 205, 0.2)',
                            opacity: 1
                        }
                    ],
                ]
            }
        },
        stroke: {
            width: [1.5, 1.5],
            curve: "smooth",
            dashArray: [0, 4]
        },
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        legend: {
            show: true,
            position: 'top'
        },
        plotOptions: {
            bar: {
                columnWidth: "25%",
                borderRadius: 2
            }
        },
        tooltip: {
            enabled: true,
            theme: "dark",
        }
    };
    var chart1 = new ApexCharts(document.querySelector("#school-revenue"), options);
    chart1.render();
    /* School Revenue */

    /* Students Overview */
    var options = {
        series: [6560, 3354],
        chart: {
            height: 227,
            type: 'donut',
        },
        colors: ["var(--primary-color)", "rgba(255, 73, 205, 1)"],
        labels: ["Boys", "Girls"],
        legend: {
            show: false,
        },
        plotOptions: {
            pie: {
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
                            offsetY: -5
                        },
                        value: {
                            show: true,
                            fontSize: '22px',
                            color: undefined,
                            offsetY: 5,
                            fontWeight: 600,
                            formatter: function (val) {
                                return val + "%"
                            }
                        },
                        total: {
                            show: true,
                            showAlways: true,
                            label: 'Total Students',
                            fontSize: '14px',
                            fontWeight: 400,
                            color: '#495057',
                        }
                    }
                }
            }
        },
        stroke: {
            width: 0
        },
        dataLabels: {
            enabled: false,
            dropShadow: {
                enabled: false,
            },
        },
    };
    var chart1 = new ApexCharts(document.querySelector("#students-overview"), options);
    chart1.render();
    /* Students Overview */

    /* Attendance Overview */
    var options = {
        series: [
            {
                name: "Girls",
                data: [44, 42, 57, 86, 58, 55, 45],
            },
            {
                name: "Boys",
                data: [-34, -22, -37, -56, -21, -35, -34],
            },
        ],
        chart: {
            stacked: true,
            type: "bar",
            height: 365,
            toolbar: {
                show: false,
            },
        },
        grid: {
            borderColor: "#f1f1f1",
            strokeDashArray: 2,
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            }
        },
        colors: ["var(--primary-color)", "rgba(253, 175, 34, 1) "],
        plotOptions: {
            bar: {
                borderRadius: 2,
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "all",
                columnWidth: "25%",
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true,
            position: "top",
            fontFamily: "Mulish",
            markers: {
                width: 10,
                height: 10,
            },
        },
        yaxis: {
            show: false,
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            }
        },
        xaxis: {
            type: "month",
            categories: ["sun", "mon", "tue", "wed", "thu", "fri", "sat"],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                rotate: -90,
            },
        },
    };
    var chart = new ApexCharts(document.querySelector("#attendance-overview"), options);
    chart.render();
    /* Attendance Overview */

})();