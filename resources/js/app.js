/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import MainTemplate from './containers/MainTemplate.vue'

import VueRouter from 'vue-router'
import routes from './router'
import axios from 'axios'

Vue.use(VueRouter)
const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: routes
})

Vue.prototype.$http = axios

const app = new Vue({
    router,
    components: {
        MainTemplate,
    },
    data: function () {
        return {
            window: {
                h: 0,
                w: 0
            },
            containerHeight: 0,
            professionals: [],
            news: [],
        }
    },
    methods: {
        getWindowSize: function () {
            this.window = {
                h: window.innerHeight,
                w: window.innerWidth
            }
            this.containerHeight = this.window.h - this.$refs.MainTemplate.getItemsHeight()
        },
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
        }
    },
    mounted: function () {
        this.getWindowSize()
        // this.footerPosition = 'fixed'

        window.addEventListener('resize', () => {
            this.getWindowSize()
        })
    }
}).$mount('#app')
