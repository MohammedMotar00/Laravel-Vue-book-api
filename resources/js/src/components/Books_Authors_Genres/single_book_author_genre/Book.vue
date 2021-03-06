<template>
  <v-container fluid>
    <v-card class="light-blue lighten-4">
      <v-row class="d-flex flex-wrap">
        <v-col cols="12" class="d-flex flex-wrap">
          <v-col cols="12" sm="4" md="4" lg="5">
            <v-card class="pa-5 text-center">
              <v-icon x-large class="mb-5">mdi-book-open-page-variant</v-icon>
              <h2 class="mb-5">{{ book_obj.title }}</h2>
            </v-card>
          </v-col>

          <v-col
            class="text-sm-start text-center"
            cols="12"
            sm="4"
            md="4"
            lg="3"
          >
            <h2 class="">Genres:</h2>
            <v-row
              class="genre-row d-flex flex-sm-column align-sm-start align-center justify-space-between flex-wrap"
            >
              <v-col v-for="data in genreData" :key="data.id">
                <v-hover v-slot="{ hover }" class="btn-flex">
                  <v-btn
                    class="btn"
                    color="success"
                    :to="{ name: 'Genre', params: { genre_id: data.id } }"
                    :class="{ 'on-hover': hover }"
                    :elevation="hover ? 12 : 2"
                    >{{ data.name }}</v-btn
                  >
                </v-hover>
              </v-col>
            </v-row>
          </v-col>

          <v-spacer></v-spacer>

          <v-col
            cols="12"
            sm="4"
            md="4"
            lg="4"
            v-for="data in authorData"
            :key="data.id"
            class="text-center"
          >
            <v-hover v-slot="{ hover }">
              <v-card
                class="pa-4 author"
                :to="{ name: 'Author', params: { author_id: data.id } }"
                :class="{ 'on-hover': hover }"
                :elevation="hover ? 12 : 2"
              >
                <h2 class="mb-2">Author:</h2>
                <h2>{{ data.name }}</h2>
                <p v-if="data.biography">
                  {{
                    data.biography.length > 10
                      ? data.biography.substring(0, 80) + "..."
                      : data.biography
                  }}
                </p>
              </v-card>
            </v-hover>
          </v-col>

          <v-divider inset class="ma-5"></v-divider>

          <v-col cols="12" class="text-center mt-3">
            <v-card class="pa-4">
              <h2 class="mb-3">Description:</h2>
              <p>{{ book_obj.description }}</p>
            </v-card>
          </v-col>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "Book",

  data() {
    return {
      book_id: this.$route.params.book_id,

      book_obj: {},
      authorData: [],
      genreData: [],
    };
  },

  created() {
    this.fetchBook();
    this.getAuthor();
    this.getGenre();
  },

  methods: {
    fetchBook() {
      axios(`/api/books/${this.book_id}`).then((res) => {
        let obj = {};
        obj.id = res.data.id;
        obj.title = res.data.title;
        obj.description = res.data.description;

        this.book_obj = obj;
      });
    },

    getAuthor() {
      axios(`/api/authors_book/${this.book_id}`).then((res) => {
        for (let data of res.data) this.authorData.push(data);
      });
    },

    getGenre() {
      axios(`/api/genres_book/${this.book_id}`).then((res) => {
        for (let data of res.data) this.genreData.push(data);
      });
    },
  },
};
</script>

<style lang="scss" scoped>
.author {
  transition: opacity 0.2s ease-in-out;
  opacity: 0.7;

  &:not(.on-hover) {
    opacity: 1;
  }
}

@media (max-width: 600px) {
  .btn-flex {
    display: flex;
  }
}

@media (max-width: 520px) {
  .genre-row {
    flex-direction: column;
  }
}
</style>