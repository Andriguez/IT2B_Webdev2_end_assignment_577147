<template>
<button class="answer selected-answer" @click="emitNextQuestion()"><span class="round-font">{{ answer.answer }}</span></button>
</template>

<script>
export default {
    name: 'Answer',
    props: {
        answer: Object
    },
    methods: {
        emitNextQuestion(){
            this.$emit('next-question');
        }
    }
}
</script>

<style>
 .answer{
            padding: 7px;
            margin: 5px;
            background-color: #B590DA;
            border: solid 3px #47008F;
            border-radius: 16px;
            height: 250px;
            width: 300px;

            font-size: 22px;
            color: #D6C8E4;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }
         .selected-answer{
             border: solid 6px #47008F;
             background-color: #A66EDF;
         }

        .answer:hover{
            border: solid 4px #47008F;
        }

        .correct-answer{
            border: solid 6px #458315;
            background-color: #A8DF7D;

            span{
                color: #C6E3B0;
                text-shadow: -1px -1px 0 #306407,
                1px -1px 0 #306407,
                -1px 1px 0 #306407,
                1px 1px 0 #306407 !important;
            }
        }

        .wrong-correct-answer{
            border: solid 3px #47008F;
            background-color: #BDDAA6;

            span{
                color: #A8DF7D;

                text-shadow: -1px -1px 0 #306407,
                1px -1px 0 #306407,
                -1px 1px 0 #306407,
                1px 1px 0 #306407 !important;
            }
        }

        .wrong-answer{
            border: solid 6px #860A18;
            background-color: #D96976;

            span{
                color: #DE8590;
                text-shadow: -1px -1px 0 #6B0511,
                1px -1px 0 #6B0511,
                -1px 1px 0 #6B0511,
                1px 1px 0 #6B0511 !important;
            }
        }
    
</style>