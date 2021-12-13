<template>
<section class="container">
    <vue-horizontal responsive>
        <div class="item" v-for="item in items" :key="item">
            <div class="card">
                <img src="../../../images/cuisines_images/pizza.jpg" alt="pizza">
            </div>
            <a href="#"><h3>Item {{ item }}</h3></a>
        </div>
      </vue-horizontal>
</section>
  
</template>

<script>
import VueHorizontal from 'vue-horizontal';
export default {
    name:"Slider",
    components: 
    {VueHorizontal},
    data() {
    return {
      items:[1,2,3,4,5,6,7],
    };
  },
}
</script>

<style scoped lang="scss">
@import '../../../sass/guest/front.scss';
.container{
     @include container-90;
}

div.item{
    margin: 10px 5px;
    text-align: center;
    border-radius: 10px;
    overflow: hidden;
    -webkit-box-shadow: 0px 3px 11px -3px #000000; 
    box-shadow: 0px 3px 11px -3px #000000;
    a{
        color:$darkColor;
    }
}

.card{
    img{
        width: 100%;
        object-fit:cover;
        object-position:center;
    }
}


</style>