<template>
  <v-container fluid>
    <v-hover v-slot="{ hover }">
      <v-card
        :to="{ name: 'Author', params: { author_id: id } }"
        :class="{ 'on-hover': hover }"
        :elevation="hover ? 12 : 2"
      >
        <v-row class="d-flex justify-center">
          <v-col class="text-center" cols="10">
            <v-icon x-large class="mb-5">mdi-account-edit</v-icon>
            <h2 class="mb-5">{{ name }}</h2>
            <p v-if="biography">
              {{
                biography.length > 10
                  ? biography.substring(0, 80) + "..."
                  : biography
              }}
            </p>
          </v-col>
        </v-row>
      </v-card>
    </v-hover>
  </v-container>
</template>

<script>
export default {
  name: "Authors",
  props: ["id", "biography", "name"],
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