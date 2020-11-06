<template>
  <div class="authors-container" :id="id">
    <h2>{{ name }}</h2>
    <p>
      {{
        biography.length > 10 ? biography.substring(0, 120) + "..." : biography
      }}
    </p>
  </div>
</template>

<script>
export default {
  name: "Authors",
  props: ["id", "biography", "name"],
};
</script>

<style lang="scss" scoped>
.authors-container {
  border: 1px solid #ccc;
  max-width: 200px;
}
</style>