<script setup>
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
<div class="d-flex justify-content-center"><h3 class="round-font">Topics</h3></div>
<div class="container">
<form class="row g-3">
    <div class="col-md-4">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName" v-model="topicName">
    </div>
    </form>
    <div class="col-12 my-4">
        <button class="btn" @click="editTopic" v-if="topic !== null">Save</button>
        <button class="btn" @click="createTopic" v-else>Create New</button>
    </div>
    </div>
</template>

<script>
import axios from '../../../../axios-auth'

export default {
    name: 'ManageTopic',
    data(){
        return {
            topicName: '',
        };
    },
    props: {
        topic: Object
    },
    methods: {
        createTopic() {
            return new Promise((resolve, reject) => {
                axios.post('/quizzes/topics',{
                    topicname: this.topicName
                })
            .then((res)=>{
                const message = `new topic ${res.data.topic} has been created.`;
                alert(message);
                resolve();
                this.$emit('openWindow', 'topics', null);
            })
            .catch((error) => reject(error));
        })
    },
        editTopic() {
            return new Promise((resolve, reject) => {
                axios.put(`/quizzes/topics/${this.topic.Id}`,{
                topicname: this.topicName})
                .then((res) => {
                    const message = `topic name has been changed to ${res.data.topic}`;
                    alert(message);
                    resolve();
                })
                .catch((error) => reject(error));
                this.$emit('openWindow', 'topics', null);
            })
        }
    },
    mounted(){
        if(this.topic !== null){
            this.topicName = this.topic.topic;
        }
    }
}
</script>