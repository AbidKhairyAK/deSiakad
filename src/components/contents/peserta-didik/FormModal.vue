<template>
	<modal :title="form_title"
		:status="status == 'create' || status == 'edit'"
		@close="closeModal()"
		@send="sendData()"
		sendButton
	>
		<form-wrapper :validator="$v.form" class="row">
			<form-field name="nim" label="NIM" grid="col-sm-12">
				<input type="number" class="form-control" v-model="form.nim" @input="$v.form.nim.$touch()">
			</form-field>
			<form-field name="nama" label="Nama Siswa" grid="col-sm-8">
				<input type="text" class="form-control" v-model="form.nama" @input="$v.form.nama.$touch()">
			</form-field>
			<form-field name="gender" label="Gender" grid="col-sm-4">
				<select class="form-control" v-model="form.gender" @change="$v.form.gender.$touch()">
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</form-field>
			<form-field name="tempat_lahir" label="Tempat Lahir" grid="col-sm-5">
				<input type="text" class="form-control" v-model="form.tempat_lahir" @input="$v.form.tempat_lahir.$touch()">
			</form-field>
			<form-field name="tanggal_lahir" label="Tanggal Lahir" grid="col-sm-7">
				<input type="date" class="form-control" v-model="form.tanggal_lahir" @input="$v.form.tanggal_lahir.$touch()">
			</form-field>
			<form-field name="id_agama" label="Agama" grid="col-sm-4">
				<select class="form-control" v-model="form.id_agama" @change="$v.form.id_agama.$touch()">
					<option v-for="item in select.agama" 
						:key="item.id"
						:value="item.id"
					>
						{{ item.nama }}
					</option>
				</select>
			</form-field>
			<form-field name="id_tahun_akademik" label="Tahun Akademik" grid="col-sm-4">
				<select class="form-control" v-model="form.id_tahun_akademik" @change="$v.form.id_tahun_akademik.$touch()">
					<option v-for="item in select.tahun_akademik" 
						:key="item.id"
						:value="item.id"
					>
						{{ item.tahun }}
					</option>
				</select>
			</form-field>
			<form-field name="id_rombel" label="Rombel" grid="col-sm-4">
				<select class="form-control" v-model="form.id_rombel" @change="$v.form.id_rombel.$touch()">
					<option v-for="item in select.rombel" 
						:key="item.id"
						:value="item.id"
					>
						{{ item.nama }}
					</option>
				</select>
			</form-field>
			<form-field name="foto_data" label="Foto Siswa" grid="col-sm-12" >
				<p v-if="status == 'edit'">
					<small>foto sekarang</small><br>
					<a :href="imagePath(form.foto)" target="_blank"><img :src="imagePath(form.foto)" class="w-25"></a>
				</p>
				{{form.foto}}
				<file-select v-model="form.foto_data"></file-select>
			</form-field>
		</form-wrapper>
	</modal>
</template>

<script>
	import { required, maxLength } from 'vuelidate/lib/validators';

	export default {
		name: 'FormModal',

		props: ['status', 'item'],

		data: () => ({
			select: {
				rombel: [], agama: [], tahun_akademik: []
			},
			default_format: {
				id: '', id_rombel: '', id_agama: '', id_tahun_akademik: '', nim: '', nama: '', gender: '', tanggal_lahir: '', tempat_lahir: '', foto: '', foto_data: null,
			},
		}),

		methods: {
			imagePath(img) {
				return img ? require(`@/assets/siswa/${img}`) : '';
			},
			getSelect() {
				this.$axios.get(`${this.$url}/rombel`).then((response) => {
					this.select.rombel = response.data;
				});
				this.$axios.get(`${this.$url}/agama`).then((response) => {
					this.select.agama = response.data;
				});
				this.$axios.get(`${this.$url}/tahun-akademik`).then((response) => {
					this.select.tahun_akademik = response.data;
				});
			},
			sendData() {
				this.$v.form.$touch();
				if (this.$v.form.$error) return;

				this.$emit('sendData', this.form);
			},
			closeModal() {
				this.$v.form.$reset();
				this.$emit('closeModal');
			}
		},

		computed: {
			form_title() {
				return this.status == 'edit' ? 'Edit Data' : 'Tambah Data';
			},
			form() {
				return this.item == {} ? this.default_format : this.item;
			}
		},

		validations: {
			form: {
				id_rombel: { required }, 
				id_agama: { required }, 
				id_tahun_akademik: { required }, 
				nim: { required, maxLength: maxLength(11) }, 
				nama: { required, maxLength: maxLength(50) }, 
				gender: { required }, 
				tanggal_lahir: { required }, 
				tempat_lahir: { required, maxLength: maxLength(30) },
			}
		},

		created() {
			this.getSelect();
		}
	}
</script>