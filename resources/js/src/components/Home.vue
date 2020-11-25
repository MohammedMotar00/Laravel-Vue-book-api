<template>
  <div class="home">
    <header>Welcome to book api</header>

    <div class="dropdown-list">
      <label for="api">choose api:</label>
      <select name="api" id="api" v-model="value" @change="onChange($event)">
        <option value="books">Books</option>
        <option value="authors">Authors</option>
        <option value="genres">Genres</option>
      </select>
    </div>

    <div class="card-container">
      <div v-for="data of dataArr" :key="data.id">
        <div v-if="value == 'books'">
          <Books
            :id="data.id"
            :description="data.description"
            :isbn="data.isbn"
            :title="data.title"
          />
        </div>
        <div v-if="value == 'authors'">
          <Authors
            :id="data.id"
            :name="data.name"
            :biography="data.biography"
          />
        </div>
        <div v-if="value == 'genres'">
          <Genres :id="data.id" :name="data.name" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Books from "./Books_Authors_Genres/Books";
import Authors from "./Books_Authors_Genres/Authors";
import Genres from "./Books_Authors_Genres/Genres";

export default {
  name: "Home",
  components: {
    Books,
    Authors,
    Genres,
  },

  data() {
    return {
      value: localStorage.getItem("value") || "books",

      dataArr: [],
    };
  },

  methods: {
    fetchData(value) {
      axios(`api/${value ?? this.value}`).then((res) => {
        for (let data of res.data) this.dataArr.push(data);
      });
    },

    onChange(e) {
      const value = e.target.value;
      localStorage.setItem("value", e.target.value);
    },
  },

  created() {
    this.fetchData();
  },

  watch: {
    value(value) {
      this.dataArr = [];
      this.fetchData(value);
    },
  },
};
</script>

<style lang="scss" scoped>
.card-container {
  border: 1px solid blue;
  display: grid;
  gap: 20px;
  grid-template-columns: repeat(4, 1fr);
  justify-content: space-between;
  // display: flex;
  // flex-wrap: wrap;
  text-align: center;
}
</style>