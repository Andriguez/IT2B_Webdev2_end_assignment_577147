<script setup>
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);

function openWindow(tab) {
  emit('openWindow', tab);
}
</script>

<template>
<tr>
    <td>quiz name</td>
    <td>topic</td>
    <td>level</td>
    <td>10</td>
    <td>2</td>
    <td>96</td>
    <td>
        <div class="btn-group" role="group" aria-label="buttons">
            <button class="btn" @click="openWindow('manage_quiz')">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </div>
    </td>
</tr>
</template>

<script>

</script>