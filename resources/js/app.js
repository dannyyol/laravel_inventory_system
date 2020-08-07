require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from 'vue-router';
// import route
import { routes } from './routes';
Vue.use(VueRouter);

// Import User Class globally 
// global import are placed inside app.js
import User from './Helpers/User';
window.User = User

// import sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal;

window.Reload = new Vue();
// window.ReloadDeleteCart = new Vue();


// Import Notification Class
import Notification from './Helpers/Notification';
window.Notification = Notification

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.Toast = Toast;

const router = new VueRouter({
    routes,
    mode: 'history'
})




const app = new Vue({
    el: '#app',
    router
});