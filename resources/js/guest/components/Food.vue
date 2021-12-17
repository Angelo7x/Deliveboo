<template>
  <div class="food-card">
      <div class="food-card-image">
          <img src="../../../images/bg_footer.jpg" alt="">
      </div>
      <div class="food-card-info">
        <h3 class="food-card-name">{{ food.name }}</h3>
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
    height: 180px;
    &-image {
        background-color: rgb(168, 139, 196);
        @include justify-center-column;
        img {
            width: 160px;
            height: 130px;
            border-radius: $br;
            object-fit: cover;
        }
    }
    &-info {
        background-color: rgb(122, 122, 139);
        flex-grow: 1;
    }
    &-buttons {
        background-color: rgb(111, 168, 111);
    }
}
svg {
    height: 2rem;
}
.st0 {
    fill:#FFFFFF;stroke:#CCCCCC;stroke-miterlimit:10;
}
button:hover .st0 {
    fill:#FFFFFF;stroke:#000;stroke-miterlimit:10;
}
</style>