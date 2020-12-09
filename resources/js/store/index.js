import Vue from 'vue';
import Vuex from 'vuex';
import items from './items';

Vue.use(Vuex);

export const store = new Vuex.Store({
	state: {},
	getters: {},
	mutations: {},
	actions: {},
	modules: {
		items,
	},
});