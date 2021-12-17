<template>
  <div class="checkout">
    <form action="" @submit="submitOrder()">
        <div v-for="food in cart.items" :key="food.food.id">
            <label :for="food.food.id">{{food.food.name}} x{{food.quantity}} - {{food.food.price*food.quantity}}€</label>
            <input type="text" :id="food.food.id" :value="food" :name="food.food.id" hidden>
            <button type="button" @click="modifyCart(food, 'add')">+</button> 
            <button type="button" @click="modifyCart(food, 'remove')">-</button> 
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
        }
    }
};
</script>

<style>
.checkout {
    padding-top: 120px;
}
</style>