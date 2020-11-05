<template>
  <div class="home">
    <header>Welcome to book api</header>
    <div class="dropdown-list">
      <label for="api">choose api:</label>
      <select name="api" id="api" v-model="value">
        <option value="books">Books</option>
        <option value="authors">Authors</option>
        <option value="genres">Genres</option>
      </select>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Home",

  data() {
    return {
      value: "books",
    };
  },

  methods: {
    fetchData() {
      axios(`api/${this.value}`).then((res) => console.log(res));
    },
  },

  created() {
    this.fetchData();
  },

  updated() {
    this.fetchData();
  },
};
</script>

<style lang="scss" scoped>
</style>