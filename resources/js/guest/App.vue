<template>
    <div>
        <Header/>
         <Hero/>
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

export default {
	name: 'App',
	components: {
        Header,
        Hero,
        Footer
	}	    
}
</script>

<style lang="scss">

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Work Sans', sans-serif;
}

a {
    text-decoration: none;
}

</style>