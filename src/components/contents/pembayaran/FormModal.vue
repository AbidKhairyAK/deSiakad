<template>
	<modal :title="form_title"
		:status="status == 'create' || status == 'edit'"
		@close="closeModal()"
		@send="sendData()"
		sendButton
	>
		<form-wrapper :validator="$v.form" class="row">
			<form-field name="id_siswa" label="Nama Siswa" grid="col-sm-12">
				
				<v-select
					:options="select.siswa" 
					:reduce="item => item.id"
					v-model="$v.form.id_siswa.$model"
				></v-select>
			</form-field>
			<form-field name="id_jenis_pembayaran" label="Jenis Pembayaran" grid="col-sm-12">
				<select class="form-control" v-model="$v.form.id_jenis_pembayaran.$model">
					<option v-for="item in select.jenis" 
						:key="item.id"
						:value="item.id"
					>
						{{ item.nama }}
					</option>
				</select>
			</form-field>
			<form-field name="jumlah" label="Jumlah" grid="col-sm-6">
				<money class="form-control" v-model="$v.form.jumlah.$model" v-bind="money"></money>
			</form-field>
			<form-field name="tanggal" label="Tanggal" grid="col-sm-6">
				<input type="date" class="form-control" v-model="$v.form.tanggal.$model">
			</form-field>
			<form-field name="keterangan" label="Keterangan" grid="col-sm-12">
				<input type="text" class="form-control" v-model="$v.form.keterangan.$model">
			</form-field>
		</form-wrapper>
	</modal>
</template>

<script>
	import { required, maxLength } from 'vuelidate/lib/validators';
	import { Money } from 'v-money';
	import VSelect from 'vue-select';
	import 'vue-select/dist/vue-select.css';

	export default {
		name: 'FormModal',

		components: { Money, VSelect },

		props: ['status', 'item'],

		data: () => ({
			select: {
				siswa: [], jenis: []
			},
			form: {
				id: '', id_siswa: '', id_jenis_pembayaran: '', jumlah: '', tanggal: '', keterangan: ''
			},
			default_form: {
				id: '', id_siswa: '', id_jenis_pembayaran: '', jumlah: '', tanggal: '', keterangan: ''
			},
			money: {
				thousands: '.',
				prefix: 'Rp. ',
				precision: 0,
				masked: false
			}
		}),

		methods: {
			getSelect() {
				this.$axios.get(`${this.$url}/peserta-didik/list`).then((response) => {
					this.select.siswa = response.data;
				});
				this.$axios.get(`${this.$url}/jenis-pembayaran/list`).then((response) => {
					this.select.jenis = response.data;
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
				id_siswa: {required},
				id_jenis_pembayaran: {required},
				jumlah: {required, maxLength: maxLength(11)},
				tanggal: {required},
				keterangan: {},
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