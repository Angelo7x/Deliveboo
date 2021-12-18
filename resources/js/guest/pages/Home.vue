<template>
  <section>
    <Cuisine @cuisine_id="getCuisine" v-for="cuisine in cuisines" :key="cuisine.id" :cuisine="cuisine"/>
    <Restaurants :cuisine="cuisine" :cuisineList="cuisines"/>
  </section>
</template>

<script>
import Restaurants from "../components/Restaurants.vue";
import Cuisine from "../components/Cuisine.vue";

export default {
  name: "Home",
  components: {
    Restaurants,
    Cuisine,
  },
  data() {
    return {
      searchRestaurant: "",
      cuisine: 'all',
      cuisines: [],
    };
  },
  methods: {
    sortByName() {
      this.contacts.forEach((element) => {
        if (element.name.toLowerCase().includes(this.search.toLowerCase())) {
          element.visible = true;
        } else {
          element.visible = false;
        }
      });
    },
    getCuisine(e) {
      this.cuisine = e
    }
  },
    mounted() {
    // Make a request for a user with a given ID
    axios
      .get("/api/cuisines")
      .then((response) => {
        this.cuisines = response.data.data;
        console.log(response);
      })
      .catch((error) => {
        // handle error
        console.log(error);
      });
  },
};
</script>

<style lang="scss" scoped>
section {
  padding-top: 100px;
}
</style>
