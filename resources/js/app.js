require('./bootstrap');
import Vue from 'vue';

window.Vue = require('vue').default;

import algoliasearch from 'algoliasearch/lite';
import InstantSearch from 'vue-instantsearch';

window.algoliasearch = algoliasearch;
Vue.use(InstantSearch);

