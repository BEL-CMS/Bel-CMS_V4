(function () {
    "use strict" 
    var options = {
        series: [{
        data: [400, 540, 580, 690 ]
    }],
        chart: {
        type: 'bar',
        height: 200,
        toolbar: {
            show: false,
        }
    },
    colors: ['#00ffbe', '#ebf748', '#48f768', '#00e3d2'],
    plotOptions: {
        bar: {
        borderRadius: 1,
        horizontal: true,
        barHeight: '40%',
        dataLabels: {
            position: 'top'
        },
        distributed: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    xaxis: {
        categories: ["New", "Completed", "Pending", "Ongoing"],
    },
    };

    var chart = new ApexCharts(document.querySelector("#transactions"), options);
    chart.render();
})();