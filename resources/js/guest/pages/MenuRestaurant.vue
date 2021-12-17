<template>
  <section>
    <div class="restaurant">
      <h2>Nome ristorante: {{ menu.business_name }}</h2>
      <ul class="restaurant__info">
        <li>Indirizzo: {{ menu.business_address }}</li>
        <li>Partita Iva: {{ menu.vat_numb }}</li>
      </ul>
      <img
        :src="menu.businesss__cover"
        :alt="`${menu.business_name}_cover`"
        v-if="menu.businesss__cover != null"
      />
      <img
        :src="menu.businesss__cover"
        :alt="`${menu.business_name}_cover`"
        v-if="menu.businesss__cover != null"
      />
    </div>
    <div>
      <Food v-for="food in menu.foods" :key="food.id" :food="food" />
    </div>
    <div>
      <h3>Carrello</h3>
      <Cart :cart="cart" />
      <button @click="cart = []">clear cart</button>
    </div>
    <ModalChangeCart v-show="isModalVisible" @close="closeModal"  @clearCart="clearCart"/>
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
  props: ["cart","isModalVisible"],
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

<style >

</style>