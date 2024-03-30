<template>
    <div class="card">
            <div class="card-header">
                <span class="quiz-name">{{ historyLog.quiz_name }}</span>
                <span class="quiz-topic">#{{ historyLog.quiz_topic }}</span>
            </div>
            <div class="card-body d-flex flex-nowrap justify-content-center">
                <div class="quiz-detail">
                    <h5 class="card-title"><br>level</h5>
                    <p class="card-text round-font">{{ historyLog.quiz_level}}</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title"><br>play time</h5>
                    <p class="card-text round-font">{{ historyLog.playtime }}</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">correct questions</h5>
                    <p class="card-text round-font">{{ historyLog.nr_correct_answers }} / {{ historyLog.quiz_nr_questions }}</p>
                </div>
                <div class="quiz-detail"><a href="#" class="btn btn-primary">▶</a></div>

            </div>
            <div class="card-footer d-flex justify-content-end">
                <label>answered on </label>
                <span>{{ historyLog.last_played }}</span>
            </div>
        </div>
</template>

<script>
export default {
    name: 'HistoryLog',
    props: {
        historyLog: Object
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