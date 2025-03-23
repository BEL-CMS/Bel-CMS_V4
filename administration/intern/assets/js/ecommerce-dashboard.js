"use strict";

/* total sales */
var options = {
    chart: {
        height: 120,
        width: 100,
        type: "radialBar",
    },
    series: [48],
    colors: ["var(--primary-color)"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "50%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: "10px",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: "11px",
                    show: true,
                    fontWeight: 500
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["Followers"]
};
var chart5 = new ApexCharts(document.querySelector("#total-sales"), options);
chart5.render();
/* total sales */

/* total revenue */
var options = {
    chart: {
        height: 120,
        width: 100,
        type: "radialBar",
    },
    series: [62],
    colors: ["var(--primary-color)"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "50%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: "10px",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: "11px",
                    show: true,
                    fontWeight: 500
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["Followers"]
};
var chart5 = new ApexCharts(document.querySelector("#total-revenue"), options);
chart5.render();
/* total revenue */

/* page views */
var options = {
    chart: {
        height: 120,
        width: 100,
        type: "radialBar",
    },
    series: [80],
    colors: ["var(--primary-color)"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "50%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: "10px",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: "11px",
                    show: true,
                    fontWeight: 500
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["Followers"]
};
var chart5 = new ApexCharts(document.querySelector("#page-views"), options);
chart5.render();
/* page views */

/* profit per sale */
var options = {
    chart: {
        height: 120,
        width: 100,
        type: "radialBar",
    },
    series: [25],
    colors: ["var(--primary-color)"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "50%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: "10px",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: "11px",
                    show: true,
                    fontWeight: 500
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["Followers"]
};
var chart5 = new ApexCharts(document.querySelector("#profit-per-sale"), options);
chart5.render();
/* profit per sale */

/* sales statistics */
var options = {
    series: [
        {
            name: "Sales",
            data: [100, 210, 180, 454, 230, 320, 656, 830, 350, 350, 210, 410],
        },
        {
            name: "Refunds",
            data: [200, 530, 110, 130, 480, 520, 780, 435, 475, 738, 454, 480],
        }
    ],
    chart: {
        type: "area",
        height: 318,
        toolbar: {
            show: false
        }
    },
    colors: [
        "var(--primary-color)",
        "rgb(0, 227, 210)",
    ],
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
                        color: "var(--primary-color)",
                        opacity: 1
                    },
                    {
                        offset: 50,
                        color: "var(--primary-color)",
                        opacity: 0.2
                    },
                    {
                        offset: 100,
                        color: "var(--primary-color)",
                        opacity: 0.0
                    }
                ],
                [
                    {
                        offset: 0,
                        color: "rgb(0, 227, 210)",
                        opacity: 1
                    },
                    {
                        offset: 50,
                        color: "rgb(0, 227, 210)",
                        opacity: 0.2
                    },
                    {
                        offset: 100,
                        color: "rgb(0, 227, 210)",
                        opacity: 0.0
                    }
                ],
            ]
        }
    },
    dataLabels: {
        enabled: false,
    },
    legend: {
        show: true,
        position: "top",
        offsetX: 0,
        offsetY: 8,
        markers: {
            width: 5,
            height: 5,
            strokeWidth: 0,
            strokeColor: '#fff',
            fillColors: undefined,
            radius: 12,
            customHTML: undefined,
            onClick: undefined,
            offsetX: 0,
            offsetY: 0
        },
    },
    stroke: {
        curve: 'smooth',
        width: [1, 1],
        lineCap: 'round',
    },
    grid: {
        borderColor: "#edeef1",
        strokeDashArray: 2,
    },
    yaxis: {
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
};
var chart4 = new ApexCharts(document.querySelector("#sales-statistics"), options);
chart4.render();
/* sales statistics */

