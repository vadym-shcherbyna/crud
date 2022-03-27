//
import { createApp } from 'vue'
const Vue = createApp({});

//
import Items from './components/Items.vue';
Vue.component('items', Items);

//
Vue.mount('#app');
