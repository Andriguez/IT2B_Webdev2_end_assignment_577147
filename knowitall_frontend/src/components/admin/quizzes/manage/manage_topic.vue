<script setup>
import { defineEmits, resolveDirective } from 'vue';
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
    <div class="col-12 mb-4" v-if="topic !== null">
        <button type="submit" class="btn" @click="editTopic">Save</button>
    </div>
    <div class="col-12 mb-4" v-else>
        <button type="submit" class="btn" @click="createTopic">Create New</button>
    </div>
    </form>
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
                newTopicId = res.data.topic.Id;
                newTopicName = res.data.topic.topic;
                message = `new topic ${newTopicName} has been created.`;
                alert(message);
                resolve();
            })
            .catch((error) => reject(error));
        })
    },
        editTopic() {
            return new Promise((resolve, reject) => {
                axios.put(`/quizzes/topics/${this.topic.Id}`,{
                topicname: this.topicName})
                .then((res) => {
                    newTopicName = res.data.topic.topic;
                    message = `topic name has been changed to ${newTopicName}`;
                    alert(message);
                    resolve();
                })
                .catch((error) => reject(error));
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