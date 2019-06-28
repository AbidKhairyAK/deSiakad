<template>
	<modal :title="form_title"
		:status="status == 'create' || status == 'edit'"
		@close="closeModal()"
		@send="sendData()"
		sendButton
	>
		<form-wrapper :validator="$v.form" class="row">
			<form-field name="nis" label="NIS" grid="col-sm-12">
				<input type="number" class="form-control" v-model="$v.form.nis.$model">
			</form-field>
			<form-field name="nama" label="Nama Siswa" grid="col-sm-8">
				<input type="text" class="form-control" v-model="$v.form.nama.$model">
			</form-field>
			<form-field name="gender" label="Gender" grid="col-sm-4">
				<select class="form-control" v-model="$v.form.gender.$model">
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</form-field>
			<form-field name="tempat_lahir" label="Tempat Lahir" grid="col-sm-5">
				<input type="text" class="form-control" v-model="$v.form.tempat_lahir.$model">
			</form-field>
			<form-field name="tanggal_lahir" label="Tanggal Lahir" grid="col-sm-7">
				<input type="date" class="form-control" v-model="$v.form.tanggal_lahir.$model">
			</form-field>
			<form-field name="id_agama" label="Agama" grid="col-sm-6">
				<select class="form-control" v-model="$v.form.id_agama.$model">
					<option v-for="item in select.agama" 
						:key="item.id"
						:value="item.id"
					>
						{{ item.nama }}
					</option>
				</select>
			</form-field>
			<form-field name="id_angkatan" label="Angkatan" grid="col-sm-6">
				<select class="form-control" v-model="$v.form.id_angkatan.$model">
					<option v-for="item in select.angkatan" 
						:key="item.id"
						:value="item.id"
					>
						{{ item.tahun }}
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
				angkatan: [], agama: []
			},
			form: {
				id: '', id_agama: '', id_angkatan: '', nis: '', nama: '', gender: '', tanggal_lahir: '', tempat_lahir: '', foto: '', foto_data: null,
			},
			default_form: {
				id: '', id_agama: '', id_angkatan: '', nis: '', nama: '', gender: '', tanggal_lahir: '', tempat_lahir: '', foto: '', foto_data: null,
			},
		}),

		methods: {
			imagePath(img) {
				return img ? require(`@/assets/siswa/${img}`) : '';
			},
			getSelect() {
				this.$axios.get(`${this.$url}/angkatan/list`).then((response) => {
					this.select.angkatan = response.data;
				});
				this.$axios.get(`${this.$url}/agama/list`).then((response) => {
					this.select.agama = response.data;
				});
			},
			sendData() {
				this.$v.form.$touch();
				if (this.$v.form.$error) return;
				this.$v.form.$reset();

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
		},

		validations: {
			form: {
				id_angkatan: { required },
				id_agama: { required },
				nis: { required, maxLength: maxLength(11) }, 
				nama: { required, maxLength: maxLength(50) }, 
				gender: { required }, 
				tanggal_lahir: { required }, 
				tempat_lahir: { required, maxLength: maxLength(30) },
			}
		},

		watch: {
			status(val) {
				this.form = val == "create" ? Object.assign({}, this.default_form) : this.item;
			}
		},

		created() {
			this.getSelect();
		}
	}
</script>