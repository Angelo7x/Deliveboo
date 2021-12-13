<template>
  <div>
      <div v-for="item in cart" :key="item.id">
        {{item.name}}
      </div>
      <CartFood v-for="item in cart" :key="item.id" :quantity="quantity"/>
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