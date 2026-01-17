(function () {
    "use strict";

    /* Available Doctors Scroll */
    var myElement = document.getElementById('available-doctors');
    new SimpleBar(myElement, { autoHide: true });
    /* Available Doctors Scroll */

    /* Patients Statistics */
    var options = {
        series: [
            {
                name: "Treated Patients",
                data: [44, 42, 57, 86, 58, 55, 70, 43, 23, 54, 77, 34],
            },
            {
                name: "Active Patients",
                data: [74, 72, 87, 116, 88, 85, 100, 73, 53, 84, 107, 64],
            },
            {
                name: "New Patients",
                data: [84, 82, 97, 126, 98, 95, 110, 83, 63, 94, 117, 74],
            }
        ],
        chart: {
            stacked: true,
            type: "bar",
            height: 260,
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
            "var(--primary06)",
            "var(--primary03)",
        ],
        plotOptions: {
            bar: {
                columnWidth: "40%",
                borderRadius: 4
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true,
            position: "bottom",
            horizontalAlign: "center",
            fontSize: "11px",
            fontFamily: "Helvetica, Arial",
            fontWeight: 600,
            offsetX: 0,
            offsetY: 10,
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
        yaxis: {
            title: {
                style: {
                    color: "#adb5be",
                    fontSize: "14px",
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
            labels: {
                formatter: function (y) {
                    return y.toFixed(0) + "k";
                },
            },
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
    var chart = new ApexCharts(document.querySelector("#patients-statistics"), options);
    chart.render();
    /* Patients Statistics */

    /* Patients Visits */
    var options = {
        series: [89, 75],
        chart: {
            height: 227,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                background: '#000',
                startAngle: -135,
                endAngle: 135,
                hollow: {
                    margin: 15,
                    size: '60%',
                    background: '#000'
                },
                track: {
                    background: '#000',
                    strokeWidth: '20',
                    margin: 6,
                },
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
                        formatter: function (val) {
                            return val + ""
                        }
                    },
                    total: {
                        show: true,
                        showAlways: true,
                        label: 'Total Patients',
                        fontSize: '14px',
                        fontWeight: 400,
                        color: '#495057',
                    }
                }
            }
        },
        stroke: {
            dashArray: 4,
            width: 5
        },
        colors: [
            "var(--primary-color)",
            "rgba(var(--secondary-rgb), 1)",
        ],
        labels: ['Female', 'Male'],
    };
    var chart = new ApexCharts(document.querySelector("#patients-visits"), options);
    chart.render();
    /* Patients Visits */

    /* Top Departments */
    var options = {
        series: [
            {
                data: [400, 430, 470, 540, 600, 800],
                name: "Patients",
            },
        ],
        chart: {
            type: "bar",
            height: 358,
            toolbar: {
                show: false,
            },
        },
        fill: {
            type: "solid",
        },
        plotOptions: {
            bar: {
                borderRadius: 3,
                horizontal: true,
                columnWidth: "20%",
                barHeight: "40%",
            },
        },
        colors: ["var(--primary-color)"],
        grid: {
            show: false,
            enabled: false,
            borderColor: "transparent",
        },
        dataLabels: {
            enabled: false,
        },
        xaxis: {
            categories: [
                "Dermatologists",
                "Cardiologist",
                "Gynecologist",
                "Dentist",
                "Neurosurgeon",
                "Orthopedic ",
            ],
            labels: {
                show: true,
                style: {
                    colors: "#adb5be",
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
                    colors: "#adb5be",
                    fontSize: "11px",
                    fontWeight: 600,
                    cssClass: "apexcharts-yaxis-label",
                },
            },
        },
    };
    var chart1 = new ApexCharts(document.querySelector("#top-departments"), options);
    chart1.render();
    /* Top Departments */

})();