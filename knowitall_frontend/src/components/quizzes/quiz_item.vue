<template>
    <div class="card">
        <div class="card-header">
            <button id="favorite-btn" @click="saveFavorite()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
        </button>
            <span class="quiz-name">{{ quiz.name }} </span>
            <span class="quiz-topic"> #{{ quiz.topic }}</span>
        </div>
        <div class="card-body d-flex flex-nowrap justify-content-center">
            <div class="quiz-detail">
            <h5 class="card-title"><br>level</h5>
            <p class="card-text round-font">{{ quiz.level }}</p>
            </div>
            <div class="quiz-detail">
                <h5 class="card-title"># of Questions</h5>
                <p class="card-text round-font">{{ quiz.nr_questions }}</p>
            </div>
            <div class="quiz-detail">
                <h5 class="card-title">times answered</h5>
                <p class="card-text round-font">{{ quiz.nr_players }}</p>
            </div>
            <div class="quiz-detail"><a href="#" @click="$router.replace(`/quiz/${quiz.Id}`);" class="btn btn-primary">▶</a></div>

        </div>
        <div class="card-footer">
        <div style="float: right;">
            <label>last modified </label>
            <span>{{ quiz.mod_date }}</span>
        </div>
        </div>
    </div>
</template>

<script>
import axios from '../../axios-auth';
export default {
    name: 'QuizItem',
    props: {
        quiz: Object
    },
    methods: {
        saveFavorite(){
            return new Promise((resolve, reject) => {
                axios.post(`/player/favorites/${this.quiz.Id}`)
                .then((res) => {
                    resolve();
                    let message = `quiz ${quiz.name} has been saved to favorites list`;

                    if (res.data){
                        alert(message);
                    }
                })
                .catch((error) => reject(error));
            })
        }
    }
}
</script>

<style>
.card{
        width: 500px;
        margin: 10px;
        background-color: #BA9FD4;
        border-radius: 35px;
        height: 230px;

        #favorite-btn {
                color: #47008F;
                background-color: #BA9FD4;
                border-radius: 16px;
                border: none;
                height: 19;
                width: 19; 
            }

        .card-body{
            padding: 10px 10px 1px 10px;
        }
        .quiz-name{
            color: #A8DF7D;
            font-weight: bold;
            font-size: 30px;
        }

        .quiz-topic{
            color: #47008F;
            font-weight: bolder;
            font-size: 20px;
        }

        .card-text{
            font-size: 30px;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
            color: #A8DF7D;
        }

        .card-title{
            color: #47008F;
            font-weight: bold;
            font-size: 18px;
            max-width: 100px;
        }

        .quiz-detail{
            text-align: center;
            margin: 2px 10px 2px 10px;
        }

        .btn{
            width: 70px;
            height: 70px;
            font-size: 35px;
            padding:7px 5px 5px 10px;
            border-radius: 50px;

            color: #47008F;
            background-color: #A8DF7D;
            border: solid 2px #47008F;
        }

        .btn:hover{
            color: #A8DF7D;
            background-color: #B590DA;
            border: solid 2px #A8DF7D;
        }

        .card-footer{
            label{
                font-size: 13px;
                color: #47008F;
            }
            span{
                font-size: 14px;
                margin-left: 5px;
                color: #A8DF7D;
                font-weight: bold;
            }
        }
    }
</style>