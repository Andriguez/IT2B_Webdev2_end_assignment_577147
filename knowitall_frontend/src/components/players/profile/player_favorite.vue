<template>
    <div class="card">
            <div class="card-header">
                <button id="favorite-btn" @click="deleteFavorite()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
            </svg>
        </button>
                <span class="quiz-name">{{ favoriteLog.quiz_name }}</span>
                <span class="quiz-topic">#{{ favoriteLog.quiz_topic }}</span>
            </div>
            <div class="card-body d-flex flex-nowrap justify-content-center">
                <div class="quiz-detail">
                    <h5 class="card-title"><br>level</h5>
                    <p class="card-text round-font">{{ favoriteLog.quiz_level }}</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title"># of questions</h5>
                    <p class="card-text round-font">{{ favoriteLog.quiz_nr_questions }}%</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">times answered</h5>
                    <p class="card-text round-font">{{ favoriteLog.quiz_nr_players  }}</p>
                </div>
                <div class="quiz-detail"><a href="#" class="btn btn-primary">▶</a></div>

            </div>
            <div class="card-footer d-flex justify-content-end">
                <label>favorited on </label>
                <span>{{ favoriteLog.saved_At }}</span>
            </div>
        </div>
</template>]

<script>
import axios from '../../../axios-auth'
export default {
    name: 'Favorite',
    props: {
        favoriteLog: Object
    },
    methods: {
        deleteFavorite(){
            return new Promise((resolve, reject) => {
                axios.delete(`/player/favorites/${this.favoriteLog.quiz_Id}`)
                .then((res) => {
                    resolve();
                    let message = `quiz ${this.favoriteLog.quiz_name} has been deleted from your favorites list`;

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
.card {
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

        .card-body {
            padding: 10px 10px 1px 10px;
        }

        .quiz-name {
            color: #A8DF7D;
            font-weight: bold;
            font-size: 30px;
        }

        .quiz-topic {
            color: #47008F;
            font-weight: bolder;
            font-size: 20px;
        }

        .card-text {
            font-size: 30px;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
            color: #A8DF7D;
        }

        .card-title {
            color: #47008F;
            font-weight: bold;
            font-size: 18px;
            max-width: 100px;
        }

        .quiz-detail {
            text-align: center;
            margin: 2px 10px 2px 10px;
        }

        .btn {
            width: 70px;
            height: 70px;
            font-size: 35px;
            padding: 7px 5px 5px 10px;
            border-radius: 50px;

            color: #47008F;
            background-color: #A8DF7D;
            border: solid 2px #47008F;
        }

        .btn:hover {
            color: #A8DF7D;
            background-color: #B590DA;
            border: solid 2px #A8DF7D;
        }

        .card-footer {
            label {
                font-size: 13px;
                color: #47008F;
            }

            span {
                font-size: 14px;
                margin-left: 5px;
                color: #A8DF7D;
                font-weight: bold;
            }
        }
    }

</style>