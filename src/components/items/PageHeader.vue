<template>
	<div id="page-header">
		<h1 class="h3 mb-1 text-gray-800">{{ title }}</h1>
		<p class="mb-4">{{ text }}</p>
	</div>
</template>

<script>
	export default {
		name: 'PageHeader',
		props: {
			title: { required: true },
			text: { required: false },
		}
	}
</script>