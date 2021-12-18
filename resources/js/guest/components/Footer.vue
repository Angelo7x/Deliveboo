<template>
  <footer>
    <div class="footer_top">
      <div class="col">
        <h2>Le nostre catene</h2>
        <ul>
          <li>McDonald's</li>
          <li>Burger King</li>
          <li>Old Wild West</li>
          <li>KFC</li>
          <li>Domino's</li>
          <li>Sushiko</li>
          <li>La Piadineria</li>
          <li>Roadhouse</li>
          <li>Fratelli La Bufala</li>
          <li>Poke House</li>
          <li>Zushi</li>
          <li>Alice Pizza</li>
        </ul>
      </div>
      <div class="col">
        <h2>Prossime aperture</h2>
        <ul>
          <li>Bologna</li>
          <li>Ferrara</li>
          <li>Genova</li>
          <li>Milano</li>
          <li>Napoli</li>
          <li>Padova</li>
          <li>Palermo</li>
          <li>Parma</li>
          <li>Roma</li>
        </ul>
      </div>
      <div class="col">
        <h2>Social media</h2>
        <ul class="social">
            <li>
                <a href="#">
                    <img src="../../../../public/images/deliveboo/instagram.svg" alt="instagram">
                </a>
            </li>
             <li>
                <a href="#">
                    <img src="../../../../public/images/deliveboo/youtube.svg" alt="youtube">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../../../../public/images/deliveboo/facebook.svg" alt="facebook">
                </a>
            </li>
        </ul>
      </div>
    </div>
    <div class="footer_hero">
         <img src="../../../../public/images/deliveboo/logo_yellow.svg" alt="logo deliveboo">
    </div>
    <div class="copyright">
        <p>
            Deliveboo S.r.l. - P.IVA 12345678901
        </p>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style scoped lang="scss">
@import "../../../sass/guest/front.scss";
footer {
  background-color: rgb(18, 18, 36);
}
.footer_top {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  padding: $gt;
  h2 {
    color: $mainColor;
    padding: 0 0 $gt;
  }
  ul li {
      @include list-style-none;
      padding: 3px 0;
      color: white;
      font-size: $txt;
  }

  ul.social{
    display: flex;
    align-items: center;
    margin: $gt_md 0;
     li a img{
         width: 60px;
         margin-right: $gt;
     }
  }

}

.copyright{
    padding: $gt;
    color: white;
    font-size: $txt_sm;
}
  //Mediaqueri
@media screen and (max-width: 850px) {
    .footer_top{
         grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (max-width: 768px) {
}
</style>