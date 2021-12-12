import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import Home from './pages/Home';
import Restaurants from './pages/Restaurants.vue'
import NotFound from './pages/NotFound';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/restaurants',
            name: 'restaurants',
            component: Restaurants
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        }
    ],
});

export default router;