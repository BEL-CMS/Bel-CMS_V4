(function () {
  "use strict";

  /* learning activity */
  var options = {
    series: [{
      name: 'Enrolled',
      type: 'bar',
      data: [44, 88, 58, 120, 112, 95, 70, 88, 60, 85, 77, 85]
    }, {
      name: 'Left',
      type: 'bar',
      data: [20, 42, 38, 26, 80, 55, 35, 43, 23, 54, 75, 34]
    }],
    chart: {
      height: 365,
      type: 'line',
      stacked: false,
      toolbar: {
        show: false
      },
    },
    colors: ["var(--primary-color)", "rgb(255, 73, 205)"],
    grid: {
      show: true,
      borderColor: 'rgba(119, 119, 142, 0.1)',
      strokeDashArray: 4,
    },
    stroke: {
      width: [2, 2],
      curve: 'smooth',
    },
    plotOptions: {
      bar: {
        columnWidth: '45%',
        borderRadius: 2,
      }
    },
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'sep', 'oct', 'nov', 'dec'],
    markers: {
      size: 0,
    },
    legend: {
      show: true,
      position: 'top',
      markers: {
        width: 10,
        height: 10,
      }
    },
    xaxis: {
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
        formatter: function (y) {
          return y.toFixed(0) + "";
        }
      }
    },
    tooltip: {
      shared: true,
      intersect: false,
      y: {
        formatter: function (y) {
          if (typeof y !== "undefined") {
            return y.toFixed(0)
          }
          return y;

        }
      }
    }
  };
  var chart = new ApexCharts(document.querySelector("#students-analysis"), options);
  chart.render();
  /* learning activity */

  /* Payout Report */
  var options2 = {
    series: [{
      name: 'Paid',
      data: [50, 20, 32, 32, 20, 50, 20, 40, 25, 55, 20, 30],
      type: 'line',
    }, {
      name: 'UnPaid',
      data: [25, 15, 40, 20, 25, 15, 58, 28, 30, 15, 58, 28],
      type: "line",
    }],
    chart: {
      height: 212,
      toolbar: {
        show: false,
      },
      background: 'none',
      fill: "#fff",
    },
    grid: {
      show: true,
      borderColor: 'rgba(119, 119, 142, 0.1)',
      strokeDashArray: 4,
    },
    colors: ["var(--primary-color)", "rgb(253, 175, 34)"],
    background: 'transparent',
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2,
    },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: true,
      position: 'bottom',
    },
    xaxis: {
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
  var chart2 = new ApexCharts(document.querySelector("#payout-Report"), options2);
  chart2.render();
  /* Payout Report */

})();