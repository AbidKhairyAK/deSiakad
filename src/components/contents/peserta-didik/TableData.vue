<template>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="20">#</th>
				<th width="140">NIS</th>
				<th>Nama Siswa</th>
				<th>Rombel</th>
				<th>Angkatan</th>
				<th>Gender</th>
				<th width="50">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in items" :key="item.no">
				<td>{{ item.no }}</td>
				<td>{{ item.nis }}</td>
				<td>{{ item.nama }}</td>
				<td>{{ item.rombel }}</td>
				<td>{{ item.angkatan }}</td>
				<td>{{ item.gender }}</td>
				<td class="d-flex justify-content-between">
					<button class="btn btn-circle btn-sm btn-success" @click="$emit('openModal', {mode: 'detail', item})">
						<i class="fa fa-address-card"></i>
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