<template>
  <div>
    <v-toolbar flat>
      <v-app-bar-nav-icon
        @click="drawer = !drawer"
        class="blue--text d-sm-none"
      ></v-app-bar-nav-icon>

      <v-spacer></v-spacer>

      <v-toolbar-title class="text-uppercase">
        <span class="green--text">Book</span>
        <span class="blue--text">API</span>
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
</style>