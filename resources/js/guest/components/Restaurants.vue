<template>

    <!-- <input type="text" v-model="searchRestaurant" @keyup="sortByName()"> -->
    <div class="grid_restaurants" >
      <CardRestaurant
        v-for="restaurant in restaurants"
        :key="restaurant.id"
        :data="restaurant"
        :cuisineList="cuisineList"
      />
    </div>

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
          console.log(this.response.data)
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

<style scoped lang="scss">
@import "../../../sass/guest/front.scss";

//Restaurant
.grid_restaurants{
  grid-template-columns: repeat(4, 1fr);
  display: grid;
  column-gap: 15px;
  padding: $gt_md;
}


//Mediaqueri
@media screen and (max-width: 850px) {
  .grid_restaurants {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media screen and (max-width: 768px) {
  .grid_restaurants {
    grid-template-columns: repeat(1, 1fr);
  }
}
</style>
