<template>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="20">#</th>
				<th width="100">Kode</th>
				<th>Nama Mapel</th>
				<th width="80">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in items" :key="item.no">
				<td>{{ item.no }}</td>
				<td>{{ item.kode }}</td>
				<td>{{ item.nama }}</td>
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
	}
</script>