
/*  sales overview chart */
  var options = {
      series: [{
      name: 'Total Profit',
      type: 'column',
      data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30,11,]
    }, {
      name: 'Total Orders',
      type: 'bar',
      data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43, 44,]
    }, {
      name: 'Total Sales',
      type: 'line',
      data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39, 40,]
    }],
      chart: {
       toolbar: {
        show: false,
    },
      height: 260,
      type: 'line',
      stacked: false,
    },
    stroke: {
      width: [0, 0, 2],
      curve: 'smooth'
    },
    plotOptions: {
      bar: {
        columnWidth: '50%'
      }
    },
    fill: {
      opacity: [1, 1, 1],
      gradient: {
        inverseColors: false,
        shade: 'light',
        type: "vertical",
        opacityFrom: 0.65,
        opacityTo: 0.15,
        stops: [0, 100, 100, 100]
      }
    },
    
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    markers: {
      size: 0
    },
    xaxis: {
      type: 'month',
    },
    yaxis: {
      title: {
        text: 'Points',
      },
      tickAmount:5,
      min: 5,
    },
    tooltip: {
      shared: true,
      intersect: false,
      y: {
        formatter: function (y) {
          if (typeof y !== "undefined") {
            return y.toFixed(0) + " points";
          }
          return y;
    
        }
      }
    },
    legend: {
      show: false,
    },
    
    colors: [ "#1753fc", "#9258f1",  '#e34a42'],
    };

    var chart1 = new ApexCharts(document.querySelector("#earnings"), options);
    chart1.render();
    
function earnings() {
  chart1.updateOptions({
      colors: [ "rgba(" + myVarVal + ", 0.95)", "#9258f1",  '#e34a42'],
    });
}

/* Candidates Chart */
var options = {
  series: [1754,1234,1234],
  labels: ["New", "Current","Retargated"],
  chart: {
      height: 265,
      type: 'donut'
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
          expandOnClick: false,
          donut: {
              size: '68%',
              background: 'transparent',
              labels: {
                  show: true,
                  name: {
                      show: true,
                      fontSize: '20px',
                      color: '#495057',
                      offsetY: -4
                  },
                  value: {
                      show: true,
                      fontSize: '18px',
                      color: undefined,
                      offsetY: 8,
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
  colors: ["#1753fc", "#fdb901", "#9258f1"],

};
document.querySelector("#candidates-chart").innerHTML = " ";
var chart = new ApexCharts(document.querySelector("#candidates-chart"), options);
chart.render();
function Candidates() {
  chart.updateOptions({
      colors: ["rgb(" + myVarVal + ")", "#fdb901", "#9258f1"],
  })
};
/* Candidates Chart */