<template>
  <section>
    <!-- cover -->
    <div class="cover-restaurant">
      <!-- <img
        :src="menu.business__cover"
        :alt="`${menu.business_name}_cover`"
        v-if="menu.business__cover != null"
      /> -->
      <img src="../../../images/hero_bg.jpg" alt="">
    </div>
    <!-- /cover -->
    <!-- restaurant -->
    <div class="restaurant">
      <!-- logo -->
      <div class="restaurant-logo">
        <img src="../../../images/bg_footer.jpg" alt="">
        <!-- <img
          :src="menu.business__logo"
          :alt="`${menu.business_name}_logo`"
          v-if="menu.business__logo != null"
        /> -->
      </div>
      <!-- /logo -->
      <!-- menu -->
      <div class="restaurant-menu">
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
      <div class="cart">
        <h3>Carrello</h3>
        <Cart :cart="cart" />
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
    };
  },
  methods: {
    closeModal() {
      this.isModalVisible = false;
    },
    clearCart() {
      this.$emit("clearCart");
      this.closeModal();
    },
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
    img {
      width: 130px;
      height: 130px;
      border-radius: $br;
      object-fit: cover;
      border: 2px solid $mainColor;
      margin-right: $gt;
      transform: translateY(-38%);
    }
  }
  &-menu {
    width: 750px;
    h2 {
      font-size: $txt_xl;
      margin: $gt_md 0 $gt_md;
    }
  }
}
</style>