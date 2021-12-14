<template>
  <div>
      <ul>
          <li v-for="cuisine in cuisines" :key="cuisine.id">
              <button @click="$emit('cuisine_id', cuisine.id)">
                  {{cuisine.name}}
              </button>
          </li>
      </ul>
  </div>
</template>

<script>
export default {
  name: "Cuisines",
  data() {
    return {
      cuisines: [],
    };
  },
  mounted() {
    // Make a request for a user with a given ID
    axios
      .get("/api/cuisines")
      .then((response) => {
        this.cuisines = response.data.data;
        console.log(response);
      })
      .catch((error) => {
        // handle error
        console.log(error);
      });
  },
};
</script>

<style>
</style>