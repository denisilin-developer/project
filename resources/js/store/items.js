import Axios from "axios";

const state = {
	list: {
		data: [],
	},
};

const getters = {
	items(state) {
		return state.list.data;
	},
};

const mutations = {
	SET_LIST: (state, payload) => {
		state.list = payload;
	},
};

const actions = {
	async fetchItems({commit}, params = {}) {
		const response = await Axios.get('api/items', {params});

		commit('SET_LIST', response);
	},
};

export default {
	state,
	getters,
	mutations,
	actions,
};