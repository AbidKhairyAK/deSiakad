<template>
	<box title="Filter" wrapper_class="filter-card">
		
		<div class="form-group">
			<label class="font-weight-bold small">Pencarian:</label>
			<input class="form-control" placeholder="cari..." v-model="input.search">
			<small class="text-muted">Cari berdasarkan rombel, mapel, guru, ruangan, hari, atau jam pelajaran</small>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Rombel</label>
			<select class="form-control" v-model="input.rombel">
				<option value="">Semua</option>
				<option v-for="item in rombel" 
					:key="item.id"
					:value="item.id"
				>
					{{ item.nama }}
				</option>
			</select>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Mata Pelajaran</label>
			<select class="form-control" v-model="input.mapel">
				<option value="">Semua</option>
				<option v-for="item in mapel" 
					:key="item.id"
					:value="item.id"
				>
					{{ item.nama }}
				</option>
			</select>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Guru</label>
			<select class="form-control" v-model="input.guru">
				<option value="">Semua</option>
				<option v-for="item in guru" 
					:key="item.id"
					:value="item.id"
				>
					{{ item.nama }}
				</option>
			</select>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Ruangan</label>
			<select class="form-control" v-model="input.ruangan">
				<option value="">Semua</option>
				<option v-for="item in ruangan" 
					:key="item.id"
					:value="item.id"
				>
					{{ item.nama }}
				</option>
			</select>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">Hari</label>
			<select class="form-control" v-model="input.hari">
				<option value="">Semua</option>
				<option v-for="item in hari" 
					:key="item.id"
					:value="item.id"
				>
					{{ item.nama }}
				</option>
			</select>
		</div>
		<div class="form-group">
			<label class="font-weight-bold small">jam</label>
			<select class="form-control" v-model="input.jam">
				<option value="">Semua</option>
				<option v-for="item in jam" 
					:key="item.id"
					:value="item.id"
				>
					{{ item.pukul }}
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
			rombel: [],
			mapel: [],
			guru: [],
			ruangan: [],
			hari: [],
			jam: [],
		}),
		methods: {
			getFilters() {
				this.$axios.get(`${this.$url}/rombel/list`).then((response) => {
					this.rombel = response.data;
				});
				this.$axios.get(`${this.$url}/mapel/list`).then((response) => {
					this.mapel = response.data;
				});
				this.$axios.get(`${this.$url}/guru/list`).then((response) => {
					this.guru = response.data;
				});
				this.$axios.get(`${this.$url}/ruangan/list`).then((response) => {
					this.ruangan = response.data;
				});
				this.$axios.get(`${this.$url}/hari/list`).then((response) => {
					this.hari = response.data;
				});
				this.$axios.get(`${this.$url}/jam/list`).then((response) => {
					this.jam = response.data;
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