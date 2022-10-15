import './bootstrap';

import {createApp} from 'vue';
import ApiService from './services/api.service';
import router from "./router";
import App from "./App.vue";

ApiService.init();
const app = createApp(App);
app.use(router);
app.mount('#app');

