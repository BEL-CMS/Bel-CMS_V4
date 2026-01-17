(function () {
    "use strict";

    /* line chart  */
    Chart.defaults.borderColor = "rgba(142, 156, 173,0.1)", Chart.defaults.color = "#8c9097";
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(152, 95, 253)',
            borderColor: 'rgb(152, 95, 253)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    };
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
    const myChart = new Chart(
        document.getElementById('chartjs-line'),
        config
    );

    /* bar chart */
    const labels1 = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
    ];
    const data1 = {
        labels: labels1,
        datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: [
                'rgba(152, 95, 253, 0.2)',
                'rgba(255, 73, 205, 0.2)',
                'rgba(253, 175, 34, 0.2)',
                'rgba(50, 212, 132, 0.2)',
                'rgba(0, 201, 255, 0.2)',
                'rgba(255, 103, 87, 0.2)',
                'rgba(10, 10, 10, 0.2)'
            ],
            borderColor: [ 
                'rgb(152, 95, 253)',
                'rgb(255, 73, 205)',
                'rgb(253, 175, 34)',
                'rgb(50, 212, 132)',
                'rgb(0, 201, 255)',
                'rgb(255, 103, 87)',
                'rgb(10, 10, 10)'
            ],
            borderWidth: 1
        }]
    };
    const config1 = {
        type: 'bar',
        data: data1,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const myChart1 = new Chart(
        document.getElementById('chartjs-bar'),
        config1
    );

    /* pie chart */
    const data2 = {
        labels: [
            'Purple',
            'Pink',
            'Yellow'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
                'rgb(152, 95, 253)',
                'rgb(255, 73, 205)',
                'rgb(253, 175, 34)'
            ],
            hoverOffset: 4
        }]
    };
    const config3 = {
        type: 'pie',
        data: data2,
    };
    const myChart2 = new Chart(
        document.getElementById('chartjs-pie'),
        config3
    );

    /* doughnut chart */
    const data3 = {
        labels: [
            'Purple',
            'Pink',
            'Yellow'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
                'rgb(152, 95, 253)',
                'rgb(255, 73, 205)',
                'rgb(253, 175, 34)'
            ],
            hoverOffset: 4
        }]
    };
    const config4 = {
        type: 'doughnut',
        data: data3,
    };
    const myChart3 = new Chart(
        document.getElementById('chartjs-doughnut'),
        config4
    );

    /* mixed chart */
    const data4 = {
        labels: [
            'January',
            'February',
            'March',
            'April'
        ],
        datasets: [{
            type: 'bar',
            label: 'Bar Dataset',
            data: [10, 20, 30, 40],
            borderColor: 'rgb(152, 95, 253)',
            backgroundColor: 'rgba(152, 95, 253, 0.2)'
        }, {
            type: 'line',
            label: 'Line Dataset',
            data: [50, 50, 50, 50],
            fill: false,
            borderColor: 'rgb(255, 73, 205)'
        }]
    };
    const config5 = {
        type: 'scatter',
        data: data4,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };
    const myChart4 = new Chart(
        document.getElementById('chartjs-mixed'),
        config5
    );

    /* polar area chart */
    const data5 = {
        labels: [
            'Purple',
            'Green',
            'Yellow',
            'Grey',
            'Pink'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [11, 16, 7, 3, 14],
            backgroundColor: [
                'rgb(152, 95, 253)',
                'rgb(75, 192, 192)',
                'rgb(253, 175, 34)',
                'rgb(201, 203, 207)',
                'rgb(255, 73, 205)'
            ]
        }]
    };
    const config6 = {
        type: 'polarArea',
        data: data5,
        options: {}
    };
    const myChart5 = new Chart(
        document.getElementById('chartjs-polar'),
        config6
    );

    /* radial chart */
    const data6 = {
        labels: [
            'Eating',
            'Drinking',
            'Sleeping',
            'Designing',
            'Coding',
            'Cycling',
            'Running'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 90, 81, 56, 55, 40],
            fill: true,
            backgroundColor: 'rgba(152, 95, 253, 0.2)',
            borderColor: 'rgb(152, 95, 253)',
            pointBackgroundColor: 'rgb(152, 95, 253)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(152, 95, 253)'
        }, {
            label: 'My Second Dataset',
            data: [28, 48, 40, 19, 96, 27, 100],
            fill: true,
            backgroundColor: 'rgba(255, 73, 205, 0.2)',
            borderColor: 'rgb(255, 73, 205)',
            pointBackgroundColor: 'rgb(255, 73, 205)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(255, 73, 205)'
        }]
    };
    const config7 = {
        type: 'radar',
        data: data6,
        options: {
            elements: {
                line: {
                    borderWidth: 3
                }
            }
        },
    };
    const myChart6 = new Chart(
        document.getElementById('chartjs-radar'),
        config7
    );

    /* scatter chart */
    const data7 = {
        datasets: [{
            label: 'Scatter Dataset',
            data: [{
                x: -10,
                y: 0
            }, {
                x: 0,
                y: 10
            }, {
                x: 10,
                y: 5
            }, {
                x: 0.5,
                y: 5.5
            }],
            backgroundColor: 'rgb(152, 95, 253)'
        }],
    };
    const config8 = {
        type: 'scatter',
        data: data7,
        options: {
            scales: {
                x: {
                    type: 'linear',
                    position: 'bottom'
                }
            }
        }
    };
    const myChart7 = new Chart(
        document.getElementById('chartjs-scatter'),
        config8
    );

    /* bubble chart */
    const data8 = {
        datasets: [{
            label: 'First Dataset',
            data: [{
                x: 20,
                y: 30,
                r: 15
            }, {
                x: 40,
                y: 10,
                r: 10
            }],
            backgroundColor: 'rgb(152, 95, 253)'
        }]
    };
    const config9 = {
        type: 'bubble',
        data: data8,
        options: {}
    };
    const myChart8 = new Chart(
        document.getElementById('chartjs-bubble'),
        config9
    );

})();