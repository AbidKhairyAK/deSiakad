import Vuex from 'vuex';

const state = {
	sidebarToggle: false,
	peserta_didik: {
		id: '', id_rombel: '', id_agama: '', id_tahun_akademik: '', nim: '', nama: '', gender: '', tanggal_lahir: '', tempat_lahir: ''
	}
};

const mutations = {
	TOGGLE_SIDEBAR(state, payload) {
		state.sidebarToggle = payload;
	},
};

const actions = {
	toggleSidebar(context, sidebarToggle) {
		context.commit("TOGGLE_SIDEBAR", sidebarToggle);
	}
};

const store = new Vuex.Store({
	state,
	mutations,
	actions,
});

export default store;