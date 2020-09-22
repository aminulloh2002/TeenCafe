require('../bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios'
import Axios from 'axios'
import {routes} from './routes';
import App from './components/App';



Vue.use(VueRouter, VueAxios, Axios);
    const router = new VueRouter({
         mode: 'history',
         routes: routes 
    });


new Vue(Vue.util.extend({ router }, App)).$mount("#torder");