<script setup>
import Question from './question.vue';
import Answer from './answer.vue';
import Result from './result.vue';
import Timer from './timer.vue'
import axios from '../../axios-auth'
</script>
<template>
<main>
    <div id="timer-container" class="px-4 py-2">
        <Timer />
    </div>

        <Question v-if="currentQuestion" :question="currentQuestion" />
    
    <div id="answers-container" class="container d-flex flex-wrap justify-content-center">
        <Answer v-for="(answer, index) in currentAnswers" :key="index" :answer="answer" @next-question="nextQuestion()"/>
    </div>
</main>
</template>

<script>
export default {
    data(){
        return {
            quizObject: {},
            currentIndex: 0,
            userAnswers: [],
            questions: {},
            answers: {}
        };
    },
    props: {
        quizId: {
            type: String,
            required: true
        }
    },
    components: {
        Timer,
        Question,
        Answer
    },
    methods: {
        nextQuestion() {
      if (this.currentIndex < this.questions.length - 1) {
        this.currentIndex++;
      }
    },
    },
    computed: {
        currentQuestion(){
            return this.questions[this.currentIndex]
        },
        currentAnswers(){
            return this.currentQuestion ? this.currentQuestion.answers : [];
        }
    },
    mounted(){
        axios.get(`/quiz/${this.quizId}`)
        .then(result => {
            this.quizObject = result.data;
            this.questions = result.data.questions;
            //console.log(this.quizObject)
        })
        .catch(error => console.log(error));    
    }}

</script>

<style>
#timer-container {
        display: flex;
        justify-content: right;

        span {
            font-size: 30px;
            color: #A8DF7D;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }
    }

    #answer-container{
        padding: 20px;
    }
</style>