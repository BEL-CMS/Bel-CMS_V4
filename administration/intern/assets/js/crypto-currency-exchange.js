(function () {
  "use strict";

  var randomizeArray = function (arg) {
    var array = arg.slice();
    var currentIndex = array.length, temporaryValue, randomIndex;

    while (0 !== currentIndex) {

      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;

      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }

    return array;
  }

  // data for the main cards sparklines
  var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

  /* BTC Chart */
  var total = {
    chart: {
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
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
        data: randomizeArray(sparklineData)
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(152, 95, 253, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  var total = new ApexCharts(
    document.querySelector("#btc-currency-chart"),
    total
  );
  total.render();
  /* BTC Chart */

  /* ETH Chart */
  var total = {
    chart: {
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
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
        data: randomizeArray(sparklineData)
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(255, 73, 205,0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  var total = new ApexCharts(
    document.querySelector("#eth-currency-chart"),
    total
  );
  total.render();
  /* ETH Chart */

  /* Dash Chart */
  var total = {
    chart: {
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
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
        data: randomizeArray(sparklineData)
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(253, 175, 34,0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  var total = new ApexCharts(
    document.querySelector("#dash-currency-chart"),
    total
  );
  total.render();
  /* Dash Chart */

  /* LTC Chart */
  var total = {
    chart: {
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: randomizeArray(sparklineData)
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(0, 201, 255, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  var total = new ApexCharts(
    document.querySelector("#ltc-currency-chart"),
    total
  );
  total.render();
  /* LTC Chart */

  /* XRS Chart */
  var total = {
    chart: {
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: randomizeArray(sparklineData)
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(50, 212, 132, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  var total = new ApexCharts(
    document.querySelector("#xrs-currency-chart"),
    total
  );
  total.render();
  /* XRS Chart */

  /* GLM Chart */
  var total = {
    chart: {
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: randomizeArray(sparklineData)
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(255, 103, 87, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  var total = new ApexCharts(
    document.querySelector("#glm-currency-chart"),
    total
  );
  total.render();
  /* GLM Chart */

  /* Monero Chart */
  var total = {
    chart: {
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: randomizeArray(sparklineData)
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(53, 181, 170, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  var total = new ApexCharts(
    document.querySelector("#monero-currency-chart"),
    total
  );
  total.render();
  /* Monero Chart */

  /* Eos Chart */
  var total = {
    chart: {
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 0,
        left: 0,
        blur: 1,
        color: "#fff",
        opacity: 0.05,
      },
    },
    stroke: {
      show: true,
      curve: "smooth",
      lineCap: "butt",
      colors: undefined,
      width: 1,
      ltcArray: 0,
    },
    fill: {
      gradient: {
        enabled: false,
      },
    },
    series: [
      {
        name: "Value",
        data: randomizeArray(sparklineData)
      },
    ],
    yaxis: {
      min: 0,
      show: false,
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      axisBorder: {
        show: false,
      },
    },
    colors: ["rgba(190, 43, 235, 0.5)"],
    tooltip: {
      enabled: false,
    },
  };
  var total = new ApexCharts(
    document.querySelector("#eos-currency-chart"),
    total
  );
  total.render();
  /* Eos Chart */

})();
