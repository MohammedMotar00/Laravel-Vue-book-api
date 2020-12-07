<template>
  <!-- <router-link
    :to="{
      name: 'Book',
      params: { book_id: id },
    }"
  >
    <div class="book-container" :id="id">
      <h2>{{ title }}</h2>
      <p v-if="description">{{ description.substring(0, 120) + "..." }}</p>
    </div>
  </router-link> -->
  <v-container fluid>
    <v-card :to="{ name: 'Book', params: { book_id: id } }">
      <v-row class="d-flex justify-center">
        <v-col class="text-center" cols="10">
          <v-icon x-large class="mb-5">mdi-book-open-page-variant</v-icon>
          <h2 class="mb-5">{{ title }}</h2>
          <p v-if="description">{{ description.substring(0, 80) + "..." }}</p>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script>
export default {
  name: "Books",
  props: ["id", "description", "isbn", "title"],
};
</script>

<style lang="scss" scoped>
h2 {
  font-size: 16px;
}
p {
  font-size: 16px;
}
</style>