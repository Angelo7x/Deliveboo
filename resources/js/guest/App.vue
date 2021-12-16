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
    addToCart(e) {
      this.cart.items.push({
        food: e,
        quantity: 1,
      })
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
        // this.cart.id = this.id;
        localStorage.clear();
    }
  },
watch: {
    cartAction: function () {
      let inCart = false;
      let cartItems = this.cart['items'];
      let newFood = this.food;
      //aggiunta
      if (this.action == 'add') {
        if(cartItems.length <= 0) {
          this.addToCart(newFood)
        } else {
          cartItems.forEach((e,index) => {
            if(newFood.id == e.food.id) {
              e.quantity++;
              inCart = true;
            }
          });
          if(!inCart) {
            this.addToCart(newFood);
          }
          inCart = false;
        }
        //rimozione
      } else {
        if (cartItems.length == 1 && cartItems[0].quantity == 1) {
          this.cart['items'] = []
        } else {
          cartItems.forEach((e,index) => {
            if(newFood.id == e.food.id) {
              if (e.quantity > 1) {
                e.quantity--;
              } else {
                cartItems.splice(index, 1);
              }
            }
          })
        }
      }
      localStorage.setItem('cart', JSON.stringify(this.cart.items));
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