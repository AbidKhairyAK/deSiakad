<template>
	<modal :title="form_title"
		:status="status == 'create' || status == 'edit'"
		@close="closeModal()"
		@send="sendData()"
		sendButton
	>
		<form-wrapper :validator="$v.form" class="row">
			<form-field name="tahun" label="tahun" grid="col-sm-12">
				<input type="tel" class="form-control" v-mask="'####/####'" v-model="form.tahun" @input="$v.form.tahun.$touch()">
			</form-field>
			<form-field name="status" label="status" grid="col-sm-12">
				<div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="status1" class="custom-control-input" value="1" v-model="form.status" @input="$v.form.status.$touch()">
						<label for="status1" class="custom-control-label">Aktif</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="status0" class="custom-control-input" value="0" v-model="form.status" @input="$v.form.status.$touch()">
						<label for="status0" class="custom-control-label">Tidak Aktif</label>
					</div>
				</div>
			</form-field>
		</form-wrapper>
	</modal>
</template>

<script>
	import { required, maxLength } from 'vuelidate/lib/validators';
	import { mask } from 'vue-the-mask';

	export default {
		name: 'FormModal',

		props: ['status', 'item'],

		data: () => ({
			default_format: {
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
			form() {
				return this.$_.isEmpty(this.item) ? Object.assign({}, this.default_format) : this.item;
			}
		},

		validations: {
			form: {
				tahun: { required, maxLength: maxLength(10) }, 
				status: { required },
			}
		},

		directives: {mask}
	}
</script>