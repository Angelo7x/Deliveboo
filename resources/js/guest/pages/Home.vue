<template>
  <div>
    <Hero />
    <Slider />
    <AppDeliveboo />
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
  mounted() {
    // Make a request for a user with a given ID
    axios
      .get("/api/cuisines ")
      .then(function (response) {
        // handle success
        console.log(response);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      })
     
  },
};
</script>

<style>
</style>