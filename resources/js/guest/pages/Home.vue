<template>
  <section id="home">
    <section class="section_cuisines">
      <h2>Le nostre cucine</h2>
      <div class="grid_cuisines">
        <Cuisine
          @cuisine_id="getCuisine"
          v-for="cuisine in 7"
          :key="cuisine.id"
          :cuisine="cuisine"
        />
      </div>
    </section>

    <section class="section_restaurants">
      <h2>55 ristoranti aperti ora!</h2>
      <div>
        <Restaurants :cuisine="cuisine" :cuisineList="cuisines" />
      </div>
    </section>
  </section>
</template>

<script>
import Restaurants from "../components/Restaurants.vue";
import Cuisine from "../components/Cuisine.vue";
export default {
  name: "Home",
  components: {
    Restaurants,
    Cuisine
  },
  data() {
    return {
      searchRestaurant: "",
      cuisine: "all",
      cuisines: [],
    };
  },
  props: ["isModalVisible"],
  methods: {        
    closeModal() {
        this.isModalVisible = false;
    },
    clearCart() {
        this.$emit("clearCart");
        this.closeModal();
    },
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
      this.cuisine = e;
    },
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

<style scoped lang="scss">
@import "../../../sass/guest/front.scss";

section#home {
  //Cuisines
  .section_cuisines {
    padding-top: 110px;
    width: 100%;
    background-color: $secondColor;
    color: white;
    font-family: "PolySans Neutra";
    h2 {
      padding: $gt;
      font-size: $txt_md;
    }
  }
  .section_restaurants {
    width: 100%;
    h2 {
      margin-top:$gt;
      padding: $gt;
      font-size: $txt_lg;
    }
  }
}

//Cuisine GRID
.grid_cuisines {
  grid-template-columns: repeat(7, 1fr);
  display: grid;
  column-gap: 5px;
  padding: $gt_sm;
}

//Mediaquery
@media screen and (max-width: 850px) {
  .grid_cuisines {
    grid-template-columns: repeat(4, 1fr);
  }
}

@media screen and (max-width: 768px) {
  .grid_cuisines {
    grid-template-columns: repeat(2, 1fr);
  }
}
</style>
