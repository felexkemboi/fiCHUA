
import {createRouter, createWebHashHistory } from 'vue-router'

import Home from '../pages/Home.vue'
import ShareInfo from '../pages/ShareInfo.vue'
import Admin from '../pages/Admin.vue'
import CrimeDetails from '../pages/CrimeDetails.vue'


const router = new createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/share',
            name: 'share',
            component: ShareInfo
        },
        {
            path: '/admin',
            name: 'admin',
            component: Admin
        },
        {
            path: '/crime/:id',
            name: 'crime-details',
            component: CrimeDetails
        }
    ]
})

export default router
