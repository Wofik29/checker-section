require('./bootstrap');

import Vue from 'vue';
import vuetify from './plugins/vuetify'
import 'vuetify/dist/vuetify.min.css';
import AppMain from './components/AppMain.vue';
import 'vue-material-design-icons/styles.css';

const app = new Vue({
    vuetify,
    el: '#app',
    components: { AppMain },
}).$mount('#app');
