<script setup>
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);

function openWindow(tab) {
  emit('openWindow', tab);
}
</script>

<template>
<tr>
    <td>{{ user.name }}</td>
    <td>{{ user.username }}</td>
    <td>{{ user.type.type_name }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="buttons">
            <button type="button" class="btn btn-primary" @click="openWindow('manage_user')">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </div>
    </td>
</tr>
</template>

<script>
export default {
    name: 'UserTableItem',
    props:{
        user: Object
    }
}

</script>