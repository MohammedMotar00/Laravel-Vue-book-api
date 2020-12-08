<template>
  <v-container fluid>
    <v-card class="light-blue lighten-4">
      <v-row class="d-flex flex-wrap">
        <v-col cols="12" class="d-flex flex-wrap">
          <v-col cols="12">
            <v-card class="pa-5 text-center">
              <v-icon x-large class="mb-5">mdi-account-edit</v-icon>
              <h2 class="mb-2">{{ author_obj.name }}</h2>
              <p>{{ author_obj.biography }}</p>
            </v-card>
          </v-col>

          <v-divider inset class="ma-5"></v-divider>

          <v-col cols="12" class="d-flex justify-center flex-wrap">
            <v-col
              cols="12"
              sm="6"
              v-for="data in bookData"
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
  name: "Author",

  data() {
    return {
      author_id: this.$route.params.author_id,
      author_obj: {},
      bookData: [],
    };
  },

  created() {
    this.fetchAuthor();
    this.getBooks();
  },

  methods: {
    fetchAuthor() {
      axios(`/api/authors/${this.author_id}`).then((res) => {
        let obj = {};
        obj.id = res.data.id;
        obj.name = res.data.name;
        obj.biography = res.data.biography;

        this.author_obj = obj;
      });
    },

    getBooks() {
      axios(`/api/books_author/${this.author_id}`).then((res) => {
        for (let data of res.data) this.bookData.push(data);
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