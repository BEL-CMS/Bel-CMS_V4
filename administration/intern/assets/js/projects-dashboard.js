(function () {
    "use strict";

    /* Task Activity */
    var options = {
        series: [44, 55, 67, 83],
        chart: {
            height: 235,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
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
                    },
                    total: {
                        show: true,
                        showAlways: true,
                        label: 'Total',
                        fontSize: '14px',
                        fontWeight: 400,
                        color: '#495057',
                    }
                }
            }
        },
        stroke: {
            lineCap: "round",
        },
        colors: ["var(--primary-color)", "rgb(255, 73, 205)", "rgb(50, 212, 132)", "rgb(253, 175, 34)"],
        labels: ['On-Going', 'Completed', 'Todo-Tasks', 'Pending'],
    };
    var chart = new ApexCharts(document.querySelector("#task-activity"), options);
    chart.render();
    /* Task Activity */

    /* Projects Overview */
    var options4 = {
        series: [
            {
                type: "bar",
                name: "Projects",
                data: [
                    {
                        x: "Jan",
                        y: 320,
                    },
                    {
                        x: "Feb",
                        y: 560,
                    },
                    {
                        x: "Mar",
                        y: 250,
                    },
                    {
                        x: "Apr",
                        y: 486,
                    },
                    {
                        x: "May",
                        y: 310,
                    },
                    {
                        x: "Jun",
                        y: 560,
                    },
                    {
                        x: "Jul",
                        y: 560,
                    },
                    {
                        x: "Aug",
                        y: 860,
                    },
                    {
                        x: "Sep",
                        y: 400,
                    },
                    {
                        x: "Oct",
                        y: 500,
                    },
                    {
                        x: "Nov",
                        y: 350,
                    },
                    {
                        x: "Dec",
                        y: 700,
                    },
                ],
            },
            {
                type: "area",
                name: "Revenue",
                data: [
                    {
                        x: "Jan",
                        y: 680,
                    },
                    {
                        x: "Feb",
                        y: 800,
                    },
                    {
                        x: "Mar",
                        y: 680,
                    },
                    {
                        x: "Apr",
                        y: 840,
                    },
                    {
                        x: "May",
                        y: 980,
                    },
                    {
                        x: "Jun",
                        y: 720,
                    },
                    {
                        x: "Jul",
                        y: 900,
                    },
                    {
                        x: "Aug",
                        y: 1000,
                    },
                    {
                        x: "Sep",
                        y: 850,
                    },
                    {
                        x: "Oct",
                        y: 950,
                    },
                    {
                        x: "Nov",
                        y: 750,
                    },
                    {
                        x: "Dec",
                        y: 860,
                    },
                ],
            },
            {
                type: "bar",
                name: "Tasks",
                chart: {
                    dropShadow: {
                        enabled: true,
                        enabledOnSeries: undefined,
                        top: 5,
                        left: 0,
                        blur: 3,
                        color: "#000",
                        opacity: 0.1,
                    },
                },
                data: [
                    {
                        x: "Jan",
                        y: 180,
                    },
                    {
                        x: "Feb",
                        y: 250,
                    },
                    {
                        x: "Mar",
                        y: 300,
                    },
                    {
                        x: "Apr",
                        y: 350,
                    },
                    {
                        x: "May",
                        y: 350,
                    },
                    {
                        x: "Jun",
                        y: 250,
                    },
                    {
                        x: "Jul",
                        y: 150,
                    },
                    {
                        x: "Aug",
                        y: 250,
                    },
                    {
                        x: "Sep",
                        y: 350,
                    },
                    {
                        x: "Oct",
                        y: 350,
                    },
                    {
                        x: "Nov",
                        y: 250,
                    },
                    {
                        x: "Dec",
                        y: 200,
                    },
                ],
            },
        ],
        chart: {
            type: "area",
            height: 408,
            animations: {
                speed: 100
            },
            toolbar: {
                show: false,
            },
            zoom: {
                enabled: false,
            },
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 6,
                left: 1,
                blur: 4,
                color: ['transparent', '#000', 'transparent'],
                opacity: 0.12
            },
        },
        colors: ["var(--primary-color)", "rgba(253, 175, 34, 1)", "rgba(50, 212, 132, 1)"],
        dataLabels: {
            enabled: false,
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
        fill: {
            type: 'gradient',
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
                            color: "var(--primary-color)",
                            opacity: 1
                        }
                    ],
                    [
                        {
                            offset: 0,
                            color: "rgba(253, 175, 34, 0.1)",
                            opacity: 1
                        },
                        {
                            offset: 75,
                            color: "rgba(253, 175, 34, 0.1)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: "rgba(253, 175, 34, 0.1)",
                            opacity: 1
                        }
                    ],
                    [
                        {
                            offset: 0,
                            color: "rgba(50, 212, 132, 1)",
                            opacity: 1
                        },
                        {
                            offset: 75,
                            color: "rgba(50, 212, 132, 1)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: "rgba(50, 212, 132, 1)",
                            opacity: 1
                        }
                    ],
                ]
            }
        },
        stroke: {
            curve: ["smooth", "smooth", "smooth"],
            width: [0, 2, 0],
            dashArray: [0, 2, 0],
        },
        xaxis: {
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return "$" + value;
                },
            },
        },
        plotOptions: {
            bar: {
                columnWidth: "30%",
                borderRadius: "2",
            },
        },
        tooltip: {
            y: [
                {
                    formatter: function (e) {
                        return void 0 !== e ? e.toFixed(0) : e;
                    },
                },
                {
                    formatter: function (e) {
                        return void 0 !== e ? e.toFixed(0) : e;
                    },
                },
                {
                    formatter: function (e) {
                        return void 0 !== e ? e.toFixed(0) : e;
                    },
                },
            ],
        },
        legend: {
            show: true,
            position: "top",
            markers: {
                size: 4,
                strokeWidth: 0,
            },
        },
    };
    var chart4 = new ApexCharts(document.querySelector("#projects-overview"), options4);
    chart4.render();
    /* Projects Overview */

})();