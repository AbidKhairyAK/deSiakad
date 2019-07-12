<template>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="20">#</th>
				<th>Rombel</th>
				<th>Mapel</th>
				<th>Hari</th>
				<th>Jam</th>
				<th width="50">Opsi</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in items" :key="item.no">
				<td>{{ item.no }}</td>
				<td>{{ item.rombel }}</td>
				<td>{{ item.mapel }}</td>
				<td>{{ item.hari }}</td>
				<td>{{ item.jam_mulai }}-{{ item.jam_selesai }}</td>
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