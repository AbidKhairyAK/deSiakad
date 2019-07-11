<template>
	<div>
		<div class="row">
			<info-card color="primary"
				icon="users"
				title="Peserta Didik"
				content="290 Siswa"
			></info-card>
			<info-card color="success"
				icon="graduation-cap"
				title="Pengajar Aktif"
				content="40 Guru"
			></info-card>
			<info-card color="danger"
				icon="calendar-alt"
				title="Tahun Akademik"
				content="2018/2019"
			></info-card>
			<info-card color="warning"
				icon="door-open"
				title="Rombongan Belajar"
				content="12 Rombel"
			></info-card>
		</div>

		<div class="row">
			<div class="col-md-8">
				<chart></chart>
			</div>
			<div class="col-md-4">
				<calendar></calendar>
			</div>
		</div>

	</div>
</template>

<script>
	import InfoCard from '@/components/items/InfoCard';
	import Chart from './Chart';
	import Calendar from './Calendar';

	export default {
		name: 'Index',
		components: {
			InfoCard, Chart, Calendar
		},
	}
</script>