<template>
  <div>
    <Hero />
    <Slider :cuisines="cuisines"
    />
    <AppDeliveboo/>
    <!-- <ul>
        <li v-for="cuisin in cuisines" :key="cuisin.id">
            <h3> {{cuisin.name}}</h3>
        </li>
    </ul> -->
  </div>
</template>

<script>
import Hero from "../components/Hero.vue";
import Slider from "../components/Slider.vue";
import AppDeliveboo from "../components/AppDeliveboo.vue";

export default {
  name: "Home",
  components: {
    Hero,
    AppDeliveboo,
    Slider,
  },
  data(){
      return{
          cuisines:[],
      }
  },
  mounted() {
    // Make a request for a user with a given ID
    axios
      .get("/api/cuisines")
      .then((response) =>{
        this.cuisines = response.data.data
        console.log(response);
      })
      .catch((error) =>{
        // handle error
        console.log(error);
      })
      
  },
};
</script>

<style>
</style>