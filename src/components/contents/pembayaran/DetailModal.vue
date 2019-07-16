<template>
	<modal title="Detail Siswa" 
		:status="status == 'detail'"
		@close="$emit('closeModal')"
	>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Nama Siswa</span>
			<span class="col-md-8">: {{ detail.siswa }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Jenis Pembayaran</span>
			<span class="col-md-8">: {{ detail.nama_jenis }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Jumlah</span>
			<span class="col-md-8">: {{ detail.jumlah }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Tanggal</span>
			<span class="col-md-8">: {{ detail.tanggal }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Keterangan</span>
			<span class="col-md-8">: {{ detail.keterangan }}</span>
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