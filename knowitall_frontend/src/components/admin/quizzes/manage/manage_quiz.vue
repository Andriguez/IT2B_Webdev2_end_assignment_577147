<script setup>
import Question from './manage_quiz_question.vue'
</script>

<template>
    <div class="d-flex justify-content-center"><h3 class="round-font">Quizzes</h3></div>
<div class="container">
<form class="row g-3">
    <div class="col-md-6">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName">
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label">Topic</label>
        <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label">Level</label>
        <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
        </select>
    </div>


    <div class="col-md-2">
    <label for="quantity" class="form-label">Nr questions</label>
    <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="20">
    </div>

    <div class="d-flex justify-content-center"><h5 class="round-font">QUESTIONS</h5></div>

        <Question />
        <Question />
        <Question />

    <div class="col-12 mb-4">
        <button type="submit" class="btn">Save</button>
    </div>
</form>
</div>
</template>

