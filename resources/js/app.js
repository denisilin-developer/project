import Vuex from 'vuex';
import {store} from './store';
import ElementUI from 'element-ui';

require('./bootstrap');

window.Vue = require('vue');
window.Vuex = Vuex;

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.use(ElementUI);

const app = new Vue({
	el: '#app',
	store,
});