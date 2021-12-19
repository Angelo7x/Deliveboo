<template>

    <!-- <input type="text" v-model="searchRestaurant" @keyup="sortByName()"> -->
    <transition name="slide-fade" mode="out-in">
    <div class="grid_restaurants" :key="restaurants.length">
      <CardRestaurant
        v-for="restaurant in restaurants"
        :key="restaurant.id"
        :data="restaurant"
        :cuisineList="cuisineList"
      />
    </div>
    </transition>

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
      count: 0
    };
  },
  methods: {
    getAll() {
          axios
      .get(`/api/restaurants`)
      .then((response) => {
        this.restaurants = response.data.data;
        this.count = this.restaurants.length;
        this.$emit('countRestaurant', this.count)
        
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
        this.count = this.restaurants.length;
        this.$emit('countRestaurant', this.count);

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
        this.getFiltered();
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
  grid-template-columns: repeat(5, 1fr);
  display: grid;
  column-gap: 15px;
  row-gap: 15px;
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
