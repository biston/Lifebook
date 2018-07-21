

require('./bootstrap');

window.Vue = require('vue');



Vue.component('friend-status', require('./components/FriendStatus.vue'));
Vue.component('test-m', require('./components/TestM.vue'));

const app = new Vue({
    el: '#app'
});
