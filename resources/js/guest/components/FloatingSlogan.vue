<template>
<section class="floatingSlogan">
    <h2 class="slogan stroke">Una storia di consegne</h2>
    <h2 class="slogan full">È bello prenderci gusto</h2>
    <img src="../../../images/boo_bird.png" alt="logo cicogna deliveboo">
</section>
  
</template>

<script>
export default {
    name:"FloatingSlogan",
}
</script>

<style scoped lang="scss">
@import "../../../sass/guest/front.scss";

.floatingSlogan {
    height: 1000px;
    position: relative;
    @include justify-center-column;
    .slogan {
        font-size: 109px;
        text-transform: uppercase;
    }
    .slogan.stroke {
        // -webkit-text-stroke-width: 3px;
        // -webkit-text-stroke-color: $$secondColor;
        text-shadow: 2px 0 0 $secondColor, -2px 0 0 $secondColor, 0 2px 0 $secondColor, 0 -2px 0 $secondColor, 2px 2px $secondColor, -2px -2px 0 $secondColor, 2px -2px 0 $secondColor, -2px 2px 0 $secondColor;
        color: $lightColor;
        animation: floatTextRight 12s infinite;
        animation-timing-function: linear;
    }
    @keyframes floatTextRight {
        from {
            transform: translateX(-100%);
        }
        to {
            transform: translateX(100%);
        }
    }
    .slogan.full {
        color: $secondColor;
        animation: floatTextLeft 12s infinite;
        animation-timing-function: linear;
    }
    @keyframes floatTextLeft {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(-100%);
        }
    }
    img {
        @include center-absolute;
        z-index: -1;
        height: 460px;
    }
}

</style>