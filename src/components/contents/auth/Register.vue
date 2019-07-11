<template>
	<div>
		<transition name="reg" mode="out-in">		
			<div v-if="check == 'idle' || check == false || check == 'test'" key="check">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Pengecekan Guru</h1>
				</div>
				<form class="user" @submit.prevent="checkIdentity()">
					<div :class="['form-group', {isError: check == false || check == 'test'}]">
						<input type="text" 
							v-model="identity"
							class="form-control form-control-user" placeholder="Masukkan NIK atau NUPTK..."
						>
						<p class="text-danger small text-center mt-2" v-if="check == false">
							Data anda belum terdaftar di sistem sekolah.
							<br>
							Silahkan hubungi admin / operator sekolah untuk informasi lebih lanjut.
						</p>
						<p class="text-danger small text-center mt-2" v-if="check == 'test'">
							Kolom ini tidak boleh kosong!
						</p>
					</div>
					<button class="btn btn-primary btn-user btn-block">
						Check
					</button>
				</form>
			</div>
			<div v-if="check == 'reg'" key="reg">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Form Registrasi</h1>
				</div>
				<form class="user" @submit.prevent="sendData()">
					<form-field :validator="$v.form.username" name="username" center_error>
						<input type="text" 
							v-model="$v.form.username.$model"
							class="form-control form-control-user" 
							placeholder="Username"
						>
					</form-field>
					<form-field :validator="$v.form.email" name="email" center_error>
						<input type="email" 
							v-model="$v.form.email.$model"
							class="form-control form-control-user" 
							placeholder="Email"
						>
					</form-field>
					<form-field :validator="$v.form.password" name="password" center_error>
						<input type="password" 
							v-model="$v.form.password.$model"
							class="form-control form-control-user" 
							placeholder="Password"
						>
					</form-field>
					<form-field :validator="$v.form.password_confirm" name="password_confirm" center_error>
						<input type="password" 
							v-model="$v.form.password_confirm.$model"
							class="form-control form-control-user" 
							placeholder="Ulangi Password"
						>
					</form-field>
					<button class="btn btn-primary btn-user btn-block mt-5">
						Kirim
					</button>
				</form>
			</div>
		</transition>
	</div>
</template>

<script>
	import { required, maxLength, email } from 'vuelidate/lib/validators';

	function sameAsPass (value) { return value == this.form.password; }

	export default {
		data: () => ({
			check: 'idle',
			identity: '',
			form: {
				username: '', email: '', password: '', password_confirm: ''
			}
		}),
		methods: {
			checkIdentity() {
				if (!this.identity) return this.check = 'test';
				this.$axios.post(`${this.$url}/akun/check/${this.identity}`, {}, this.$url_config)
				.then(({data}) => {
					this.check = data.check ? 'reg' : false;
				});
			},
			sendData() {
				this.$v.form.$touch();
				if (this.$v.form.$error) return;
				this.$v.form.$reset();

				this.$axios.post(`${this.$url}/akun/register/`, this.form, this.$url_config)
				.then(() => {
					this.$router.push('login');
				})
			}
		},
		validations: {
			form: {
				username: { required, maxLength: maxLength(50) },
				email: { required, email, maxLength: maxLength(50) },
				password: { required, maxLength: maxLength(20) },
				password_confirm: { required, maxLength: maxLength(20), sameAsPass },
			}
		},
	}
</script>

<style scoped>
	.reg-enter-active, .reg-leave-active {
		transition: all .2s ease;
	}
	.reg-enter, .reg-leave-to {
		opacity: 0;
		transform: scale(0.8, 0.8);
	}
</style>