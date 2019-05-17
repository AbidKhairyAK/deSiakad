<template>
	<div>
		<page-header title="Peserta Didik" text="Berisi daftar data peserta didik aktif"></page-header>
		
		<div class="row">
			<div class="col-md-3">	
				<filters v-model="url_query"></filters>
			</div>
			<div class="col-md-9">
				<box title="Tabel Peserta Didik" 
					header_class="d-flex align-items-center justify-content-between"
				>
					<template #right-header>
						<button class="btn btn-sm btn-primary rounded" @click="toEditor()">
							<i class="fa fa-edit"></i> Atur Peserta Didik
						</button>
					</template>

					<table-data :items="api.data"
						@openModal="openModal($event)"
					></table-data>
					<pagination
						:current_page="api.meta ? api.meta.current_page : 1"
						:last_page="api.meta ? api.meta.last_page : 1"
						@switch_page="url_query.page = $event"
					></pagination>

					<detail-modal :status="mode"
						:item="item"
						@closeModal="closeModal()"
					></detail-modal>
				</box>
			</div>
		</div>
	</div>
</template>

<script>
	import Filters from './Filters';
	import TableData from './TableData';
	import DetailModal from './DetailModal';

	export default {
		name: 'Index',

		components: {
			'filters': Filters,
			'table-data': TableData,
			'detail-modal': DetailModal,
		},

		data: () => ({
			url_query: {
				page: 1, rombel: '', agama: '', gender: '', search: ''
			},
			item: {},
			api: {},
			mode: null,
		}),

		methods: {
			getData() {
				let query = this.$qs.stringify(this.url_query);

				this.$axios.get(`${this.$url}/peserta-didik?${query}`).then((response) => {
					this.api = response.data;
					for (let i = 0; i < this.api.data.length; i++) {
						this.api.data[i].no = i + this.api.meta.from;
					}
				});
			},
			openModal(data) {
				this.item = Object.assign({}, data.item);
				this.mode = data.mode;
			},
			closeModal() {
				this.item  = {};
				this.mode = null;
			},
			toEditor() {
				this.$router.push('peserta-didik-editor');
			}
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