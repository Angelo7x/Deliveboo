<template>
  <header>
      <div class="container">
        <nav>
            <div class="nav-left">
                <div class="logo">
                    <img src="../../../images/logo.png" alt="logo Deliveboo">
                </div>
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
    @include align-center;
    .container {
        @include container-90;
        nav {
            @include align-center-between;
            .nav-left {
                .logo {
                    width: 150px;
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
                            padding: 10px;
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


</style>