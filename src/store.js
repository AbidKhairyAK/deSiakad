import Vuex from 'vuex';

const state = {
	sidebarToggle: false,
};

const mutations = {
	TOGGLE_SIDEBAR(state, payload) {
		state.sidebarToggle = payload;
	},
};

const actions = {
	toggleSidebar(context, params) {
		context.commit("TOGGLE_SIDEBAR", params);
	}
};

const store = new Vuex.Store({
	state,
	mutations,
	actions,
});

export default store;