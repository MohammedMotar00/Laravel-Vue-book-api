<template>
  <div class="author">
    <div class="author-container" :key="author_obj.id">
      <div class="author-name">
        <h2>{{ author_obj.name }}</h2>
      </div>
      <div class="author-biography">
        <p>{{ author_obj.biography }}</p>
      </div>
    </div>

    <hr />

    <div>
      <h1>Books:</h1>
      <div v-for="data in bookData" :key="data.id" class="book-container">
        <div class="title">
          <h2>{{ data.title }}</h2>
        </div>
        <div class="description">
          <p>{{ data.description }}</p>
        </div>
      </div>
    </div>
  </div>
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
.book-container {
  margin-top: 30px;
  .title {
    border: 1px solid;
    max-width: 400px;
    max-height: 300px;
  }

  .description {
    border: 1px solid green;
  }
}
</style>