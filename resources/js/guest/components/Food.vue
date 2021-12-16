<template>
  <div>
      <h3>{{food.name}}</h3>
      <button type="button" @click="modifyCart(food, 'add')">+</button> 
      <button type="button" @click="modifyCart(food, 'remove')">-</button> 
  </div>
</template>

<script>
export default {
    name: 'Food',
    props: ['food'],
    methods: {
        modifyCart(food, action) {
            this.$parent.$emit('food', {item: food, action: action});
        },
    }
}
</script>

<style>

</style>