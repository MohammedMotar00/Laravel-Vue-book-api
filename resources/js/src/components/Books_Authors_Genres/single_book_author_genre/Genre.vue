<template>
  <v-container fluid>
    <v-card class="light-blue lighten-4">
      <v-row class="d-flex flex-wrap">
        <v-col cols="12">
          <v-col cols="12">
            <v-card class="pa-5 text-center">
              <v-icon x-large class="mb-5">mdi-view-list</v-icon>
              <h2 class="mb-2">{{ genre_obj.name }}</h2>
            </v-card>
          </v-col>

          <v-divider inset class="ma-5"></v-divider>

          <v-col cols="12" class="d-flex justify-center flex-wrap">
            <v-col
              cols="12"
              sm="6"
              v-for="data in books_data"
              :key="data.id"
              class="text-center"
            >
              <v-hover v-slot="{ hover }">
                <v-card
                  :to="{ name: 'Book', params: { book_id: data.id } }"
                  :class="{ 'on-hover': hover }"
                  :elevation="hover ? 12 : 2"
                  class="pa-6 book"
                >
                  <v-icon x-large class="mb-5"
                    >mdi-book-open-page-variant</v-icon
                  >
                  <h2 class="mb-5">{{ data.title }}</h2>
                  <p v-if="data.description">
                    {{ data.description.substring(0, 60) + "..." }}
                  </p>
                </v-card>
              </v-hover>
            </v-col>
          </v-col>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "Genre",

  data() {
    return {
      genre_id: this.$route.params.genre_id,
      genre_obj: {},
      books_data: [],
    };
  },

  created() {
    this.fetchGenre();
    this.fetchBooks();
  },

  methods: {
    fetchGenre() {
      axios(`/api/genres/${this.genre_id}`).then((res) => {
        let obj = {};
        obj.id = res.data.id;
        obj.name = res.data.name;

        this.genre_obj = obj;
      });
    },

    fetchBooks() {
      axios(`/api/books_genres/${this.genre_id}`).then((res) => {
        for (let data of res.data) this.books_data.push(data);
      });
    },
  },
};
</script>

<style lang="scss" scoped>
.book {
  transition: opacity 0.2s ease-in-out;
  opacity: 0.7;

  &:not(.on-hover) {
    opacity: 1;
  }
}
</style>