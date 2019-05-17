<template>
	<div>
		<page-header title="Peserta Didik Editor" text="Editor untuk mengatur daftar peserta didik"></page-header>

		<div class="row">

			<div class="col-md-6">
				<box title="Rombongan Belajar">

					<div class="row">
						<div class="form-group col-md-6">
							<label class="font-weight-bold small">Rombel Yang Akan Diatur</label>
							<select class="form-control" v-model="url_query.punya_rombel.rombel">
								<option value="default">- Silahkan Pilih Rombel -</option>
								<option v-for="item in option.rombel" 
									:key="item.id"
									:value="item.id"
								>
									{{ item.nama }}
								</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold small">Filter</label>
							<input class="form-control" 
								v-model="url_query.punya_rombel.search"
								placeholder="ketik nama atau nis" 
							>
						</div>
					</div>

					<table class="table table-striped">
						<thead>
							<tr>
								<th width="20">#</th>
								<th width="130">NIS</th>
								<th>Nama Siswa</th>
								<th width="130">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="item in api.punya_rombel.data" :key="item.no">
								<td>{{ item.no }}</td>
								<td>{{ item.nis }}</td>
								<td>{{ item.nama }}</td>
								<td>
									<button class="btn btn-sm btn-danger" @click="updateItem('pop', item.id)">
										Keluarkan <i class="fa fa-arrow-right"></i>
									</button>
								</td>
							</tr>
						</tbody>
					</table>
					<pagination
						:current_page="api.punya_rombel.meta ? api.punya_rombel.meta.current_page : 1"
						:last_page="api.punya_rombel.meta ? api.punya_rombel.meta.last_page : 1"
						@switch_page="url_query.punya_rombel.page = $event"
					></pagination>

				</box>
			</div>

			<div class="col-md-6">
				<box title="Seluruh Siswa">
					
					<div class="row">
						<div class="form-group col-md-6">
							<label class="font-weight-bold small">Pilih Angkatan</label>
							<select class="form-control" v-model="url_query.semua_siswa.angkatan">
								<option value="">Semua</option>
								<option v-for="item in option.angkatan" 
									:key="item.id"
									:value="item.id"
								>
									{{ item.tahun }}
								</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold small">Filter</label>
							<input class="form-control" 
								v-model="url_query.semua_siswa.search"
								placeholder="ketik nama atau nis" 
							>
						</div>
					</div>

					<table class="table table-striped">
						<thead>
							<tr>
								<th width="20">#</th>
								<th width="130">NIS</th>
								<th>Nama Siswa</th>
								<th width="130">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="item in api.semua_siswa.data" :key="item.no">
								<td>{{ item.no }}</td>
								<td>{{ item.nis }}</td>
								<td>{{ item.nama }}</td>
								<td>
									<button v-if="item.rombel !== null" class="btn btn-sm btn-danger" @click="updateItem('pop', item.id)">
										Keluarkan {{ item.rombel }} <i class="fa fa-arrow-right"></i>
									</button>
									<button v-else class="btn btn-sm btn-info" @click="updateItem('push', item.id)">
										<i class="fa fa-arrow-left"></i> Masukkan
									</button>
								</td>
							</tr>
						</tbody>
					</table>
					<pagination
						:current_page="api.semua_siswa.meta ? api.semua_siswa.meta.current_page : 1"
						:last_page="api.semua_siswa.meta ? api.semua_siswa.meta.last_page : 1"
						@switch_page="url_query.semua_siswa.page = $event"
					></pagination>

				</box>
			</div>
		</div>
		
	</div>
	
</template>

<script>
	export default {
		name: 'PesertaDidikEditor',

		data: () => ({
			option: {
				rombel: [], angkatan: [],
			},
			api: {
				punya_rombel: {}, semua_siswa: {},
			},
			url_query: {
				punya_rombel: {
					page: 1, search: '', rombel: 'default'
				}, 
				semua_siswa: {
					page: 1, search: '', angkatan: ''
				},
			},
		}),

		methods: {
			getOption() {
				this.$axios.get(`${this.$url}/rombel/list`).then((response) => {
					this.option.rombel = response.data;
				});
				this.$axios.get(`${this.$url}/angkatan/list`).then((response) => {
					this.option.angkatan = response.data;
				});
			},
			getPunyaRombel() {
				let query = this.$qs.stringify(this.url_query.punya_rombel);

				this.$axios.get(`${this.$url}/peserta-didik/punya-rombel?${query}`).then((response) => {
					this.api.punya_rombel = response.data;
					for (let i = 0; i < this.api.punya_rombel.data.length; i++) {
						this.api.punya_rombel.data[i].no = i + this.api.punya_rombel.meta.from;
					}
				});
			},
			getSemuaSiswa() {
				let query = this.$qs.stringify(this.url_query.semua_siswa);

				this.$axios.get(`${this.$url}/peserta-didik/semua-siswa?${query}`).then((response) => {
					this.api.semua_siswa = response.data;
					for (let i = 0; i < this.api.semua_siswa.data.length; i++) {
						this.api.semua_siswa.data[i].no = i + this.api.semua_siswa.meta.from;
					}
				});
			},
			updateItem(mode, id) {
				if (this.url_query.punya_rombel.rombel == 'default' && mode == 'push') {
					return alert('Silahkan pilih rombel terlebih dahulu!');
				}

				let url = mode == 'push'
				? `${this.$url}/peserta-didik/push`
				: `${this.$url}/peserta-didik/pop`;

				let item = {id: id, id_rombel: this.url_query.punya_rombel.rombel}

				this.$axios.post(url, item, this.$url_config).then(() => {
					this.getPunyaRombel();
					this.getSemuaSiswa();
				});
			},
		},

		computed: {
			punya_rombel_query() {
				return Object.assign({}, this.url_query.punya_rombel);
			},
			semua_siswa_query() {
				return Object.assign({}, this.url_query.semua_siswa);
			},
		},

		watch: {
			punya_rombel_query: {
				deep: true,
				handler(newQuery, oldQuery) {
					if(newQuery.page == oldQuery.page) {
						this.url_query.punya_rombel.page = 1;
					}
					this.getPunyaRombel();
				},
			},
			semua_siswa_query: {
				deep: true,
				handler(newQuery, oldQuery) {
					if(newQuery.page == oldQuery.page) {
						this.url_query.semua_siswa.page = 1;
					}
					this.getSemuaSiswa();
				},
			}
		},

		created() {
			this.getOption();
			this.getPunyaRombel();
			this.getSemuaSiswa();
		}
	}
</script>