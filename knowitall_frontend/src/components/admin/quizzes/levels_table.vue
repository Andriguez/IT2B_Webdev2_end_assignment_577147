<script setup>
import LevelTableItem from './level_table_item.vue'
import axios from '../../../axios-auth'

import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
    <div class="d-flex justify-content-center"><h3 class="round-font">Levels</h3></div>

<button class="btn m-3" @click="openWindow('manage_level',null)">Create new Level</button>

<table class="table table-success table-striped">
<thead>
<tr>
    <th scope="col" class="round-font">Name</th>
    <th scope="col" class="round-font">Nr quizzes</th>
    <th scope="col" class="round-font">action</th>

</tr>
</thead>
<tbody class="table-group-divider">
<LevelTableItem v-for="level in levels"
:key="level.Id"
:level="level"
@openWindow="openWindow" />

</tbody>
</table>
</template>

<script>
export default {
name: 'LevelsTable',
data(){
  return {
    levels: []
  };
},
components: {
  LevelTableItem
},
methods: {
  openWindow(tab, object) {
  this.$emit('openWindow', tab, object);
}
},
mounted(){
  axios.get('/quizzes/levels')
  .then(result => this.levels = result.data)
  .catch(error => console.log(error))
}
}
</script>