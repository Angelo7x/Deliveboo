window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import App from './App';
import router from './router';
import braintree from './braintree';
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    braintree
    
});

