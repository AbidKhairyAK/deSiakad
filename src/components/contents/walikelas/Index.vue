<template>
	<div>
		<page-header title="Walikelas" text="Berisi daftar walikelas"></page-header>
		
		<div class="row">
			<div class="col-md-3">	
				<filters v-model="url_query"></filters>
			</div>
			<div class="col-md-9">
				<box title="Tabel Walikelas">
					<table-data :items="api.data"
						:mode="mode"
						@sendData="sendData($event)"
						@editMode="mode = $event"
					></table-data>
					<pagination
						:current_page="api.meta ? api.meta.current_page : 1"
						:last_page="api.meta ? api.meta.last_page : 1"
						@switch_page="url_query.page = $event"
					></pagination>
				</box>
			</div>
		</div>
	</div>
</template>

<script>
	import Filters from './Filters';
	import TableData from './TableData';

	export default {
		name: 'Index',

		components: {
			'filters': Filters,
			'table-data': TableData,
		},

		data: () => ({
			url_query: {
				page: 1, search: '', kelas: ''
			},
			item: {},
			api: {},
			mode: null,
		}),

		methods: {
			getData() {
				let query = this.$qs.stringify(this.url_query);

				this.$axios.get(`${this.$url}/walikelas?${query}`).then((response) => {
					this.api = response.data;
					for (let i = 0; i < this.api.data.length; i++) {
						this.api.data[i].no = i + this.api.meta.from;
					}
				});
			},
			sendData(item) {
				let url = `${this.$url}/walikelas/sync`;

				this.$axios.post(url, item, this.$url_config).then(() => {
					this.getData();
					this.mode = null;
				});
			},
		},

		computed: {
			copied_query() {
				return Object.assign({}, this.url_query);
			},
		},

		watch: {
			copied_query: {
				deep: true,
				handler(newQuery, oldQuery) {
					if(newQuery.page == oldQuery.page) {
						this.url_query.page = 1;
					}
					this.getData();
				},
			}
		},

		created() {
			this.getData();
		}
	}
</script>