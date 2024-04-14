<script setup>
import ManageQuizAnswer from './manage_quiz_answer.vue'
</script>

<template>
    <div class="d-flex flex-nowrap">
        <div class="col-md-6 mb-3 me-3">
        <label for="exampleFormControlTextarea1" class="form-label">Question Text</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" v-if="new_question == false" v-model="question.question" @input="emitUpdateQuestion"></textarea>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" v-else v-model="questionText" @input="emitCreateQuestion"></textarea>

    </div>

    <div class="col-md-6">
        <label class="round-font">ANSWERS</label>
        <ManageQuizAnswer v-for="a in answers"
        :key="a.Id"
        :answer="a"
        @update-answer="updateAnswer(index, $event)"/>

        <ManageQuizAnswer v-for="digit in nr_answers" 
        @create-answer ="createAnswer($event)"
        />

        <div class="input-group">

        </div>

        <label>*select the checkbox of the correct answer</label>
   </div>
    </div>
</template>

<script>
export default {
    name: 'ManageQuizQuestion',
    data(){
        return {
            questionText: '',
            answers: [],
            nr_answers: 0,
            new_answers: [],
            new_question: false,
        };
    },
    props: {
        question: Object
    },
    components: {
        ManageQuizAnswer
    },
    methods: {
        emitUpdateQuestion() {
            
            this.$emit('update-question', this.question.Id);
    },
        updateAnswer(index, updatedAnswer){
            this.$emit('update-answer', updatedAnswer);
        },
        createAnswer(answer){
            this.new_answers.push(answer);
        },
        emitCreateQuestion(){
            let text = this.questionText;
            let answers = this.new_answers;
            let question = {text, answers }
            this.$emit('create-question', question);
        }
    },
    mounted(){
        if(this.question){
            this.questionText = this.question.question;
            this.answers = this.question.answers;
        } else {
            this.nr_answers = 3;
            this.new_question = true;
        }
    }

}
</script>