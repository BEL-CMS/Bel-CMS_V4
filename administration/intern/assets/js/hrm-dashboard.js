(function () {
  'use strict';

  /* Candidate Statistics */
  var options = {
    series: [
      {
        name: "Candidates Hired",
        data: [13, 23, 20, 25, 10, 13, 13, 15, 13, 23, 20, 25],
        type: "column",
      },
      {
        name: "Received Responses",
        data: [20, 30, 25, 50, 25, 30, 20, 35, 20, 30, 25, 50],
        type: "column",
      },
    ],
    chart: {
      type: "line",
      height: 320,
      toolbar: {
        show: false,
      },
      zoom: {
        enabled: true,
      },
      stacked: true,
    },
    grid: {
      show: true,
      borderColor: "rgba(119, 119, 142, 0.1)",
      strokeDashArray: 4,
    },
    colors: ["var(--primary-color)", "var(--primary02)"],
    stroke: {
      curve: 'smooth',
      width: ['0', '0'],
      dashArray: ['0', '0']
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "40%",
        borderRadius: "3",
      },
    },
    dataLabels: {
      enabled: false,
    },
    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
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
    legend: {
      show: true,
      position: "bottom",
      offsetX: 0,
      offsetY: 10,
      markers: {
        width: 10,
        height: 10,
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
  };
  var chart = new ApexCharts(document.querySelector("#candidate-statistics"), options);
  chart.render();
  /* Candidate Statistics */

  /* Attedance Overview */
  var options = {
    series: [1754, 878, 634, 470],
    labels: ["Present", "Late", "Permission", "Absent"],
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
      width: 4,
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
              offsetY: -30
            },
            value: {
              show: true,
              fontSize: '15px',
              color: undefined,
              offsetY: -25,
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
        bottom: -100
      }
    },
    colors: ["var(--primary-color)", "rgba(50, 212, 132, 1)", "rgba(253, 175, 34, 1)", "rgba(255, 103, 87, 1)"],
  };
  var chart = new ApexCharts(document.querySelector("#attendance-overview"), options);
  chart.render();
  /* Attedance Overview */

  /* Employee By Department */
  var options = {
    series: [{
      data: [462, 451, 350, 530, 470, 500, 485],
      name: 'Employees',
    }],
    chart: {
      type: 'bar',
      height: 367,
      toolbar: {
        show: false
      },
    },
    plotOptions: {
      bar: {
        barHeight: '50%',
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
      categories: ['IT & Development', 'Marketing', 'Operations', 'Finance', 'Sales', 'Customer Service', 'Human Resources'],
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
  var chart = new ApexCharts(document.querySelector("#employee-department"), options);
  chart.render();
  /* Employee By Department */

})();