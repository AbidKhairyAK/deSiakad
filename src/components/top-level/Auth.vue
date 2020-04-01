<template>
	<div id="wrapper" class="bg-gray-300">
		
		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center align-items-center h-100">

				<div class="col-xl-10 col-lg-12 col-md-9">

					<div class="card o-hidden border-0 shadow-lg">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
								<div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
									<img src="@/assets/logo.png" class="logo_ic">
								</div>
								<div class="col-lg-6">
									<div class="p-5">
										
										<transition name="auth" mode="out-in">
											<router-view></router-view>
										</transition>

									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
</template>

<script>
	export default {}
</script>

<style scoped>
	.auth-enter-active, .auth-leave-active {
		transition: all .2s ease;
	}
	.auth-enter, .auth-leave-to {
		opacity: 0;
		transform: scale(0.8, 0.8);
	}
	.logo_ic {
		width: 90%;
	}
</style>