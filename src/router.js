import VueRouter from 'vue-router';

import PesertaDidik from '@/components/contents/peserta-didik/Index';
import TahunAkademik from '@/components/contents/tahun-akademik/Index';
import Angkatan from '@/components/contents/angkatan/Index';
import Ruangan from '@/components/contents/ruangan/Index';
import Siswa from '@/components/contents/siswa/Index';
import Mapel from '@/components/contents/mapel/Index';
import Rombel from '@/components/contents/rombel/Index';
import Kurikulum from '@/components/contents/kurikulum/Index';

import PesertaDidikEditor from '@/components/contents/editors/PesertaDidikEditor';
import JadwalPelajaranEditor from '@/components/contents/editors/JadwalPelajaranEditor';

const routes = [
	{path: '/', redirect: '/beranda'},

	{path: '/peserta-didik', component: PesertaDidik},
	{path: '/tahun-akademik', component: TahunAkademik},
	{path: '/angkatan', component: Angkatan},
	{path: '/ruangan', component: Ruangan},
	{path: '/siswa', component: Siswa},
	{path: '/mapel', component: Mapel},
	{path: '/kurikulum', component: Kurikulum},
	{path: '/rombel', component: Rombel},

	{path: '/peserta-didik-editor', component: PesertaDidikEditor},
	{path: '/jadwal-pelajaran-editor', component: JadwalPelajaranEditor},
];

const router = new VueRouter({
	routes: routes,
});

export default router;