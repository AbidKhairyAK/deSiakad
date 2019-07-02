<template>
	<div class="form-group" :class="[{ 'isError': hasErrors, 'isSuccess': isValid }, grid]">
		<label v-if="label" class="font-weight-bold small">{{ label }}:</label>
		<slot></slot>
		<p class="text-danger small" :class="{'text-center': center_error}" v-if="hasErrors">
			<span v-for="error in activeErrorMessages" :key="error">{{ error }}</span>
		</p>
	</div>
</template>

<script>
	import { singleErrorExtractorMixin } from 'vuelidate-error-extractor';

	export default {
		name: 'FormField',
		props: {
			grid: {default: 'col-sm-12'},
			center_error: Boolean
		},
		mixins: [singleErrorExtractorMixin],
	}
</script>

<style>
	.isError .form-control {
		border-color: #dc3545 !important;
	}
	.isError .form-control:focus {
		box-shadow: 0 0 0 0.2rem rgba(220,53,69,.25) !important;
	}

	.isSuccess .form-control {
		border-color: #28a745 !important;
	}
	.isSuccess .form-control:focus {
		box-shadow: 0 0 0 0.2rem rgba(40,167,69,.25) !important;
	}
</style>