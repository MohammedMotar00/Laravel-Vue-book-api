<template>
  <div class="book">
    <div class="book-container">
      <div class="single-book" :id="book_obj.id">
        <h2>{{ book_obj.title }}</h2>
      </div>
      <div class="description">
        <h2>Description:</h2>
        <p>{{ book_obj.description }}</p>
      </div>
    </div>

    <hr />
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
    };
  },

  created() {
    this.fetchBook();
    console.log(this.book_obj);
    // console.log(JSON.parse(JSON.stringify(this.book_obj.data)));
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
  },
};
</script>

<style lang="scss" scoped>
.book {
  border: 1px solid blue;

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