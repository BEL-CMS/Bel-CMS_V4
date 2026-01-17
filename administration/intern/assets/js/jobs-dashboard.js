(function () {
    "use strict";

    /* Recent Jobs Scroll */
    var myElement1 = document.getElementById('recent-jobs');
    new SimpleBar(myElement1, { autoHide: true });
    /* Recent Jobs Scroll */

    /* Employees Performance */
    var options = {
        series: [
            {
                name: "Weekly",
                type: "column",
                data: [31, 11, 22, 37, 13, 22, 37, 21, 44, 22, 34, 25],
            },
            {
                name: "Monthly",
                type: "area",
                data: [44, 55, 41, 87, 22, 43, 21, 41, 56, 27, 43, 23],
            },
            {
                name: "Daily",
                type: "line",
                data: [30, 8, 20, 36, 15, 22, 37, 19, 44, 24, 32, 23],
            },
        ],
        chart: {
            height: 378,
            type: "line",
            stacked: false,
            toolbar: {
                show: false,
            },
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 5,
                left: 0,
                blur: 3,
                color: ["transparent", '#000', '#000'],
                opacity: 0.15
            },
        },
        stroke: {
            width: [0, 1, 2],
            curve: ["smooth", "stepline", "smooth"],
        },
        plotOptions: {
            bar: {
                columnWidth: "25%",
                borderRadius: 2,
            },
        },
        colors: ["var(--primary-color)", "#fdaf22", "rgb(255, 73, 205)"],
        fill: {
            opacity: [1, 0.05, 1],
            gradient: {
                inverseColors: false,
                shade: "light",
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100],
            },
        },
        grid: {
            show: true,
            borderColor: 'rgba(119, 119, 142, 0.08)',
            strokeDashArray: 3,
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "right",
            fontSize: "11px",
            fontFamily: "Helvetica, Arial",
            fontWeight: 600,
            labels: {
                colors: '#74767c',
            },
            markers: {
                size: 4,
                strokeWidth: 0,
                strokeColor: "#fff",
                fillColors: undefined,
                radius: 12,
                customHTML: undefined,
                onClick: undefined,
                offsetX: 0,
                offsetY: 0,
            },
        },
        markers: {
            size: 0,
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            axisBorder: {
                show: false,
                color: 'rgba(119, 119, 142, 0.05)',
            },
            axisTicks: {
                show: false,
                color: 'rgba(119, 119, 142, 0.05)',
            },
            labels: {
                style: {
                    colors: "#8c9097",
                    fontSize: '11px',
                    fontWeight: 600,
                    cssClass: 'apexcharts-xaxis-label',
                },
            }
        },
        yaxis: {
            title: {
                style: {
                    color: '#adb5be',
                    fontSize: '14px',
                    fontWeight: 600,
                    cssClass: 'apexcharts-yaxis-label',
                },
            },
            labels: {
                // formatter: function (y) {
                //     return y.toFixed(0) + " Projects";
                // },
                show: true,
                style: {
                    colors: "#8c9097",
                    fontSize: '11px',
                    fontWeight: 600,
                    cssClass: 'apexcharts-xaxis-label',
                },
            },
            min: 0,
        },
    };
    var chart = new ApexCharts(document.querySelector("#employees-performance"), options);
    chart.render();
    /* Employees Performance */

    /* Candidates Overview */
    var options = {
        series: [12765, 15976],
        labels: ["Female", "Male"],
        chart: {
            height: 236,
            type: 'donut',
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true,
            position: "bottom",
            markers: {
                size: 5
            }
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
                            label: 'Total Candidates',
                            fontSize: '14px',
                            fontWeight: 400,
                            color: '#495057',
                        }
                    }
                }
            }
        },
      

        colors: ["var(--primary-color)", "rgb(253, 175, 34)"],
    };
    var chart = new ApexCharts(document.querySelector("#candidates-overview"), options);
    chart.render();
    /* Candidates Overview */

})();