<template>
  <section>
    <Restaurants/>
  </section>
</template>

<script>
import Restaurants from '../components/Restaurants.vue'

export default {
  name: "Home",
  components: {
    Restaurants
    
  },
  data(){
        return{
            restaurants:[],
            searchRestaurant: ''
        }
    },
    methods: {
        sortByName(){
                this.contacts.forEach(element => {
                    if(element.name.toLowerCase().includes(this.search.toLowerCase())){
                        element.visible = true
                    }else{
                        element.visible = false
                    }
                });
            }
    }
};
</script>

<style>
section {
  padding-top: 120px;
}
</style>