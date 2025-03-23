(function() {
    "use strict"

    var options = {
        series: [{ 
            type: 'line',
            name: "Buy",
            data: [20, 38, 38, 72, 55, 63, 43, 76, 55, 80, 40, 80],
        }, {
            name: "Sell",
            type: 'bar',
            data: [65, 45, 75, 68, 85, 35, 62, 40, 40, 64, 50, 89]
        }],
        chart: {
            height: 300,
           
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            position: "top",
            horizontalAlign: "center",
            offsetX: -15,
            fontWeight: "bold",
        },
        plotOptions: {
            bar: {
                columnWidth: "18%",
                borderRadius: 2
            }
        },
        stroke: {
            curve: 'smooth',
            width: ["1","1"],
            dashArray: [3, 5],
        },
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 3
        },
        colors: ["rgba(0, 255, 190, 0.9)", "rgba(69, 214, 91, 0.8)"],
        yaxis: {
            title: {
                text: 'Statistics',
                style: {
                    color: '#adb5be',
                    fontSize: '14px',
                    fontFamily: 'Rajdhani',
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
            },
            axisTicks: {
                show: true,
                borderType: 'solid',
                color: 'rgba(119, 119, 142, 0.05)',
                width: 6,
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