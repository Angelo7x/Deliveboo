<template>
  <section class="hero">
      <div class="container">
          <a class="CTA" href="#">Trova i ristoranti!</a>
      </div>

  </section>
</template>

<script>
export default {
    name: 'Hero',

}
</script>

<style scoped lang="scss">
@import '../../../sass/guest/front.scss';
.hero{
    height: 600px;
    background-image: url("../../../images/hero_bg.jpg");
    background-size: cover;
    padding-top:150px;
    .container{
        @include align-justify-center;
    }
      .CTA{
           @include btn($btnColor: $secondColor, $btnBG: $lightColor);
            font-size: 16px;
            padding: 10px;
            display:inline-block;
            font-weight:600;
            font-size:20px;
      }
}

</style>