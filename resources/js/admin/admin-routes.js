import Home from './views/Home.vue'
import Professionisti from './views/Professionisti.vue'

const AdminRoutes = [{
    name: 'home',
    path: '/',
    component: Home
}, {
    name: 'professionisti',
    path: '/professionisti',
    component: Professionisti,
}]

export default AdminRoutes
