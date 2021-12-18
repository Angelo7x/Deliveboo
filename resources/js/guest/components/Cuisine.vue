<template>

    <div class="cuisine_card" @click="$emit('cuisine_id', cuisine.id)">
      <div class="yellow_box"></div>
        <h3>
          Cucina
           <!-- {{cuisine.name}} -->
        </h3>
  </div>

    <!-- <button @click="$emit('cuisine_id', cuisine.id)">
        {{cuisine.name}}
        <img src="cuisine.image" alt="">
    </button> -->
 
</template>

<script>
export default {
  name: "Cuisine",
  props: ['cuisine']

};
</script>

<style scoped lang="scss">
@import "../../../sass/guest/front.scss";
.yellow_box{
  width: 100%;
  height: 150px;
  background-color: $mainColor;
  border-radius: $br;
  overflow: hidden;
}

.cuisine_card{
  text-align: center;
  cursor: pointer;
   transition: all 0.8s ease;
}

.cuisine_card:hover{
   transform: scale(1.02);
}

</style>


