<template>
  <div class="logo_box_restaurant">
       <router-link class="link_restaurant" :to="{ name: 'menu-restaurant', params: { slug: data.slug } }">
    <div class="logo_restaurant">
      <img
        src="https://d2egcvq7li5bpq.cloudfront.net/it/images/restaurants/249011.gif"
        alt="logo"
      />
    </div>
    <div class="card_restaurant">
      <div class="box_img_restaurant">
        <img
          src="https://www.giallozafferano.it/images/229-22980/Pizza-a-lunga-lievitazione_780x520_wm.jpg"
          alt="restaurant"
        />
      </div>
      <div class="description_restaurant">
        <h3>{{ data.business_name }}</h3>
        <ul>
          <li v-for="(cuisine, i) in data.cuisines" :key="`cuisine_${i}`">
            <p>{{ cuisine.name }}</p>
          </li>
        </ul>
      </div>
    </div>
     </router-link>
  </div>
</template>

      <!-- @click="$parent.$emit('user_id', data.id)" -->
<script>
export default {
  name: "CardRestaurant",
  props: {
    data: Object,
    cuisineList: Array,
  },
};
</script>

<style scoped lang="scss">
@import "../../../sass/guest/front.scss";
.card_restaurant {
  width: 100%;
  box-shadow: 10px 6px 6px -9px rgba(0, 0, 0, 0.22);
  border-radius: $br_sm;
  overflow: hidden;
  margin: $gt_sm 0;
  transition: all 0.3s ease;
  ul {
    @include inline-block-list;
  }
  
}
.card_restaurant:hover {
  transform: scale(1.02);
}
.box_img_restaurant {
  width: 100%;
  height: 150px;
  border-radius: $br_sm $br_sm 0px 0px;
  overflow: hidden;
  object-fit: contain;

  img {
    width: 100%;
  }
}
.description_restaurant {
  padding: $gt;
  color:black;
}
.logo_box_restaurant {
  position: relative;
}
.logo_restaurant {
  z-index: 1;
  left: 70%;
  bottom: 70%;
  position: absolute;
  width: 80px;
  height: 80px;
  border-radius: $gt_sm;
  border: 3px solid $mainColor;
  overflow: hidden;
  img {
    width: 100%;
  }
}
</style>