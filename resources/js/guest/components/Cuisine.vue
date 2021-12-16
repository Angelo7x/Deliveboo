<template>
  <div>
    <button @click="$emit('cuisine_id', cuisine.id)">
        {{cuisine.name}}
    </button>
  </div>
</template>

<script>
export default {
  name: "Cuisine",
  props: ['cuisine']

};
</script>

<style>
</style>