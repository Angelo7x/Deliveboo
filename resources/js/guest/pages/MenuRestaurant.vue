<template>
  <section>
      <div class="restaurant">
          <h2>Nome ristorante: {{menu.business_name}}</h2>
          <ul class="restaurant__info">
              <li>Indirizzo: {{menu.business_address}}</li>
              <li>Partita Iva: {{menu.vat_numb}}</li>
          </ul>
        <img :src="menu.businesss__cover" :alt="`${menu.business_name}_cover`" v-if="menu.businesss__cover != null">
        <img :src="menu.businesss__cover" :alt="`${menu.business_name}_cover`" v-if="menu.businesss__cover != null">
      </div>
      <div>
        <Food v-for="food in menu.foods" :key="food.id" :food="food"/>
      </div>
      <div>
          <h3>Carrello</h3>
        <Cart :cart="cart"/>
        <button @click="cart = []"> clear cart</button>
      </div>

  </section>
</template>

<script>
import Food from '../components/Food.vue'
import Cart from '../components/Cart.vue'

export default {
    name: 'MenuRestaurant',
    components: {
        Food,
        Cart
    },
    props: ['cart'],
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
            } else {
                // redirect 404
                this.$router.push({name: 'not-fount'});
            }
        })
        .catch( (error) => {
            // handle error
            console.log(error.response.data);
        })
    }
}

</script>

<style>
section {
    display: flex;
    justify-content: space-around;
}
</style>