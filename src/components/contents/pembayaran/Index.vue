<template>
	<div>
		<page-header title="Pembayaran" text="Berisi data pembayaran siswa"></page-header>
		
		<div class="row">
			<div class="col-md-3">	
				<filters v-model="url_query"></filters>
			</div>
			<div class="col-md-9">
				<box title="Tabel Pembayaran" 
					header_class="d-flex align-items-center justify-content-between"
				>
					<template #right-header>
						<button class="btn btn-sm btn-primary rounded" @click="openModal({mode: 'create'})">
							<i class="fa fa-plus"></i> Tambah Data
						</button>
					</template>

					<table-data :items="api.data"
						@openModal="openModal($event)"
						@destroyData="destroyData($event)"
					></table-data>
					<pagination
						:current_page="api.meta ? api.meta.current_page : 1"
						:last_page="api.meta ? api.meta.last_page : 1"
						@switch_page="url_query.page = $event"
					></pagination>

					<form-modal :status="mode"
						:item="item"
						@closeModal="closeModal()"
						@sendData="sendData($event)"
					></form-modal>

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
	import FormModal from './FormModal';
	import DetailModal from './DetailModal';

	export default {
		name: 'Index',

		components: {
			'filters': Filters,
			'table-data': TableData,
			'form-modal': FormModal,
			'detail-modal': DetailModal,
		},

		data: () => ({
			url_query: {
				page: 1, search: '', jenis: ''
			},
			item: {},
			api: {},
			mode: null,
		}),

		methods: {
			getData() {
				let query = this.$qs.stringify(this.url_query);

				this.$axios.get(`${this.$url}/pembayaran?${query}`).then((response) => {
					this.api = response.data;
					for (let i = 0; i < this.api.data.length; i++) {
						this.api.data[i].no = i + this.api.meta.from;
					}
				});
			},
			sendData(item) {
				let url = this.mode == 'edit'
				? `${this.$url}/pembayaran/${item.id}/update`
				: `${this.$url}/pembayaran/create`;

				this.$axios.post(url, item, this.$url_config).then(() => {
					this.getData();
					this.closeModal();
				});
			},
			destroyData(id) {
				if (confirm('apakah anda yakin?')) {
					this.$axios.delete(`${this.$url}/pembayaran/${id}/destroy`).then(() => {
						this.getData();
					});
				}
			},
			openModal(data) {
				this.item = Object.assign({}, data.item);
				this.mode = data.mode;
			},
			closeModal() {
				this.item  = {};
				this.mode = null;
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