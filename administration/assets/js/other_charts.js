
// >>---------------------------------------- //Other chart js Start// ---------------------------------------- <<
//  >>------ boxplot chart 1--------<<
const basicBoxplotChartOption = {
    series: [
        {
            type: 'boxPlot',
            data: [
                {
                    x: 'Jan 2015',
                    y: [54, 66, 69, 75, 88]
                },
                {
                    x: 'Jan 2016',
                    y: [43, 65, 69, 76, 81]
                },
                {
                    x: 'Jan 2017',
                    y: [31, 39, 45, 51, 59]
                },
                {
                    x: 'Jan 2018',
                    y: [39, 46, 55, 65, 71]
                },
                {
                    x: 'Jan 2019',
                    y: [29, 31, 35, 39, 44]
                },
                {
                    x: 'Jan 2020',
                    y: [41, 49, 58, 61, 67]
                },
                {
                    x: 'Jan 2021',
                    y: [54, 59, 66, 71, 88]
                }
            ]
        }
    ],
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        type: 'boxPlot',
        height: 350
    },
    title: {
        text: '',
        align: 'left'
    },

    plotOptions: {
        boxPlot: {
            colors: {
                upper: "rgba(var(--primary),1)",
                lower: "rgba(var(--secondary),1)",
            }
        }
    },
    xaxis: {
        labels: {
            style: {
                colors: [],
                fontSize: '14px',
                fontWeight: 500,
            },
        },
    },
    yaxis: {
        labels: {
            style: {
                colors: [],
                fontSize: '14px',
                fontWeight: 500,
            },
        },
    },
    grid: {
        show: true,
        borderColor: 'rgba(var(--dark),.2)',
        strokeDashArray: 2,
        xaxis: {
            lines: {
                show: false
            }
        },
        yaxis: {
            lines: {
                show: true
            },
        }
    },
    tooltip: {
        x: {
            show: false,
        },
        style: {
            fontSize: '16px',
        },
    },
};

const boxplot1Chart = new ApexCharts(document.querySelector("#basicBoxplotChart"), basicBoxplotChartOption);
boxplot1Chart.render();

// <<------Bubble_chart 1----->>
function generateData(baseval, count, yrange) {
    let i = 0;
    const series = [];
    while (i < count) {
        const y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
        const z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

        series.push([baseval, y, z]);
        baseval += 86400000;
        i++;
    }
    return series;
}

const bubbleChartOption = {
    series: [
        {
            name: 'Bubble1',
            data: generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                min: 10,
                max: 60
            })
        },
        {
            name: 'Bubble2',
            data: generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                min: 10,
                max: 60
            })
        },
        {
            name: 'Bubble3',
            data: generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                min: 10,
                max: 60
            })
        },
        {
            name: 'Bubble4',
            data: generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                min: 10,
                max: 60
            })
        }
    ],
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        height: 350,
        type: 'bubble',
    },
    dataLabels: {
        enabled: false
    },
    fill: {
        opacity: 0.8
    },
    xaxis: {
        tickAmount: 12,
        type: 'datetime',
        labels: {
            style: {
                colors: [],
                fontSize: '14px',
                fontWeight: 500,
            },
        },
    },

    colors: [
        "rgba(var(--primary),1)",
        "rgba(var(--secondary),1)",
        "rgba(var(--success),1)",
        "rgba(var(--danger),1)"
    ],
    yaxis: {
        max: 70,
        labels: {
            style: {
                colors: [],
                fontSize: '14px',
                fontWeight: 500,
            },
        },
    },
    grid: {
        show: true,
        borderColor: 'rgba(var(--dark),.2)',
        strokeDashArray: 2,
        xaxis: {
            lines: {
                show: false
            }
        },
        yaxis: {
            lines: {
                show: true
            },
        }
    },
    tooltip: {
        x: {
            show: false,
        },
        style: {
            fontSize: '16px',
        },
    },
};

const bubble1Chart = new ApexCharts(document.querySelector("#basicBubbleChart"), bubbleChartOption);
bubble1Chart.render();

