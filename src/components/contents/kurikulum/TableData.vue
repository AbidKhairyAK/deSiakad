<template>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="20">#</th>
				<th width="300">Nama Kurikulum</th>
				<th>Status</th>
				<th width="80">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in items" :key="item.no">
				<td>{{ item.no }}</td>
				<td>{{ item.nama }}</td>
				<td>{{ item.status | boolText }}</td>
				<td class="d-flex justify-content-between">
					<button class="btn btn-circle btn-sm" @click="$emit('openModal', {mode: 'edit', item})">
						<i class="fa fa-edit"></i>
					</button>
					<button class="btn btn-circle btn-sm" @click="$emit('destroyData', item.id)">
						<i class="fa fa-trash"></i>
					</button>
				</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
	export default {
		name: 'TableData',
		props: ['items'],
		filters: {
			boolText(value) {
				return value ? 'Aktif' : 'Tidak Aktif';
			}
		}
	}
</script>