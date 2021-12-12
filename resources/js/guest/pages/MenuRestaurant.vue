<template>
  <section>
        <Food v-for="food in menu.foods" :key="food.id" v-on:add-to-cart="addToCart(food)" :food="food"/>
  </section>
</template>

<script>
import Food from '../components/Food.vue'

export default {
    name: 'MenuRestaurant',
    components: {
        Food
    },
    data() {
        return {
            menu: null
        }
    },
    mounted() {
        axios.get(`/api/restaurants/${this.$route.params.slug}`)
        .then((response) => {
            // handle success
            if( response.data.success ) {
                this.menu = response.data.data;
                console.log(this.menu);
            } else {
                // redirect 404
                this.$router.push({name: 'not-fount'});
            }
        })
        .catch( (error) => {
            // handle error
            console.log(error);
        })
    }
}

</script>

<style>

</style>