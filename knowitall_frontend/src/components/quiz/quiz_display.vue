<script setup>
import Question from './question.vue';
import Answer from './answer.vue';
import Result from './result.vue';
import Timer from './timer.vue'
import axios from '../../axios-auth'
//import { ref } from 'vue';

</script>
<template>
<main>
    <div id="timer-container" class="px-4 py-2">
        <Timer ref="timerComponent" />
    </div>

        <Question v-if="currentQuestion" :question="currentQuestion" />
    
    <div id="answers-container" class="container d-flex flex-wrap justify-content-center">
        <Answer v-for="(answer, index) in currentAnswers" :key="index" :answer="answer" @answer-selected="handleAnswerSelected(answer)"/>
    </div>
</main>
<Result :results="setResults()" v-if="displayResults" @stop-timer="stopTimer()"/>
</template>

<script>
export default {
    data(){
        return {
            quizObject: {},
            currentIndex: 0,
            userAnswers: [],
            questions: {},
            answers: {},
            selectedAnswer: null,
            //results: {},
            displayResults: false,
            timer: 0
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
        Answer,
        Result
    },
    methods: {
        nextQuestion() {
      if (this.currentIndex < this.questions.length - 1) {
        this.currentIndex++;
        this.selectedAnswer = null;
      } else {
        this.displayResults = true;
      }
    },
    setResults(){
        let nr_correct_answers = 0;
        this.userAnswers.forEach( ans => {
            if(ans.isCorrect){
                nr_correct_answers++;
            }
        });
        let uAnswers = this.userAnswers;
        let timer = this.timer;

        return this.results = {nr_correct_answers, uAnswers, timer};
    },
    handleAnswerSelected(answer){
        if (this.selectedAnswer) return;

        this.selectedAnswer = answer;
        this.selectedAnswer.class = 'selected-answer'

        setTimeout(() => {
            this.currentAnswers.forEach(ans => {
        if (ans.isCorrect) {
          ans.explain = ans.explanation;
        }
      });        
        if (this.selectedAnswer.isCorrect) {
        this.selectedAnswer.class = 'correct-answer';
      } else {
        this.selectedAnswer.class = 'wrong-answer';

        this.currentAnswers.forEach(ans => {
        if (ans.isCorrect) {
          ans.class = 'wrong-correct-answer';
        }
      });
      } }, 2000);
        
        this.userAnswers.push(this.selectedAnswer);

        this.$emit('answer-selected', this.selectedAnswer);

        setTimeout(() => { this.nextQuestion(); }, 5000);
    },
    stopTimer(){
        this.timer = this.$refs.timerComponent.stopTimer();
        //this.timer = this.$refs.timerComponent.timerValue;
        console.log(this.timer);
    }
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