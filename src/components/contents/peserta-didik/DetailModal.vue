<template>
	<modal title="Detail Siswa" 
		:status="status == 'detail'"
		@close="$emit('closeModal')"
	>
		<p><a :href="imagePath(detail.foto)" target="_blank"><img :src="imagePath(detail.foto)" class="w-25"></a></p>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">NIM</span>
			<span class="col-md-8">: {{ detail.nim }}</span>
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
			<span class="col-md-4 font-weight-bold">Tanggal Lahir</span>
			<span class="col-md-8">: {{ detail.tanggal_lahir }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Tempat Lahir</span>
			<span class="col-md-8">: {{ detail.tempat_lahir }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Rombel</span>
			<span class="col-md-8">: {{ detail.rombel }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Tahun Akademik</span>
			<span class="col-md-8">: {{ detail.tahun_akademik }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Agama</span>
			<span class="col-md-8">: {{ detail.agama }}</span>
		</div>
	</modal>
</template>

<script>
	export default {
		name: 'DetailModal',

		props: ['status', 'item'],


		data: () => ({
			default_format: {
				id: '', id_rombel: '', id_agama: '', id_tahun_akademik: '', nim: '', nama: '', gender: '', tanggal_lahir: '', tempat_lahir: '', foto: '', foto_data: null,
			},
		}),

		methods: {
			imagePath(img) {
				return img ? require(`@/assets/siswa/${img}`) : '';
			},
		},

		computed: {
			detail() {
				return this.item == {} ? this.default_format : this.item;
			}
		},
	}
</script>