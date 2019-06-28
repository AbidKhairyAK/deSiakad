<template>
	<modal :title="form_title"
		:status="status == 'create' || status == 'edit'"
		@close="closeModal()"
		@send="sendData()"
		sendButton
	>
		<form-wrapper :validator="$v.form" class="row">
			<form-field name="kode" label="Kode" grid="col-sm-3">
				<input type="text" class="form-control" v-model="$v.form.kode.$model">
			</form-field>
			<form-field name="nama" label="Nama Ruangan" grid="col-sm-7">
				<input type="text" class="form-control" v-model="$v.form.nama.$model">
			</form-field>
			<form-field name="kelas" label="Kelas" grid="col-sm-2">
				<select class="form-control" v-model="$v.form.kelas.$model">
					<option v-for="n in 6" :key="'n'+n">{{ n }}</option>
				</select>
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
			form: {
				kode: '', nama: '', kelas: 0,
			},
			default_form: {
				kode: '', nama: '', kelas: 0,
			},
		}),

		methods: {
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
				kode: { required, maxLength: maxLength(10) }, 
				nama: { required, maxLength: maxLength(50) },
				kelas: { required },
			}
		},

		watch: {
			status(val) {
				this.form = val == "create" ? Object.assign({}, this.default_form) : this.item;
			}
		}
	}
</script>