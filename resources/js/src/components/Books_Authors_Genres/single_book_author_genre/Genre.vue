<template>
  <div class="genre">
    <div class="genre-container" :key="genre_obj.id">
      <h1>{{ genre_obj.name }}</h1>
    </div>

    <hr />

    <div class="books">
      <div v-for="data in books_data" :key="data.id" class="book-container">
        <div class="single-book">
          <h2>{{ data.title }}</h2>
        </div>
        <div class="description">
          <h2>Description:</h2>
          <p>{{ data.description }}</p>
        </div>
      </div>
    </div>
  </div>
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
.books {
  .book-container {
    border: 1px solid red;

    .single-book {
      border: 1px solid;
      width: 200px;
      height: 300px;
    }

    .description {
      border: 1px solid green;
    }
  }
}
</style>