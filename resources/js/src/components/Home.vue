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

    <div v-for="data of dataArr" :key="data.id">
      <p>id: {{ data.id }}</p>
      <p>description: {{ data.description }}</p>
      <p>title: {{ data.title }}</p>
      <p>isbn: {{ data.isbn }}</p>
      <hr />
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

      dataArr: [],
    };
  },

  methods: {
    fetchData(value) {
      axios(`api/${value ?? this.value}`).then((res) => {
        for (let data of res.data) this.dataArr.push(data);
      });
    },
  },

  created() {
    this.fetchData();
  },

  watch: {
    // this.fetchData();
    value(value) {
      this.dataArr = [];
      this.fetchData(value);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>