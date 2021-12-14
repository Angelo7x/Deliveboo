<template>
  <section>
    <!-- <input type="text" v-model="searchRestaurant" @keyup="sortByName()"> -->
    <div class="restaurants">
      <CardRestaurant
        v-for="restaurant in restaurants"
        :key="restaurant.id"
        :data="restaurant"
      />
    </div>
  </section>
</template>

<script>
import CardRestaurant from "./CardRestaurant.vue";

export default {
  name: "Restaurants",
  components: {
    CardRestaurant,
  },
  props: ["cuisine"],
  data() {
    return {
      restaurants: [],
      searchRestaurant: "",
    };
  },
  mounted() {
    axios
      .get(`/api/restaurants/7`)
      .then((response) => {
        this.restaurants = response.data.data;
      })
      .catch((error) => {
        // handle error
        console.log(error);
      });
  },
};
</script>

<style>
</style>
