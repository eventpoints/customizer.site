<!-- src/components/AppLayout.vue -->

<template>
  <div class="app-layout">
    <div class="row justify-content-between g-0">
      <aside class="col-12 col-md-3 vh-100 border-end overflow-x-hidden overflow-y-scroll">
        <slot name="sidebar"></slot>
      </aside>
      <main class="col-12 col-md-9 vh-100 border-end overflow-x-hidden overflow-y-scroll">
        <slot name="main"></slot>
      </main>
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";

export default {
  name: 'AppLayout',
  components: {Navbar},
};
</script>

<style scoped>
</style>
