import VueRouter from 'vue-router';

import PesertaDidik from '@/components/contents/peserta-didik/Index';
import TahunAkademik from '@/components/contents/tahun-akademik/Index';
import Ruangan from '@/components/contents/ruangan/Index';
import Mapel from '@/components/contents/mapel/Index';
import Rombel from '@/components/contents/rombel/Index';
import Kurikulum from '@/components/contents/kurikulum/Index';
import ValidationTest from '@/components/contents/validation-test/Index';

const routes = [
	{path: '/', redirect: '/beranda'},
	{path: '/peserta-didik', component: PesertaDidik},
	{path: '/tahun-akademik', component: TahunAkademik},
	{path: '/ruangan', component: Ruangan},
	{path: '/mapel', component: Mapel},
	{path: '/kurikulum', component: Kurikulum},
	{path: '/rombel', component: Rombel},
	{path: '/validation-test', component: ValidationTest},
];

const router = new VueRouter({
	routes: routes,
});

export default router;