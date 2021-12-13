<template>
  <div>
      <h3>{{food.name}}</h3>
      <button type="button" 
      @click="EmitFoodBy(food)">
        Aggiungi
      </button>
  </div>
</template>

<script>
export default {
    name: 'Food',
    props: ['food'],
    methods: {
        // addFood() {
        //     this.$emit('addToCart');
        // },
        EmitFoodBy(food) {
            this.$parent.$emit('food', food)
        }
    }
}
</script>

<style>

</style>