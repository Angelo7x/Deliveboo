<template>
  <section>
    <!-- cover -->
    <div class="cover-restaurant">
      <img :src="`/storage/${munu.business_cover}`" 
        :alt="`${menu.business_name} cover`" 
        v-if="menu.business_cover"
        :class="{ 'hide-element': displayElement }">
      <img src="../../../images/hero_bg.jpg" alt="" 
      v-else>
    </div>
    <!-- /cover -->
    <!-- restaurant -->
    <div class="restaurant">
      <!-- logo -->
      <div class="restaurant-logo">
        <img :src="`/storage/${munu.business_logo}`" 
        :alt="`${menu.business_name} logo`" 
        v-if="menu.business_logo"
        :class="{ 'hide-element': displayElement }">
        <img src="../../../images/bg_footer.jpg" alt="" 
        v-else
        :class="{ 'hide-element': displayElement }">
        <button type="button" class="btn-checkout btn-show-cart"
        @click="showCart()">
          {{displayElement ? '&#8592; Torna indietro' : 'Mostra il carrello' }}
        </button>
      </div>
      <!-- /logo -->
      <!-- menu -->
      <div class="restaurant-menu" :class="{ 'hide-element': displayElement }">
        <h2>{{ menu.business_name }}</h2>
        <!-- <ul class="restaurant__info">
          <li>Indirizzo: {{ menu.business_address }}</li>
          <li>Partita Iva: {{ menu.vat_numb }}</li>
        </ul> -->
        <div class="restaurants-menu-foods">
          <Food v-for="food in menu.foods" :key="food.id" :food="food" />
        </div>
      </div>
      <!-- /menu -->
      <!-- cart -->
      <div id="cart" class="cart" :class="{ 'show-element': displayElement }">
        <Cart :cart="cart"/>
      </div>
      <!-- /cart -->
    </div>
    <!-- /restaurant -->

    <ModalChangeCart
      v-show="isModalVisible"
      @close="closeModal"
      @clearCart="clearCart"
    />
  </section>
</template>

<script>
import Food from "../components/Food.vue";
import Cart from "../components/Cart.vue";
import ModalChangeCart from "../components/ModalChangeCart.vue";
export default {
  name: "MenuRestaurant",
  components: {
    Food,
    Cart,
    ModalChangeCart,
  },
  props: ["cart", "isModalVisible"],
  data() {
    return {
      menu: null,
      displayElement: false
    };
  },
  methods: {
    showCart() {
      this.displayElement = !this.displayElement;
    },
    closeModal() {
      this.isModalVisible = false;
    },
    clearCart() {
      this.$emit("clearCart");
      this.closeModal();
    }
  },
  mounted() {
    axios
      .get(`/api/restaurants/${this.$route.params.slug}`)
      .then((response) => {
        if (response.data.success) {
          this.menu = response.data.data;
        } else {
          this.$router.push({ name: "not-fount" });
        }
      })
      .catch((error) => {
        console.log(error.response.data);
      });
  },
};
</script>

<style lang="scss" scoped>

@import '../../../sass/guest/front.scss';

section {
  padding-top: 100px;
}
.cover-restaurant {
  height: 350px;
  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
}
.restaurant {
  display: flex;
  &-logo {
    width: 200px;
    text-align: right;
    .btn-checkout {
      color: #000;
      background-color: $mainColor;
      text-align: center;
      padding: $gt;
      font-size: $txt;
      border-radius: $br;
      margin-top: $gt_sm;
    }
    img {
      width: 150px;
      height: 150px;
      border-radius: $br;
      object-fit: cover;
      border: 2px solid $mainColor;
      margin-right: $gt;
      transform: translateY(-42%);
    }
  }
  &-menu {
    width: 750px;
    h2 {
      font-size: $txt_xxl;
      margin: $gt 0 $gt_md;
    }
  }
  .cart {
    flex-grow: 1;
    margin-top: $gt;
    width: 450px;
  }
}


// responsive
@media screen and (max-width: 850px) {
  .restaurant {
    flex-direction: column;
    &-logo {
      width: 100%;
      text-align: initial;
      display: flex;
      justify-content: space-between;
      .btn-show-cart {
        display: inline-block;
        height: fit-content;
        transform: translateY(-70%);
      }
    }
    &-menu {
      margin: -72px 20px 0;
    }
  }
  .cart {
    display: none;
  }
  .show-element {
    display: block;
  }
  .hide-element {
    display: none;
  }
}

@media screen and (max-width: 768px) {
  
}
</style>