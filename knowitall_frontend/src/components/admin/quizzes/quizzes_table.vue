<script setup>
import QuizTableItem from './quiz_table_item.vue';
import axios from '../../../axios-auth'

import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
function openWindow(tab) {
  emit('openWindow', tab);
}
</script>

<template>
<div class="d-flex justify-content-center"><h3 class="round-font">Quizzes</h3></div>
<div class="btn-group p-4">
    <button type="button" class="btn dropdown-toggle" style="width: 120px;" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="round-font">{{ selectedTopicText }}</span>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#" @click="getQuizzes(null)">All Quizzes</a></li>
        <li v-for="topic in topics" :key="topic.Id"><a class="dropdown-item" href="#" @click="getQuizzes(topic)">{{ topic.topic }}</a></li>
    </ul>
</div>

<button class="btn" @click="openWindow('manage_quiz')">Create new Quiz</button>

<table class="table table-success table-striped">
<thead>
<tr>
    <th scope="col" class="round-font">Name</th>
    <th scope="col" class="round-font">Topic</th>
    <th scope="col" class="round-font">Level</th>
    <th scope="col" class="round-font">Nr questions</th>
    <th scope="col" class="round-font">Nr flags</th>
    <th scope="col" class="round-font">Nr players</th>
    <th scope="col" class="round-font">Last Modified</th>
    <th scope="col" class="round-font">action</th>
</tr>
</thead>
<tbody class="table-group-divider">
<QuizTableItem v-for="quiz in quizzes"
:key="quiz.Id"
:quiz="quiz"
@openWindow="openWindow" />

</tbody>
</table>
</template>

<script>
export default {
    name: 'QuizzesTable',
    data(){
        return{
            quizzes: [],
            topics: [],
            selectedTopic: null,
            getQuizzesURL: ''
        }
    },
    components: {
       QuizTableItem 
    },
    methods: {
        getQuizzes(topic){
            this.selectedTopic = topic;

            if(this.selectedTopic === null){ this.getQuizzesURL = '/quizzes' } else { this.getQuizzesURL = `/quizzes/${topic.Id}`}

            axios.get(this.getQuizzesURL)
            .then(result => this.quizzes = result.data)
            .catch(error => console.log(error))
        }

    },
    mounted(){
        axios.get('/quizzes/topics')
        .then(result => this.topics = result.data)
        .catch(error => console.log(error));

        this.getQuizzes(null);
    },
    computed: {
        selectedTopicText(){
            if (this.selectedTopic === null) {
        return 'All Quizzes';
      } else {
        return this.selectedTopic.topic;
      }
        }
    }
}
</script>

<style>
.btn{
        border-radius: 18px;
        background-color: #B590DA;
        border-color: #A8DF7D;
        border-width: 2px;
        color: #A8DF7D;
        font-size: 18px;

        span{
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }
    }

    .btn:hover, .btn:focus{
        background-color: #A8DF7D;
        border-color: #47008F;
        border-width: 2px;
        color: #47008F;

        span{
            text-shadow: -1px -1px 0 #A8DF7D,
            1px -1px 0 #A8DF7D,
            -1px 1px 0 #A8DF7D,
            1px 1px 0 #A8DF7D !important;
        }

    }

    h3{
        color: #A8DF7D;
        text-shadow: -1px -1px 0 black,
        1px -1px 0 #47008F,
        -1px 1px 0 #47008F,
        1px 1px 0 black !important;
    }

    table{
        thead{
            th{
                color: #47008F !important;
                font-weight: normal;
                text-shadow: -1px -1px 0 #A8DF7D,
                1px -1px 0 #A8DF7D,
                -1px 1px 0 #A8DF7D,
                1px 1px 0 #A8DF7D !important;
            }
        }
    }
</style>