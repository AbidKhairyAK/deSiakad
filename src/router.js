import VueRouter from 'vue-router';

import PesertaDidik from '@/components/contents/peserta-didik/Index';
import ValidationTest from '@/components/contents/validation-test/Index';

const routes = [
	{path: '/peserta-didik', component: PesertaDidik},
	{path: '/validation-test', component: ValidationTest},
];

const router = new VueRouter({
	routes: routes,
});

export default router;