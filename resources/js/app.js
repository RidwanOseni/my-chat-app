/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Vue from 'vue'
import VueRouter from 'vue-router';
import VueChatScroll from 'vue-chat-scroll'
import { routes } from './routes';

Vue.use(VueChatScroll)
Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: 'history'
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app-chat', require('./components/Chat.vue').default);
Vue.component('app-header', require('./components/Header.vue').default);
Vue.component('app-message-composer', require('./components/MessageComposer.vue').default);
Vue.component('app-game', require('./components/Game.vue').default);
Vue.component('app-groupchat', require('./components/GroupChat.vue').default);


const app = new Vue({
    el: '#app',
    router,
  })
