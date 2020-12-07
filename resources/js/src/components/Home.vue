<template>
  <div class="home">
    <!-- Dropdown menu -->
    <v-row class="d-flex justify-end">
      <v-col class="mt-3" sm="4" cols="5">
        <v-select
          :items="items"
          item-value="api"
          item-text="api"
          label="Choose API"
          v-model="value"
          @change="onChange($event)"
        ></v-select>
      </v-col>
    </v-row>
    <!-- End of Dropdown menu -->

    <v-container fluid>
      <v-card class="red">
        <v-row class="flex-wrap">
          <v-col
            v-for="data of dataArr"
            :key="data.id"
            cols="6"
            sm="4"
            md="3"
            lg="2"
          >
            <Books
              :id="data.id"
              :description="data.description"
              :isbn="data.isbn"
              :title="data.title"
            />
          </v-col>

          <v-col v-if="value == 'authors'" cols="5" sm="2">
            <Authors
              :id="data.id"
              :name="data.name"
              :biography="data.biography"
            />
          </v-col>

          <v-col v-if="value == 'genres'" cols="5" sm="2">
            <Genres :id="data.id" :name="data.name" />
          </v-col>
        </v-row>
      </v-card>
    </v-container>

    <!-- <div class="card-container">
      <v-container>
        <v-card class="d-flex">
          <v-row class="flex-wrap">
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
          </v-row>
        </v-card>
      </v-container>
    </div> -->

    <!-- <v-container>
      <div></div>
      <v-card>
        <v-row>
          <v-col>
            <Books
              :id="data.id"
              :description="data.description"
              :isbn="data.isbn"
              :title="data.title"
            />
          </v-col>
        </v-row>
      </v-card>
    </v-container> -->
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

  data: () => ({
    items: [{ api: "books" }, { api: "authors" }, { api: "genres" }],
    value: localStorage.getItem("APIvalue") || "books",
    dataArr: [],
  }),

  methods: {
    fetchData(value) {
      axios(`api/${value}`).then((res) => {
        for (let data of res.data) this.dataArr.push(data);
        console.log(res.data);
      });
    },

    onChange(value) {
      localStorage.setItem("APIvalue", value);
    },
  },

  created() {
    this.fetchData(this.value);
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
  // display: grid;
  // gap: 20px;
  // grid-template-columns: repeat(4, 1fr);
  // justify-content: space-between;
  // display: flex;
  // flex-wrap: wrap;
  // text-align: center;
}
</style>