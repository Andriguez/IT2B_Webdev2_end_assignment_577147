<script setup>
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);

function openWindow(tab) {
  emit('openWindow', tab);
}
</script>

<template>
<tr>
    <td>20/02/24 at 10:33</td>
    <td>@username</td>
    <td>this is not the right answer to the question asked.. the right answer should have been kjskjsosjbnsbjishujbsi</td>
    <td><a href="#" @click="openWindow('manage_quiz')">quizname</a></td>
    <td>10</td>
    <td>
        <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>solved</option>
            <option>unsolved</option>
        </select>
    </td>
</tr>
</template>

<script>

</script>