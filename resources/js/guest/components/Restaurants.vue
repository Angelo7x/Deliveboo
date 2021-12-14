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
  methods: {
    getAll() {
          axios
      .get(`/api/restaurants`)
      .then((response) => {
        this.restaurants = response.data.data;
      })
      .catch((error) => {
        console.log(error);
      });
    },
    getFiltered() {
      axios
        .get(`/api/restaurants/${this.cuisine}`)
        .then((response) => {
          this.restaurants = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
      }
  },
  watch: {
    cuisine: function() {
      if(this.cuisine == null) {
        this.getAll()
        
      } else {
        this.getFiltered();
      }
    }
  },
  mounted() {
    this.getAll()
  }
}
</script>

<style>
</style>
