(function () {
    "use strict";

    /* profile analysis */
    var options = {
        series: [
            {
                name: "Facebook",
                data: [32, 15, 63, 51, 36, 62, 99, 42, 78, 76, 32, 20],
            },
            {
                name: "Instagram",
                data: [56, 58, 38, 50, 64, 45, 55, 32, 15, 63, 51, 36],
            },
            {
                name: "Twitter",
                data: [48, 29, 50, 69, 20, 59, 52, 12, 48, 28, 17, 68],
            }
        ],
        chart: {
            type: "line",
            height: 320,
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 7,
                left: 1,
                blur: 3,
                color: '#000',
                opacity: 0.1
            },
            toolbar: {
                show: false,
            }
        },
        grid: {
            borderColor: "#f5f4f4",
            strokeDashArray: 5,
            yaxis: {
                lines: {
                    show: true, // Ensure y-axis grids are shown
                },
            },
        },
        colors: [
            "var(--primary-color)",
            "rgba(255, 73, 205, 1)",
            "rgba(50, 212, 132, 1)",
        ],
        stroke: {
            curve: ["smooth", "smooth", "smooth"],
            width: [2, 2, 2],
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true,
            position: "top",
            markers: {
                size: 5
            }
        },
        yaxis: {
            title: {
                style: {
                    color: "#adb5be",
                    fontSize: "14px",
                    fontFamily: "Montserrat, sans-serif",
                    fontWeight: 600,
                    cssClass: "apexcharts-yaxis-label",
                },
            },
            axisBorder: {
                show: true,
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
            // labels: {
            //     formatter: function (y) {
            //         return y.toFixed(0) + "k";
            //     },
            // },
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
        tooltip: {
            theme: "dark",
        }
    };
    var chart = new ApexCharts(document.querySelector("#profile-analysis"), options);
    chart.render();
    /* profile analysis */

    /* audience age metrics */
    var options = {
        series: [{
            data: [462, 451, 350, 530, 470, 500, 485],
            name: 'Total Audience',
        }],
        chart: {
            type: 'bar',
            height: 375,
            toolbar: {
                show: false
            },
        },
        plotOptions: {
            bar: {
                barHeight: '40%',
                borderRadius: 2,
                horizontal: true,
                distributed: true,
            }
        },
        legend: {
            show: false
        },
        dataLabels: {
            enabled: false,
        },
        grid: {
            borderColor: '#ffffff',
            xaxis: {
                lines: {
                    show: false
                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            }
        },
        colors: ["var(--primary-color)"],
        xaxis: {
            categories: ['10-20', '20-30', '30-40', '40-50', '50-60', '60-70', '70-80'],
            axisBorder: {
                show: true,
                color: '#c7cacd',
                offsetX: 0,
                offsetY: 0,
            },
            axisTicks: {
                show: true,
                borderType: 'solid',
                color: '#c7cacd',
                width: 6,
                offsetX: 0,
                offsetY: 0
            },
            labels: {
                rotate: -90
            }
        },
        tooltip: {
            theme: "dark",
        }
    };
    var chart = new ApexCharts(document.querySelector("#audience-age-metrics"), options);
    chart.render();
    /* audience age metrics */

    /* audience by gender */
    var options = {
        series: [{
            name: 'Male',
            data: [20, 30, 40, 80, 20, 80],
        }, {
            name: 'Female',
            data: [44, 76, 78, 13, 43, 10],
        }],
        chart: {
            height: 280,
            type: 'radar',
            toolbar: {
                show: false,
            }
        },
        title: {
            align: 'left',
            style: {
                fontSize: '13px',
                fontWeight: 'bold',
                color: '#8c9097'
            },
        },
        colors: ["var(--primary02)", "rgba(255, 73, 205, 0.2)"],
        stroke: {
            width: 1.5,
            colors: ["var(--primary-color)", "rgb(255, 73, 205)"],
        },
        fill: {
            opacity: 0.1
        },
        legend: {
            show: true,
            fontSize: "12px",
            position: 'top',
            horizontalAlign: 'center',
            fontFamily: "Montserrat",
            fontWeight: 500,
            offsetX: 0,
            offsetY: -8,
            height: 50,
            labels: {
                colors: '#9ba5b7',
            },
            markers: {
                size: 5,
                strokeWidth: 0,
                strokeColor: '#fff',
                fillColors: undefined,
                radius: 7,
                offsetX: 0,
                offsetY: 0
            },
        },
        markers: {
            size: 0
        },
        xaxis: {
            categories: ['2019', '2020', '2021', '2022', '2023', '2024'],
            axisBorder: { show: false },
        },
        yaxis: {
            tickAmount: 5,
            labels: {
                formatter: function (val, i) {
                    if (i % 5 === 0) {
                        return val
                    }
                }
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#audience-by-gender"), options);
    chart.render();
    /* audience by gender */

    /* engagement */
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
            height: 200,
            type: "heatmap",
            toolbar: {
                show: false,
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: ["#735dff"],
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
    var chart = new ApexCharts(document.querySelector("#social-engagement"), options);
    chart.render();
    /* engagement */

})()