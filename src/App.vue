<template>
	<div id="app">
		<transition name="app" mode="out-in">
			<router-view></router-view>
		</transition>
	</div>
</template>

<script>
	export default {
		name: 'app',
	}
</script>

<style>
	.app-enter-active, .app-leave-active {
		transition: all .2s ease;
	}
	.app-enter, .app-leave-to {
		opacity: 0;
		transform: scale(0.9, 0.9);
	}
</style>