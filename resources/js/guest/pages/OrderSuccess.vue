<template>
  <section class="success">
      <div class="success__card">
        <p>Transazione avvenuta con successo! <br> Il tuo ordine arriverà a breve</p>
        <a href="/">Torna alla Home</a>
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
        color: #000;
        font-size: $txt_md;

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

}
</style>