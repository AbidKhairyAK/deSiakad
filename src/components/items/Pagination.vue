<template>
	<ul class="pagination pagination-sm m-0">

		<!-- prev page -->
		<li :class="['page-item', check_page.first ? 'disabled' : '']">
			<a class="page-link" href="javascript:" @click="$emit('switch_page', prev_page)">&laquo;</a>
		</li>

		<!-- first page -->
		<li class="page-item" v-if="current_page >= 4">
			<a class="page-link" href="javascript:" @click="$emit('switch_page', 1)">1</a>
		</li>

		<!-- dots -->
		<li class="page-item disabled" v-if="current_page >= 4">
			<a class="page-link" href="javascript:">...</a>
		</li>

		<!-- multipage -->
		<li :class="['page-item', page == current_page ? 'active' : '']" v-for="page in pages" :key="page">
			<a class="page-link" href="javascript:" @click="$emit('switch_page', page)">{{ page }}</a>
		</li>

		<!-- dots -->
		<li class="page-item disabled" v-if="current_page <= last_page - 3">
			<a class="page-link" href="javascript:">...</a>
		</li>

		<!-- last page -->
		<li class="page-item" v-if="current_page <= last_page - 3">
			<a class="page-link" href="javascript:" @click="$emit('switch_page', last_page)">{{ last_page }}</a>
		</li>

		<!-- next page -->
		<li :class="['page-item', check_page.last ? 'disabled' : '']">
			<a class="page-link" href="javascript:" @click="$emit('switch_page', next_page)">&raquo;</a>
		</li>
	</ul>
</template>

<script>
	export default {
		name: 'Pagination',
		props: {
			current_page: { required: true },
			last_page: { required: true },
		},
		computed: {
			prev_page() {
				return this.current_page > 1 ? this.current_page - 1 : '#';
			},
			next_page() {
				return this.current_page != this.last_page ? this.current_page + 1 : '#';
			},
			check_page() {
				return {
					first: this.current_page == 1,
					last: this.current_page == this.last_page,
				}
			},
			pages() {
				var pages = [];
				var cur = this.current_page;
				var last = this.last_page;

				if(cur > 2) {
					pages.push(cur - 2);
					pages.push(cur - 1);
				} else if(cur > 1) {
					pages.push(cur - 1);
				}

				pages.push(cur);

				if(cur <= last - 2) {
					pages.push(cur + 1);
					pages.push(cur + 2);
				} else if(cur <= last - 1) {
					pages.push(cur + 1);
				}

				return pages;
			},
		},
	}
</script>

<style scoped>
	a {
		cursor: pointer;
	}
</style>