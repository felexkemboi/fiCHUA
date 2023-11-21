
import {createRouter, createWebHashHistory } from 'vue-router'

import Home from '../pages/Home.vue'
import ShareInfo from '../pages/ShareInfo.vue'
import Admin from '../pages/Admin.vue'


const router = new createRouter({
    history: createWebHashHistory(),
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
