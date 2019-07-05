<template>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="20">#</th>
				<th>Nama Rombel</th>
				<th>Kelas</th>
				<th>Walikelas</th>
				<th width="50">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in items" :key="item.no">
				<td>{{ item.no }}</td>
				<td>{{ item.nama }}</td>
				<td>{{ item.kelas }}</td>
				<td v-if="mode == item.id">
					<select class="form-control" 
						v-model="selected_guru"
						@change="sendData(item)"
					>
						<option value="">-</option>
						<option v-for="opt in guru" 
							:key="opt.id"
							:value="opt.id"
						>
							{{ opt.nama }}
						</option>
					</select>
				</td>
				<td v-else>{{ item.walikelas != null ? item.walikelas : '-' }}</td>
				<td class="d-flex justify-content-between">
					<button v-if="mode == item.id"
						class="btn btn-circle btn-sm btn-danger" 
						@click="$emit('editMode', null)"
					>
						<i class="fa fa-times"></i>
					</button>
					<button v-else
						class="btn btn-circle btn-sm btn-info" 
						@click="editMode(item)"
					>
						<i class="fa fa-edit"></i>
					</button>
				</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
	export default {
		name: 'TableData',
		props: ['items', 'mode'],
		data: () => ({
			guru: [],
			selected_guru: null,
		}),
		methods: {
			getSelect() {
				this.$axios.get(`${this.$url}/guru/list`).then(({data}) => {
					this.guru = data;
				});
			},
			editMode(item) {
				this.selected_guru = item.id_walikelas ? item.id_walikelas : '';
				this.$emit('editMode', item.id);
			}, 
			sendData(item) {
				if (this.selected_guru != null) {
					this.$emit('sendData', {id_rombel: item.id, id_guru: this.selected_guru})
					this.selected_guru = null;
				}
			}
		},
		created() {
			this.getSelect();
		}
	}
</script>