<script setup>
import axios from '../../../axios-auth'
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
            <button type="button" class="btn btn-danger" @click="deleteTopic()">Delete</button>
        </div>
    </td>
</tr>
</template>

<script>
export default {
    name: 'TopicTableItem',
    data(){
        return {
            resultMessage: ''
        }
    },
    props: {
        topic: Object
    },
    methods: {
        openWindow(object) {
            this.$emit('openWindow','manage_topic', object);
        },
        deleteTopic(){

            return new Promise((resolve, reject) => {
                axios.delete(`/quizzes/topics/${this.topic.Id}`)
                .then((res) => {
                    if(res.data === true){
                        this.resultMessage = `topic ${this.topic.topic} has been deleted`;
                    } else { this.resultMessage = `topic ${this.topic.topic} has not been deleted`;}
                    alert(this.resultMessage);
                    this.$emit('openWindow', 'topics', null);
                    resolve();
                })
                .catch((error) => reject(error));
            })
        }
    }
}
</script>