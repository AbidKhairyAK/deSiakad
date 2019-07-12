<template>
	<modal title="Detail Siswa" 
		:status="status == 'detail'"
		@close="$emit('closeModal')"
	>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Rombel</span>
			<span class="col-md-8">: {{ detail.rombel }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Mapel</span>
			<span class="col-md-8">: {{ detail.mapel }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Guru</span>
			<span class="col-md-8">: {{ detail.guru }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Ruangan</span>
			<span class="col-md-8">: {{ detail.ruangan }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">jam</span>
			<span class="col-md-8">: {{ detail.jam_mulai }}:{{ detail.jam_selesai }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Hari</span>
			<span class="col-md-8">: {{ detail.hari }}</span>
		</div>
	</modal>
</template>

<script>
	export default {
		name: 'DetailModal',

		props: ['status', 'item'],

		computed: {
			detail() {
				return this.$_.isEmpty(this.item) ? Object.assign({}, {}) : this.item;
			}
		},
	}
</script>