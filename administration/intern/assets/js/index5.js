/* leadschart */
var spark1 = {
    chart: {
        type: "line",
        height: 60,
        width: 110,
        sparkline: {
            enabled: true,
        },
        dropShadow: {
            enabled: false,
            enabledOnSeries: undefined,
            top: 0,
            left: 0,
            blur: 3,
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
        lineCap: "butt",
        colors: undefined,
        width: 2,
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
document.getElementById("leadschart").innerHTML = "";
var spark1 = new ApexCharts(
    document.querySelector("#leadschart"),
    spark1
);
spark1.render();
function leadschart() {
    spark1.updateOptions({
        colors: ["rgb(" + myVarVal + ")"],
    })
};
/* leadschart */

/* leadschart2 */
var spark2 = {
    chart: {
        type: "line",
        height: 60,
        width: 110,
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
        lineCap: "butt",
        colors: undefined,
        width: 2,
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
document.getElementById("leadschart2").innerHTML = "";
var spark2 = new ApexCharts(document.querySelector("#leadschart2"), spark2);
spark2.render();
/* leadschart2 */

/* leadschart3 */
var spark2 = {
    chart: {
        type: "line",
        height: 60,
        width: 110,
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
        lineCap: "butt",
        colors: undefined,
        width: 2,
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
    colors: ["#e34a42"],
};
document.getElementById("leadschart3").innerHTML = "";
var spark2 = new ApexCharts(document.querySelector("#leadschart3"), spark2);
spark2.render();
/* leadschart3 */

/* leadschart4 */
var spark2 = {
    chart: {
        type: "line",
        height: 60,
        width: 110,
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
        lineCap: "butt",
        colors: undefined,
        width: 2,
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
document.getElementById("leadschart4").innerHTML = "";
var spark2 = new ApexCharts(document.querySelector("#leadschart4"), spark2);
spark2.render();
/* leadschart4 */

/* barOne Summary chart */
var options = {
    series: [{
        name: 'Income',
        type: 'area',
        data: [44, 42, 57, 86, 112, 55, 70, 43, 23, 54, 77, 34],
    }, {
        name: 'Expances',
        type: 'line',
        data: [20, 88, 58, 120, 80, 95, 35, 88, 60, 85, 75, 85]
    }],
    chart: {
        type: 'area',
        height: 380
    },
    grid: {
        borderColor: 'rgba(167, 180, 201 ,0.2)',
    },
    markers: {
        size: [0, 0],
        strokeColors: '#fff',
        strokeWidth: [0, 0],
        strokeOpacity: 0.9,
    },
    stroke: {
        curve: 'smooth',
        width: 2,
        dashArray: [0, 0]
    },
    fill: {
        type: ['gradient', 'gradient'],
        gradient: {
            shade: 'light',
            type: "vertical",
            opacityFrom: [0.6, 1],
            opacityTo: [0.2, 1],
            stops: [0, 100]
        }
    },
    dataLabels: {
        enabled: false,
    },
    legend: {
        show: true,
        position: 'top',
        labels: {
            colors: '#74767c',
        },
    },
    yaxis: {
        labels: {
            formatter: function (y) {
                return y.toFixed(0) + "";
            }
        },
        labels: {
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    xaxis: {
        type: 'month',
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'sep', 'oct', 'nov', 'dec'],
        axisBorder: {
            show: true,
            color: 'rgba(167, 180, 201 ,0.2)',
            offsetX: 0,
            offsetY: 0,
        },
        axisTicks: {
            show: true,
            borderType: 'solid',
            color: 'rgba(167, 180, 201 ,0.2)',
            width: 6,
            offsetX: 0,
            offsetY: 0
        },
        labels: {
            rotate: -90,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    colors: ['#9258f1', "#1753fc"],
};
document.getElementById('barOne').innerHTML = '';
var chart1 = new ApexCharts(document.querySelector("#barOne"), options);
chart1.render();
function barOne() {
    chart1.updateOptions({
        colors: ["#9258f1", "rgb(" + myVarVal + ")"],
    })
};
/* barOne Summary chart closed*/

/* clasification Chart */
var options2 = {
    chart: {
        height: 180,
        width: 120,
        type: "radialBar",
    },

    series: [70],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "55%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: ".625rem",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: ".875rem",
                    show: true,
                    fontWeight: 600
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    colors: ["#1753fc"],
    labels: ["Status"]
};
document.querySelector("#clasification").innerHTML = ""
var chart6 = new ApexCharts(document.querySelector("#clasification"), options2);
chart6.render();
function clasification1() {
    chart6.updateOptions({
        colors: ["rgb(" + myVarVal + ")"],
    })
};
/* clasification  Chart */

/* clasification2 Chart */
var options = {
    chart: {
        height: 180,
        width: 120,
        type: "radialBar",
    },

    series: [70],
    colors: ["#9258f1"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "55%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: ".625rem",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: ".875rem",
                    show: true,
                    fontWeight: 600
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["Status"]
};
document.querySelector("#clasification2").innerHTML = ""
var chart = new ApexCharts(document.querySelector("#clasification2"), options);
chart.render();
/* clasification2  Chart */

/* simple donut chart */
var options = {
    series: [44, 55, 41],
    labels: ["Campaign 1", "Campaign 2", "Campaign 3"],
    chart: {
        type: "donut",
        height: 270,
    },
    legend: {
        position: "bottom",
    },
    colors: ["#1753fc", "#feb019", "#a06ff2"],
    dataLabels: {
        dropShadow: {
            enabled: false,
        },
    },
};
var chart = new ApexCharts(document.querySelector("#morrisBar9"), options);
chart.render();
function morrisBar9() {
    chart.updateOptions({
        colors: ["rgb(" + myVarVal + ")", "#feb019", "#a06ff2"],
    })
};

// Leads By Source Chart
var options = {
    series: [{
        name: 'Sessions',
        data: [450, 480, 550, 540, 1100, 1200, 1380]
    }],
    chart: {
        fontFamily: 'Poppins, Arial, sans-serif',
        toolbar: {
            show: false
        },
        type: 'bar',
        height: 250
    },
    grid: {
        borderColor: '#f2f6f7',
    },
    plotOptions: {
        bar: {
            horizontal: false,
            barHeight: "30%",
            borderRadius: 1,
        }
    },
    colors: ["#f59032"],
    dataLabels: {
        enabled: false
    },
    xaxis: {
        categories: ['Mon', 'Tue', 'Wen', 'Thu', 'Fri', 'Sat', 'Sun'],
    }
};
var chart2 = new ApexCharts(document.querySelector("#lineChart1"), options);
chart2.render();

function lineChart1() {
    chart2.updateOptions({
        colors: ["rgba(" + myVarVal + ", 0.95)"],
    })
}