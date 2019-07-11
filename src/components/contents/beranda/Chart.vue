<template>
	<box title="Presentase Jumlah Siswa">
		<line-chart v-if="linechart.loaded" :api="linechart" style="max-height: 320px"></line-chart>
		<hr>
		<i>Presentase berdasarkan jumlah siswa di setiap akhir tahun akademik</i>
	</box>
</template>

<script>
	import LineChart from '@/components/items/LineChart';
	
	export default {
		name: 'Chart',
		components: {
			LineChart
		},
		data: () => ({
			linechart: {
				loaded: false, labels: null, label: null, data: null
			},
		}),
		methods: {
			getLineChart() {
				this.linechart.label = 'Siswa';
				this.linechart.labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
				this.linechart.data = [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000];
				this.linechart.loaded = true;
			}
		},
		created() {
			this.getLineChart();
		}
	}
</script>