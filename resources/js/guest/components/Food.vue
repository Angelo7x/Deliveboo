<template>
  <div class="food-card" v-if="food.visible">
      <div class="food-card-image" v-if="food.image">
          <img :src="`/storage/${food.image}`" :alt="`${food.name} logo`">
      </div>
      <div class="food-card-info">
        <h3 class="food-card-info-name">
            {{ food.name }}
        </h3>
        <small class="food-card-info-weight" v-if="food.weight">
            {{ food.weight }} gr
        </small>
        <p class="food-card-info-description">
            {{ food.description }}
        </p>
        <small class="food-card-info-allergens" v-if="food.allergens">
            Allergeni: {{ food.allergens }}
        </small>
        <div class="food-card-info-price">
            {{ food.price }}€
        </div>
      </div>
      <div class="food-card-buttons">
         <button type="button" @click="modifyCart(food, 'add')">
            <svg viewBox="0 0 49.44 49.44" style="enable-background:new 0 0 49.44 49.44;">
                <path class="st0" d="M43.62,20.33H29.11V5.82c0-1.22-0.99-2.22-2.22-2.22h-4.36c-1.22,0-2.22,0.99-2.22,2.22v14.51H5.82 c-1.22,0-2.22,0.99-2.22,2.22v4.36c0,1.22,0.99,2.22,2.22,2.22h14.51v14.51c0,1.22,0.99,2.22,2.22,2.22h4.36 c1.22,0,2.22-0.99,2.22-2.22V29.11h14.51c1.22,0,2.22-0.99,2.22-2.22v-4.36C45.84,21.32,44.84,20.33,43.62,20.33z"/>
            </svg>
        </button>
        <button type="button" @click="modifyCart(food, 'remove')">
            <svg viewBox="0 0 49.44 49.44">
                    <path class="st0" d="M42.84,29.14H6.6c-1.66,0-3-1.34-3-3v-2.85c0-1.66,1.34-3,3-3h36.23c1.66,0,3,1.34,3,3v2.85 C45.84,27.8,44.49,29.14,42.84,29.14z"/>
            </svg> 
        </button> 
      </div>
  </div>
</template>

<script>
export default {
  name: "Food",
  props: ["food"],
  methods: {
    modifyCart(food, action) {
      this.$parent.$emit("food", { item: food, action: action });
    },
  },
};
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/front.scss';
.food-card {
    display: flex;
    margin-bottom: $gt;
    @include box--border;
    &-image {
        img {
            width: 150px;
            height: 135px;
            border-radius: $br;
            overflow: hidden;
            object-fit: cover;
        }
    }
    &-info {
        padding-left: $gt;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        &-name {
            font-size: $txt_md;
            margin-bottom: $gt_sm;
        }
        &-description {
            font-size: 1.125rem;
            margin: $gt 0;
        }
        &-price {
           margin: auto 0 $gt-sm; 
        }
        &-allergens {
            margin-bottom: $gt;
        }
    }
    &-buttons {
        width: 70px;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        button {
            margin: 10px 0;
        }
    }
}
svg {
    height: 3rem;
}
.st0 {
    fill:#FFFFFF;stroke:#CCCCCC;stroke-miterlimit:10;
}
button:hover .st0 {
    fill:#FFFFFF;stroke:#000;stroke-miterlimit:10;
}
</style>