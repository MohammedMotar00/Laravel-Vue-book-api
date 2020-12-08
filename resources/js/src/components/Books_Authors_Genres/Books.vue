<template>
  <v-container fluid>
    <v-hover v-slot="{ hover }">
      <v-card
        :to="{ name: 'Book', params: { book_id: id } }"
        :class="{ 'on-hover': hover }"
        :elevation="hover ? 12 : 2"
      >
        <v-row class="d-flex justify-center">
          <v-col class="text-center" cols="10">
            <v-icon x-large class="mb-5">mdi-book-open-page-variant</v-icon>
            <h2 class="mb-5">{{ title }}</h2>
            <p v-if="description">{{ description.substring(0, 80) + "..." }}</p>
          </v-col>
        </v-row>
      </v-card>
    </v-hover>
  </v-container>
</template>

<script>
export default {
  name: "Books",
  props: ["id", "description", "isbn", "title"],
};
</script>

<style lang="scss" scoped>
.v-card {
  transition: opacity 0.2s ease-in-out;
  opacity: 0.8;

  &:not(.on-hover) {
    opacity: 1;
  }
}
</style>