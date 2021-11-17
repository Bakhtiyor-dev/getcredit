require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex'

Vue.use(Vuex)
Vue.use(VueRouter);

Vue.component('tests', require('./components/Tests.vue').default);

const app = new Vue({
    el: '#app',
});
