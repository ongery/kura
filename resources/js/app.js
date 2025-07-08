require('./bootstrap')

import VueProgressBar from 'vue-progressbar'
import router from '../js/router/router'
import { Form, HasError, AlertError } from 'vform'
import swal from 'sweetalert2'
import moment from 'moment'
window.Vue = require('vue').default
import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

Vue.component('v-select', vSelect)

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.filter('myDate', function(created) {
    return moment(created).format('MMM Do YYYY')
})

Vue.component('pagination', require('laravel-vue-pagination'))

Vue.filter('fullDate', function(created) {
    return moment(created).format('MMMM Do YYYY, h:mm:ss a')
})

window.swal = swal
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    background:'#f7a600',
})

Vue.use(Toast, {
    transition: 'Vue-Toastification__bounce',
    maxToasts: 20,
    newestOnTop: true,
})

window.Fire = new Vue()
window.toast = toast
window.Form = Form

const app = new Vue({
    el: '#app',
    router,
    data: {
        search: ''
    },
    methods: {
        searchit: _.debounce(() => {
            Fire.$emit('searching')
        }, 1000)
    }
})
