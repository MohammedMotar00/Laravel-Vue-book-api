<template>
  <div>
    <v-toolbar flat>
      <v-app-bar-nav-icon
        @click="drawer = !drawer"
        class="grey--text"
      ></v-app-bar-nav-icon>

      <v-toolbar-title class="text-uppercase grey--text">
        <span class="font-weight-light">Todo</span>
        <span>Ninja</span>
      </v-toolbar-title>
    </v-toolbar>
  </div>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style lang="scss" scoped>
</style>