(function () {
    "use strict";

    /* nft balance chart */
    var nft1 = {
        chart: {
            type: 'area',
            height: 60,
            sparkline: {
                enabled: true
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
                            color: "var(--primary01)",
                            opacity: 1
                        },
                        {
                            offset: 75,
                            color: "var(--primary01)",
                            opacity: 1
                        },
                        {
                            offset: 100,
                            color: "var(--primary01)",
                            opacity: 1
                        }
                    ]
                ]
            }
        },
        series: [{
            name: 'Value',
            data: [20, 14, 19, 10, 25, 20, 22, 9, 12]
        }],
        yaxis: {
            min: 0,
            show: false,
            axisBorder: {
                show: false
            },
        },
        xaxis: {
            show: false,
            axisBorder: {
                show: false
            },
        },
        colors: ["var(--primary-color)"],

    }
    var nft1 = new ApexCharts(document.querySelector("#nft-balance-chart"), nft1);
    nft1.render();
    /* nft balance chart */

    /* Featured Collections */
    var swiper = new Swiper(".featured-collections", {
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
            clickable: true,
        },
        loop: true,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false
        }
    });
    /* Featured Collections */

    /* NFT Statistics */
    var options = {
        series: [{
            name: "Last Year",
            data: [20, 38, 38, 72, 55, 63, 43, 76, 55, 80, 40, 80]
        }, {
            name: "This Year",
            data: [85, 65, 75, 38, 85, 35, 62, 40, 40, 64, 50, 89]
        }],
        chart: {
            height: 280,
            type: 'bar',
            zoom: {
                enabled: false
            },
            stacked: true,
        },
        dataLabels: {
            enabled: false
        },
        plotOptions: {
            bar: {
                columnWidth: '45%',
                borderRadius: 2,
            }
        },
        legend: {
            show: true,
            position: 'bottom',
            markers: {
                width: 10,
                height: 10,
            }
        },
        stroke: {
            curve: 'smooth',
        },
        grid: {
            borderColor: "#f1f1f1",
            strokeDashArray: 3,
        },
        colors: ["var(--primary-color)", "var(--primary02)"],
        yaxis: {
            title: {
                text: 'Statistics',
                style: {
                    color: '#adb5be',
                    fontSize: '14px',
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
    var chart = new ApexCharts(document.querySelector("#nft-statistics"), options);
    chart.render();
    /* NFT Statistics */

})();