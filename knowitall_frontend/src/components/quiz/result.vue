<template>
<div class="overlay-container">
<div class="container round-font" id="result-container">
    <span :id="getResultMsg()[0]">{{ getResultMsg()[1] }}</span>
    <span id=""></span>

    <span id="player-name">{{getNameOfUser()}}</span>
    <div id="results-div" class="m-3">
        <div class="result">
            <span class="result-title">correct answers </span>
            <span class="result-content-correct"> {{ `${results.nr_correct_answers}/${results.uAnswers.length}` }} </span>
        </div>
        <div class="result">
            <span class="result-title">ranking </span>
            <span class="result-content-incorrect"> #5</span>
        </div>
        <div class="result">
            <span class="result-title">playtime </span>
            <span class="result-content-correct"> {{ formattedTimer() }}</span>
        </div>

    </div>
        <button><span class="round-font">quiz more</span></button>

</div>
</div>
</template>

<script>
import { useLoginStore } from '../../stores/loginStore';
import axios from '../../axios-auth'

export default {
    name: 'Result',
    data(){
        return {
            loginStore: useLoginStore(),
        };
    },
    props: {
        results: Object
    },
    mounted(){
        this.$emit('stop-timer');
    },
    methods: {
        getNameOfUser(){
            if (!this.loginStore) {
                return 'Player';
            }
            return this.loginStore.requestUserData.name;
        },
        getResultMsg(){
            if (this.results.nr_correct_answers > this.results.uAnswers.length / 2){
                return ['result-text-correct', 'congratulations!!'];
            } else {
                return ['result-text-incorrect', 'better luck next time, '];
            }
        },
        formattedTimer(){
            const minutes = Math.floor(this.results.timer / 60);
            const seconds = this.results.timer % 60;
             return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }
    }
}
</script>

<style>
 #result-container{
        background-color: #B590DA;
        border: solid 3px #47008F;
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        max-width: 600px;
        opacity: 95%;
        button{
            border-radius: 16px;
            background-color: #47008F;
            color: white;
            border-color: white;
            padding: 2px 20px 2px 20px;
        }

        button:hover{
            background-color: white;
            color: #47008F;
            border-color: #47008F;
        }

        #result-text-correct{
            color: #A8DF7D;
            font-size: 25px;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }

        #result-text-incorrect{
            color: #D96976;
            font-size: 25px;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }

        #player-name{
            font-size: 30px;
            color: #47008F;
            text-shadow: -1px -1px 0 white,
            1px -1px 0 white,
            -1px 1px 0 white,
            1px 1px 0 white !important;
        }

        #results-div{
            .result{
                .result-title{
                    font-size: 20px;
                    color: #47008F;
                    text-shadow: -1px -1px 0 white,
                    1px -1px 0 white,
                    -1px 1px 0 white,
                    1px 1px 0 white !important;
                }
                .result-content-correct{
                    color: #A8DF7D;
                    font-size: 25px;
                    text-shadow: -1px -1px 0 #47008F,
                    1px -1px 0 #47008F,
                    -1px 1px 0 #47008F,
                    1px 1px 0 #47008F !important;
                }

                .result-content-incorrect{
                    color: #D96976;
                    font-size: 25px;
                    text-shadow: -1px -1px 0 #47008F,
                    1px -1px 0 #47008F,
                    -1px 1px 0 #47008F,
                    1px 1px 0 #47008F !important;
                }
            }
        }
    }
    .overlay-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5); /* semi-transparent overlay */
        z-index: 9999; /* Ensure it appears above other elements */
    }
</style>