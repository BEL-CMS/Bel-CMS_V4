(function () {
    "use strict"

    var options = {
        series: [{
            name: "Buy",
            data: [20, 38, 38, 72, 55, 63, 43, 76, 55, 80, 40, 80],
        }, {
            name: "Sell",
            data: [85, 65, 75, 38, 85, 35, 62, 40, 40, 64, 50, 89]
        }],
        chart: {
            height: 370,
            type: 'bar',
            zoom: {
                enabled: false
            },
        },
        plotOptions: {
            bar: {
                columnWidth: "50%",
                borderRadius: 2
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "center",
            markers: {
                size: 4,
                strokeWidth: 0,
            },
        },
        stroke: {
            curve: 'smooth',
            width: ["2", "2"],
        },
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 3
        },
        colors: ["var(--primary-color)", "rgba(255, 73, 205, 1)"],
        yaxis: {
            title: {
                style: {
                    color: '#adb5be',
                    fontSize: '14px',
                    fontFamily: 'poppins, sans-serif',
                    fontWeight: 600,
                    cssClass: 'apexcharts-yaxis-label',
                },
            },
        },
        xaxis: {
            type: 'month',
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
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
                rotate: -90
            }
        }
    };
    document.getElementById('buy_sell-statistics').innerHTML = ''
    var chart = new ApexCharts(document.querySelector("#buy_sell-statistics"), options);
    chart.render();

})()