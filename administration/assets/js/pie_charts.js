
// >>---------------------------------------- //pie charts js Start// ---------------------------------------- <<
// >>------ pie_charts 1-----<<
const basicPieChartOptions = {
    series: [44, 55, 13, 43, 22],
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        height: 340,
        type: 'pie',
    },
    tooltip: {
        x: {
            show: false,
        },
        style: {
            fontSize: '16px',
        },
    },
    colors: ["rgba(var(--primary),1)","rgba(var(--secondary),1)","rgba(var(--success),1)","rgba(var(--danger),1)","rgba(var(--warning),1)"],
    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
    legend: {
        position: 'bottom'
    },
    responsive: [{
        breakpoint: 1366,
        options: {
            chart: {

                height: 250
            },
            legend: {
                show: false,
            },
        }
    }]
};

const pie1Chart = new ApexCharts(document.querySelector("#basicPieChart"), basicPieChartOptions);
pie1Chart.render();

// >>--------------- updating donuts chart ---------------<<
const donutPieChartOptions = {
    series: [44, 55, 13, 33],
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        height: 340,
        type: 'donut',
    },
    dataLabels: { enabled: false },
    markers: {
        colors: [
            "rgba(var(--primary),1)", "rgba(var(--secondary),1)", "rgba(var(--success),1)","rgba(var(--danger),1)","rgba(var(--warning),1)","rgba(var(--info),1)","rgba(var(--light),1)","rgba(var(--dark),1)",
        ]
    },
    fill: {
        colors: [ "rgba(var(--primary),1)", "rgba(var(--secondary),1)", "rgba(var(--success),1)","rgba(var(--danger),1)","rgba(var(--warning),1)","rgba(var(--info),1)","rgba(var(--light),1)","rgba(var(--dark),1)"]
    },
    labels: ["Device 1", "Device 2", "Device 3", "Device 4"],
    colors: [ "rgba(var(--primary),1)", "rgba(var(--secondary),1)", "rgba(var(--success),1)","rgba(var(--danger),1)","rgba(var(--warning),1)","rgba(var(--info),1)","rgba(var(--light),1)","rgba(var(--dark),1)"],
    responsive: [{
        breakpoint: 1366,
        options: {
            chart: { height: 240 },
            legend: { show: false }
        }
    }],
    legend: {
        position: 'bottom',
        offsetY: 0,
    },
    tooltip: {
        x: { show: false },
        style: { fontSize: '16px' }
    },
};

//>>------- Global chart instance-------<<
let donutPieChart = null;

document.addEventListener("DOMContentLoaded", function () {
    // Initialize chart
    const chartEl = document.querySelector("#donutPieChart");
    if (!chartEl) return;

    donutPieChart = new ApexCharts(chartEl, donutPieChartOptions);
    donutPieChart.render();

    // Button references
    const addBtn = document.querySelector("#add");
    const removeBtn = document.querySelector("#remove");
    const resetBtn = document.querySelector("#reset");

    // Helper functions
    const appendData = () => {
        const arr = donutPieChart.w.globals.series.slice();
        arr.push(Math.floor(Math.random() * 100) + 1);
        return arr;
    };

    const removeData = () => {
        const arr = donutPieChart.w.globals.series.slice();
        arr.pop();
        return arr;
    };

    const reset = () => [44, 55, 13, 33];

    // Event listeners
    addBtn?.addEventListener("click", () => donutPieChart.updateSeries(appendData()));
    removeBtn?.addEventListener("click", () => donutPieChart.updateSeries(removeData()));
    resetBtn?.addEventListener("click", () => donutPieChart.updateSeries(reset()));
});


//>>-------------- simple donut chart-------------<< //
const polarOptions = {
    series: [14, 23, 21, 17, 15],
    height: 600,
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        type: 'polarArea',
    },
    stroke: {
        colors: ['#fff']
    },
    fill: {
        opacity: 0.8
    },
    legend: {
        position: 'bottom'
    },
    colors: [ "rgba(var(--primary),1)", "rgba(var(--secondary),1)", "rgba(var(--success),1)","rgba(var(--danger),1)","rgba(var(--warning),1)"],
    responsive: [{
        breakpoint: 1366,
        options: {
            chart: {
                height:250,
            },
        }
    }]
};

const polarChart = new ApexCharts(document.querySelector("#BasicPolarAreaChat"), polarOptions);
polarChart.render();

//>>----------- patterned donut chart ---------------<<//
const patternedDonutChatOptions = {
    series: [44, 55, 41, 17, 15],
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        height: 380,
        type: 'donut',
        dropShadow: {
            enabled: true,
            color: '#111',
            top: -1,
            left: 3,
            blur: 3,
            opacity: 0.2
        }
    },
    stroke: {
        width: 0,
    },
    plotOptions: {
        pie: {
            donut: {
                labels: {
                    show: true,
                    total: {
                        showAlways: true,
                        show: true
                    }
                }
            }
        }
    },
    labels: ["Comedy", "Action", "SciFi", "Drama", "Horror"],
    dataLabels: {
        dropShadow: {
            blur: 3,
            opacity: 0.8
        }
    },
    fill: {
        type: 'pattern',
        opacity: 1,
        pattern: {
            enabled: true,
            style: ['verticalLines', 'squares', 'horizontalLines', 'circles', 'slantedLines'],
        },
    },
    states: {
        hover: {
            filter: 'none'
        }
    },
    theme: {
        palette: 'palette2'
    },
    title: {
        text: "Favourite Movie Type"
    },
    legend: {
        position: 'bottom',
    },
    responsive: [{
        breakpoint: 1366,
        options: {
            chart: {
                height: 250
            },
            legend: {
                show: false,
            },
        }
    }],
    colors: [ "rgba(var(--primary),1)", "rgba(var(--secondary),1)", "rgba(var(--success),1)","rgba(var(--danger),1)","rgba(var(--warning),1)"],
};

const chart4Chart = new ApexCharts(document.querySelector("#patternedDonutChat"), patternedDonutChatOptions);
chart4Chart.render();


// >----------pie chart with img ----------<<
const basicPieImageChartOptions = {
    series: [44, 33, 54, 45],
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        height: 340,
        type: 'pie',
    },
    colors: [ "rgba(var(--primary),1)", "rgba(var(--secondary),1)", "rgba(var(--success),1)","rgba(var(--danger),1)","rgba(var(--warning),1)"],
    fill: {
        type: 'image',
        opacity: 0.85,
        image: {
            src: ['../assets/images/checkbox/01.jpg', '../assets/images/checkbox/01.jpg', '../assets/images/checkbox/01.jpg', '../assets/images/checkbox/01.jpg'],
            width: 25,
            imagedHeight: 25
        },
    },
    stroke: {
        width: 4
    },
    legend: {
        position: 'bottom',
    },
    dataLabels: {
        enabled: true,
        style: {
            colors: ['#111']
        },
        background: {
            enabled: true,
            foreColor: '#fff',
            borderWidth: 0
        }
    },
};

const chart5Chart = new ApexCharts(document.querySelector("#basicPieImageChart"), basicPieImageChartOptions);
chart5Chart.render();

// >>---------------------------------------- //pie charts js End// ---------------------------------------- <<
