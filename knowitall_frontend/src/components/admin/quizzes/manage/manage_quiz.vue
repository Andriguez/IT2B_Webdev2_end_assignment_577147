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
        <input type="text" class="form-control" id="inputName" v-model="quizObject.name" @input="updateQuizInfo">
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label" >Topic</label>
        <select id="inputState" class="form-select" v-model="quizObject.topic" @change="updateQuizInfo">
            <option v-for="topic in topics" :value="topic">{{ topic.topic }}</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label">Level</label>
        <select id="inputState" class="form-select" v-model="quizObject.level" @change="updateQuizInfo">
            <option v-for="level in levels" :value="level">{{ level.level }}</option>
        </select>
    </div>


    <div class="col-md-2">
    <label for="quantity" class="form-label">Nr questions</label>
    <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="20" v-model="quizObject.nr_questions" @change="updateQuizInfo">
    </div>

    <div class="d-flex justify-content-center"><h5 class="round-font">QUESTIONS</h5></div>

        <ManageQuizQuestion v-for="q in quizObject.questions"
        :key="q.Id"
        :question="q"
        @update-question="updateQuestion(index, $event)"
        @update-answer="updateAnswer(index, $event)"
        />

</form>
<div class="col-12 my-4">
        <button class="btn" @click="editQuiz">Save</button>
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
            levels: [],
            questions: {},
            answers: {},
            updatedQuestions: [],
            updatedAnswers: [],
            updatedQuizInfo: false
        };
    },
    props: {
        quiz: Number
    },
    components:{
        ManageQuizQuestion
    },
    methods: {
        updateQuestion(index, updatedQuestion) {
            const isDuplicate = this.updatedQuestions.includes(updatedQuestion);

            if(!isDuplicate){
                this.updatedQuestions.push(updatedQuestion) ;
            }
    },
    updateAnswer(index, updatedAnswer) {
        const isDuplicate = this.updatedAnswers.includes(updatedAnswer);

            if(!isDuplicate){
                this.updatedAnswers.push(updatedAnswer);
            }
      console.log(this.updatedAnswers);

    },
    updateQuizInfo(){
        this.updatedQuizInfo = true;
        console.log(this.updatedQuizInfo)
    },
    editQuiz(){
        if (this.updateQuizInfo){
            this.editQuizInfo();
        }

        if (this.updatedQuestions.length > 0){
            this.updatedQuestions.forEach(questionId => {
                this.editQuestions(this.questions[questionId]);
            });
        }

        if (this.updatedAnswers.length > 0){
            this.updatedAnswers.forEach(answerId => {
                this.editAnswers(this.answers[answerId]);
            });
        }

        //this.$emit('openWindow', 'quizzes', null);

    },

    editQuizInfo(){
        return new Promise((resolve, reject) => {
                axios.put(`/quiz/${this.quizObject.Id}`,{
                    name: this.quizObject.name,
                    topic: this.quizObject.topic.Id,
                    level: this.quizObject.level.Id
                })
                .then((res) => {
                    resolve();
                    console.log(res.data);
                })
                .catch((error) => reject(error));
            })
    },
    editQuestions(question){
        return new Promise((resolve, reject) => {
                axios.put(`/quiz/questions/${question.Id}`,{
                    question: question.question})
                .then((res) => {
                    resolve();
                    console.log(res.data)
                })
                .catch((error) => reject(error));
            })
    },
    editAnswers(answer){
        return new Promise((resolve, reject) => {
                axios.put(`/quiz/answers/${answer.Id}`,{
                    answer: answer.answer,
                    isCorrect: answer.isCorrect ? 1: 0
                })
                .then((res) => {
                    resolve();
                    console.log(res.data)
                })
                .catch((error) => reject(error));
            })
    },
    createQUiz(){

    }
    },
    mounted(){
        axios.get(`/quiz/${this.quiz}`)
        .then(result => { this.quizObject = result.data;
            this.quizObject.questions.forEach(q => {
                this.questions[q.Id] = q;
                
                q.answers.forEach(a => {
                    this.answers[a.Id] = a;
                })
            });
            console.log(this.questions);
            console.log(this.answers); 

        })
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

