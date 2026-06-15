// >>---------------------------------------- //Chart js Start// ---------------------------------------- <<
document.addEventListener('DOMContentLoaded', function() {
    console.log('Chart page loaded, setting up theme listener');

    // Listen for storage changes (when theme changes)
    window.addEventListener('storage', function(e) {
        if (e.key === 'theme_color') {
            console.log('Theme changed via storage event');
            setTimeout(function() {
                if (typeof window.updateChartColors === 'function') {
                    window.updateChartColors();
                }
            }, 100);
        }
    });

    // Also listen for direct clicks
    document.addEventListener('click', function(e) {
        const themeColorItem = e.target.closest('.theme-color-list li');
        if (themeColorItem) {
            console.log('Theme color clicked on chart page');
            setTimeout(function() {
                if (typeof window.updateChartColors === 'function') {
                    console.log('Calling updateChartColors from chart page');
                    window.updateChartColors();
                } else {
                    console.error('updateChartColors function not found!');
                }
            }, 100);
        }
    });
});
// Helper function to get CSS variable color
function getCSSColor(varName, opacity = 1) {
    const root = getComputedStyle(document.body);
    const rgbValues = root.getPropertyValue(varName).trim();
    console.log(`Getting color for ${varName}: rgba(${rgbValues}, ${opacity})`);
    return `rgba(${rgbValues}, ${opacity})`;
}

// Store chart instances globally for updates
const chartInstances = {};

// Wait for DOM to be ready and theme to be applied
document.addEventListener('DOMContentLoaded', function() {
    // Small delay to ensure theme class is applied to body
    setTimeout(initializeCharts, 100);
});

function initializeCharts() {

//  <<------Bar Chart Border Radius------>>
    const ctx = document.getElementById('myChart');
    Chart.defaults.font.size = 16;
    Chart.defaults.font.family = "Lexend Deca ,sans-serif";
    Chart.defaults.color = 'rgba(var(--dark), 1)';
    Chart.defaults.font.weight = 500;


    const css = getComputedStyle(document.documentElement);


    chartInstances.myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [{
                label: "Dataset #1",
                borderColor: getCSSColor('--primary', 1),
                backgroundColor: getCSSColor('--primary', 0.2),
                borderWidth: 2,
                borderRadius: 5,
                borderSkipped: false,
                data: [-65, 59, -20, 81, 56, -55, 40]
            },
                {
                    label: "Dataset #2",

                    backgroundColor: getCSSColor('--primary', 0.2),
                    borderColor: getCSSColor('--primary', 0.2),
                    borderWidth: 2,
                    borderRadius: 50,
                    borderSkipped: false,
                    data: [65, 59, -20, 81, -56, 55, -40]
                }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,

                }

            }
        }
    });

// >>------Vertical Bar Chart------------<<
    const chart1 = document.getElementById('myChart1');

    chartInstances.myChart1 = new Chart(chart1, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [{
                label: "Dataset #1",
                borderColor: getCSSColor('--primary', 1),
                backgroundColor: getCSSColor('--primary', 0.5),

                data: [-65, 59, -20, 81, 56, -55, 40]
            },
                {
                    label: "Dataset #2",
                    borderColor: getCSSColor('--primary', 1),
                    backgroundColor: getCSSColor('--primary', 0.5),
                    data: [65, 59, -20, 81, -56, 55, -40]
                }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
    });

//    >>------ Line Chart----------<<

    const chart2 = document.getElementById('myChart2');

    chartInstances.myChart2 = new Chart(chart2, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [{
                label: "Dataset #1",
                borderColor: getCSSColor('--primary', 1),
                backgroundColor: getCSSColor('--primary', 0.2),

                data: [-20, 54, -20, -5, 56, -55, 40]
            },
                {
                    label: "Dataset #2",
                    borderColor: getCSSColor('--danger', 0.2),
                    backgroundColor: getCSSColor('--danger', 0.2),
                    data: [90, 59, -10, 81, -56, 10, -40]
                }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
    });

