<template>
  <section class="success">
      <div class="success__card">
        <p>Transazione avvenuta con successo! <br> Il tuo ordine arriverà a breve</p>
        <a href="/">Torna alla Home</a>
        <div class="bg">
            <!-- <img src="images/boo_bird.svg" alt="boo_bird"> -->
            <img src="images/boo_bird.svg" alt="boo_bird">
            <!-- <img src="images/boo_bird.svg" alt="boo_bird"> -->
        </div>
      </div>
  </section>
</template>

<script>

export default {
    name: 'OrderSuccess',
}

</script>

<style lang="scss" scoped>
@import '../../../sass/guest/front.scss';


.success {
		background-color: $secondColor;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: $mainColor;
        font-size: $txt_md;

            position: relative;
        .success__card {
            display: flex;
            flex-direction: column;
        }
        a {
            color: #fff;
            font-size: $txt_sm;
            margin-left: auto;
            padding: $gt_sm;
            &:hover{
                text-decoration: underline;
            }
        }

        .bg {
            // mix-blend-mode: exclusion;
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            top: 0;
            left: 0;
            img {
                height: 100%;
                width: 100%;
                object-fit: contain;
            }
        }

}

@keyframes rotation {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}
</style>