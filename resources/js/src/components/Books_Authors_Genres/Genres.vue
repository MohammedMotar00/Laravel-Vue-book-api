<template>
  <router-link :to="{ name: 'Genre', params: { genre_id: id } }">
    <div class="genres-container" :id="id">
      <h2 v-if="name">{{ name }}</h2>
    </div>
  </router-link>
</template>

<script>
export default {
  name: "Genres",
  props: ["id", "name"],
};
</script>

<style lang="scss" scoped>
.genres-container {
  border: 1px solid #ccc;
  max-width: 200px;
}
</style>