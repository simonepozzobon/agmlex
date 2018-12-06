
const routes = [
    {
        path: '/',
        name: 'home',
        component: require('./views/Home.vue')
    },
    {
        path: '/professionisti',
        name: 'professionisti',
        component: require('./views/Professionisti.vue')
    },
    {
        path: '/competenze',
        name: 'competenze',
        component: require('./views/Competenze.vue')
    },

]

export default routes
