(function () {
    "use strict";

    var myElement1 = document.getElementById('files-main-nav');
    new SimpleBar(myElement1, { autoHide: true });

    var myElement3 = document.getElementById('filemanager-file-details');
    new SimpleBar(myElement3, { autoHide: true });

    /* Available Storage Chart */
    var options = {
        chart: {
            height: 80,
            width: 80,
            type: "radialBar",
            sparkline: {
              enabled: true
            },
        },
        series: [58],
        colors: ["rgb(0, 201, 255)"],
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "45%",
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
                        fontSize: "12px",
                        show: true,
                        fontWeight: 800
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        },
        labels: ["Followers"]
    };
    var chart5 = new ApexCharts(document.querySelector("#available-storage"), options);
    chart5.render();
    /* Available Storage Chart */


})();