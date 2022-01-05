<template>
  <section class="success">
    <div class="success__card">
      <p>
        Transazione avvenuta con successo! <br />
        Il tuo ordine arriverà a breve
      </p>
      <a href="/">Torna alla Home</a>
      <div class="bg">
        <img src="../../../images/gifboo2.gif" alt="">
      </div>
    </div>

  </section>
</template>

<script>
export default {
  name: "OrderSuccess",
};
</script>

<style lang="scss" scoped>
@import "../../../sass/guest/front.scss";
.bird {
    fill: #ebdf00;
}
.success {
//   background-color: $secondColor;
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
  p {
      mix-blend-mode: difference;
      color: #00ff34;
      padding: $gt;
  }
  a {
    color: #fff;
      padding: $gt;

    font-size: $txt_sm;
    margin-left: auto;
    padding: $gt_sm;
    z-index: 3;
    &:hover {
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
    align-items: center;
    top: 0;
    left: 0;
    img {
      height: 100%;
      width: 100%;
      object-fit: cover;
      mix-blend-mode: darken;
    z-index: -1;

    }

  }
}
@keyframes dash {
  to {
    stroke-dashoffset: 100;
  }
}



</style>