import Home from './views/Home.vue'
import Professionisti from './views/Professionisti.vue'
import News from './views/News.vue'
import NewsCreate from './views/NewsCreate.vue'
import NewsEdit from './views/NewsEdit.vue'

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
}, {
    name: 'news-modifica',
    path: '/news/modifica/:id',
    component: NewsEdit
}]

export default AdminRoutes
