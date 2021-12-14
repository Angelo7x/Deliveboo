<template>
  <div class="restaurant">
      <h2>{{data.business_name}}</h2>
      <router-link :to="{ name: 'menu-restaurant', params: { slug: data.slug } }" @click="$parent.$emit('user_id', data.id)">menu</router-link>
  </div>
</template>

<script>

export default {
    name: 'CardRestaurant',
    props: {
        data: Object
    },
}
</script>

<style>

</style>