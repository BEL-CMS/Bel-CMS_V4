

// for your balance card
var nft1 = {
	chart: {
		type: 'bar',
		height: 80,
		sparkline: {
			enabled: true
		}
	},
	stroke: {
		show: true,
		curve: 'smooth',
		lineCap: 'butt',
		colors: undefined,
		dashArray: 0,
	},
	fill: {
		gradient: {
			enabled: false
		}
	},
	series: [{
		name: 'Value',
		data: [14, 12, 17, 16, 18, 15, 18, 23, 28, 44, 40, 34, 34, 22, 37, 46, 21, 35, 40, 34, 46, 55, 62, 55, 23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 45, 35]
	}],
	yaxis: {
		min: 0,
		show: false,
		axisBorder: {
			show: false
		},
	},
	xaxis: {
		show: false,
		axisBorder: {
			show: false
		},
	},
	colors: ["var(--primary-color)"],

}
document.getElementById('nft-balance-chart').innerHTML = '';
var nft1 = new ApexCharts(document.querySelector("#nft-balance-chart"), nft1);
nft1.render();

// for NFTs Statistics
var options = {
	series: [{
		name: "Price",
		data: [20, 38, 38, 72, 55, 63, 43, 76, 55, 80, 40, 80]
	}, {
		name: "Volume",
		data: [85, 65, 75, 38, 85, 35, 62, 40, 40, 64, 50, 89]
	}],
	chart: {
		height: 306,
		type: 'line',
		zoom: {
			enabled: false
		},
		dropShadow: {
			enabled: true,
			enabledOnSeries: undefined,
			top: 5,
			left: 0,
			blur: 3,
			color: '#000',
			opacity: 0.1
		},
        toolbar: {
            show: false
        }
	},
	dataLabels: {
		enabled: false
	},
	legend: {
		show: false,
		position: "top",
		horizontalAlign: "center",
		offsetX: -15,
		fontWeight: "bold",
	},
	stroke: {
		curve: 'straight',
		width: '2',
		dashArray: [0, 0],
	},
	grid: {
		borderColor: '#f2f6f7',
	},
	colors: ["var(--primary-color)", "var(--primary02)"],
	yaxis: {
		title: {
			text: 'Statistics',
			style: {
				color: '#adb5be',
				fontSize: '14px',
				fontFamily: 'Rajdhani',
				fontWeight: 600,
				cssClass: 'apexcharts-yaxis-label',
			},
		},
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
	}
};
document.getElementById('nft-statistics').innerHTML = ''
var chart = new ApexCharts(document.querySelector("#nft-statistics"), options);
chart.render();