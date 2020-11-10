<template>
  <div class="book">
    <div class="book-container">
      <div class="single-book" :key="book_obj.id">
        <h2>{{ book_obj.title }}</h2>
        <h2>id:{{ book_obj.id }}</h2>
      </div>
      <div class="description">
        <h2>Description:</h2>
        <p>{{ book_obj.description }}</p>
      </div>
    </div>

    <hr />

    <div>
      <h1>Author:</h1>
      <div v-for="data in authorData" :key="data.id" class="author">
        <h2>{{ data.name }}</h2>
        <p>{{ data.biography }}</p>
      </div>
    </div>

    <div>
      <h1>Genres:</h1>
      <div v-for="data in genreData" :key="data.id" class="author">
        <h2>{{ data.name }}</h2>
      </div>
    </div>
  </div>
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
.book {
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

  .author {
    border: 1px solid;
    max-width: 400px;
    max-height: 300px;
  }
}
</style>