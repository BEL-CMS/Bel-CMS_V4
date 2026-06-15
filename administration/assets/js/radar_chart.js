//  >>--------------------------radar_chart js start --------------------------------<<

const radar1options = {
    series: [{
        name: 'Series 1',
        data: [80, 50, 30, 40, 100, 20],
    }],
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        height: 350,
        type: 'radar',
    },
    plotOptions: {
        radar: {
            polygons: {
                strokeColor: 'rgba(var(--secondary),1)',
                fill: {
                    colors: ['rgba(var(--light),.1)', 'rgba(var(--white),1)'],
                }
            }
        }
    },
    stroke: {
        show: true,
        width: 3,
        colors: ['rgba(var(--primary),1)'],
        dashArray: 0
    },
    colors: ['rgba(var(--primary),.2)'],
    xaxis: {
        categories: ['January', 'February', 'March', 'April', 'May', 'June']
    }
};

const radar1chart = new ApexCharts(document.querySelector("#radarChart1"), radar1options);
radar1chart.render();

//  >>------radar chart 2------<<

const radar2options = {
    series: [{
        name: 'Series 1',
        data: [80, 50, 30, 40, 100, 20],
    }, {
        name: 'Series 2',
        data: [20, 30, 40, 80, 20, 80],
    }, {
        name: 'Series 3',
        data: [44, 76, 78, 13, 43, 10],
    }],
    chart: {
        height: 350,
        fontFamily: "Lexend Deca , sans-serif",
        type: 'radar',
        dropShadow: {
            enabled: true,
            blur: 1,
            left: 1,
            top: 1
        }
    },
    fill: {
        opacity: 0.1
    },
    markers: {
        size: 0
    },
    xaxis: {
        categories: ['2011', '2012', '2013', '2014', '2015', '2016']
    },
    stroke: {
        show: true,
        width: 3,
        colors: ['rgba(var(--primary),1)',"rgba(var(--secondary),1)","rgba(var(--success),1)"],
        dashArray: 0
    },
    colors: ["rgba(var(--primary),.1)","rgba(var(--secondary),.1)","rgba(var(--success),.1)",],
};

const radar2chart = new ApexCharts(document.querySelector("#radarChart2"), radar2options);
radar2chart.render();

//  >>-----radar chart 3--------<<

const radar3options = {
    series: [{
        name: 'Series 1',
        data: [20, 100, 40, 30, 50, 80, 33],
    }],
    chart: {
        fontFamily: "Lexend Deca , sans-serif",
        height: 350,
        type: 'radar',
    },
    dataLabels: {
        enabled: true
    },
    plotOptions: {
        radar: {
            size: 140,
            polygons: {
                strokeColors: '#e9e9e9',

            }
        }
    },

    colors: ['#f2a84f'],
    markers: {
        size: 4,
        colors: ['#fff'],
        strokeColor: '#eaea4f',
        strokeWidth: 2,
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val
            }
        }
    },
    xaxis: {
        categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
    },
    yaxis: {
        tickAmount: 7,
        labels: {
            formatter: function(val, i) {
                if (i % 2 === 0) {
                    return val
                } else {
                    return ''
                }
            }
        }
    }
};

const radar3chart = new ApexCharts(document.querySelector("#radarChart3"), radar3options);
radar3chart.render();

// >>---------------------------------------- // radar_chart js End// ----------------------------------------<< //
