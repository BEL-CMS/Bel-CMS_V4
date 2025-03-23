/* Project Status Chart */
var options = {
    chart: {
        height: 110,
        width: 100,
        type: "radialBar",
    },

    series: [70],
    colors: ["#00e3d2"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "50%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: 5,
                    color: "#00e3d2",
                    fontSize: "10px",
                    fontWeight: "400",
                    show: true
                },
                value: {
                    show: false,
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["7/10"]
};
document.querySelector("#project-status").innerHTML = ""
var chart = new ApexCharts(document.querySelector("#project-status"), options);
chart.render();
/* Project Status Chart */