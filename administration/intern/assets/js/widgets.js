(function () {
    "use strict";

    var options5 = {
        series: [{
            data: [25, 22, 41, 55, 30, 35, 25]
        }],
        chart: {
            type: 'bar',
            width: 70,
            height: 40,
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                columnWidth: '60%',
                borderRadius: '2'
            }
        },
        labels: [1, 2, 3, 4, 5, 6, 7],
        colors: ['var(--primary-color)'],
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        tooltip: {
            fixed: {
                enabled: false
            },
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
        }
    };
    var chart5 = new ApexCharts(document.querySelector("#chart-2"), options5);
    chart5.render();

    var options2 = {
        series: [{
            data: [12, 14, 2, 47, 42, 15, 47, 75, 65, 19, 14]
        }],
        chart: {
            type: 'line',
            width: 70,
            height: 40,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: 'smooth',
            width: '2',
        },
        colors: ['rgb(255, 73, 205)'],
        tooltip: {
            fixed: {
                enabled: false
            },
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
        }
    };
    var chart2 = new ApexCharts(document.querySelector("#chart-3"), options2);
    chart2.render();

    var options1 = {
        series: [{
            data: [7, 2, 10, 1, 12, 44, 25, 63, 95, 41, 66, 30]
        }],
        chart: {
            type: 'line',
            width: 70,
            height: 40,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: 'smooth',
            width: '2',
        },
        colors: ['rgb(50, 212, 132)'],
        tooltip: {
            fixed: {
                enabled: false
            },
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
        }
    };
    var chart1 = new ApexCharts(document.querySelector("#chart-4"), options1);
    chart1.render();

    var options3 = {
        series: [80, 32],
        chart: {
            type: 'pie',
            width: 40,
            height: 40,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            width: 1
        },
        colors: ['#f4f0f6', 'rgb(0, 201, 255)'],
        tooltip: {
            fixed: {
                enabled: false
            },
        }
    };
    var chart3 = new ApexCharts(document.querySelector("#chart-5"), options3);
    chart3.render();

    /* Top Categories */
    var options10 = {
        series: [
            {
                name: 'Electronics',
                data: [52, 51, 56, 57, 62, 59, 56, 55, 56, 56, 58, 62, 63, 68, 65, 62, 62, 57, 60, 65, 64, 69, 70, 69, 64, 68, 66, 66, 70, 73, 78],
            },
            {
                name: 'Fashion',
                data: [28, 28, 30, 32, 33, 38, 35, 39, 41, 41, 44, 39, 39, 44, 42, 44, 39, 44, 42, 45, 46, 38, 39, 36, 41, 40, 44, 46, 43, 47, 50]
            },
            {
                name: 'Furniture',
                data: [10, 8, 12, 11, 14, 21, 17, 19, 18, 14, 10, 11, 6, 10, 13, 13, 18, 23, 22, 27, 23, 18, 19, 20, 19, 23, 20, 25, 29, 29, 28]
            }
        ],
        chart: {
            id: 'chartD',
            type: 'line',
            height: 160,
            zoom: {
                autoScaleYaxis: false
            },
            sparkline: {
                enabled: true,
            },
            toolbar: {
                show: false,
            },
            dropShadow: {
                enabled: true,
                enabledOnSeries: undefined,
                top: 7,
                left: 1,
                blur: 3,
                color: '#000',
                opacity: 0.05
            },
        },
        colors: ["var(--primary-color)", "rgb(0, 201, 255)", "rgb(255, 73, 205)"],
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
            style: 'hollow',
        },
        grid: {
            show: true,
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
        tooltip: {
            x: {
                format: 'dd MMM yyyy'
            }
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1.5,
            dashArray: 0,
        },
        fill: {
            type: 'solid',
        },
        legend: {
            position: "top",
            show: false
        }
    };
    var chart = new ApexCharts(document.querySelector("#top-categories"), options10);
    chart.render();
    /* Top Categories */

    /* top country sales */
    var markers = [
        { name: 'Argentina', coords: [-38.4161, -63.6167] },
        { name: 'France', coords: [46.6034, 1.8883] },
        { name: 'USA', coords: [37.0902, -95.7129] }
    ]
    var map = new jsVectorMap({
        selector: "#sales-locations",
        // -------- Labels --------
        labels: {
            markers: {
                render: function (marker) {
                    return marker.name
                },
                offsets: function (index) {
                    return markers[index].offsets || [0, 0]
                }
            },
            color: "#000",
        },
        map: "world_merc",
        markers: markers,
        zoomOnScroll: false,
        zoomButtons: false,
        markerStyle: {
            initial: {
                r: 5,
                fill: 'var(--primary-color)',
                stroke: 'rgba(255,255,255,0.1)',
                strokeWidth: 2,
            }
        },
        markerLabelStyle: {
            initial: {
                fontSize: 13,
                fontWeight: 500,
                fill: '#35373e',
            },
        },
    });
    /* top country sales */

    /*  sales overview chart */
    var options = {
        series: [
            {
                name: "Sales",
                data: [44, 42, 57, 86, 58, 55, 70, 43, 23, 54, 77, 34],
            },
            {
                name: "OPEX Ratio",
                data: [74, 72, 87, 116, 88, 85, 100, 73, 53, 84, 107, 64],
            },
            {
                name: "General & Admin",
                data: [84, 82, 97, 126, 98, 95, 110, 83, 63, 94, 117, 74],
            },
            {
                name: "Marketing",
                data: [34, 22, 37, 56, 21, 35, 60, 34, 56, 78, 89, 53],
            },
        ],
        chart: {
            stacked: true,
            type: "bar",
            height: 365,
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
            "var(--primary01)",
        ],
        plotOptions: {
            bar: {
                columnWidth: "70%",
                borderRadius: 8,
                borderRadiusWhenStacked: 'all',
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true,
            position: "top",
        },
        yaxis: {
            title: {
                text: "Growth",
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
            labels: {
                formatter: function (y) {
                    return y.toFixed(0) + "";
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
    var chart = new ApexCharts(document.querySelector("#salesOverview"), options);
    chart.render();
    /*  sales overview chart */

    /* Top Categories */
    var options = {
        series: [3160, 2127, 1556, 1026, 2321],
        chart: {
            height: 270,
            type: 'donut',
            sparkline: {
                enabled: true
            }
        },
        legend: {
            show: false,
        },
        colors: ['var(--primary-color)', 'rgb(255, 73, 205)', 'rgb(0, 201, 255)', 'rgb(253, 175, 34)', 'rgb(50, 212, 132)'],
        labels: ['Electronics', 'Fashion', 'Furniture', 'Appliances', 'Gaming'],
        fill: {
            type: "gradient",
        },
        dataLabels: {
            enabled: false,
        },
        plotOptions: {
            pie: {
                offsetY: 10,
                expandOnClick: false,
                donut: {
                    size: '80%',
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
                            label: 'Total Sales',
                            fontSize: '14px',
                            fontWeight: 400,
                            color: '#495057',
                        }
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                type: "vertical",
                colorStops: [
                    [
                        {
                            offset: 0,
                            color: "var(--primary-color)",
                            opacity: 1
                        },
                        {
                            offset: 90,
                            color: "var(--primary09)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: "var(--primary08)",
                            opacity: 1
                        }
                    ],
                    [
                        {
                            offset: 0,
                            color: "rgba(255, 73, 205, 1)",
                            opacity: 1
                        },
                        {
                            offset: 90,
                            color: "rgba(255, 73, 205, 0.9)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: "rgba(255, 73, 205, 0.8)",
                            opacity: 1
                        }
                    ],
                    [
                        {
                            offset: 0,
                            color: "rgba(0, 201, 255, 1)",
                            opacity: 1
                        },
                        {
                            offset: 90,
                            color: "rgba(0, 201, 255, 0.9)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: "rgba(0, 201, 255, 0.8)",
                            opacity: 1
                        }
                    ],
                    [
                        {
                            offset: 0,
                            color: "rgba(253, 175, 34, 1)",
                            opacity: 1
                        },
                        {
                            offset: 90,
                            color: "rgba(253, 175, 34, 0.9)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: "rgba(253, 175, 34, 0.8)",
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
                            offset: 90,
                            color: "rgba(50, 212, 132, 0.9)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: "rgba(50, 212, 132, 0.8)",
                            opacity: 1
                        }
                    ]
                ]
            }
        },
    };
    var chart = new ApexCharts(document.querySelector("#top-categories1"), options);
    chart.render();
    /* Top Categories */

    /* social visitors */
    var options = {
        series: [{
            name: 'Visitors',
            data: [650, 770, 840, 890, 1100, 1380, 1500]
        }],
        chart: {
            height: 390,
            type: 'bar',
            events: {
                click: function (chart, w, e) {
                }
            },
            toolbar: {
                show: false,
            }
        },
        colors: ['var(--primary-color)', 'rgba(51, 182, 229, 1)', 'rgba(255, 117, 170, 1)', 'rgba(255, 187, 51, 1)', 'rgba(0, 200, 80, 1)', 'rgba(255, 68, 68, 0.9)', 'rgba(0, 216, 216, 1)'],
        plotOptions: {
            bar: {
                barHeight: '40%',
                distributed: true,
                horizontal: true,
                borderRadius: 3,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 3
        },
        fill: {
            type: 'pattern',
            opacity: 1,
            pattern: {
                style: 'slantedLines', // string or array of strings

            }
        },
        xaxis: {
            categories: [
                "Facebook",
                "Instagram",
                "Dribble",
                "Twitter",
                "Chrome",
                "Pininterest",
                "Reddit",
            ],
            labels: {
                show: true,
                style: {
                    colors: "#adb5be",
                    fontSize: "12px",
                    fontWeight: 500,
                    cssClass: "apexcharts-xaxis-label",
                },
            },
        },
        yaxis: {
            labels: {
                show: true,
                style: {
                    colors: "#adb5be",
                    fontSize: "12px",
                    fontWeight: 500,
                    cssClass: "apexcharts-yaxis-label",
                },
            },
        },
        tooltip: {
            enabled: true,
            shared: false,
            intersect: true,
            x: {
                show: false
            },
            theme: "dark",
        },
    };
    var chart2 = new ApexCharts(document.querySelector("#social-visitors"), options);
    chart2.render();
    /* social visitors */

    /* Social Traffic */
    var options = {
        series: [
            {
                name: "Facebook",
                data: [44, 42, 57, 86, 58, 55, 70],
            },
            {
                name: "Instagram",
                data: [74, 72, 87, 116, 88, 85, 100],
            },
            {
                name: "Twitter",
                data: [84, 82, 97, 126, 98, 95, 110],
            },
            {
                name: "linkedIn",
                data: [34, 22, 37, 56, 21, 35, 60],
            },
        ],
        chart: {
            stacked: true,
            type: "bar",
            height: 315,
            toolbar: {
                show: false
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
            "rgb(0, 201, 255)",
            "rgb(253, 175, 34)",
            "rgb(50, 212, 132)",
        ],
        plotOptions: {
            bar: {
                columnWidth: "25%",
                borderRadius: '3',
                borderRadiusWhenStacked: "all",
            },
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'round',
            colors: "#fff",
            width: 3,
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true,
            position: "top",
            markers: {
                size: 4,
                shape: "circle"
            },
        },
        yaxis: {
            title: {
                style: {
                    color: "#adb5be",
                    fontSize: "14px",
                    fontFamily: "Poppins, sans-serif",
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
                    return y.toFixed(0) + "";
                },
            },
        },
        xaxis: {
            type: "Week",
            categories: [
                "Mon",
                "Tue",
                "Wed",
                "Thu",
                "Fri",
                "Sat",
                "Sun",
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
    var chart = new ApexCharts(document.querySelector("#social-traffic1"), options);
    chart.render();
    /* Social Traffic */

    /* Recent Orders */
    var options = {
        series: [1754, 634, 878, 470],
        labels: ["Delivered", "Cancelled", "Pending", "Returned"],
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
                startAngle: -90,
                endAngle: 90,
                offsetY: 10,
                expandOnClick: false,
                donut: {
                    size: '80%',
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
                            offsetY: -23,
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
                bottom: -120
            }
        },
        colors: ["var(--primary-color)", "rgba(50, 212, 132, 1)", "rgba(253, 175, 34, 1)", "rgba(0, 201, 255, 1)"],
    };
    var chart = new ApexCharts(document.querySelector("#recent-orders"), options);
    chart.render();
    /* Recent Orders */

})();