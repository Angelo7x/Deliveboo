<template>
  <header :class="{change_color: scrollPosition > 50}">
      <div class="container">
        <nav>
            <div class="nav-left">
                <a href="/" class="logo">
                    <img src="../../../images/logo.png" alt="logo Deliveboo">
                </a>
            </div>
            <div class="nav-right">
                <ul>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                    <li>
                        <a href="#" class="cart"><span>0,00$</span> <img src="../../../images/cart_icon_white.png" alt="cart icon"></a>
                    </li>
                </ul>
            </div>
        </nav>
      </div>
      
  </header>
</template>

<script>
export default {
    name: 'Header',
    // data() {
    //     return {
    //         scrollPosition: null,
    //     };
    // },
    // methods: {
    //     updateScroll() {
    //     this.scrollPosition = window.scrollY
    //     }
    // },
    // mounted() {
    //     window.addEventListener('scroll', this.updateScroll);
    // }
}
</script>

<style scoped lang="scss">
@import '../../../sass/guest/front.scss';

header {
    width:100%;
    height: 100px;
    position: fixed;
    top: 0;
    left:0;
    z-index: 1;
    background-color: grey;
    @include align-center;
    .container {
        @include container-90;
        nav {
            @include align-center-between;
            .nav-left {
                .logo {
                    width: 220px;
                    display: block;
                    transform: translateY(6%);
                    img {
                        width: 100%;
                    }
                }
            }
            .nav-right {
                ul {
                    @include inline-block-list;
                    li {
                        padding: 0 10px;
                        a {
                            text-transform: uppercase;
                            color: $lightColor;
                            font-weight: 500;
                            font-size: 20px;
                        }
                        a.cart {
                            @include btn($btnColor: $lightColor, $btnBG: transparent);
                            font-size: 16px;
                            padding: 12px;
                            img {
                                width: 30px;
                                margin-left: 8px;
                            }
                        }
                    }
                }
            }
        }
    }
}
.change_color {
       background-color: $footerDarkColor;
    }


</style>