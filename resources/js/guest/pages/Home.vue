<template>
  <div>
    <Hero/>
    <Slider/>
    <FloatingSlogan/>
    <AppDeliveboo/>
  </div>
</template>

<script>
import Hero  from '../components/Hero.vue';
import AppDeliveboo  from '../components/AppDeliveboo.vue';
import FloatingSlogan from '../components/FloatingSlogan.vue';
import Slider from '../components/Slider.vue';

export default {
    name: 'Home',
    components: {
        Hero,
        FloatingSlogan,
        AppDeliveboo,
        Slider,
    }
}
</script>

<style>

</style>