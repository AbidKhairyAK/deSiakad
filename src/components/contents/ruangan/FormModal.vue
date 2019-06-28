<template>
	<modal :title="form_title"
		:status="status == 'create' || status == 'edit'"
		@close="closeModal()"
		@send="sendData()"
		sendButton
	>
		<form-wrapper :validator="$v.form" class="row">
			<form-field name="kode" label="Kode" grid="col-sm-4">
				<input type="text" class="form-control" v-model="$v.form.kode.$model">
			</form-field>
			<form-field name="nama" label="Nama Ruangan" grid="col-sm-8">
				<input type="text" class="form-control" v-model="$v.form.nama.$model">
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
				kode: '', nama: ''
			},
			default_form: {
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
		},

		validations: {
			form: {
				kode: { required, maxLength: maxLength(10) }, 
				nama: { required, maxLength: maxLength(30) },
			}
		},
		
		watch: {
			status(val) {
				this.form = val == "create" ? Object.assign({}, this.default_form) : this.item;
			}
		}
	}
</script>