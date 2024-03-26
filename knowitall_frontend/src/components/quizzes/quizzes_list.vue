<script setup>
import QuizItem from './quiz_item.vue'
</script>

<template>
    <main>
        <div class="btn-group p-4">
        <button type="button" class="btn dropdown-toggle" style="width: 120px;" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="round-font">all topics</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something</a></li>
        </ul>
    </div>
    
    <div class="container d-flex flex-wrap justify-content-center">
        <QuizItem />
        <QuizItem />
        <QuizItem />
    </div>

    </main>
</template>

<script>

</script>

<style>
 .btn{
        border-radius: 18px;
        background-color: #B590DA;
        border-color: #A8DF7D;
        border-width: 2px;
        color: #A8DF7D;
        font-size: 18px;

        span{
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }
    }

    .btn:hover, .btn:focus{
        background-color: #A8DF7D;
        border-color: #47008F;
        border-width: 2px;
        color: #47008F;

            span{
                text-shadow: -1px -1px 0 #A8DF7D,
                1px -1px 0 #A8DF7D,
                -1px 1px 0 #A8DF7D,
                1px 1px 0 #A8DF7D !important;
            }

    }
</style>