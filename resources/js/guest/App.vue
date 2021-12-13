<template>
  <div>
    <Header />
    <main>
      <router-view @food="getFood" :cart="cart"></router-view>
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
      cartAction: 0,
      foodlist: []
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
      this.cartAction++;
    },
  },
  mounted() {
       if(localStorage.getItem('cart')) {
      try {
        this.cart = JSON.parse(localStorage.getItem('cart'));
        // console.log(this.cart);
      } catch(e) {
        localStorage.removeItem('cart');
      }
    }
  },
  watch: {
    cartAction: function () {
      let inCart = false;
      this.cart.forEach((e) => {
        if (e.food.id == this.food.id) {
          e.quantity++;
          inCart = true;
        }
      });
      if (this.cart.length == 0 || inCart == false) {
        this.cart.push({
          food: this.food,
          quantity: 1,
        });
      }
      inCart = false;
    },
    cart: function () {
            localStorage.setItem('cart', JSON.stringify(this.cart));
            // console.log(localStorage.getItem('cart'))
        },
        
  }
};
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