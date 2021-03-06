require('../bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import AdminRoutes from './admin-routes'

const router = new VueRouter({
    mode: 'history',
    dir: __dirname,
    routes: AdminRoutes,
    base: 'admin',
})

Vue.use(VueRouter)


import MainTemplate from './containers/MainTemplate.vue'

Vue.prototype.$http = axios

const admin = new Vue({
    router,
    components: {
        MainTemplate
    },
    data: function () {
        return {
            test: null
        }
    },
    methods: {
        goTo: function (name) {
            if (this.$route.name != name) {
                this.$router.push({
                    name: name
                })
            }
        },
        goToWithParams: function (name, params) {
            this.$router.push({
                name: name,
                params: params
            })
        },
    },
    mounted: function () {},
    render: h => h(MainTemplate)
}).$mount('#admin')
