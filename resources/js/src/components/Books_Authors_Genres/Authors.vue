<template>
  <router-link
    :to="{
      name: 'Author',
      params: { author_id: id },
    }"
  >
    <div class="authors-container" :id="id">
      <h2>{{ name }}</h2>
      <p>
        {{
          biography.length > 10
            ? biography.substring(0, 120) + "..."
            : biography
        }}
      </p>
    </div>
  </router-link>
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