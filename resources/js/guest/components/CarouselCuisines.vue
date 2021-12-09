<template>
<section>
    Qua ci sarà slider
     <vue-horizontal responsive>
        <div class="item" v-for="item in items" :key="item">
          <h2>Item {{ item }}</h2>
          <p>Paragraph</p>
        </div>
      </vue-horizontal>
</section>
  
</template>

<script>
import VueHorizontal from 'vue-horizontal';

export default {
    components: {VueHorizontal},
    name:"CarouselCuisines",
    data() {
        return{
            items: [0, 1, 2, 3, 4, 5, 6, 7]
        }
      }
}
</script>

<style scoped lang="scss">

</style>