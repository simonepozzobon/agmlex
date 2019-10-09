import Home from './views/Home.vue'
import Professionisti from './views/Professionisti.vue'
import Competenze from './views/Competenze.vue'
import News from './views/News.vue'
import NewsSingle from './views/NewsSingle.vue'


const routes = [{
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/professionisti',
        name: 'professionisti',
        component: Professionisti,
    },
    {
        path: '/competenze',
        name: 'competenze',
        component: Competenze,
    },
    {
        path: '/news',
        name: 'news',
        component: News,
    },
    {
        path: '/news/:slug',
        name: 'news-single',
        component: NewsSingle,
    }
]

export default routes
