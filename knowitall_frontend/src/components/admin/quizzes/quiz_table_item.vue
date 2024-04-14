<script setup>
import axios from '../../../axios-auth'
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
<tr>
    <td>{{ quiz.name }}</td>
    <td>{{ quiz.topic }}</td>
    <td>{{ quiz.level }}</td>
    <td>{{ quiz.nr_questions }}</td>
    <td>{{ quiz.nr_flags }}</td>
    <td>{{ quiz.nr_players }}</td>
    <td>{{ quiz.mod_date }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="buttons">
            <button class="btn" @click="openWindow(quiz.Id)">Edit</button>
            <button type="button" class="btn btn-danger" @click="deleteQuiz">Delete</button>
        </div>
    </td>
</tr>
</template>

<script>
export default {
    name: 'QuizTableItem',
    props: {
        quiz: Object
    },
    methods: {
        openWindow(object) {
            this.$emit('openWindow','manage_quiz', object);
        },
        deleteQuiz(){
            return new Promise((resolve, reject) => {
                axios.delete(`/quiz/${this.quiz.Id}`)
                .then((res) => {
                    resolve();
                    if(res.data === true){
                        this.resultMessage = `quiz ${this.quiz.name} has been deleted`;
                    } else { this.resultMessage = `level ${this.quiz.name} has not been deleted`;}
                    alert(this.resultMessage);
                    this.$emit('openWindow', 'quizzes', null);
                })
                .catch((error) => reject(error));
            })
        }
    }
}
</script>