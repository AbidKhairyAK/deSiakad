<template>
	<modal title="Detail Siswa" 
		:status="status == 'detail'"
		@close="$emit('closeModal')"
	>
		<p><a :href="imagePath(detail.foto)" target="_blank"><img :src="imagePath(detail.foto)" class="w-25"></a></p>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">NIM</span>
			<span class="col-md-8">: {{ detail.nis }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Nama</span>
			<span class="col-md-8">: {{ detail.nama }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Gender</span>
			<span class="col-md-8">: {{ detail.full_gender }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Tempat Lahir</span>
			<span class="col-md-8">: {{ detail.tempat_lahir }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Tanggal Lahir</span>
			<span class="col-md-8">: {{ detail.tanggal_lahir }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Agama</span>
			<span class="col-md-8">: {{ detail.agama }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Angkatan</span>
			<span class="col-md-8">: {{ detail.angkatan }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Rombel</span>
			<span class="col-md-8">: {{ detail.rombel }}</span>
		</div>
	</modal>
</template>

<script>
	export default {
		name: 'DetailModal',

		props: ['status', 'item'],

		methods: {
			imagePath(img) {
				return img ? require(`@/assets/siswa/${img}`) : '';
			},
		},

		computed: {
			detail() {
				return this.$_.isEmpty(this.item) ? Object.assign({}, {}) : this.item;
			}
		},
	}
</script>