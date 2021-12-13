<template>
  <div>
    <form action="">
        <div v-for="food in cart" :key="food.food.id">
            <input type="text">
            <button>+</button> 
        </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "Checkout",
  props: ['cart']
};
</script>

<style>

</style>