<template>
  <div>
    <Header />
    <main>
         <!-- @food="getFood" -->
      <router-view :cart="cart" @food="getFood" @user_id="getUserId"></router-view>
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
      cart: {
          'id': null, 
          'items': []
          },
      food: null,
      cartAction: 0,
      foodlist: [],
      action: null,
      id: null
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
      this.food = e.item;
      this.action = e.action;
      this.cartAction++;
    },
    getUserId(e) {
        this.id = e;
    }
  },
  mounted() {
       if(localStorage.getItem('cart')) {
        this.cart.items = JSON.parse(localStorage.getItem('cart'));
        this.cart.id = this.id;
    }
  },
  watch: {
    cartAction: function () {
      let inCart = false;
      let cartItems = this.cart['items'];
      cartItems.forEach((e, index) => {
        if (e.food.id == this.food.id) {
            if ( this.action == 'add' ) {
                e.quantity++;
                inCart = true;
            } else if ( this.action == 'remove' ) {
                e.quantity >= 1 ? e.quantity-- : cartItems.splice(index, 1);
            }
        }
      });
      if (cartItems.length == 0 || inCart == false && this.action == 'add') {
        cartItems.push({
          food: this.food,
          quantity: 1,
        });
      } else if ( cartItems.length == 0 && this.action == 'remove' ) {
          alert('Niente da rimuovere.');
      }
      inCart = false;
      localStorage.setItem('cart', JSON.stringify(cartItems));
    }
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