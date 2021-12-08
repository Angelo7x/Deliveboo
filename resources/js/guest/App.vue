<template>
    <div>
        <Header/>
        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import Header from './components/Header.vue';

export default {
	name: 'App',
	components: {
        Header,
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