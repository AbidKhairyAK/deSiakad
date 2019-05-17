<template>
	<div>
		<page-header title="Jadwal Pelajaran Editor" text="Editor untuk mengatur jadwal pelajaran siswa"></page-header>

		<box title="Jadwal Pelajaran">
			<label class="font-weight-bold small">Jadwal Untuk Rombel:</label>
			<select class="form-control" v-model="url_query.rombel">
				<option value="default">- Daftar Rombel -</option>
				<option v-for="item in option.rombel" 
					:key="item.id"
					:value="item.id"
				>
					{{ item.nama }}
				</option>
			</select>

			<div v-if="url_query.rombel == 'default'" class="text-center text-muted pt-4">
				<b>Silahkan pilih rombel!</b>
			</div>
			<table v-else class="table table-hover">
				<thead>
					<tr> 
						<th width="180">Jam</th>
						<th v-for="(item, i) in option.hari" :key="i">{{ item.nama }}</th>
						<th width="80">Opsi</th>
					</tr>
				</thead>
				<tbody v-for="(item, i) in api.data" :key="'tr'+i" class="border-0">
					<jadwal-form v-if="mode == item.id" 
						:option="option"
						:items="item"
						:days="option.hari"
						:id_rombel="url_query.rombel"
						@cancel="cancel()"
						@submit="sendData($event)"
					></jadwal-form>
					<tr v-else>
						<th>{{ item.jam_mulai }} - {{ item.jam_selesai }}</th>
						<td v-for="hari in option.hari" 
							:key="'td'+hari.id"
							style="cursor: pointer;"
							@click="mode == 'detail'+item.id+hari.id ? mode = 'default' : mode = 'detail'+item.id+hari.id" 
						>
							<span v-if="mode == 'detail'+item.id+hari.id">
								<p>{{ pickJadwal('mapel', item.jadwal, hari.id) }}</p>
								<p>{{ pickJadwal('guru', item.jadwal, hari.id) }}</p>
								<p>{{ pickJadwal('ruangan', item.jadwal, hari.id) }}</p>
							</span>
							<span v-else>
								{{ pickJadwal('default', item.jadwal, hari.id) }}
							</span>
						</td>
						<td class="d-flex justify-content-between">
							<button class="btn btn-circle btn-sm" title="edit" @click="mode = item.id">
								<i class="fa fa-edit"></i>
							</button>
							<button class="btn btn-circle btn-sm" title="hapus" @click="delData(item)">
								<i class="fa fa-trash"></i>
							</button>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<jadwal-form v-if="mode == 'create'" 
						:option="option" 
						:days="option.hari"
						:id_rombel="url_query.rombel"
						@cancel="cancel()"
						@submit="sendData($event)"
					></jadwal-form>
					<tr v-else>
						<td colspan="8">
							<button class="btn btn-light btn-block text-black-50" @click="mode = 'create'">
								<i class="fa fa-plus"></i> Tambah Baru
							</button>	
						</td>
					</tr>
				</tfoot>
			</table>
		</box>
	</div>
	
</template>

<script>
	import JadwalPelajaranEditorForm from './JadwalPelajaranEditorForm';

	export default {
		name: 'JadwalPelajaranEditor',

		components: {
			'jadwal-form': JadwalPelajaranEditorForm,
		},

		data: () => ({
			option: {
				rombel: [], jam: [], hari: [], mapel: [], ruangan: []
			},
			url_query: {
				rombel: 'default'
			},
			api: {},
			mode: 'default',
		}),

		methods: {
			getOption() {
				this.$axios.get(`${this.$url}/rombel/list`).then((response) => {
					this.option.rombel = response.data;
				});
				this.$axios.get(`${this.$url}/jam/list`).then((response) => {
					this.option.jam = response.data;
				});
				this.$axios.get(`${this.$url}/hari/list`).then((response) => {
					this.option.hari = response.data;
				});
				this.$axios.get(`${this.$url}/mapel/list`).then((response) => {
					this.option.mapel = response.data;
				});
				this.$axios.get(`${this.$url}/ruangan/list`).then((response) => {
					this.option.ruangan = response.data;
				});
			},
			getData() {
				let query = this.$qs.stringify(this.url_query);

				this.$axios.get(`${this.$url}/jadwal-editor?${query}`).then((response) =>
				{
					this.api = response.data;
				});
			},
			sendData(item) {
				// validation
				let checkJam = this.api.data.some(data => {
					return data.id_jam_mulai == item.id_jam_mulai &&
							item.id_jam_mulai != item.old_jam_mulai;
				});
				let checkItem = item.jadwal.every(jadwal => {
					return jadwal.id_mapel == "";
				})
				if (checkJam) return alert('Gagal! terdapat duplikat jam pelajaran pada jadwal.');
				if (checkItem) return alert('Gagal! minimal satu mapel harus terisi.');

				// filter null object
				let data = Object.assign({}, item)
				let jadwal = data.jadwal.filter(j => {
					return j.id_mapel !== "";
				});
				data.jadwal = jadwal;

				// process
				this.$axios.post(`${this.$url}/jadwal-editor/save`, data, this.$url_config).then(() => {
					this.cancel();
					this.getData();
				});
			},
			delData(item) {
				let data = Object.assign({}, item);
				data.old_jam_mulai = item.id_jam_mulai;
				data.old_jam_selesai = item.id_jam_selesai;

				this.$axios.post(`${this.$url}/jadwal-editor/destroy`, data, this.$url_config).then(() => {
					this.getData();
				});
			},
			pickJadwal(mode, jadwal, id_hari) {
				jadwal = jadwal.filter( j => j.id_hari == id_hari);

				let result = '-';

				if (jadwal.length < 1) return result;
				
				switch(mode) {
					case 'mapel': result = jadwal[0].mapel; break;
					case 'guru': result = jadwal[0].guru; break;
					case 'ruangan': result = jadwal[0].ruangan; break;
					default: result = jadwal[0].kdmapel; break;
				}

				return result;
			},
			cancel() {
				this.mode = 'default';
			}
		},

		watch: {
			url_query: {
				deep: true,
				handler() {
					this.getData();
				}
			}
		},

		created() {
			this.getOption();
			this.getData();
		}
	}
</script>