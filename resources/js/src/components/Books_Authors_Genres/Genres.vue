<template>
  <div class="genres-container" :id="id">
    <h2>{{ name }}</h2>
  </div>
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