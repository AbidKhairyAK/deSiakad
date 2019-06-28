<template>
	<modal :title="form_title"
		:status="status == 'create' || status == 'edit'"
		@close="closeModal()"
		@send="sendData()"
		sendButton
	>
		<form-wrapper :validator="$v.form" class="row">
			<form-field name="nama" label="nama" grid="col-sm-12">
				<input type="tel" class="form-control" v-model="$v.form.nama.$model">
			</form-field>
			<form-field name="status" label="status" grid="col-sm-12">
				<div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="status1" class="custom-control-input" value="1" v-model="$v.form.status.$model">
						<label for="status1" class="custom-control-label">Aktif</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="status0" class="custom-control-input" value="0" v-model="$v.form.status.$model">
						<label for="status0" class="custom-control-label">Tidak Aktif</label>
					</div>
				</div>
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
				tahun: '', status: 1
			},
			default_form: {
				tahun: '', status: 1
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
				nama: { required, maxLength: maxLength(30) }, 
				status: { required },
			}
		},

		watch: {
			status(val) {
				this.form = val == "create" ? Object.assign({}, this.default_form) : this.item;
			}
		}
	}
</script>