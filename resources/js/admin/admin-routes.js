import Home from './views/Home.vue'
import Professionisti from './views/Professionisti.vue'
import News from './views/News.vue'
import NewsCreate from './views/NewsCreate.vue'

const AdminRoutes = [{
    name: 'home',
    path: '/',
    component: Home
}, {
    name: 'professionisti',
    path: '/professionisti',
    component: Professionisti,
}, {
    name: 'news',
    path: '/news',
    component: News,
}, {
    name: 'news-nuova',
    path: '/news/nuova',
    component: NewsCreate
}]

export default AdminRoutes
