<template>
  <section>
    <!-- <input type="text" v-model="searchRestaurant" @keyup="sortByName()"> -->
    <div class="restaurants">
      <CardRestaurant
        v-for="restaurant in restaurants"
        :key="restaurant.id"
        :data="restaurant"
        :cuisineList="cuisineList"
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
  props: ["cuisine", "cuisineList"],
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
        .get(`/api/filter-by/${this.cuisine}`)
        .then((response) => {
          this.restaurants = response.data.data;
<<<<<<< HEAD
          alert("ciao");
=======
          console.log(this.response.data)
>>>>>>> origin/main
        })
        .catch((error) => {
          console.log(error);
        });
      }
  },
  watch: {
    cuisine: function() {
      if(this.cuisine == 'all') {
        this.getAll()
      } else {
        this.getFiltered()
        }
    }
  },
  created() {
    this.getAll()
  }
}
</script>

<style>
</style>
