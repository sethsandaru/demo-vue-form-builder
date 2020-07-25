
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import 'v-form-builder/dist/v-form-builder.min.css'
import {VueFormBuilderPlugin} from 'v-form-builder'
Vue.use(VueFormBuilderPlugin)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('my-form', require('./components/MyForm'));
Vue.component('form-configuration', require('./components/FormConfiguration'));

const app = new Vue({
    el: '#app'
});
