<template>
	<div id="wrapper">

		<!-- Sidebar -->
		<sidebar></sidebar>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Navbar -->
				<navbar></navbar>

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<transition name="page" mode="out-in">
						<router-view></router-view>
					</transition>


				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footbar -->
			<footbar></footbar>

		</div>
		<!-- End of Content Wrapper -->

	</div>
</template>

<script>
	import Navbar from '@/components/layouts/Navbar';
	import Sidebar from '@/components/layouts/Sidebar';
	import Footbar from '@/components/layouts/Footbar';

	export default {
		name: 'app',
		components: {
			'navbar': Navbar,
			'sidebar': Sidebar,
			'footbar': Footbar,
		}
	}
</script>

<style>
	.page-enter-active, .page-leave-active {
    transition: all .2s ease;
  }
  .page-enter, .page-leave-to {
    opacity: 0;
    transform: translateY(10%);
  }
</style>