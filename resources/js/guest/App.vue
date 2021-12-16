<template>
  <div>
    <Header />
    <main>
      <router-view
        :cart="cart"
        @food="getFood"
        :isModalVisible="isModalVisible"
        @clearCart="clearCart"
      ></router-view>
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
        id: null,
        items: [],
      },
      food: null,
      cartAction: 0,
      foodlist: [],
      action: null,
      lastId: null,
      isModalVisible: null
    };
  },
  methods: {
    addToCart(e) {
      this.cart.items.push({
        food: e,
        quantity: 1,
      });
    },
    clearCart() {
      localStorage.clear();
      this.cart.items = [];
      this.cart.id = null;
      this.cartAction++;
    },
    getFood(e) {
      this.food = e.item;
      this.action = e.action;
      // condizione cambio ristorante
      if (this.cart.id !== null && this.cart.id !== e.item.user_id) {
        this.isModalVisible = true;
      } else {
        this.cart.id = e.item.user_id;
      }
      this.cartAction++;
    },
  },
  mounted() {
    if (localStorage.getItem("cart")) {
      this.cart = JSON.parse(localStorage.getItem("cart"));
      // localStorage.clear();
    }
  },
  watch: {
    cartAction: function () {
      let inCart = false;
      let cartItems = this.cart["items"];
      let newFood = this.food;
      //aggiunta
      if (this.action == "add") {
        if (cartItems.length <= 0) {
          this.addToCart(newFood);
        } else {
          cartItems.forEach((e, index) => {
            if (newFood.id == e.food.id) {
              e.quantity++;
              inCart = true;
            }
          });
          if (!inCart) {
            this.addToCart(newFood);
          }
          inCart = false;
        }
        //rimozione
      } else {
        if (cartItems.length == 1 && cartItems[0].quantity == 1) {
          this.cart["items"] = [];
        } else {
          cartItems.forEach((e, index) => {
            if (newFood.id == e.food.id) {
              if (e.quantity > 1) {
                e.quantity--;
              } else {
                cartItems.splice(index, 1);
              }
            }
          });
        }
      }
      // salvataggio carrello
      localStorage.setItem("cart", JSON.stringify(this.cart));
    },
  },
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