<template>
  <div>
    <Hero/>
    <Slider/>
    <AppDeliveboo/>
  </div>
</template>

<script>
import Hero  from '../components/Hero.vue';
import Slider from '../components/Slider.vue';
import AppDeliveboo  from '../components/AppDeliveboo.vue';

export default {
    name: 'Home',
    components: {
        Hero,
        AppDeliveboo,
        Slider,
    }
}
</script>

<style>

</style>