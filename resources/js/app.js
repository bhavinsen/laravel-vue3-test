require('./bootstrap');

import { createApp } from 'vue'
import App from './components/App'
import router from './Router/router'
import store from './store/store'
// import '../css/app.css'

const app = createApp({})

app.component('hello-world', App).use(router).use(store).mount('#app')