// >>------ Stepped Line Charts-----------<<
    const chart3 = document.getElementById('myChart3');

    chartInstances.myChart3 = new Chart(chart3, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [{
                label: "Dataset #1",
                borderColor: getCSSColor('--danger', 1),
                backgroundColor: getCSSColor('--danger', 0.2),

                fill: false,
                stepped: true,
                data: [-20, 54, -20, -5, 56, -55, 40]
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false,

                }
            }
        }
    });


//  >>--------Radar skip points------------<<

    const chart4 = document.getElementById('myChart4');

    chartInstances.myChart4 = new Chart(chart4, {
        type: 'radar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [{
                label: "Dataset #1",
                borderColor: getCSSColor('--success', 0.2),
                backgroundColor: getCSSColor('--success', 0.2),

                data: [-20, 25, -20, -5, 35, -10, 20]
            },
                {
                    label: "Dataset #2",
                    borderColor: getCSSColor('--primary', 1),
                    backgroundColor: getCSSColor('--primary', 0.2),


                    data: [-20, -23, 20, 0, 8, 25, -20]
                }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

// >>----------Doughnut------<<

    const chart5 = document.getElementById('myChart5');

    chartInstances.myChart5 = new Chart(chart5, {
        type: 'doughnut',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [
                {
                    label: "Dataset #1",
                    backgroundColor: [
                        getCSSColor('--primary', 0.5),
                        getCSSColor('--success', 0.5),
                        getCSSColor('--danger', 0.5),


                    ],
                    data: [-20, -54, 20, 0, 56, 55, -40]
                }]
        }
    });

//  >>------Polar area------<<

    const chart6 = document.getElementById('myChart6');

    chartInstances.myChart6 = new Chart(chart6, {
        type: 'polarArea',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [
                {
                    label: "Dataset #1",
                    backgroundColor: [
                        getCSSColor('--primary', 0.5),
                        getCSSColor('--info', 0.5),
                        getCSSColor('--warning', 0.5),


                    ],
                    data: [-10, -54, 40, 20, 56, 55, -40]
                }]
        }
    });

// //  >>------Pie------<<

    const chart7 = document.getElementById('myChart7');

    chartInstances.myChart7 = new Chart(chart7, {
        type: 'pie',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [
                {
                    label: "Dataset #1",
                    backgroundColor: [
                        getCSSColor('--dark', 0.5),
                        getCSSColor('--danger', 0.5),
                        getCSSColor('--info', 0.5),


                    ],
                    data: [-20, -54, 20, 0, 56, 55, -40]
                }]
        }
    });

//   >>------ Multi Series Pie------<<



    const chart8 = document.getElementById('myChart8');

    chartInstances.myChart8 = new Chart(chart8, {
        type: 'pie',
        data: {
            labels: ['Overall Yay', 'Overall Nay', 'Group A Yay', 'Group A Nay', 'Group B Yay', 'Group B Nay', 'Group C Yay', 'Group C Nay'],
            datasets: [
                {
                    backgroundColor: [getCSSColor('--success', 0.10), getCSSColor('--success', 1)],
                    data: [21, 79]
                },
                {
                    backgroundColor:[getCSSColor('--secondary', 0.10), getCSSColor('--success', 1)],
                    data: [33, 67]
                },
                {
                    backgroundColor: [getCSSColor('--primary', 0.5), getCSSColor('--primary', 1)],
                    data: [20, 80]
                },
                {
                    backgroundColor: [getCSSColor('--danger', 0.5), getCSSColor('--danger', 1)],
                    data: [10, 90]
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        generateLabels: function(chart) {
                            // Get the default label list
                            const original = Chart.overrides.pie.plugins.legend.labels.generateLabels;
                            const labelsOriginal = original.call(this, chart);

                            // Build an array of colors used in the datasets of the chart
                            let datasetColors = chart.data.datasets.map(function(e) {
                                return e.backgroundColor;
                            });
                            datasetColors = datasetColors.flat();

                            // Modify the color and hide state of each label
                            labelsOriginal.forEach(label => {
                                // There are twice as many labels as there are datasets. This converts the label index into the corresponding dataset index
                                label.datasetIndex = (label.index - label.index % 2) / 2;

                                // The hidden state must match the dataset's hidden state
                                label.hidden = !chart.isDatasetVisible(label.datasetIndex);

                                // Change the color to match the dataset
                                label.fillStyle = datasetColors[label.index];
                            });

                            return labelsOriginal;

                        },

                        // This more specific font property overrides the global property
                        font: {
                            size: 14
                        }

                    },
                    onClick: function(mouseEvent, legendItem, legend) {
                        // toggle the visibility of the dataset from what it currently is
                        legend.chart.getDatasetMeta(
                            legendItem.datasetIndex
                        ).hidden = legend.chart.isDatasetVisible(legendItem.datasetIndex);
                        legend.chart.update();
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const labelIndex = (context.datasetIndex * 2) + context.dataIndex;
                            return context.chart.data.labels[labelIndex] + ': ' + context.formattedValue;
                        }
                    }
                }
            }
        },
    });

