<template>
  <div class="restaurant">
      <h2>{{data.business_name}}</h2>
      <ul class="cuisines">
          <li v-for="(cuisine, i) in data.cuisines" :key="`cuisine_${i}`" >{{cuisine.name}}</li>
      </ul>
      <router-link :to="{ name: 'menu-restaurant', params: { slug: data.slug }}">menu</router-link>
      <!-- @click="$parent.$emit('user_id', data.id)" -->
  </div>
</template>

<script>

export default {
    name: 'CardRestaurant',
    props: {
        data: Object,
        cuisineList: Array,

    },
    mouted() {
        console.log(data.slug)
    }
}
</script>

<style>

</style>