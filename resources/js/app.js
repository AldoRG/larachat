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

Vue.component('chat-app', require('./components/ChatAppComponent').default);
Vue.component('chat-sidebar', require('./components/ChatSideBarComponent').default);
Vue.component('contact-card', require('./components/ContactCardComponent').default);
Vue.component('contact-card-user', require('./components/ContactCardUserComponent').default);
Vue.component('chat-conversation', require('./components/ChatConversationComponent').default);
Vue.component('conversation-header', require('./components/conversation/HeaderComponent').default);
Vue.component('conversation-body', require('./components/conversation/BodyComponent').default);
Vue.component('conversation-footer', require('./components/conversation/FooterComponent').default);
Vue.component('message-bubble', require('./components/conversation/MessageComponent').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import store from '../js/store'

const app = new Vue({
    el: '#app',
    store
});
