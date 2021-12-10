<template>
    <div>
        <Header/>
        <Hero/>
        <FloatingSlogan/>
        <AppDeliveboo/>
        <main>
            <router-view></router-view>
        </main>
          <Footer/>
    </div>
</template>

<script>
import Header from './components/Header.vue';
import Hero  from './components/Hero.vue';
import Footer  from './components/Footer.vue';
import AppDeliveboo  from './components/AppDeliveboo.vue';
import FloatingSlogan from './components/FloatingSlogan.vue';
import VueHorizontal from 'vue-horizontal';
export default {
	name: 'App',
    	components: {
        Header,
        Hero,
        FloatingSlogan,
        Footer,
        AppDeliveboo,
        VueHorizontal,
<<<<<<< HEAD
=======
        CarouselCuisines
>>>>>>> fd37fc9ac73bf2d10f13232e5e1e19d8ff6e8013
	},
}
</script>

<style lang="scss">
// reset
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
// typo
body {
    font-family: 'Work Sans', sans-serif;
    width: 100%;
    overflow-x: hidden;
}
// links style
a {
    text-decoration: none;
}

</style>