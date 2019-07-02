<template>
	<modal title="Detail Guru" 
		:status="status == 'detail'"
		@close="$emit('closeModal')"
	>
		<p><a :href="imagePath(detail.foto)" target="_blank"><img :src="imagePath(detail.foto)" class="w-25"></a></p>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">NIK</span>
			<span class="col-md-8">: {{ detail.nik }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">NUPTK</span>
			<span class="col-md-8">: {{ detail.nuptk }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Nama</span>
			<span class="col-md-8">: {{ detail.nama }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Gender</span>
			<span class="col-md-8">: {{ detail.gender | genderText }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Agama</span>
			<span class="col-md-8">: {{ detail.agama }}</span>
		</div>
		<div class="row mb-2">
			<span class="col-md-4 font-weight-bold">Status</span>
			<span class="col-md-8">: {{ detail.status | boolText }}</span>
		</div>
	</modal>
</template>

<script>
	export default {
		name: 'DetailModal',

		props: ['status', 'item'],

		methods: {
			imagePath(img) {
				return img ? require(`@/assets/guru/${img}`) : '';
			},
		},

		computed: {
			detail() {
				return this.$_.isEmpty(this.item) ? Object.assign({}, {}) : this.item;
			}
		},
	}
</script>