/* website traffic */
var _seed = 42;
Math.random = function() {
  _seed = _seed * 16807 % 2147483647;
  return (_seed - 1) / 2147483646;
};
var lastDate = 0;
var data = [];
var TICKINTERVAL = 86400000;
let XAXISRANGE = 777600000;
function getDayWiseTimeSeries(baseval, count, yrange) {
  var i = 0;
  while (i < count) {
    var x = baseval + i * TICKINTERVAL;
    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
    console.log(x);
    console.log(y);
    data.push({
      x, y
    });
    lastDate = x;
    i++;
  }

  // Ensure data length is exactly 20
  if (data.length > 20) {
    data = data.slice(data.length - 20);
  }
}
getDayWiseTimeSeries(new Date('11 Feb 2024 GMT').getTime(), 20, {
  min: 10,
  max: 90
});
function getNewSeries(baseval, yrange) {
  var newDate = baseval + TICKINTERVAL;
  lastDate = newDate;

  for (var i = 0; i < data.length - 10; i++) {
    // IMPORTANT
    // we reset the x and y of the data which is out of drawing area
    // to prevent memory leaks
    data[i].x = newDate - XAXISRANGE - TICKINTERVAL;
    data[i].y = 0;
  }

  data.push({
    x: newDate,
    y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
  });

  // Ensure data length is capped at 20
  data = data.slice(-20);
}
var options = {
  series: [{
    data: data.slice()
  }],
  chart: {
    id: 'realtime',
    height: 300,
    type: 'bar',
    animations: {
      enabled: true,
      easing: 'linear',
      dynamicAnimation: {
        speed: 500
      }
    },
    toolbar: {
      show: false
    },
    zoom: {
      enabled: false
    }
  },
  plotOptions: {
    bar: {
      columnWidth: "30%",
      borderRadius:4
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth'
  },
  colors: ["var(--primary-color)"],
  markers: {
    size: 0
  },
  fill: {
    type: "gradient",
    gradient: {
      shade: "dark",
      type: "vertical",
      shadeIntensity: 0.5,
      inverseColors: false,
      gradientToColors: ["rgb(0, 227, 210)"],
      opacityFrom: 1,
      opacityTo: 0,
      stops: [0, 90, 100]
    }
  },
  xaxis: {
    type: 'datetime',
    range: XAXISRANGE,
    labels: {
      show: true,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
    crosshairs: {
      show: false,
    }
  },
  yaxis: {
    max: 100,
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
    crosshairs: {
      show: false,
    }
  },
  legend: {
    show: false
  },
};
var chart = new ApexCharts(document.querySelector("#website-traffic"), options);
chart.render();
window.setInterval(function () {
  getNewSeries(lastDate, {
    min: 10,
    max: 90
  });
  chart.updateSeries([{
    data: data
  }]);
}, 3000);
/* website traffic */

/* Profit Analysis */
var options = {
    chart: {
        height: 250,
        type: 'radialBar',
        responsive: 'true',
    },
    plotOptions: {
        radialBar: {
            startAngle: -135,
            endAngle: 135,
            size: 120,
            imageWidth: 50,
            imageHeight: 50,
            track: {
                strokeWidth: "0",
            },
            dropShadow: {
                enabled: false,
                top: 0,
                left: 0,
                bottom: 0,
                blur: 3,
                opacity: 0.5
            },
            dataLabels: {
                name: {
                    fontSize: '16px',
                    color: undefined,
                    offsetY: 30,
                },
                hollow: {
                    size: "60%"
                },
                value: {
                    offsetY: -10,
                    fontSize: '22px',
                    color: undefined,
                    formatter: function (val) {
                        return val + "%";
                    }
                }
            }
        }
    },
    colors: ['var(--primary-color)'],
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 1,
        type: "horizontal",
        gradientToColors: ["rgb(0, 227, 210)"],
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100]
      }
    },
    stroke: {
        dashArray: 3
    },
    series: [92],
    labels: ["Profit"]
};
var chart1 = new ApexCharts(document.querySelector("#profit-analysis"), options);
chart1.render();
/* Profit Analysis */

/* Map */
var markers = [
    { name: 'Russia', coords: [61.5240, 105.3188] },
    { name: 'Egypt', coords: [26.8206, 30.8025] },
    { name: 'Greenland', coords: [71.7069, -42.6043], offsets: [2, 10] },
    { name: 'Canada', coords: [56, -106], offsets: [-7, 12] },
]
var lines = [
    { from: 'Russia', to: 'Egypt', style: { stroke: '#abb0b7', strokeWidth: 1.5 } },
    { from: 'Canada', to: 'Russia', style: { stroke: '#abb0b7', strokeWidth: 1.5 } },
]
new jsVectorMap({
    map: 'world_merc',
    selector: document.querySelector('#top-country-sales'),
    // -------- Labels --------
    labels: {
        markers: {
            render: function (marker) {
                return marker.name
            },
            offsets: function (index) {
                return markers[index].offsets || [0, 0]
            }
        },
    },
    // -------- Marker and label style --------
    markers: markers,
    lines: lines,
    zoomOnScroll: false,
    zoomButtons: false,
    lineStyle: {
        animation: true,
        strokeDasharray: "6 3 6",
    },
    markerStyle: {
        initial: {
            r: 6,
            fill: 'rgb(0, 227, 210)',
            stroke: 'rgba(255,255,255,0.1)',
            strokeWidth: 3,
        }
    },
    markerLabelStyle: {
        initial: {
            fontSize: 13,
            fontWeight: 500,
            fill: '#35373e',
        },
    },
})
/* Map */

/* Tilt JS */
const tilt = document.querySelectorAll(".tilt");
VanillaTilt.init(tilt, {
    reverse: true,
    max: 15,
    speed: 300,
    scale: 1,
    glare: true,
    reset: true,
    perspective: 500,
    transition: true,
    "max-glare": 0.45,
    "glare-prerender": false,
    gyroscope: true,
    gyroscopeMinAngleX: -45,
    gyroscopeMaxAngleX: 45,
    gyroscopeMinAngleY: -45,
    gyroscopeMaxAngleY: 45
});
/* Tilt JS */