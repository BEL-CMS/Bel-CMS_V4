var spark2 = {
    chart: {
      type: "bar",
      height: 60,
      width: 90,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: false,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 0,
        color: "#000",
        opacity: 0,
      },
    },
    grid: {
      show: false,
      xaxis: {
        lines: {
          show: false,
        },
      },
      yaxis: {
        lines: {
          show: false,
        },
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      colors: undefined,
      width: 0.5,
      dashArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [0, 21, 54, 38, 56, 24, 65, 53, 67],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      show: false,
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["#1753fc"],
  };
  document.getElementById("total-projects").innerHTML = "";
  var spark2 = new ApexCharts(
    document.querySelector("#total-projects"),
    spark2
  );
  spark2.render();
  function totalprojects() {
    spark2.updateOptions({
        colors: ["rgb(" + myVarVal + ")"],
    })
  };


  var spark3 = {
    chart: {
      type: "bar",
      height: 60,
      width: 90,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: false,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 0,
        color: "#000",
        opacity: 0,
      },
    },
    grid: {
      show: false,
      xaxis: {
        lines: {
          show: false,
        },
      },
      yaxis: {
        lines: {
          show: false,
        },
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      colors: undefined,
      width: 0.5,
      dashArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [0, 21, 54, 38, 56, 24, 65, 53, 67],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      show: false,
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["#9258f1"],
  };
  document.getElementById("total-employee").innerHTML = "";
  var spark3 = new ApexCharts(
    document.querySelector("#total-employee"),
    spark3
  );
  spark3.render();

  
  var spark4 = {
    chart: {
      type: "bar",
      height: 60,
      width: 90,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: false,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 0,
        color: "#000",
        opacity: 0,
      },
    },
    grid: {
      show: false,
      xaxis: {
        lines: {
          show: false,
        },
      },
      yaxis: {
        lines: {
          show: false,
        },
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      colors: undefined,
      width: 0.5,
      dashArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [0, 21, 54, 38, 56, 24, 65, 53, 67],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      show: false,
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["#f33540"],
  };
  document.getElementById("total-tasks").innerHTML = "";
  var spark4 = new ApexCharts(
    document.querySelector("#total-tasks"),
    spark4
  );
  spark4.render();
  
  var spark4 = {
    chart: {
      type: "bar",
      height: 60,
      width: 90,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: false,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 0,
        color: "#000",
        opacity: 0,
      },
    },
    grid: {
      show: false,
      xaxis: {
        lines: {
          show: false,
        },
      },
      yaxis: {
        lines: {
          show: false,
        },
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      colors: undefined,
      width: 0.5,
      dashArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: [0, 21, 54, 38, 56, 24, 65, 53, 67],
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      show: false,
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["#22c03c"],
  };
  document.getElementById("total-earnings").innerHTML = "";
  var spark4 = new ApexCharts(
    document.querySelector("#total-earnings"),
    spark4
  );
  spark4.render();

  

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
    }
  ],
  chart: {
    stacked: true,
    type: "bar",
    height: 325,
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
    "rgb(132, 90, 223)",
    "rgba(132, 90, 223, 0.6)",
  ],
  plotOptions: {
    bar: {
      colors: {
        ranges: [
          {
            from: -100,
            to: -46,
            color: "#ebeff5",
          },
          {
            from: -45,
            to: 0,
            color: "#ebeff5",
          },
        ],
      },
      columnWidth: "30%",
    },
  },
  dataLabels: {
    enabled: false,
  },
  legend: {
    show: false,
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
};console.log(options.grid);
document.getElementById("salesOverview").innerHTML = "";
var chart = new ApexCharts(document.querySelector("#salesOverview"), options);
chart.render();
function salesOverview() {
  chart.updateOptions({
    colors: [
      "rgb(" + myVarVal + ")",
      "rgba(" + myVarVal + ", 0.3)",
    ],
  });
}
/*  sales overview chart */