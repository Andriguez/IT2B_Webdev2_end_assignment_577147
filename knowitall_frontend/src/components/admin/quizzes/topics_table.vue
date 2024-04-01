<script setup>
import TopicTableItem from './topic_table_item.vue'
import axios from '../../../axios-auth'

import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
function openWindow(tab) {
  emit('openWindow', tab);
}
</script>

<template>
 <div class="d-flex justify-content-center"><h3 class="round-font">Topics</h3></div>

<button class="btn m-3" @click="openWindow('manage_topic')">Create new Topic</button>

<table class="table table-success table-striped">
<thead>
<tr>
    <th scope="col" class="round-font">Name</th>
    <th scope="col" class="round-font">Nr quizzes</th>
    <th scope="col" class="round-font">action</th>

</tr>
</thead>
<tbody class="table-group-divider">
<TopicTableItem v-for="topic in topics"
:key="topic.Id"
:topic="topic"
 @openWindow="openWindow" />

</tbody>
</table>
</template>

<script>
export default {
name: 'TopicsTable',
data(){
  return {
    topics: []
  };
},
components: {
  TopicTableItem
},
mounted(){
  axios.get('/quizzes/topics')
  .then(result => this.topics = result.data)
  .catch(error => console.log(error))
}
}
</script>