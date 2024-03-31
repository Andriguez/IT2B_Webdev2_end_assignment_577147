<script setup>
import Answer from './manage_quiz_answer.vue'
</script>

<template>
    <div class="d-flex flex-nowrap">
        <div class="col-md-6 mb-3 me-3">
        <label for="exampleFormControlTextarea1" class="form-label">Question Text</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
    </div>

    <div class="col-md-6">
        <label class="round-font">ANSWERS</label>
        <Answer />
        <Answer />
        <Answer />
        <div class="input-group">

        </div>

        <label>*select the checkbox of the correct answer</label>
   </div>
    </div>
</template>