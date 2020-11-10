<template>
  <div class="genre">
    <div class="genre-container" :key="genre_obj.id">
      <h1>{{ genre_obj.name }}</h1>
    </div>

    <hr />

    <div class="books">
      <h1>Books:</h1>
      <div v-for="data in books_data" :key="data.id" class="book-container">
        <router-link :to="{ name: 'Book', params: { book_id: data.id } }">
          <h2>{{ data.title }}</h2>
          <p>{{ data.description.substring(0, 120) + "..." }}</p>
        </router-link>
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
    margin-top: 30px;
    border: 1px solid #ccc;
    display: inline-flex;
    flex-direction: column;

    width: 200px;
    cursor: pointer;
  }
}
</style>