<template>
  <header>
    <nav>
      <div class="nav-left">
        <a href="/" class="logo">
          <img src="images/deliveboo/logo_white.svg" alt="logo_deliveboo" />
        </a>
      </div>
      <div class="nav-right">
        <ul>
          <li>
            <a href="/checkout" class="cart"
              ><span>{{ getCartAmount }}</span
              ><img src="images/deliveboo/cart.svg" alt="cart_icon"
            /></a>
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
  name: "Header",
  props: ["getCartAmount"],
};
</script>

<style scoped lang="scss">
@import "../../../sass/guest/front.scss";

header {
  background-color: $secondColor;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 10;
  padding-bottom: .3125rem;
  nav {
    @include align-center-between;
      flex-wrap: wrap;

    .nav-left {
      flex-grow: 1;
      a {
        display: inline-block;
      }

      img {
       min-height: 120px;
      }
    }

    .nav-right {
      height: 120px;
        display: flex;
      flex-wrap: wrap;
      flex-grow: 1;
      ul {
        margin-left: auto;
        display: flex;
        list-style: none;
        // flex-wrap: wrap;
        li {
          padding: 5px 10px;
          a {
            text-transform: uppercase;
            color: $lightColor;
            font-size: $txt;
            margin-bottom: auto;
            &:hover {
              text-decoration: underline;
            }
          }
          .cart {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            img {
              min-height: 100px;
            }

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

@media screen and (max-width: 850px) {
  header {
    img {
      height: 80px;
    }
    .admin {
      flex-direction: column;
    }
  }
}


@media screen and (max-width: 768px) {
  header {
    nav {
      align-items: inherit;
    .nav-left {
      height: inherit;
      width: 100%;
      a {
        height: inherit;
      width: 100%;

      }

      img {
        height: inherit;
      width: 100%;

      }
      .nav-right {
        ul {
          li {
            .cart {
              margin: 0;
              margin-right: auto;
              img {
                height: 80px;
              }
            }
          }
        }
      }
    }
  }
}
}

@media screen and (max-width: 320px) {

}


</style>