// >>------Progressive Line---------<<
    const data = [];
    const data2 = [];
    let prev = 100;
    let prev2 = 80;
    for (let i = 0; i < 1000; i++) {
        prev += 5 - Math.random() * 10;
        data.push({x: i, y: prev});
        prev2 += 5 - Math.random() * 10;
        data2.push({x: i, y: prev2});
    }
    const totalDuration = 10000;
    const delayBetweenPoints = totalDuration / data.length;
    const previousY = (ctx) => ctx.index === 0 ? ctx.chart.scales.y.getPixelForValue(100) : ctx.chart.getDatasetMeta(ctx.datasetIndex).data[ctx.index - 1].getProps(['y'], true).y;

    const myChart9 = document.getElementById('myChart9');
    chartInstances.myChart9 = new Chart(myChart9, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: getCSSColor('--danger', 1),
                borderWidth: 1,
                radius: 0,
                data: data,
            },
                {
                    borderColor: getCSSColor('--primary', 1),
                    borderWidth: 1,
                    radius: 0,
                    data: data2,
                }]
        },
        options: {
            animation:{
                x: {
                    type: 'number',
                    easing: 'linear',
                    duration: delayBetweenPoints,
                    from: NaN, // the point is initially skipped
                    delay(ctx) {
                        if (ctx.type !== 'data' || ctx.xStarted) {
                            return 0;
                        }
                        ctx.xStarted = true;
                        return ctx.index * delayBetweenPoints;
                    }
                },
                y: {
                    type: 'number',
                    easing: 'linear',
                    duration: delayBetweenPoints,
                    from: previousY,
                    delay(ctx) {
                        if (ctx.type !== 'data' || ctx.yStarted) {
                            return 0;
                        }
                        ctx.yStarted = true;
                        return ctx.index * delayBetweenPoints;
                    }
                }
            },
            interaction: {
                intersect: false
            },
            plugins: {
                legend: false
            },
            scales: {
                x: {
                    type: 'linear'
                }
            }
        }
    });

