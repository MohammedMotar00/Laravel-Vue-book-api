<template>
  <router-link
    :to="{
      name: 'Book',
      params: { book_id: id },
    }"
  >
    <div class="book-container" :id="id">
      <h2>{{ title }}</h2>
      <p>{{ description.substring(0, 120) + "..." }}</p>
    </div>
  </router-link>
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
  cursor: pointer;
}
</style>