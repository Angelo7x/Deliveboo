<template>
  <div>
    <ul>
      <li v-for="restaurant in restaurants" :key="restaurant.id">
        {{restaurant.business_name}}
      </li>
    </ul>
  </div>
</template>

<script>


export default {
  name: "Home",
  components: {
    
  },
  data(){
        return{
            restaurants:[],
        }
    },
    mounted(){
         axios
      .get("/api/restaurants")
      .then((response) =>{
        this.restaurants = response.data.data
        console.log(response);
      })
      .catch((error) =>{
        // handle error
        console.log(error);
      })
    },
};
</script>

<style>
</style>