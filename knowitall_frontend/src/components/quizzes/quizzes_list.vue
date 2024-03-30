<script setup>
import QuizItem from './quiz_item.vue'
import axios from '../../axios-auth'
</script>

<template>
    <main>
        <div class="btn-group p-4">
        <button type="button" class="btn dropdown-toggle" style="width: 120px;" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="round-font">{{ selectedTopicName }}</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" @click="getQuizzes(null)">All topics</a></li>
            <li v-for="topic in topics" :key="topic.Id">
                <a class="dropdown-item" href="#" @click="getQuizzes(topic)">{{topic.topic}}</a>
            </li>
        </ul>
    </div>
    
    <div class="container d-flex flex-wrap justify-content-center">
        <QuizItem v-for="quiz in quizzes"
        :key="quiz.Id"
        :quiz="quiz"
        />
    </div>

    </main>
</template>

<script>
export default {
    name: 'QuizzesList',
    components: {
        QuizItem
    },
    data(){
        return {
            quizzes: [],
            topics: [],
            selectedTopic: null,
            quizzesUrl: ''
        };
    },
    mounted(){
        axios.get(`/quizzes/topics`)
        .then(result => this.topics = result.data)
        .catch(error => console.log(error));

        this.getQuizzes(null);

    },
    computed: {
        selectedTopicName() {
      return this.selectedTopic ? this.selectedTopic.topic : 'All topics';
    }
    },
    methods: {
    getQuizzes(topic){
        this.selectedTopic = topic;

        if (this.selectedTopic === null){ this.quizzesUrl = '/quizzes'} else {this.quizzesUrl = `/quizzes/${topic.Id}`}

      axios.get(this.quizzesUrl)
        .then(result => {this.quizzes = result.data;
        console.log(result.data)})
        .catch(error => console.log(error))

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
</style>