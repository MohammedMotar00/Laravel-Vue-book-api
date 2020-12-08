<template>
  <div>
    <v-toolbar flat>
      <v-spacer></v-spacer>

      <v-toolbar-title class="text-uppercase">
        <v-card flat text :to="{ name: 'Home' }">
          <span class="green--text">Book</span>
          <span class="blue--text">API</span>
        </v-card>
      </v-toolbar-title>

      <v-spacer></v-spacer>
    </v-toolbar>
  </div>
</template>

<script>
export default {
  name: "Header",
  data: () => ({
    items: ["books", "authors", "genres"],
    value: localStorage.getItem("APIvalue") || "books",
    dataArr: [],
  }),

  methods: {
    onChange(value) {
      localStorage.setItem("APIvalue", value);
    },
  },
};
</script>

<style lang="scss" scoped>
.home {
  cursor: pointer;
}
</style>