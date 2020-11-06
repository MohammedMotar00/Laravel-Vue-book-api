<template>
  <div class="book-container" :id="id">
    <h2>{{ title }}</h2>
    <p>{{ description.substring(0, 120) + "..." }}</p>
  </div>
</template>

<script>
export default {
  name: "Books",
  props: ["id", "description", "isbn", "title"],
};
</script>

<style lang="scss" scoped>
.book-container {
  border: 1px solid #ccc;
  max-width: 200px;
}
</style>