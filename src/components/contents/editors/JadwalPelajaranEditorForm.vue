<template>
	<tr>
		<td class="d-flex justify-content-between" >
			<select class="form-control form-control-sm p-1" v-model="form.id_jam_mulai">
				<option :key="i" :value="item.id" v-for="(item, i) in option.jam">{{ item.pukul }}</option>
			</select>
			<span class="mx-1"><b>-</b></span>
			<select class="form-control form-control-sm p-1" v-model="form.id_jam_selesai">
				<option :key="i" :value="item.id" v-for="(item, i) in option.jam">{{ item.pukul }}</option>
			</select>
		</td>
		<td v-for="jadwal in form.jadwal" :key="jadwal.id_hari">
			<select v-model="jadwal.id_mapel" class="form-control form-control-sm p-1 mb-1">
				<option value="">- mapel -</option>
				<option :key="i" :value="item.id" v-for="(item, i) in option.mapel">{{ item.nama }}</option>
			</select>
			<select v-model="jadwal.id_ruangan" class="form-control form-control-sm p-1 mb-1">
				<option value="">- ruangan -</option>
				<option :key="i" :value="item.id" v-for="(item, i) in option.ruangan">{{ item.nama }}</option>
			</select>
			<select v-model="jadwal.id_guru" class="form-control form-control-sm p-1 mb-1">
				<option value="">- guru -</option>
				<option :key="i" :value="item" v-for="(item, i) in 10">{{ item }}</option>
			</select>
		</td>
		<td class="d-flex justify-content-between">
			<button class="btn btn-circle btn-sm" title="simpan" @click="$emit('submit', form)">
				<i class="fa fa-check"></i>
			</button>
			<button class="btn btn-circle btn-sm" title="batal" @click="$emit('cancel')">
				<i class="fa fa-times"></i>
			</button>
		</td>
	</tr>
</template>

<script>
	export default {
		name: 'JadwalPelajaranEditorForm',
		props: {
			option: Object,
			items: Object,
			days: Array,
			id_rombel: Number,
		},
		data: () => ({
			default_form: {
				id_rombel: '', id_jam_mulai: 1, id_jam_selesai: 1, old_jam_mulai: 0, old_jam_selesai: 0, jadwal: [
					{ id_mapel: '', id_guru: '', id_ruangan: '', id_hari: '' }
				]
			}
		}),
		computed: {
			form() {
				let check = this.$_.isEmpty(this.items);
				let form = this.default_form;
				let jadwal = this.default_form.jadwal[0];

				if (check) {		
					this.days.forEach((day, i) => {
						form.jadwal[i] = Object.assign({}, jadwal);
						form.jadwal[i].id_hari = day.id;
					});
				} 

				else {
					let cur_jadwal = [];

					this.days.forEach((day, i) => {

						cur_jadwal = this.items.jadwal.filter(j => j.id_hari == day.id);

						if (cur_jadwal.length) {
							if(!cur_jadwal[0].id_guru) cur_jadwal[0].id_guru = "";
							if(!cur_jadwal[0].id_ruangan) cur_jadwal[0].id_ruangan = "";
							form.jadwal[i] =  Object.assign({}, cur_jadwal[0]);
						} 

						else {
							form.jadwal[i] = Object.assign({}, jadwal);
						}

						form.jadwal[i].id_hari = day.id;
					});

					form.old_jam_mulai = this.items.id_jam_mulai;
					form.old_jam_selesai = this.items.id_jam_selesai;
					form.id_jam_mulai = this.items.id_jam_mulai;
					form.id_jam_selesai = this.items.id_jam_selesai;
				}

				form.id_rombel = this.id_rombel;

				return form;
			}
		}
	}
</script>