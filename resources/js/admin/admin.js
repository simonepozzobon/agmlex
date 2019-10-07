import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import AdminRoutes from './admin-routes'

Vue.use(VueRouter)
const router = new VueRouter({
    mode: 'history',
    base: 'admin',
    routes: routes
})

const admin = new Vue({
    router,
    data: function () {
        return {
            test: null
        }
    },
}).$mount('#admin')
