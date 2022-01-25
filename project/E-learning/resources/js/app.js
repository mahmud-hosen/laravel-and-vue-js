
require('./bootstrap');
window.Vue = require('vue');

//Vue Router Support
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// router.js file import
import { routes } from './routes.js';
const router = new VueRouter({
    routes,    // short for `routes: routes`
    mode:'history'
})



// V form support
import Form from 'vform'
window.Form = Form;

// Vuex Support
import Vuex from 'vuex'
Vue.use(Vuex)

import storeInfo from './store/store.js';
const store = new Vuex.Store(
    storeInfo

)



// Sweet alert 2 support
import Swal from 'sweetalert2'
window.Swal = Swal; // It is use for globally 

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast; // It is use for globally 



// Vue Component Register Globally  .
//We can use component any position but must use into app div id. Like It use admin_header.Can't use app id in body tag .We can use into div id
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-master', require('./components/admin/adminmaster.vue').default);


const app = new Vue({
    el: '#app',
    // All const declare here 
    router,
    store
    
});
