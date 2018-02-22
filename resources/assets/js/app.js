
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*import Menu from './components/Menu.vue';
import Page from './components/Page.vue';
import vuex from './store';
import VueRouter from 'vue-router'
import routes from './routes';

Vue.use(VueRouter)

Vue.component('mw-menu', Menu);
Vue.component('mw-page', Page);

const router = new VueRouter({
  routes // short for `routes: routes`
}) */

import Vue from 'vue';

const app = new Vue({
    el: '#app',
    /*data: function() {
        return {
            folders: {},
        }
    },
    methods: {
        openClose(name) {
            this.folders[name].open = ! this.folders[name].open;
        },
        isOpen: function(name) {
            if(this.folders[name] === undefined) {
                this.addFolder(name);
            }
            return this.folders[name].open;
        },
        addFolder: function(name) {
            if(this.folders[name] === undefined) {
                this.folders[name] = {};
                this.folders[name].open = true; 
            }
        }
    },*/
});
