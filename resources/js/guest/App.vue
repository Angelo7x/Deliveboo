<template>
  <div>
    <Header />
    <main>
      <router-view @food="getFood"></router-view>
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

export default {
  name: "App",
  components: {
    Header,
    Footer,
  },
  data() {
    return {
      restaurants: [],
      cart: [],
      food: null,
      cartAction: 0
    };
  },
  methods: {
    addToCart(food) {
      this.cart.forEach((e) => {
        if (e.id == food.id && this.cart.length > 0) {
          e.quantity++;
        } else {
          this.cart.push({
            food: food,
            quantity: 1,
          });
        }
      });
    },
    getFood(e) {
      this.food = e;
      this.cartAction++
    },
  },
  watch: {
    cartAction: function () {
    //   if (this.e != null) {
        
    //   }
        for (let i = 1; i <= this.cart.length; i++) {
          if (this.cart[i].id == this.food.id) {
            this.cart[i].quantity++;
          } else {
            this.cart.push({
              'food': this.food,
              'quantity': 1,
            });
          }
        }
        if (this.cart.length == 0) {
            this.cart.push({
              'food': this.food,
              'quantity': 1,
            });
        }
        
    //   this.food = null;
     },
  },
}
</script>

<style lang="scss">
// reset
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
// typo
body {
  font-family: "Work Sans", sans-serif;
  width: 100%;
  overflow-x: hidden;
}
// links style
a {
  text-decoration: none;
}
</style>