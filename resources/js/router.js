
import { createRouter, createWebHistory } from 'vue-router'

import Home from './pages/Home.vue'
import Ingine from './pages/Ingine.vue'

const router = new createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Home
        },
        { path: '/ingine',
            component: Ingine
        }
        // { path: '/contact', component: Contact }
    ]
})

export default router
