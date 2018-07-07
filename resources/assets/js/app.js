

require('./bootstrap');

window.Vue = require('vue');



Vue.component('friend-status', require('./components/FriendStatus.vue'));

const app = new Vue({
    el: '#app'
});
