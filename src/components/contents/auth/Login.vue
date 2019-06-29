<template>
	<div>
		<div class="text-center">
			<h1 class="h4 text-gray-900 mb-4">Form Login</h1>
		</div>
		<form class="user" @submit.prevent="sendData()">
			<div class="form-group">
				<input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
			</div>
			<div class="form-group">
				<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
			</div>
			<div class="form-group d-flex justify-content-between">
				<div class="custom-control custom-checkbox small">
					<input type="checkbox" class="custom-control-input" id="customCheck">
					<label class="custom-control-label" for="customCheck">Remember Me</label>
				</div>
				<router-link class="small" to="forget">Lupa password?</router-link>
			</div>

			<button class="btn btn-primary btn-user btn-block">
				Login
			</button>

			<hr>
			
			<div class="text-center">
				<p class="small" href="forgot-password.html">Belum punya akun?</p>
			</div>
			<router-link to="register" class="btn btn-success btn-user btn-block">
				Buat Akun
			</router-link>

		</form>
	</div>
</template>

<script>
	export default {
		methods: {
			sendData() {
				this.$router.push('register');
			}
		}
	}
</script>