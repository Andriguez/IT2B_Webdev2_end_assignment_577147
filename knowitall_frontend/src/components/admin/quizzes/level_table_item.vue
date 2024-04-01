<script setup>
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);

function openWindow(tab) {
  emit('openWindow', tab);
}
</script>

<template>
<tr>
    <td>{{ level.level }}</td>
    <td>{{ level.nr_quizzes }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="buttons">
            <button type="button" class="btn btn-primary" @click="openWindow('manage_level')">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </div>
    </td>
</tr>
</template>

<script>
export default {
    name: 'LevelTableItem',
    props: {
        level: Object
    }
}
</script>