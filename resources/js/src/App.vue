<template>
  <v-app>
    <Header />

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
@media (max-width: 1100px) {
  h2 {
    font-size: 20px;
  }
}

@media (max-width: 680px) {
  h2 {
    font-size: 18px;
  }
}
</style>