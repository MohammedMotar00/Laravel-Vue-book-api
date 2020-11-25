<template>
  <v-app>
    <Header />
    <v-btn color="success">text</v-btn>

    <v-main class="mx-4 mb-4">
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
import Header from "./components/Header";

export default {
  name: "App",
  components: { Header },
};
</script>

<style lang="scss">
h2 {
  font-size: 18px;
}

a {
  color: black;
  text-decoration: none;
}
</style>