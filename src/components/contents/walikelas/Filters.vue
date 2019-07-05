<template>
	<box title="Filter" wrapper_class="filter-card">
		
		<div class="form-group">
			<label class="font-weight-bold small">Pencarian:</label>
			<input class="form-control" placeholder="cari..." v-model="input.search">
			<small class="text-muted">Cari berdasarkan rombel, kelas, atau walikelas</small>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Kelas:</label>
			<select class="form-control" v-model="input.kelas">
				<option value="">Semua</option>
				<option v-for="n in 6" :key="n">{{ n }}</option>
			</select>
		</div>

	</box>
</template>

<script>
	export default {
		name: 'Filters',
		props: ['value'],
		computed: {
			input: {
				get() { return this.value; },
				set(value) { this.$emit('input', value); }
			},
		},
	}
</script>