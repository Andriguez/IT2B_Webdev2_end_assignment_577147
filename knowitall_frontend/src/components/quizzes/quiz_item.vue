<template>
    <div class="card">
        <div class="card-header">
            <button id="favorite-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
            </svg>
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
                <h5 class="card-title">global average</h5>
                <p class="card-text round-font">{{ quiz.avg_correct_answers }}%</p>
            </div>
            <div class="quiz-detail">
                <h5 class="card-title">times answered</h5>
                <p class="card-text round-font">{{ quiz.nr_players }}</p>
            </div>
            <div class="quiz-detail"><a href="#" @click="$router.replace('/quiz');" class="btn btn-primary">▶</a></div>

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
export default {
    name: 'QuizItem',
    props: {
        quiz: Object
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