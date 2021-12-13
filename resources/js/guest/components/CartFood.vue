<template>
  <div>
    {{ item.food.name }}
    x {{ item.quantity }}
    
  </div>
</template>

<script>
export default {
    name: 'CartFood',
    props: ['item']
};
</script>

<style>
</style>