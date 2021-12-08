<template>
  <footer>
      <div class="container">
          <div class="footer_top">
              <ul>
                  <h3>Servizio Clienti</h3>
                  <li>
                      <a href="#">Apps</a>
                  </li>
                  <li>
                      <a href="#">Domande frequenti</a>
                  </li>
                  <li>
                      <a href="#">Miglior Prezzo Garantito</a>
                  </li>
              </ul>
              <ul>
                  <h3>Servizio Clienti</h3>
                  <li>
                      <a href="#">Apps</a>
                  </li>
                  <li>
                      <a href="#">Domande frequenti</a>
                  </li>
                  <li>
                      <a href="#">Miglior Prezzo Garantito</a>
                  </li>
              </ul>
              <ul>
                  <h3>Servizio Clienti</h3>
                  <li>
                      <a href="#">Apps</a>
                  </li>
                  <li>
                      <a href="#">Domande frequenti</a>
                  </li>
                  <li>
                      <a href="#">Miglior Prezzo Garantito</a>
                  </li>
              </ul>
              <ul>
                  <h3>Servizio Clienti</h3>
                  <li>
                      <a href="#">Apps</a>
                  </li>
                  <li>
                      <a href="#">Domande frequenti</a>
                  </li>
                  <li>
                      <a href="#">Miglior Prezzo Garantito</a>
                  </li>
              </ul>
               <ul>
                  <h3>Servizio Clienti</h3>
                  <li>
                      <a href="#">Apps</a>
                  </li>
                  <li>
                      <a href="#">Domande frequenti</a>
                  </li>
                  <li>
                      <a href="#">Miglior Prezzo Garantito</a>
                  </li>
              </ul>
          </div>
      </div>
         <div class="footer_middle">
              <div class="container">
                  <div class="footer_middle_container">
                      <div class="col">
                          <h2>Scarica l'app</h2>
                          <span class="apps">
                            <a href="#">
                                <img src="../../../images/apple.png" alt="apple app">
                            </a>
                            <a href="#">
                                <img src="../../../images/google.png" alt="google app">
                            </a>
                          </span>
                      </div>
                       <div class="col">
                           <h2>Feedback</h2>
                           Aiutaci a migliorare il nostro sito
                           <div class="feedback">
                            <a href="#">
                                Invia feedback
                            </a>
                           </div>
                         
                      </div>
                      <div class="col">
                             <h2>Seguici su:</h2>
                             <ul class="social">
                                 <li>
                                     <a href="#">
                                         <img src="../../../images/facebook.svg" alt="facebook">
                                   
                                     </a>
                                 </li>
                                  <li>
                                     <a href="#">
                                    <img src="../../../images/tweet.svg" alt="tweet">
                                     </a>
                                 </li>
                                  <li>
                                     <a href="#">
                                            <img src="../../../images/instagram.svg" alt="instagram">
                                     </a>
                                 </li>
                             </ul>
                         
                      </div>
                  </div>
       
             </div>
         </div>
          <div class="footer_bottom">
              <div class="container copyright">
              <span >
                Deliveboo S.r.l. - P.IVA 07392740960
              </span>
              <span class="cards">
                  <img src="../../../images/MasterCard_Logo.svg.png" alt="mastercard">
                  <img src="../../../images/Visa_Inc._logo.svg.png" alt="visa">
              </span>
              </div>
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
  background-image: linear-gradient(
      170deg,
      rgba(35, 33, 37, 0.828) 0%,
      rgba(35, 33, 37, 0.8) 100%
    ),
    url("../../../images/bg_footer.jpg");
  background-size: cover;
  color: $lightColor;
  a {
      color: $lightColor;
  }
  .container {
    @include container-75;
    @include padding-top-bottom-20px;
    .footer_top{
       display:flex;
       ul{
           @include list-style-none;
           width: calc(100%/5);
           h3{
               text-transform: uppercase;
           }
           a{
               color: $lightColor_300;
           }
       }

    }
  }
  .footer_middle{
      background-color: $lightColor_200;
      .footer_middle_container{
          display: flex;
          .col{
              width: calc(100%/3);
              h2{
                  font-size: 20px;
                  margin-bottom: 10px;
              }
          }
          .apps img{
              width: 120px;
          }
          .feedback{
              text-decoration: underline;
              font-weight: 600;
              padding: 10px 0;
          }
          ul.social{
              @include inline-block-list;
          }
          .social img{
             width: 40px;
             margin-right: 10px ;
          }

      }
  }
  .copyright{
      @include align-center-between;
      color: $lightColor_300;
      .cards{
          @include align-center;
      }
       .cards img{
           width: 70px;
           padding: 5px;
       }
  }
}
</style>