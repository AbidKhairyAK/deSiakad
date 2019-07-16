<template>
	<div>
		<page-header title="Data Sekolah" text="Berisi data sekolah"></page-header>
		
		<div class="row">
			<div class="col-md-8">
				<box title="Data Sekolah" 
					header_class="d-flex align-items-center justify-content-between"
				>
					<template #right-header>
						<button v-if="!edit" class="btn btn-sm rounded btn-primary" @click="edit = true">
							<i class="fa fa-edit"></i> Edit Data
						</button>
						<div v-else>
							<button class="btn btn-sm rounded btn-danger mr-2" @click="edit = false">
								<i class="fa fa-times"></i> Batal
							</button>
							<button class="btn btn-sm rounded btn-success" @click="saveData()">
								<i class="fa fa-check"></i> Simpan
							</button>
						</div>
					</template>

					<div class="row mb-2">
						<span class="col-md-3 font-weight-bold">NPSN</span>
						<span v-if="!edit" class="col-md-9">: {{ api.npsn }}</span>
						<form-field v-else grid="col-md-9" :validator="$v.form.npsn">
							<input type="number" class="form-control" v-model="$v.form.npsn.$model">
						</form-field>
					</div>
					<div class="row mb-2">
						<span class="col-md-3 font-weight-bold">Nama Sekolah</span>
						<span v-if="!edit" class="col-md-9">: {{ api.nama }}</span>
						<form-field v-else grid="col-md-9" :validator="$v.form.nama">
							<input type="text" class="form-control" v-model="$v.form.nama.$model">
						</form-field>
					</div>
					<div class="row mb-2">
						<span class="col-md-3 font-weight-bold">Alamat</span>
						<span v-if="!edit" class="col-md-9">: {{ api.alamat }}</span>
						<form-field v-else grid="col-md-9" :validator="$v.form.alamat">
							<input type="text" class="form-control" v-model="$v.form.alamat.$model">
						</form-field>
					</div>
					<div class="row mb-2">
						<span class="col-md-3 font-weight-bold">Email</span>
						<span v-if="!edit" class="col-md-9">: {{ api.email }}</span>
						<form-field v-else grid="col-md-9" :validator="$v.form.email">
							<input type="text" class="form-control" v-model="$v.form.email.$model">
						</form-field>
					</div>
					<div class="row mb-2">
						<span class="col-md-3 font-weight-bold">Telepon</span>
						<span v-if="!edit" class="col-md-9">: {{ api.telepon }}</span>
						<form-field v-else grid="col-md-9" :validator="$v.form.telepon">
							<input type="text" class="form-control" v-model="$v.form.telepon.$model">
						</form-field>
					</div>

				</box>
			</div>
			<div class="col-md-4">
				<box title="Informasi Penggunaan Sistem">
					<div class="mb-2">
						<span class="font-weight-bold">Penggunaan Pertama</span>
						<p>{{ api.first_usage }}</p>
					</div>
					<div class="mb-2">
						<span class="font-weight-bold">Digunakan Selama</span>
						<p>{{ api.usage_time }}</p>
					</div>
				</box>
			</div>
		</div>
	</div>
</template>

<script>
	import { required, maxLength, email } from 'vuelidate/lib/validators';

	export default {
		name: 'Index',

		data: () => ({
			form: {},
			api: {},
			edit: false
		}),

		methods: {
			getData() {
				this.$axios.get(`${this.$url}/sekolah`).then((response) => {
					this.api = response.data;
					this.form = response.data;
				});
			},
			saveData() {
				this.$v.form.$touch();
				if (this.$v.form.$error) return;
				this.$v.form.$reset();

				this.$axios.post(`${this.$url}/sekolah/save`, this.form, this.$url_config).then(() => {
					this.getData();
					this.edit = false;
				});
			},
		},

		validations: {
			form: {
				npsn: { required, maxLength: maxLength(8) }, 
				nama: { required, maxLength: maxLength(50) }, 
				alamat: { required, maxLength: maxLength(255) }, 
				email: { required, maxLength: maxLength(30), email }, 
				telepon: { required, maxLength: maxLength(14) }, 
			}
		},

		created() {
			this.getData();
		}
	}
</script>