<template>
	<modal :title="form_title"
		:status="status == 'create' || status == 'edit'"
		@close="closeModal()"
		@send="sendData()"
		sendButton
	>
		<form-wrapper :validator="$v.form" class="row">
			<form-field name="kode" label="Kode" grid="col-sm-4">
				<input type="text" class="form-control" v-model="form.kode" @input="$v.form.kode.$touch()">
			</form-field>
			<form-field name="nama" label="Nama Ruangan" grid="col-sm-8">
				<input type="text" class="form-control" v-model="form.nama" @input="$v.form.nama.$touch()">
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
			default_format: {
				kode: '', nama: ''
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
			form() {
				return this.$_.isEmpty(this.item) ? Object.assign({}, this.default_format) : this.item;
			}
		},

		validations: {
			form: {
				kode: { required, maxLength: maxLength(10) }, 
				nama: { required, maxLength: maxLength(30) },
			}
		},
	}
</script>