// Function to update all chart colors when theme changes
    window.updateChartColors = function() {
        console.log('Updating chart colors...');

        // Update myChart (Bar Chart Border Radius)
        if (chartInstances.myChart) {
            chartInstances.myChart.data.datasets[0].borderColor = getCSSColor('--primary', 1);
            chartInstances.myChart.data.datasets[0].backgroundColor = getCSSColor('--primary', 0.2);
            chartInstances.myChart.data.datasets[1].borderColor = getCSSColor('--primary', 0.2);
            chartInstances.myChart.data.datasets[1].backgroundColor = getCSSColor('--primary', 0.2);
            chartInstances.myChart.update();
        }

        // Update myChart1 (Vertical Bar Chart)
        if (chartInstances.myChart1) {
            chartInstances.myChart1.data.datasets[0].borderColor = getCSSColor('--primary', 1);
            chartInstances.myChart1.data.datasets[0].backgroundColor = getCSSColor('--primary', 0.5);
            chartInstances.myChart1.data.datasets[1].borderColor = getCSSColor('--primary', 1);
            chartInstances.myChart1.data.datasets[1].backgroundColor = getCSSColor('--primary', 0.5);
            chartInstances.myChart1.update();
        }

        // Update myChart2 (Line Chart)
        if (chartInstances.myChart2) {
            chartInstances.myChart2.data.datasets[0].borderColor = getCSSColor('--primary', 1);
            chartInstances.myChart2.data.datasets[0].backgroundColor = getCSSColor('--primary', 0.2);
            chartInstances.myChart2.data.datasets[1].borderColor = getCSSColor('--danger', 0.2);
            chartInstances.myChart2.data.datasets[1].backgroundColor = getCSSColor('--danger', 0.2);
            chartInstances.myChart2.update();
        }

        // Update myChart3 (Stepped Line Charts)
        if (chartInstances.myChart3) {
            chartInstances.myChart3.data.datasets[0].borderColor = getCSSColor('--danger', 1);
            chartInstances.myChart3.data.datasets[0].backgroundColor = getCSSColor('--danger', 0.2);
            chartInstances.myChart3.update();
        }

        // Update myChart4 (Radar skip points)
        if (chartInstances.myChart4) {
            chartInstances.myChart4.data.datasets[0].borderColor = getCSSColor('--success', 0.2);
            chartInstances.myChart4.data.datasets[0].backgroundColor = getCSSColor('--success', 0.2);
            chartInstances.myChart4.data.datasets[1].borderColor = getCSSColor('--primary', 1);
            chartInstances.myChart4.data.datasets[1].backgroundColor = getCSSColor('--primary', 0.2);
            chartInstances.myChart4.update();
        }

        // Update myChart5 (Doughnut)
        if (chartInstances.myChart5) {
            chartInstances.myChart5.data.datasets[0].backgroundColor = [
                getCSSColor('--primary', 0.5),
                getCSSColor('--success', 0.5),
                getCSSColor('--danger', 0.5)
            ];
            chartInstances.myChart5.update();
        }

        // Update myChart6 (Polar area)
        if (chartInstances.myChart6) {
            chartInstances.myChart6.data.datasets[0].backgroundColor = [
                getCSSColor('--primary', 0.5),
                getCSSColor('--info', 0.5),
                getCSSColor('--warning', 0.5)
            ];
            chartInstances.myChart6.update();
        }

        // Update myChart7 (Pie)
        if (chartInstances.myChart7) {
            chartInstances.myChart7.data.datasets[0].backgroundColor = [
                getCSSColor('--dark', 0.5),
                getCSSColor('--danger', 0.5),
                getCSSColor('--info', 0.5)
            ];
            chartInstances.myChart7.update();
        }

        // Update myChart8 (Multi Series Pie)
        if (chartInstances.myChart8) {
            chartInstances.myChart8.data.datasets[0].backgroundColor = [getCSSColor('--success', 0.10), getCSSColor('--success', 1)];
            chartInstances.myChart8.data.datasets[1].backgroundColor = [getCSSColor('--secondary', 0.10), getCSSColor('--success', 1)];
            chartInstances.myChart8.data.datasets[2].backgroundColor = [getCSSColor('--primary', 0.5), getCSSColor('--primary', 1)];
            chartInstances.myChart8.data.datasets[3].backgroundColor = [getCSSColor('--danger', 0.5), getCSSColor('--danger', 1)];
            chartInstances.myChart8.update();
        }

        // Update myChart9 (Progressive Line)
        if (chartInstances.myChart9) {
            chartInstances.myChart9.data.datasets[0].borderColor = getCSSColor('--danger', 1);
            chartInstances.myChart9.data.datasets[1].borderColor = getCSSColor('--primary', 1);
            chartInstances.myChart9.update();
        }

        console.log('Chart colors updated!');
    }

} // End of initializeCharts function

// >>---------------------------------------- //Chart js End// ---------------------------------------- <<
