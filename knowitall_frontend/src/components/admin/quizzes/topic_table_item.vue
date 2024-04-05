<script setup>
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
<tr>
    <td>{{ topic.topic }}</td>
    <td>{{ topic.nr_quizzes }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="buttons">
            <button type="button" class="btn btn-primary" @click="openWindow(topic)">Edit</button>
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
    },
    methods: {
        openWindow(object) {
            this.$emit('openWindow','manage_topic', object);
        }
    }
}
</script>