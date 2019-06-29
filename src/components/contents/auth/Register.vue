<template>
	<div>
		<transition name="reg" mode="out-in">		
			<div v-if="!check" key="check">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Pengecekan Guru</h1>
				</div>
				<form class="user" @submit.prevent="checkData()">
					<div class="form-group">
						<input type="email" class="form-control form-control-user" placeholder="Masukkan NUPTK...">
					</div>
					<button class="btn btn-primary btn-user btn-block">
						Check
					</button>
				</form>
			</div>
			<div v-else key="reg">
				<div class="text-center">
					<h1 class="h4 text-gray-900 mb-4">Form Registrasi</h1>
				</div>
				<form class="user" @submit.prevent="sendData()">
					<div class="form-group">
						<input type="text" class="form-control form-control-user" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="email" class="form-control form-control-user" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control form-control-user" placeholder="Password">
					</div>
					<button class="btn btn-primary btn-user btn-block mt-5">
						Kirim
					</button>
				</form>
			</div>
		</transition>
	</div>
</template>

<script>
	export default {
		data: () => ({
			check: false
		}),
		methods: {
			checkData() {
				this.check = true;
			},
			sendData() {
				this.$router.push('login');
			}
		}
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