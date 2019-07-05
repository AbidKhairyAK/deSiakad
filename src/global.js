import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import Vuelidate from 'vuelidate';
import VuelidateErrorExtractor, { templates } from 'vuelidate-error-extractor';

import axios from 'axios';
import lodash from 'lodash';
import qs from 'querystring';

import Box from '@/components/items/Box';
import PageHeader from '@/components/items/PageHeader';
import Pagination from '@/components/items/Pagination';
import Modal from '@/components/items/Modal';
import FileSelect from '@/components/items/FileSelect';
import FormField from '@/components/items/FormField';

let url_config = {
	'accept': 'application/json',
	'content-type': 'application/x-www-form-urlencoded'
};
let vee_config = {
	messages: {
		required: "kolom {attribute} harus terisi!",
		email: "kolom {attribute} harus berupa email!",
		maxLength: "kolom {attribute} melebihi batas maksimal karakter!",
		sameAsPass: "kolom {attribute} harus sama dengan password!",
	}
};

Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(Vuelidate);
Vue.use(VuelidateErrorExtractor, vee_config);

Vue.prototype.$axios = axios;
Vue.prototype.$_ = lodash;
Vue.prototype.$qs = qs;
// Vue.prototype.$url = 'http://localhost:8000';
Vue.prototype.$url = 'http://209.97.169.78:92/api';
Vue.prototype.$url_config = url_config;

Vue.component('box', Box);
Vue.component('page-header', PageHeader);
Vue.component('pagination', Pagination);
Vue.component('modal', Modal);
Vue.component('file-select', FileSelect);
Vue.component('form-wrapper', templates.FormWrapper);
Vue.component("form-field", FormField);

Vue.filter('boolText', function(value) {
	return value ? 'Aktif' : 'Tidak Aktif';
});
Vue.filter('genderText', function(value) {
	return value == 'L' ? 'Laki-laki' : 'Perempuan';
});