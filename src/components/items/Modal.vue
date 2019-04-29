<template>
	<transition name="modal">
		<div class="modal-mask" v-if="status">
			<div class="modal-wrapper">

				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white font-weight-bold">
								{{ title }}
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('close')">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<slot></slot>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" @click="$emit('close')">Kembali</button>
							<button v-if="sendButton" type="button" class="btn btn-primary" @click="$emit('send')">Kirim</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</transition>
</template>

<script>
	export default {
		name: 'Modal',
		props: {
			title: String,
			status: Boolean,
			sendButton: Boolean
		},
	}
</script>

<style>
	.modal-enter-active {
		animation: fadeIn .5s;
	}
	.modal-leave-active {
		animation: fadeOut .5s;
	}
</style>