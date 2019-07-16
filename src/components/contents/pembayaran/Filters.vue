<template>
	<box title="Filter" wrapper_class="filter-card">
		
		<div class="form-group">
			<label class="font-weight-bold small">Pencarian:</label>
			<input class="form-control" placeholder="cari..." v-model="input.search">
			<small class="text-muted">Cari berdasarkan siswa, jenis pembayaran, jumlah, tanggal, atau keterangan</small>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Jenis Pembayaran</label>
			<select class="form-control" v-model="input.jenis">
				<option value="">Semua</option>
				<option v-for="item in jenis" 
					:key="item.id"
					:value="item.id"
				>
					{{ item.nama }}
				</option>
			</select>
		</div>

	</box>
</template>

<script>
	export default {
		name: 'Filters',
		props: ['value'],
		data: () => ({
			jenis: [],
		}),
		methods: {
			getFilters() {
				this.$axios.get(`${this.$url}/jenis-pembayaran/list`).then((response) => {
					this.jenis = response.data;
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