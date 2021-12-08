<template>
    <div>
        <Header/>
         <Hero/>
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

export default {
	name: 'App',
	components: {
        Header,
        Hero,
        Footer,
        AppDeliveboo,
	}	    
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