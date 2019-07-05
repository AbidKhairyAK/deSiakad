<template>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="20">#</th>
				<th>Nama Siswa</th>
				<th>angkatan</th>
				<th>gender</th>
				<th>status</th>
				<th width="120">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in items" :key="item.no">
				<td>{{ item.no }}</td>
				<td>{{ item.nama }}</td>
				<td>{{ item.angkatan }}</td>
				<td>{{ item.gender }}</td>
				<td>{{ item.status | boolText }}</td>
				<td class="d-flex justify-content-between">
					<button class="btn btn-circle btn-sm btn-success" @click="$emit('openModal', {mode: 'detail', item})">
						<i class="fa fa-address-card"></i>
					</button>
					<button class="btn btn-circle btn-sm btn-info" @click="$emit('openModal', {mode: 'edit', item})">
						<i class="fa fa-edit"></i>
					</button>
					<button class="btn btn-circle btn-sm btn-danger" @click="$emit('destroyData', item.id)">
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