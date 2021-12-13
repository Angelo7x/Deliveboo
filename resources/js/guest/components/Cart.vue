<template>
  <div>
    <CartFood v-for="item in cart.items" :key="item.food.id" :item="item"/>
    <a href="/checkout">Vai alla cassa</a>
  </div>
</template>

<script>
import CartFood from './CartFood.vue'

export default {
  name: 'Cart',
  components: {
    CartFood
  },
  props: ['cart'],
  data() {
    return {
      cartQuantity: [],
    }
  }
}
</script>

<style>

</style>