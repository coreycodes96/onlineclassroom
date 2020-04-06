require('./bootstrap');

window.Vue = require('vue');

//Register
Vue.component('register', require('./components/Account/RegisterComponent.vue').default);

//Login
Vue.component('login', require('./components/Account/LoginComponent.vue').default);

//Loggedin Header
Vue.component('loggedin-header', require('./components/Loggedin/Header/LoggedinHeaderComponent.vue').default);

//Admin
Vue.component('admin', require('./components/Loggedin/Admin/AdminViewComponent.vue').default);

//Profile
Vue.component('profile', require('./components/Loggedin/Profile/ProfileViewComponent.vue').default);

//Classes
Vue.component('classes', require('./components/Loggedin/Classes/ClassesViewComponent.vue').default);

//import vuex
import store from './store/index';
const app = new Vue({
	store,
    el: '#app',
});
