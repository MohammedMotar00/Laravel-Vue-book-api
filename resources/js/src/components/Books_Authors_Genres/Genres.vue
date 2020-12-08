<template>
  <v-container fluid>
    <v-hover v-slot="{ hover }">
      <v-card
        :to="{ name: 'Genre', params: { genre_id: id } }"
        :class="{ 'on-hover': hover }"
        :elevation="hover ? 12 : 2"
      >
        <v-row class="d-flex justify-center">
          <v-col class="text-center" cols="10">
            <v-icon x-large class="mb-5">mdi-view-list</v-icon>
            <h2 class="mb-5">{{ name }}</h2>
          </v-col>
        </v-row>
      </v-card>
    </v-hover>
  </v-container>
</template>

<script>
export default {
  name: "Genres",
  props: ["id", "name"],
};
</script>

<style lang="scss" scoped>
.v-card {
  transition: opacity 0.2s ease-in-out;
  opacity: 0.7;

  &:not(.on-hover) {
    opacity: 1;
  }
}
</style>