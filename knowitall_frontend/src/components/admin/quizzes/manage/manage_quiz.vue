<script setup>
import ManageQuizQuestion from './manage_quiz_question.vue'
import axios from '../../../../axios-auth'
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
    <div class="d-flex justify-content-center"><h3 class="round-font">Quizzes</h3></div>
<div class="container">
<form class="row g-3">
    <div class="col-md-6">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName" v-model="quizObject.name">
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label" >Topic</label>
        <select id="inputState" class="form-select" v-model="quizObject.topic">
            <option v-for="topic in topics" :value="topic">{{ topic.topic }}</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label">Level</label>
        <select id="inputState" class="form-select" v-model="quizObject.level">
            <option v-for="level in levels" :value="level">{{ level.level }}</option>
        </select>
    </div>


    <div class="col-md-2">
    <label for="quantity" class="form-label">Nr questions</label>
    <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="20" v-model="quizObject.nr_questions">
    </div>

    <div class="d-flex justify-content-center"><h5 class="round-font">QUESTIONS</h5></div>

        <ManageQuizQuestion v-for="q in quizObject.questions"
        :key="q.Id"
        :question="q"/>

</form>
<div class="col-12 my-4">
        <button class="btn">Save</button>
    </div>
</div>
</template>

<script>
export default {
    name: 'ManageQuiz',
    data(){
        return {
            quizObject: '',
            topics: [],
            levels: []
        };
    },
    props: {
        quiz: Number
    },
    components:{
        ManageQuizQuestion
    },
    methods: {

    },
    mounted(){
        axios.get(`/quiz/${this.quiz}`)
        .then(result => this.quizObject = result.data)
        .catch(error => console.log(error));

        axios.get('/quizzes/topics')
        .then(result => this.topics = result.data)
        .catch(error => console.log(error));

        axios.get('/quizzes/levels')
        .then(result => this.levels = result.data)
        .catch(error => console.log(error));
    }
}
</script>