// <<------ scatter chart 1--------->>
const scatterChartOptions = {
    series: [{
        name: 'Messenger',
        data: [
            [16.4, 5.4],
            [21.7, 4],
            [25.4, 3],
            [19, 2],
            [10.9, 1],
            [13.6, 3.2],
            [10.9, 7],
            [10.9, 8.2],
            [16.4, 4],
            [13.6, 4.3],
            [13.6, 12],
            [29.9, 3],
        ]
    }, {
        name: 'Instagram',
        data: [
            [6.4, 5.4],
            [11.7, 4],
            [15.4, 3],
            [9, 2],
            [10.9, 11],
            [20.9, 7],
            [12.9, 8.2],
            [6.4, 14],
            [11.6, 12]
        ]
    }],
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        height: 350,
        type: 'scatter',
        animations: {
            enabled: false,
        },
        zoom: {
            enabled: false,
        },
        toolbar: {
            show: false
        }
    },
    colors: ['#e84344', '#068da6'],
    xaxis: {
        tickAmount: 10,
        min: 0,
        max: 40,
        labels:{
            style: {
                colors: [],
                fontSize: '14px',
                fontWeight: 500,
            },
        }

    },
    yaxis: {
        tickAmount: 7,
        labels:{
            style: {
                colors: [],
                fontSize: '14px',
                fontWeight: 500,
            },
        }
    },
    markers: {
        size: 20
    },
    fill: {
        type: 'image',
        opacity: 1,
        image: {
            src: ['../assets/images/icons/messenger-icon.png', '../assets/images/icons/instagram-icon.png'],
            width: 40,
            height: 40
        }
    },
    legend: {
        labels: {
            useSeriesColors: true
        },
        markers: {
            customHTML: [
                function () {
                    return ''
                }, function () {
                    return ''
                }
            ]
        }
    },
    grid: {
        show: true,
        borderColor: 'rgba(var(--dark),.2)',
        strokeDashArray: 2,
        xaxis: {
            lines: {
                show: false
            }
        },
        yaxis: {
            lines: {
                show: true
            },
        }
    },
    tooltip: {
        x: {
            show: false,
        },
        style: {
            fontSize: '16px',
        },
    },
};

const scatter2Chart = new ApexCharts(document.querySelector("#basicScatterChart"), scatterChartOptions);
scatter2Chart.render();



//  <<------heatmap js----->>
function generateHeatmapData(count, yrange) {
    const data = [];
    for (let i = 0; i < count; i++) {
        data.push(Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min);
    }
    return data;
}

var options = {
    series: [
        { name: 'Metric1', data: generateHeatmapData(20, { min: 0, max: 90 }) },
        { name: 'Metric2', data: generateHeatmapData(20, { min: 0, max: 90 }) },
        { name: 'Metric3', data: generateHeatmapData(20, { min: 0, max: 90 }) },
        { name: 'Metric4', data: generateHeatmapData(20, { min: 0, max: 90 }) },
        { name: 'Metric5', data: generateHeatmapData(20, { min: 0, max: 90 }) },
        { name: 'Metric6', data: generateHeatmapData(20, { min: 0, max: 90 }) },
        { name: 'Metric7', data: generateHeatmapData(20, { min: 0, max: 90 }) },
        { name: 'Metric8', data: generateHeatmapData(20, { min: 0, max: 90 }) },
        { name: 'Metric9', data: generateHeatmapData(20, { min: 0, max: 90 }) }
    ],
    chart: { fontFamily: "Lexend Deca , sans-serif", height: 350, type: 'heatmap' },
    stroke: { width: 0 },
    plotOptions: {
        heatmap: {
            radius: 30,
            enableShades: false,
            colorScale: {
                ranges: [
                    { from: 0, to: 50, color: "rgba(var(--warning),1)", },
                    { from: 51, to: 100, color: "rgba(var(--primary),1)", }
                ]
            }
        }
    },
    dataLabels: { enabled: true, style: { colors: ['#fff'] } },
    xaxis: { type: 'category', labels: { style: { fontSize: '14px', fontWeight: 500 } } },
    yaxis: { labels: { style: { fontSize: '14px', fontWeight: 500 } } },
    tooltip: { x: { show: false }, style: { fontSize: '16px' } }
};

var chart = new ApexCharts(document.querySelector("#basicHeatmapChart"), options);
chart.render();

// >> ---------------------------------------- //Other chart js End// ---------------------------------------- <<
