import './bootstrap'

import { createApp } from 'vue'
import App from './components/App.vue'
import router from './router';
import {key, store} from "@/store";

const app = createApp(App);

app.use(router)
    .use(store, key)

app.mount('#app')
