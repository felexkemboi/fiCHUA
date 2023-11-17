
import { createRouter, createWebHistory } from 'vue-router'

import Home from '../pages/Home.vue'
import ShareInfo from '../pages/ShareInfo.vue'
import Admin from '../pages/Admin.vue'


const router = new createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Home
        },
        { path: '/share',
            component: ShareInfo
        },
        { path: '/admin',
            component: Admin
        }
    ]
})

export default router
