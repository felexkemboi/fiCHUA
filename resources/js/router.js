
import { createRouter, createWebHistory } from 'vue-router'

import Home from './pages/Home.vue'
import ShareInfo from './pages/ShareInfo.vue'

const router = new createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Home
        },
        { path: '/share',
            component: ShareInfo
        }
    ]
})

export default router
