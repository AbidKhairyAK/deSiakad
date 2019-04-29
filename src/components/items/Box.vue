<template>
	<div class="card shadow mb-4" :class="wrapper_class">
		<div class="card-header py-3" :class="header_class">
			<h6 class="m-0 font-weight-bold text-primary">{{title}}</h6>
			<slot name="right-header"></slot>
		</div>
		<div class="card-body">
			<slot></slot>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'Box',
		props: {
			title: {required: true},
			wrapper_class: {required: false},
			header_class: {required: false},
		}
	}
</script>