<template>
  <section id="home">
    <section class="section_cuisines">
      <h2>Le nostre cucine</h2>
      <div class="grid_cuisines">
        <Cuisine
          @cuisine_id="getCuisine"
          v-for="cuisine in cuisines"
          :key="cuisine.id"
          :cuisine="cuisine"
          :isActive="isSelected(cuisine)"
        />
      </div>
    </section>

    <section class="section_restaurants container--1500">
      <h2 v-if="countRestaurant>1">{{countRestaurant}} ristoranti aperti ora!</h2>
      <h2 v-else-if="countRestaurant== null">I nostri ristoranti</h2>
      <h2 v-else-if="countRestaurant== 1">Un ristorante aperto ora</h2>
      <h2 v-else>Non ci sono ristoranti disponibili</h2>
      <div>
        <Restaurants :cuisine="cuisine" :cuisineList="cuisines" @countRestaurant="getcountRestaurant"/>
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
      cuisineActive: null,
      countRestaurant: null
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
      this.cuisineActive = e;
    },
    isSelected(e) {
      if(e.id == this.cuisineActive) {
        return true;
      } else  {
        return false;
      }
    },
    getcountRestaurant(e) {
      this.countRestaurant = e
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
  }
};
</script>

<style scoped lang="scss">
@import "../../../sass/guest/front.scss";

section#home {
  //Cuisines
  .section_cuisines {
    padding-top: 170px;
    width: 100%;
    background-color: $secondColor;
    color: white;
    font-family: 'PolySans Slim';

    h2 {
      padding: $gt;
      font-size: $txt_md;
    }
  }
  .section_restaurants {
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
  column-gap: $gt_sm;
  row-gap: $gt;
  padding-bottom:$gt_md;
}

//Mediaquery
@media screen and (max-width: 850px) {
section#home {

  .section_cuisines {
        padding-top: 251px;
  }
} 
  .grid_cuisines {
    grid-template-columns: repeat(4, 1fr);
  }
}

@media screen and (max-width: 768px) {
  .grid_cuisines {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media screen and (max-width: 425) {
  .grid_cuisines {
    grid-template-columns: repeat(2, 1fr);
  }
}
</style>
