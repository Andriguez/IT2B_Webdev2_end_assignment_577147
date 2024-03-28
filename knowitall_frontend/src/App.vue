<script>
import { RouterLink, RouterView } from 'vue-router'
import Navigation from './components/navbar.vue'
import PageFooter from '@/components/footer.vue'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import { defineStore } from 'pinia';

export default {
  name: 'App',
  components: {
    Navigation,
    PageFooter
  },
};
</script>

<template>
  <Navigation />
  <RouterView />
  <PageFooter />
</template>

<style scoped>

</style>