<template>
	<box title="Filter" wrapper_class="filter-card">
		
		<div class="form-group">
			<label class="font-weight-bold small">Pencarian:</label>
			<input class="form-control" placeholder="cari..." v-model="input.search">
			<small class="text-muted">Cari berdasarkan nama, nik, atau nuptk</small>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Agama:</label>
			<select class="form-control" v-model="input.agama">
				<option value="">Semua</option>
				<option v-for="item in agama" 
					:key="item.id"
					:value="item.id"
				>
					{{ item.nama }}
				</option>
			</select>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Gender:</label>
			<select class="form-control" v-model="input.gender">
				<option value="">Semua</option>
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Status:</label>
			<select class="form-control" v-model="input.status">
				<option value="">Semua</option>
				<option value="1">Aktif</option>
				<option value="0">Tidak Aktif</option>
			</select>
		</div>

	</box>
</template>

<script>
	export default {
		name: 'Filters',
		props: ['value'],
		data: () => ({
			agama: [],
		}),
		methods: {
			getFilters() {
				this.$axios.get(`${this.$url}/agama/list`).then((response) => {
					this.agama = response.data;
				});
			}
		},
		computed: {
			input: {
				get() { return this.value; },
				set(value) { this.$emit('input', value); }
			},
		},
		created() {
			this.getFilters();
		}
	}
</script>