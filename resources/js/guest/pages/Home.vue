<template>
  <section>
    <Cuisines @cuisine_id="getCuisine" />
    <Restaurants :cuisine="cuisine"/>
  </section>
</template>

<script>
import Restaurants from "../components/Restaurants.vue";
import Cuisines from "../components/Cuisines.vue";

export default {
  name: "Home",
  components: {
    Restaurants,
    Cuisines,
  },
  data() {
    return {
      searchRestaurant: "",
      cuisine: 'all'

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
};
</script>

<style>
section {
  padding-top: 120px;
}
</style>