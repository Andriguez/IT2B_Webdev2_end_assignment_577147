<template>
    <div id="question-container" class="d-flex justify-content-center">
        <span class="round-font" id="question">{{ question.question }}</span>
</div>
</template>

<script>
export default {
    name: 'Question',
    props: {
        question: Object
    }
}
</script>

<style>
#question-container{
        max-width: 600px;
        margin: 2px auto 20px auto;
        justify-content: center;
        text-align: center;
        

        #question{
            font-size: 25px;
            color: #47008F;
            text-shadow: -1px -1px 0 #B590DA,
            1px -1px 0 #B590DA,
            -1px 1px 0 #B590DA,
            1px 1px 0 #B590DA !important;
        }
    }
</style>