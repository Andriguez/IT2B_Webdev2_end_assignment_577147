<script setup>
import ManageQuizAnswer from './manage_quiz_answer.vue'
</script>

<template>
    <div class="d-flex flex-nowrap">
        <div class="col-md-6 mb-3 me-3">
        <label for="exampleFormControlTextarea1" class="form-label">Question Text</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" v-model="question.question"></textarea>
    </div>

    <div class="col-md-6">
        <label class="round-font">ANSWERS</label>
        <ManageQuizAnswer v-for="a in question.answers"
        :key="a.Id"
        :answer="a"/>
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
        };
    },
    props: {
        question: Object
    },
    components: {
        ManageQuizAnswer
    },
    methods: {

    }

}
</script>