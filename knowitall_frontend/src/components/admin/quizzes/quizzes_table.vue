<script setup>
import QuizTableItem from './quiz_table_item.vue';
</script>

<template>
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

<button class="btn">Create new Quiz</button>

<table class="table table-success table-striped">
<thead>
<tr>
    <th scope="col" class="round-font">Name</th>
    <th scope="col" class="round-font">Topic</th>
    <th scope="col" class="round-font">Level</th>
    <th scope="col" class="round-font">Nr questions</th>
    <th scope="col" class="round-font">Nr flags</th>
    <th scope="col" class="round-font">Nr players</th>
    <th scope="col" class="round-font">action</th>
</tr>
</thead>
<tbody class="table-group-divider">
<QuizTableItem />
<QuizTableItem />
<QuizTableItem />

</tbody>
</table>
</template>

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

    h3{
        color: #A8DF7D;
        text-shadow: -1px -1px 0 black,
        1px -1px 0 #47008F,
        -1px 1px 0 #47008F,
        1px 1px 0 black !important;
    }

    table{
        thead{
            th{
                color: #47008F !important;
                font-weight: normal;
                text-shadow: -1px -1px 0 #A8DF7D,
                1px -1px 0 #A8DF7D,
                -1px 1px 0 #A8DF7D,
                1px 1px 0 #A8DF7D !important;
            }
        }
    }
</style>