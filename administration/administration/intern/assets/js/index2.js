
 /* line and area chart */
        var options = {
        series: [{
            name: 'Revenue',
            type: 'area',
            data: [8, 9, 4, 6, 3, 5, 7, 6, 8, 6, 4, 8]
        }, {
            name: 'Profit',
            type: 'line',
            data: [100, 128, 100, 135, 105, 125, 108, 128, 110, 128, 115, 129]
        }],
        chart: {
            height: 350,
            type: 'line',
        },
        stroke: {
            curve: 'smooth',
            width: [2,3],
            dashArray: [0, 3],
        },
        toolbar: {
          show: "false",
          },
        colors: [ "#1753fc", "#9258f1"],
        grid: {
            borderColor: '#f2f5f7',
        },
        fill: {
            type: 'solid',
            opacity: [0.35, 1],
        },
        labels: [' Jan', ' Feb', ' Mar', 'Apr', 'May', ' Jun', 'Jul', 'Aug', 'Sep ', ' Oct', 'Nov', 'Dec'],
        markers: {
            size: 0
        },
        xaxis: {
            labels: {
                show: true,
                style: {
                    colors: "#8c9097",
                    fontSize: '11px',
                    fontWeight: 600,
                    cssClass: 'apexcharts-xaxis-label',
                },
            },
        },
        yaxis: [
            {
                title: {
                    text: 'Series A',
                    style: {
                        color: "#8c9097",
                    }
                },
                labels: {
                    show: true,
                    style: {
                        colors: "#8c9097",
                        fontSize: '11px',
                        fontWeight: 600,
                        cssClass: 'apexcharts-yaxis-label',
                    },
                }
            },
            {
                opposite: true,
                title: {
                    text: 'Series B',
                    style: {
                        color: "#8c9097",
                    }
                },
                labels: {
                    show: true,
                    style: {
                        colors: "#8c9097",
                        fontSize: '11px',
                        fontWeight: 600,
                        cssClass: 'apexcharts-yaxis-label',
                    },
                },
            },
        ],
        legend:{
            position: "top",
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
        }
    };
    var chart1 = new ApexCharts(document.querySelector("#mixed-linearea"), options);
    chart1.render();
        function mixedlinearea() {
            chart1.updateOptions({
                colors: ["rgba(" + myVarVal + ", 0.3)", "#9258f1"],
            })
    }

    /* line column and area chart */
  /* total-total-returns */
  var options = {
    series: [100, 30],
    chart: {
      height: 90,
      width:100,
      type: "pie",
    },
    colors: ["#ffc107", "#f0f3f7"],
    labels: ["Team A", "Team B"],
    legend: {
        show:false,
      position: "bottom",
    },
    dataLabels: {
      dropShadow: {
        enabled: false,
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#total-returns"), options);
  chart.render();
  /* total-total-returns */ 

  /* total-sales */
  var options = {
    series: [65, 30],
    chart: {
      height: 90,
      width:100,
      type: "pie",
    },
    colors: ["#22c03c", "#f0f3f7"],
    labels: ["Team A", "Team B"],
    legend: {
        show:false,
      position: "bottom",
    },
    dataLabels: {
      dropShadow: {
        enabled: false,
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#total-sales"), options);
  chart.render();
  /* total-sales */

  /* total-profit */
  var options = {
    series: [85, 15],
    chart: {
      height: 90,
      width:100,
      type: "pie",
    },
    colors: ["#9258f1", "#f0f3f7"],
    labels: ["Team A", "Team B"],
    legend: {
        show:false,
      position: "bottom",
    },
    dataLabels: {
      dropShadow: {
        enabled: false,
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#total-profit"), options);
  chart.render();
  /* total-profit */
  
  /* total-purchase */
var options = {
    series: [65, 35],
    chart: {
      height: 90,
      width:100,
      type: "pie",
    },
    colors: ["#1753fc", "#f0f3f7"],
    labels: ["Team A", "Team B"],
    legend: {
        show:false,
      position: "bottom",
    },
    dataLabels: {
      dropShadow: {
        enabled: false,
      },
    },
    tooltip:{
        show:false
    }
  };
  var chart = new ApexCharts(document.querySelector("#total-purchase"), options);
  chart.render();
  function totalpurchase() {
    chart.updateOptions({
        colors: ["rgb(" + myVarVal + ")", "#f0f3f7",],
    })
  };
  /* total-purchase */

  /* Visitors By Country Map */
var markers = [
    {
      name: "Usa",
      coords: [40.3, -101.38],
    },
    {
      name: "India",
      coords: [20.5937, 78.9629],
    },
    {
      name: "Vatican City",
      coords: [41.9, 12.45],
    },
    {
      name: "Canada",
      coords: [56.1304, -106.3468],
    },
    {
      name: "Mauritius",
      coords: [-20.2, 57.5],
    },
    {
      name: "Singapore",
      coords: [1.3, 103.8],
    },
    {
      name: "Palau",
      coords: [7.35, 134.46],
    },
    {
      name: "Maldives",
      coords: [3.2, 73.22],
    },
    {
      name: "São Tomé and Príncipe",
      coords: [0.33, 6.73],
    },
  ];
  var map = new jsVectorMap({
    map: "world_merc",
    selector: "#visitors-countries",
    markersSelectable: true,
    zoomOnScroll: false,
    zoomButtons: false,
  
    onMarkerSelected(index, isSelected, selectedMarkers) {
      console.log(index, isSelected, selectedMarkers);
    },
  
    // -------- Labels --------
    labels: {
      markers: {
        render: function (marker) {
          return marker.name;
        },
      },
    },
  
    // -------- Marker and label style --------
    markers: markers,
    markerStyle: {
      hover: {
        stroke: "#DDD",
        strokeWidth: 3,
        fill: "#FFF",
      },
      selected: {
        fill: "#ff525d",
      },
    },
    markerLabelStyle: {
      initial: {
        fontFamily: "Poppins",
        fontSize: 13,
        fontWeight: 500,
        fill: "#35373e",
      },
    },
  });
  /* Visitors By Country Map */

  /* simple donut chart */
var options = {
    series: [44, 55, 41],
    chart: {
      type: "donut",
      height: 340,
    },
    legend: {
      position: "bottom",
    },
    colors: ["#1753fc", "#00e396", "#feb019"],
    dataLabels: {
      dropShadow: {
        enabled: false,
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#customer-retention"), options);
  chart.render();
  function customerretention() {
    chart.updateOptions({
        colors: ["rgb(" + myVarVal + ")", "#00e396", "#feb019"],
    })
  };
  