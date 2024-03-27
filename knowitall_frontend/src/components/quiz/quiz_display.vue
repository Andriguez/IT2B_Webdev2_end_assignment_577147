<script setup>
import Question from './question.vue';
import Answer from './answer.vue';
import Result from './result.vue';
</script>
<template>
<main>
    <div id="timer-container" class="px-4 py-2">
            <span id="timer" class="round-font">01:38</span>
    </div>

        <Question />
    
    <div id="answers-container" class="container d-flex flex-wrap justify-content-center">
        <Answer />
        <Answer />
        <Answer />
    </div>
</main>
</template>

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