<template>
  <div>
    <h1>Home Component</h1>
    <router-link to="/list">go to list</router-link>
  </div>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style lang="scss" scoped>
h1 {
  color: red;
}
</style>