import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import Welcome from './pages/Welcome';
import Home from './pages/Home.vue'
import MenuRestaurant from './pages/MenuRestaurant.vue'
import NotFound from './pages/NotFound';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'welcome',
            component: Welcome
        },
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/restaurants/:slug',
            name: 'menu-restaurant',
            component: MenuRestaurant
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        }
    ],
});

export default router;