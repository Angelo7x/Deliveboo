<template>
    <div>
        <Header/>
        <main>
            <router-view></router-view>
        </main>
          <Footer/>
    </div>
</template>

<script>
import Header from './components/Header.vue';
import Footer  from './components/Footer.vue';

export default {
	name: 'App',
    	components: {
        Header,
        Footer,
	},
    data(){
        return{
            restaurants:[],
        }
    },
    mounted(){
         axios
      .get("/api/restaurants")
      .then((response) =>{
        this.restaurants = response.data.data
        console.log(response);
      })
      .catch((error) =>{
        // handle error
        console.log(error);
      })
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