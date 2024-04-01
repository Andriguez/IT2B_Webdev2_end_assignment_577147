<script setup>
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);

function openWindow(tab) {
  emit('openWindow', tab);
}
</script>

<template>
<tr>
    <td>{{ topic.topic }}</td>
    <td>{{ topic.nr_quizzes }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="buttons">
            <button type="button" class="btn btn-primary" @click="openWindow('manage_topic')">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </div>
    </td>
</tr>
</template>

<script>
export default {
    name: 'TopicTableItem',
    props: {
        topic: Object
    }
}
</script>