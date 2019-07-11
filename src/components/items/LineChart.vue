<script>
	import { Line } from 'vue-chartjs';

	export default {
		name: 'LineChart',
		extends: Line,
		props: ['api'],
		data: () => ({
			chartdata: {
				labels: [],
				datasets: [{
					label: "",
					lineTension: 0.3,
					backgroundColor: "rgba(78, 115, 223, 0.05)",
					borderColor: "rgba(78, 115, 223, 1)",
					pointRadius: 3,
					pointBackgroundColor: "rgba(78, 115, 223, 1)",
					pointBorderColor: "rgba(78, 115, 223, 1)",
					pointHoverRadius: 3,
					pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
					pointHoverBorderColor: "rgba(78, 115, 223, 1)",
					pointHitRadius: 10,
					pointBorderWidth: 2,
					data: [],
				}],
			},
			options: {
				maintainAspectRatio: false,
				layout: {
					padding: {
						left: 0,
						right: 0,
						top: 25,
						bottom: 0
					}
				},
				scales: {
					xAxes: [{
						gridLines: {
							display: false,
							drawBorder: false
						},
						ticks: {
							maxTicksLimit: 7
						}
					}],
					yAxes: [{
						ticks: {
							maxTicksLimit: 5,
							padding: 10,
						},
						gridLines: {
							color: "rgb(234, 236, 244)",
							zeroLineColor: "rgb(234, 236, 244)",
							drawBorder: false,
							borderDash: [2],
							zeroLineBorderDash: [2]
						}
					}],
				},
				legend: {
					display: false
				},
				tooltips: {
					backgroundColor: "rgb(255,255,255)",
					bodyFontColor: "#858796",
					titleMarginBottom: 10,
					titleFontColor: '#6e707e',
					titleFontSize: 14,
					borderColor: '#dddfeb',
					borderWidth: 1,
					xPadding: 15,
					yPadding: 15,
					displayColors: false,
					intersect: false,
					mode: 'index',
					caretPadding: 10,
					callbacks: {
						label: function(tooltipItem, chart) {
							var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
							return tooltipItem.yLabel +" "+datasetLabel;
						}
					}
				}
			},
		}),
		created() {
			this.chartdata.labels = this.api.labels;
			this.chartdata.datasets[0].label = this.api.label;
			this.chartdata.datasets[0].data = this.api.data;
		},
		mounted() {
			this.renderChart(this.chartdata, this.options);
		}
	}
</script>