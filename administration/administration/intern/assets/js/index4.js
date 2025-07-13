 //applicantStats//
 var options = {
	chart: {
		height: 370,
		type: "line",
		stacked: false,
        fontFamily: 'poppins, sans-serif',
	},
	dataLabels: {
		enabled: false
	},
	series: [{
		name: 'Male',
		type: 'column',
		data: [106, 100, 130, 132, 114, 112, 225, 128, 87, 100, 253, 167],
	}, {
		name: "Female",
		type: "column",
		data: [92, 75, 123, 111, 196, 122, 159, 102, 138, 136, 62, 240]
	}, {
		name: "Other",
		type: "column",
		data: [109, 175, 103, 131, 156, 162, 159, 142, 108, 176, 162, 140]
	}],
	stroke: {
		width: [0, 0, 0],
		  curve: 'smooth'
	},
	plotOptions: {
		bar: {
			columnWidth: '40%',
            borderRadius: 3,
		}
	},
	markers: {
		size: [0, 0, 3],
		colors: undefined,
		strokeColors: "#000",
		strokeOpacity: 0.6,
		strokeDashArray: 0,
		fillOpacity: 1,
		discrete: [],
		shape: "circle",
		radius: [0, 0, 2],
		offsetX: 0,
		offsetY: 0,
		onClick: undefined,
		onDblClick: undefined,
		showNullDataPoints: true,
		hover: {
			size: undefined,
			sizeOffset: 3
		}
	},
	fill: {
		opacity: [1, 1,1]
	},
	grid: {
		borderColor: '#f2f6f7',
	},
	legend: {
		show: true,
		position: 'top',
		fontWeight: 500,
		fontSize: 13,
		markers: {
			width: 10,
			height: 10,
			shape: 'square',
			radius: 5,
		}
	},
	yaxis: {
		min: 0,
		forceNiceScale: true,
		title: {
			style: {
				color: '#adb5be',
				fontSize: '14px',
				fontFamily: 'poppins, sans-serif',
				fontWeight: 600,
				cssClass: 'apexcharts-yaxis-label',
			},
		},
		labels: {
			formatter: function (y) {
				return y.toFixed(0) + "";
			}
		}
	},
	toolbar:{
		show: false,
	},
	xaxis: {
		type: 'month',
		categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		axisBorder: {
			show: true,
			color: 'rgba(119, 119, 142, 0.05)',
			offsetX: 0,
			offsetY: 0,
		},
		axisTicks: {
			show: true,
			borderType: 'solid',
			color: 'rgba(119, 119, 142, 0.05)',
			width: 6,
			offsetX: 0,
			offsetY: 0
		},
		labels: {
			rotate: -90
		}
	},
	tooltip: {
		enabled: true,
		shared: false,
		intersect: true,
		x: {
			show: false
		}
	},
    colors: ["#1753fc", "#9258f1", "#00b9ff"],
};
var chart1 = new ApexCharts(document.querySelector("#statistics"), options);
chart1.render();
function statistics() {
	chart1.updateOptions({
		colors: ["rgb(" + myVarVal + ")", "#9258f1", "#00b9ff"],
	})
}
 //applicantStats//

  /* simple donut chart */
var options = {
    series: [44, 55, 41,55, 30],
    labels: ["Excellent", "Great", "Good", "Average", "Poor"],
    chart: {
      type: "donut",
      height: 320,
    },
    legend: {
      position: "bottom",
    },
    colors: ["#1753fc", "#00e396", "#feb019","#33c7fd","#a879fd"],
    dataLabels: {
      dropShadow: {
        enabled: false,
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#customer-satisfaction"), options);
  chart.render();
  function customersatisfaction() {
    chart.updateOptions({
        colors: ["rgb(" + myVarVal + ")", "#00e396", "#feb019", "#33c7fd","#a879fd"],
    })
  };
  