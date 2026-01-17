(function () {
    "use strict";

    /* Leads By Source */
    var options = {
        series: [14, 23, 21, 17, 15, 10],
        chart: {
            type: 'polarArea',
            height: 205
        },
        stroke: {
            colors: ['#fff'],
        },
        fill: {
            opacity: 1
        },
        legend: {
            show: false,
            position: 'bottom',
            itemMargin: {
                horizontal: 5,
                vertical: 5
            },
            markers: {
                size: 5
            }
        },
        labels: ['Organic Search', 'Paid Search', 'Direct Traffic', 'Social Media', 'Referrals', "Others"],
        colors: ["var(--primary-color)", "rgb(255, 73, 205)", "rgb(50, 212, 132)", "rgb(250, 129, 40)", "rgb(0, 201, 255)", "rgb(253, 175, 34)"],
        // responsive: [{
        //     breakpoint: 480,
        //     options: {
        //         chart: {
        //             width: 200
        //         },
        //         legend: {
        //             position: 'bottom'
        //         }
        //     }
        // }]
    };
    var chart = new ApexCharts(document.querySelector("#leads-source"), options);
    chart.render();
    /* Leads By Source */

    /* Revenue Analysis */
    var options = {
        series: [{
            name: 'Revenue',
            type: 'column',
            data: [161, 255, 322, 750, 353, 200, 415, 225, 673, 413, 504, 441]
        }, {
            name: 'Profit',
            type: 'line',
            data: [118, 410, 225, 820, 235, 115, 620, 445, 525, 438, 640, 325]
        }],
        chart: {
            height: 318,
            animations: {
                speed: 500
            },
            toolbar: {
                show: false
            }
        },
        colors: ["var(--primary-color)", "rgba(255, 73, 205)"],
        dataLabels: {
            enabled: false
        },
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 3
        },
        stroke: {
            width: [0, 2],
            curve: 'smooth',
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '30%',
                borderRadius: 3
            },
        },
        xaxis: {
            axisTicks: {
                show: false,
            },
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
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return "$" + value;
                }
            },
        },
        tooltip: {
            y: [{
                formatter: function (e) {
                    return void 0 !== e ? "$" + e.toFixed(0) : e
                }
            }, {
                formatter: function (e) {
                    return void 0 !== e ? "$" + e.toFixed(0) : e
                }
            }]
        },
        legend: {
            show: true,
            customLegendItems: ['Revenue', 'Profit'],
            inverseOrder: true
        },
        title: {
            align: 'left',
            style: {
                fontSize: '.8125rem',
                fontWeight: 'semibold',
                color: '#8c9097'
            },
        },
        markers: {
            hover: {
                sizeOffset: 5
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#crm-revenue-analytics"), options);
    chart.render();
    /* Revenue Analysis */

    /* Deals Overview */
    var options = {
        series: [{
        name: 'Sessions',
        data: [400, 430, 470, 540, 1100, 1200, 1380]
        }],
          chart: {
            fontFamily: 'Poppins, Arial, sans-serif',
              toolbar: {
                  show: false
              },
          type: 'bar',
          height: 351
        },
        grid: {
          borderColor: '#f2f6f7',
        },
        plotOptions: {
          bar: {
              horizontal: true,
              barHeight: "30%",
              borderRadius: 2,
          }
        },
        colors: ["var(--primary-color)"],
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['New Deal', 'Qualified Deal', 'Renewal Deal', 'Referral Deal', 'Won Deal', 'Lost Deal', 'Neotiation'],
        }
      };
      var chart2 = new ApexCharts(document.querySelector("#deals-statistics"), options);
      chart2.render();
    /* Deals Overview */

})();