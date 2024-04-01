<script setup>
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);

function openWindow(tab) {
  emit('openWindow', tab);
}
</script>

<template>
<tr v-bind="quiz">
    <td>{{ quiz.name }}</td>
    <td>{{ quiz.topic }}</td>
    <td>{{ quiz.level }}</td>
    <td>{{ quiz.nr_questions }}</td>
    <td>{{ quiz.nr_flags }}</td>
    <td>{{ quiz.nr_players }}</td>
    <td>{{ quiz.mod_date }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="buttons">
            <button class="btn" @click="openWindow('manage_quiz')">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </div>
    </td>
</tr>
</template>

<script>
export default {
    name: 'QuizTableItem',
    props: {
        quiz: Object
    }
}
</script>