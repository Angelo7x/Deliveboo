<template>
  <section class="appDeliveboo">
       <img src="../../../images/phone_test.png" alt="app Deliveboo">
       <img src="../../../images/app_cloud.png" alt="app Deliveboo">
  </section>
</template>

<script>
export default {
    name:"AppDeliveboo",

}
</script>

<style scoped lang="scss">
@import "../../../sass/guest/front.scss";
section.appDeliveboo{
    @include container-50;
    @include padding-top-bottom-20px;
    @include align-justify-center;
    img{
        width: 600px;
    }
}

</style>