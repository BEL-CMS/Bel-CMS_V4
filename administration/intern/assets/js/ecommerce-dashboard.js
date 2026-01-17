(function () {
    'use strict';

    /* Sales Revenue */
    var options2 = {
        series: [{
            name: 'Profit',
            data: [99, 15, 36, 63, 42, 120, 78, 51, 32, 62, 76, 32],
            type: 'bar',
        }, {
            name: 'Sales',
            data: [136, 150, 158, 115, 102, 156, 135, 151, 125, 68, 164, 163],
            type: 'area',
        }, {
            name: 'Revenue',
            data: [128, 148, 39, 152, 169, 129, 112, 148, 150, 117, 198, 120],
            type: 'line',
        }],
        chart: {
            height: 320,
            type: 'line',
            toolbar: {
                show: false,
            },
            background: 'none',
            fill: "#fff",
        },
        plotOptions: {
            bar: {
                borderRadius: 2,
                columnWidth: '30%',
            }
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
        colors: ["var(--primary-color)", "rgb(255, 73, 205)", "var(--primary03)"],
        background: 'transparent',
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: [2, 1.5, 2],
            dashArray: [0, 0, 6]
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true,
            position: 'top',
            markers: {
                width: 8,
                height: 8,
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            show: false,
            axisBorder: {
                show: false,
                color: 'rgba(119, 119, 142, 0.05)',
                offsetX: 0,
                offsetY: 0,
            },
            axisTicks: {
                show: false,
                borderType: 'solid',
                color: 'rgba(119, 119, 142, 0.05)',
                width: 6,
                offsetX: 0,
                offsetY: 0
            },
            labels: {
                rotate: -90,
            }
        },
        fill: {
            type: ['solid', 'gradient', 'solid'],
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
                    [
                        {
                            offset: 0,
                            color: 'var(--primary03)',
                            opacity: 1
                        },
                        {
                            offset: 75,
                            color: 'var(--primary03)',
                            opacity: 0.1
                        },
                        {
                            offset: 100,
                            color: 'var(--primary03)',
                            opacity: 1
                        }
                    ],
                ]
            }
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
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
    };
    var chart4 = new ApexCharts(document.querySelector("#sale-stats"), options2);
    chart4.render();
    /* Sales Revenue */

    /* Top Categories */
    var options = {
        series: [46000, 28500, 24500, 19600],
        labels: ["Mobile", "Desktop", "Tablet", "Others"],
        chart: {
            height: 255,
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
            width: 3,
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
                            offsetY: -30
                        },
                        value: {
                            show: true,
                            fontSize: '15px',
                            color: undefined,
                            offsetY: -25,
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
        colors: ["var(--primary-color)", "rgb(255, 73, 205)", "rgb(50, 212, 132)", "rgb(253, 175, 34)"],
    };
    var chart = new ApexCharts(document.querySelector("#top-categories"), options);
    chart.render();
    /* Top Categories */

})();