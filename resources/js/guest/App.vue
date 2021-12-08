<template>
    <div>
        <Header/>
         <Hero/>
        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import Header from './components/Header.vue';
import Hero  from './components/Hero.vue';

export default {
	name: 'App',
	components: {
        Header,
        Hero
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

@font-face {
  font-family: 'Bogam Regular';
  src: local("Bogam Regular"), url('../../fonts/Bogam.ttf');
}

</style>