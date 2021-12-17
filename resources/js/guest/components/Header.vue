<template>
  <header :class="{change_color: scrollPosition > 50}">
        <nav>
            <div class="nav-left">
                <a href="/" class="logo">
                    <img src="images/deliveboo/logo_white.svg" alt="logo_deliveboo">
                </a>
            </div>
            <div class="nav-right">
                <ul>
                    <li>
                        <a href="#" class="cart"><span>13</span><img src="/images/deliveboo/cart.svg" alt="cart_icon"></a>
                    </li>
                    <li>
                        <ul class="admin">
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Registrazione</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
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
    background-color: $secondColor;
    width:100%;
    position: fixed;
    top: 0;
    z-index: 1;
    img {
        height:100px;
    }
        nav {
            @include align-center-between;

            .nav-right {
                ul {
                    display: flex;
                    list-style: none;
                    // flex-wrap: wrap;
                    li {
                        padding: 0 10px;
                        a {
                            text-transform: uppercase;
                            color: $lightColor;
                            font-size: $txt;
                            margin-bottom: auto;
                            &:hover {
                                text-decoration: underline;
                            }
                        }
                        a.cart {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin-left: $gt_md;
                                position: relative;

                            span {
                                position: absolute;
                                top: 50%;
                                transform: translateY(-50%);
                            }
                        }
                        &:first-child {
                            margin-right: auto;
                        }
                        .admin {
                            flex-wrap: wrap;
                        }
                    }
                }
            }
        }
}

@media screen and (max-width:850px) {
    header {
        img {
            height:80px;
        }
        .admin {
            flex-direction: column;
        }
    }
    
}

@media screen and (max-width:768px) {
    header {
        img {
            width: 100%;
        }
        .admin {
            flex-direction: column;
        }
    }
    
}

@media screen and (max-width:768px) {
    header {
        nav {
            flex-direction: column;
            align-items: inherit;
            .nav-left {
                a {
                    height: 100px;
                }
                img {
                    height: 100%;
                }
            }
            .nav-right {
                ul {
                    li {
                        a.cart {
                            margin:0;
                            margin-right: auto;
                            img {
                                height:80px;
                            }
                        }
                    }
                }
            }
        }
}
}


</style>