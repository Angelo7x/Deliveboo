<template>
  <div>
      <h3>{{food.name}}</h3>
      <button type="button" 
      @click="$emit('add-to-cart',food)">
        Aggiungi
      </button>
  </div>
</template>

<script>
export default {
    name: 'Food',
    props: ['food']
}
</script>

<style>

</style>