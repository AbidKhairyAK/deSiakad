<template>
	<div :class="grid">
		<div :class="'card shadow h-100 py-2 border-left-'+color">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div :class="'text-xs font-weight-bold text-uppercase mb-1 text-'+color">{{ title }}</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{ content }}</div>
					</div>
					<div class="col-auto">
						<i :class="'fas fa-2x text-gray-300 fa-'+icon"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'InfoCard',
		props: {
			grid: {default: 'col-xl-3 col-md-6 mb-4'},
			color: String,
			title: String,
			content: String,
			icon: String,
		}
	}
</script>