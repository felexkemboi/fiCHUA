import { createApp } from 'vue'

import router from './router'

import App from './App.vue'

import { createPinia } from "pinia";

const piniaInstance = createPinia()

const app = createApp(App)

app.use(router)

app.use(piniaInstance);

app.mount('#app')
