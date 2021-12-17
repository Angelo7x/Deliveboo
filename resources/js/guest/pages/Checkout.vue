<template>
  <div class="checkout">
    <div class="checkout__header">
        <h2 class="container--1000">Checkout</h2>
    </div>
    <div class="checkout__body container--1000">
        <form action="" @submit="submitOrder()">
            <div class="body__cart">
                <h5 class="cart__title">Carrello</h5>
                <div v-if="cart.items.length == 0" class="color--grey">Il carrello è vuoto 	(⌣_⌣”)</div>
                <div v-for="food in cart.items" :key="food.food.id" class="cart__food-card">
                    <div class="food-card__info">
                        <div class="info__img">
                            <img v-show="food.food.image !== ''" :src="`storage/${food.food.image}`" :alt="food.food.name">
                        </div>
                        <ul>
                            <li><label :for="food.food.id">{{food.food.name}}</label></li>
                            <li>x{{food.quantity}}</li>
                            <li>{{getFoodPrice(food.food.price, food.quantity)}}€</li>
                        </ul>
                        <input type="text" :id="food.food.id" :value="food" :name="food.food.id" hidden>
                    </div>
                    <div class="food-card__btn">
                       <button type="button" @click="modifyCart(food, 'add')">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 49.44 49.44" style="enable-background:new 0 0 49.44 49.44;" xml:space="preserve">
                            <path class="st0" d="M43.62,20.33H29.11V5.82c0-1.22-0.99-2.22-2.22-2.22h-4.36c-1.22,0-2.22,0.99-2.22,2.22v14.51H5.82
                                c-1.22,0-2.22,0.99-2.22,2.22v4.36c0,1.22,0.99,2.22,2.22,2.22h14.51v14.51c0,1.22,0.99,2.22,2.22,2.22h4.36
                                c1.22,0,2.22-0.99,2.22-2.22V29.11h14.51c1.22,0,2.22-0.99,2.22-2.22v-4.36C45.84,21.32,44.84,20.33,43.62,20.33z"/>
                            </svg>
                        </button> 
                        <button type="button" @click="modifyCart(food, 'remove')">
                            <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 49.44 49.44" style="enable-background:new 0 0 49.44 49.44;" xml:space="preserve">
                            <path class="st0" d="M42.84,29.14H6.6c-1.66,0-3-1.34-3-3v-2.85c0-1.66,1.34-3,3-3h36.23c1.66,0,3,1.34,3,3v2.85
                                C45.84,27.8,44.49,29.14,42.84,29.14z"/>
                            </svg>
                        </button> 
                    </div>
                </div>
                <h5 class="cart__title">I tuoi dati</h5>
            </div>
            <div class="row">
                <label for="ui_name">ui_name</label>
                <input type="text" name="ui_name" id="ui_name">
            </div>
            <div class="row">
                <label for="ui_email">ui_email</label>
                <input type="email" name="ui_email" id="ui_email">
            </div>
            <div class="row">
                <label for="ui_delivery_address">ui_delivery_address</label>
                <input type="text" name="ui_delivery_address" id="ui_delivery_address">
            </div>
            <div class="row">
                <label for="ui_phone">ui_phone</label>
                <input type="text" name="ui_phone" id="ui_phone">
            </div>
            <div class="row">
                <label for="ui_delivery_info">ui_delivery_info</label>
                <textarea name="ui_delivery_info" id="ui_delivery_info" cols="30" rows="10"></textarea>
            </div>
            <div class="row">
                <label for="total_price"> Prezzo totale: {{totalPrice()}}€</label>
                <input type="text" hidden>
            </div>

            <button type="submit">Checkout</button>
        </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "Checkout",
  props: ['cart'],
  methods: {
        modifyCart(food, action) {
            this.$emit('food', {item: food.food, action: action})
        },
        totalPrice() {
            let total = 0;
            this.cart.items.forEach(e => {
                total += e.food.price*e.quantity;
            });
            return total;
        },
        sendPrice() {
            axios.post(`orders/make/payment/${this.totalPrice()}`)
        },
        getFoodPrice(e, amount) {
            return (e*amount).toFixed(2).replace('.',',')
        }
    }
};
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/front.scss';

.checkout {

    .checkout__header {
        background-color: $secondColor;
        color: $lightColor;
        font-family: 'PolySans Neutral';
        font-size: 1.5rem;
    }

    .checkout__body {
        padding: $gt_lg $gt_sm;
    }

    .cart__title {
        padding: $gt 0;
    }

    .cart__food-card {
        @include align-center-between;
        &>div{
            margin-bottom: $gt_md;
        }
    }

    form {
        font-size: $txt_xs;
    }

    .food-card__info {
        @include align-center;
        padding: $gt_sm;
        border: .0625rem solid $greyBorder;
        border-radius: $br;
        flex-grow: 1;

        &>*:not(.info__img) {
            padding: $gt_sm;
        }

        ul {
            flex-grow: 1;
            @include list-style-none;
            @include align-center-between;
        }

        label {
            font-family: 'PolySans Neutral';
        }
    }

    .info__img {
        border-radius: $br_sm;
        height: 3rem;
        width: 3rem;
        overflow: hidden;
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    }

    .food-card__btn {
        display: flex;
        button {
            margin: $gt_sm;
            overflow-x: inherit;
            svg {
                height: 2rem;
                fill:$lightColor;
                stroke:$greyBorder;
                stroke-miterlimit:10;

                &:hover {
                    stroke:#000;
                }
            }
        }
    }
}

.checkout__header {
  padding-top: 100px;
}



@media screen and (max-width:768px) {
  .checkout__header {
    padding-top: 200px;
  }
}

@media screen and (max-width:425px) {
  .checkout__header {
    padding-top: 150px;
  }
}
</style>