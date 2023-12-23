// import { createApp } from 'vue'
// // import './style.css'
// import App from './App.vue'


// createApp(App).mount('#app')

import { createApp } from 'vue';
import App from './App.vue';
import router from './router/router.js';  // Sesuaikan path dengan struktur direktori Anda

createApp(App).use(router).mount('#app');

