<template>
	<form-wrapper :validator="$v.form">
		<form-field name="name" label="Nama">
			<input type="text" v-model="$v.form.name.$model" class="form-control">
		</form-field>
		<form-field name="email" label="Email">
			<!-- <input type="text" v-model="$v.form.email.$model" class="form-control"> -->
			<select class="form-control" v-model="$v.form.email.$model">
				<option value="">- ph -</option>
				<option>opt biasa</option>
				<option>abid@abid.com</option>
			</select>
		</form-field>
	</form-wrapper>
</template>

<script>
	import { required, email } from 'vuelidate/lib/validators';

	export default {
		name: 'ValidationTest',

		data: () => ({
			form: {
				name: '',
				email: ''
			}
		}),

		validations: {
			form: {
				name: { required },
				email: { required, email },
			}
		},

		methods: {
			submit() {
				this.$v.form.$touch();
				if(this.$v.form.$error) return;

				alert('form submitted!');
			}
		}
	}
</script>

<style scoped>
	.hasError {
		border: 1px solid red;
	}
</style>