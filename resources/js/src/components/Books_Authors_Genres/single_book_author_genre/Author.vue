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
  border: 1px solid #ccc;
  display: inline-flex;
  flex-direction: column;

  width: 200px;
  cursor: pointer;
}
</style>