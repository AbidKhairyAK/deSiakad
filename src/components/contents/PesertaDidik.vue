<template>
	<div>
		<page-header title="Data Peserta Didik" text="Berisi daftar data peserta didik aktif"></page-header>

		<div class="row">

			<!-- filter -->
			<div class="col-md-3">
				<div class="card filter-card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Filter</h6>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="font-weight-bold small">Pencarian:</label>
							<input v-model="url_query.search" class="form-control" placeholder="cari...">
							<small class="text-muted">Cari berdasarkan nama, nim, tempat atau tanggal lahir</small>
						</div>
						<div class="form-group">
							<label class="font-weight-bold small">Rombongan Belajar:</label>
							<select class="form-control" v-model="url_query.rombel">
								<option value="">Semua</option>
								<option v-for="rombel in filter.rombel" 
									:key="rombel.id"
									:value="rombel.id"
								>
									{{ rombel.nama }}
								</option>
							</select>
						</div>
						<div class="form-group">
							<label class="font-weight-bold small">Agama:</label>
							<select class="form-control" v-model="url_query.agama">
								<option value="">Semua</option>
								<option v-for="agama in filter.agama" 
									:key="agama.id"
									:value="agama.id"
								>
									{{ agama.nama }}
								</option>
							</select>
						</div>
						<div class="form-group">
							<label class="font-weight-bold small">Gender:</label>
							<select class="form-control" v-model="url_query.gender">
								<option value="">Semua</option>
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<!-- content -->
			<div class="col-md-9">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-flex align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Tabel Data Peserta Didik</h6>							
						<button class="btn btn-sm btn-primary rounded" @click="showFormModal()">
							<i class="fa fa-plus"></i> Tambah Data
						</button>
					</div>
					<div class="card-body">
						
						<!-- table -->
						<table class="table table-striped">
							<thead>
								<tr>
									<th width="20">#</th>
									<th>Nama Siswa</th>
									<th width="100">gender</th>
									<th width="150">Tempat Lahir</th>
									<th width="150">Tanggal Lahir</th>
									<th width="100">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="item in api.data" :key="item.no">
									<td>{{ item.no }}</td>
									<td>{{ item.nama }}</td>
									<td>{{ item.gender }}</td>
									<td>{{ item.tempat_lahir }}</td>
									<td>{{ item.tanggal_lahir }}</td>
									<td class="d-flex justify-content-between">
										<button class="btn btn-circle btn-sm" @click="showDetailModal(item)">
											<i class="fa fa-address-card"></i>
										</button>
										<button class="btn btn-circle btn-sm" @click="showFormModal(item)">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-circle btn-sm" @click="destroyData(item.id)">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>

						<!-- form modal -->
						<modal :title="form_title"
							:status="form_modal"
							@close="form_modal = false"
							@send="sendData()"
							sendButton
						>
							<div class="row">
								<div class="form-group col-md-12">
									<label class="font-weight-bold small">NIM:</label>
									<input type="number" class="form-control" v-model="form_nim">
								</div>
								<div class="form-group col-md-8">
									<label class="font-weight-bold small">Nama:</label>
									<input type="text" class="form-control" v-model="form_nama">
								</div>
								<div class="form-group col-md-4">
									<label class="font-weight-bold small">Gender:</label>
									<select class="form-control" v-model="form_gender">
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-5">
									<label class="font-weight-bold small">Tempat Lahir:</label>
									<input type="text" class="form-control" v-model="form_tempat_lahir">
								</div>
								<div class="form-group col-md-7">
									<label class="font-weight-bold small">Tanggal Lahir:</label>
									<input type="date" class="form-control" v-model="form_tanggal_lahir">
								</div>
								<div class="form-group col-md-4">
									<label class="font-weight-bold small">Agama:</label>
									<select class="form-control" v-model="form_id_agama">
										<option v-for="agama in filter.agama" 
											:key="agama.id"
											:value="agama.id"
										>
											{{ agama.nama }}
										</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label class="font-weight-bold small">Tahun Akademik:</label>
									<select class="form-control" v-model="form_id_tahun_akademik">
										<!-- 
										<option v-for="tahun_akademik in filter.tahun_akademik" 
											:key="tahun_akademik.id"
											:value="tahun_akademik.id"
										>
											{{ tahun_akademik.tahun }}
										</option> 
										-->
										<option value="2">2015/2016</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label class="font-weight-bold small">Rombongan Belajar:</label>
									<select class="form-control" v-model="form_id_rombel">
										<option v-for="rombel in filter.rombel" 
											:key="rombel.id"
											:value="rombel.id"
										>
											{{ rombel.nama }}
										</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label class="font-weight-bold small">Foto Siswa:</label>
									<p v-if="edit_state">
										<small>foto sekarang</small><br>
										<a :href="imagePath(form_foto)" target="_blank"><img :src="imagePath(form_foto)" class="w-25"></a>
									</p>
									<file-select v-model="foto.data"></file-select>
								</div>
							</div>
						</modal>

						<!-- detail modal -->
						<modal title="Detail Siswa" 
							:status="detail_modal"
							@close="detail_modal = false"
						>
							<p><a :href="imagePath(detail_item.foto)" target="_blank"><img :src="imagePath(detail_item.foto)" class="w-25"></a></p>
							<div class="row mb-2">
								<span class="col-md-4 font-weight-bold">NIM</span>
								<span class="col-md-8">: {{ detail_item.nim }}</span>
							</div>
							<div class="row mb-2">
								<span class="col-md-4 font-weight-bold">Nama</span>
								<span class="col-md-8">: {{ detail_item.nama }}</span>
							</div>
							<div class="row mb-2">
								<span class="col-md-4 font-weight-bold">Gender</span>
								<span class="col-md-8">: {{ detail_item.full_gender }}</span>
							</div>
							<div class="row mb-2">
								<span class="col-md-4 font-weight-bold">Tanggal Lahir</span>
								<span class="col-md-8">: {{ detail_item.tanggal_lahir }}</span>
							</div>
							<div class="row mb-2">
								<span class="col-md-4 font-weight-bold">Tempat Lahir</span>
								<span class="col-md-8">: {{ detail_item.tempat_lahir }}</span>
							</div>
							<div class="row mb-2">
								<span class="col-md-4 font-weight-bold">Rombel</span>
								<span class="col-md-8">: {{ detail_item.rombel }}</span>
							</div>
							<div class="row mb-2">
								<span class="col-md-4 font-weight-bold">Tahun Akademik</span>
								<span class="col-md-8">: {{ detail_item.tahun_akademik }}</span>
							</div>
							<div class="row mb-2">
								<span class="col-md-4 font-weight-bold">Agama</span>
								<span class="col-md-8">: {{ detail_item.agama }}</span>
							</div>
						</modal>

						<pagination
							:current_page="api.meta ? api.meta.current_page : 1"
							:last_page="api.meta ? api.meta.last_page : 1"
							@switch_page="url_query.page = $event"
						></pagination>

					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapFields } from 'vuex-map-fields';

	export default {
		name: 'PesertaDidik',

		data: () => ({
			api: {},
			filter: {
				rombel: [], agama: [], gender: []
			},
			url_query: {
				page: 1, rombel: '', agama: '', gender: '', search: ''
			},
			edit_state: false,
			form_modal: false,
			detail_modal: false,
			detail_item: {},
			empty: {
				id: '', id_rombel: '', id_agama: '', id_tahun_akademik: '', nim: '', nama: '', gender: '', tanggal_lahir: '', tempat_lahir: ''
			},
			foto: {
				data: null, name: '',
			},
		}),

		methods: {
			getData() {
				let query = this.$qs.stringify(this.url_query);

				this.$axios.get(`${this.$url}/siswa/peserta-didik?${query}`).then((response) => {
					this.api = response.data;

					for (let i = 0; i < this.api.data.length; i++) {
						this.api.data[i].no = i + this.api.meta.from;
					}

				});
			},
			sendData() {
				let url = this.edit_state 
				? `${this.$url}/siswa/${this.form_id}/update`
				: `${this.$url}/siswa/create`;

				
				this.$axios.post(url, this.form, this.$url_config).then(({data}) => {
					this.form = Object.assign({}, this.empty);
					this.form_modal = false;
					this.edit_state = false;
					if (this.foto.data) {
						this.sendFoto(data.id);
					} else {
						this.getData();
					}
				});

			},
			sendFoto(id) {
				let formData = new FormData();
				formData.set('foto', this.foto.data);

				this.$axios.post(`
					${this.$url}/siswa/${id}/add-foto`, 
					formData, 
					{'content-type': 'multipart/form-data'}
				)
				.then(() => {
					this.getData();
					this.foto.data = null;
				});
			},
			destroyData(id) {
				if (confirm('apakah anda yakin?')) {
					this.$axios.delete(`${this.$url}/siswa/${id}/destroy`).then(() => {
						this.getData();
						this.form_modal = false;
					});
				}
			},
			getFilter() {
				this.$axios.get(`${this.$url}/rombel`).then((response) => {
					this.filter.rombel = response.data;
				});
				this.$axios.get(`${this.$url}/agama`).then((response) => {
					this.filter.agama = response.data;
				});
			},
			showDetailModal(item) {
				this.detail_item = item;
				this.detail_modal = true;
			},
			showFormModal(item = false){
				if (item) {
					this.form = Object.assign({}, item);
					this.edit_state = true;
				} else {
					this.form = Object.assign({}, this.empty);
					this.edit_state = false;
				}
				this.form_modal = true;
			},
			imagePath(img) {
				return img ? require(`@/assets/siswa/${img}`) : '';
			}
		},

		computed: {
			form_title() {
				return this.edit_state ? 'Edit Data' : 'Tambah Data';
			},
			copied_query() {
				return Object.assign({}, this.url_query);
			},
			...mapFields({
				form_id: 'peserta_didik.id', 
				form_id_rombel: 'peserta_didik.id_rombel', 
				form_id_agama: 'peserta_didik.id_agama', 
				form_id_tahun_akademik: 'peserta_didik.id_tahun_akademik', 
				form_nim: 'peserta_didik.nim', 
				form_nama: 'peserta_didik.nama', 
				form_gender: 'peserta_didik.gender', 
				form_tanggal_lahir: 'peserta_didik.tanggal_lahir', 
				form_tempat_lahir: 'peserta_didik.tempat_lahir'
			})
		},

		watch: {
			copied_query: {
				deep: true,
				handler(newQuery, oldQuery) {
					if(newQuery.page == oldQuery.page) {
						this.url_query.page = 1;
					}
					this.getData();
				},
			}
		},

		created() {
			this.getData();
			this.getFilter();
		}
	}
</script>