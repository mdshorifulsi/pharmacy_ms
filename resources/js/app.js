
import Vue from 'vue'

require('./bootstrap');

import VueRouter from 'vue-router'
Vue.use(VueRouter)


//routes 
import {routes} from './routes'


//start notification


import Notification from './Helpers/Notification'
window.Notification=Notification;

//end notification



//sweetalert2 start

import Swal from 'sweetalert2'

window.Swal =Swal;


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
});

window.Toast =Toast;


window.Reload =new Vue();

//sweetalert2 end

const router=new VueRouter({

    routes,
    mode:'history'

})




const app = new Vue({
    el: '#app',
    router
});
