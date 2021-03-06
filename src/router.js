import VueRouter from 'vue-router';

import Main from '@/components/top-level/Main.vue';
import Auth from '@/components/top-level/Auth.vue';
import ERR404 from '@/components/top-level/ERR404.vue';

import Login from '@/components/contents/auth/Login';
import Register from '@/components/contents/auth/Register';

import Beranda from '@/components/contents/beranda/Index';
import PesertaDidik from '@/components/contents/peserta-didik/Index';
import TahunAkademik from '@/components/contents/tahun-akademik/Index';
import Angkatan from '@/components/contents/angkatan/Index';
import Ruangan from '@/components/contents/ruangan/Index';
import Siswa from '@/components/contents/siswa/Index';
import Mapel from '@/components/contents/mapel/Index';
import Rombel from '@/components/contents/rombel/Index';
import Kurikulum from '@/components/contents/kurikulum/Index';
import Guru from '@/components/contents/guru/Index';
import Walikelas from '@/components/contents/walikelas/Index';
import Jadwal from '@/components/contents/jadwal/Index';
import Sekolah from '@/components/contents/sekolah/Index';
import JenisPembayaran from '@/components/contents/jenis-pembayaran/Index';
import Pembayaran from '@/components/contents/pembayaran/Index';

import PesertaDidikEditor from '@/components/contents/editors/PesertaDidikEditor';
import JadwalPelajaranEditor from '@/components/contents/editors/JadwalPelajaranEditor';

const routes = [
	{path: '/', redirect: '/login'},

	{path: '/auth', component: Auth, children: [
		{path: '/login', component: Login},
		{path: '/register', component: Register},
	]},

	{path: '/app', component: Main, children: [
		{path: '/beranda', component: Beranda},
		{path: '/peserta-didik', component: PesertaDidik},
		{path: '/tahun-akademik', component: TahunAkademik},
		{path: '/angkatan', component: Angkatan},
		{path: '/ruangan', component: Ruangan},
		{path: '/siswa', component: Siswa},
		{path: '/mapel', component: Mapel},
		{path: '/kurikulum', component: Kurikulum},
		{path: '/rombel', component: Rombel},
		{path: '/guru', component: Guru},
		{path: '/walikelas', component: Walikelas},
		{path: '/jadwal', component: Jadwal},
		{path: '/sekolah', component: Sekolah},
		{path: '/jenis-pembayaran', component: JenisPembayaran},
		{path: '/pembayaran', component: Pembayaran},

		{path: '/peserta-didik-editor', component: PesertaDidikEditor},
		{path: '/jadwal-pelajaran-editor', component: JadwalPelajaranEditor},
	]},

	{path: '*', component: ERR404},
];

const router = new VueRouter({
	routes: routes,
});

export default router;