<script setup>
import { ref } from 'vue';
import History from './player_history_list.vue'
import Favorites from './player_favorites_list.vue'

const activeTab = ref('history');
</script>

<template>
<main>

<div class="profile p-3 m-2 d-flex flex-nowrap">
    <div>
    <img src="../../../assets/user-profile-img.png">
    </div>
    <div>
    <span id="player-name" class="round-font">Player Name</span>
    <span id="player-user-name" class="">@username</span>

        <div class="container details d-flex flex-wrap">
        <div class="detail d-flex flex-wrap">
            <span class="detail-title"><br>ranking</span>
            <span class="detail-content round-font">#7</span>
        </div>
        <div class="detail d-flex flex-wrap">
            <span class="detail-title"><br>average</span>
            <span class="detail-content round-font">75%</span>
        </div>
        <div class="detail d-flex flex-wrap">
            <span class="detail-title"><br>playtime</span>
            <span class="detail-content round-font">10:00</span>
        </div>
        <div class="detail d-flex flex-wrap">
            <span class="detail-title" style="font-size: 15px;">quizzes played</span>
            <span class="detail-content round-font">15</span>
        </div>
    </div>
    </div>
</div>

<nav class="nav px-3 py-2">
    <a class="round-font p-2" :class="{ 'tab-selected': activeTab === 'history', 'tab': activeTab !== 'history' }" @click="activeTab = 'history'" aria-current="page">history</a>
    <a class="round-font p-2" :class="{ 'tab-selected': activeTab === 'favorites', 'tab': activeTab !== 'favorites' }" @click="activeTab = 'favorites'" aria-current="page">favorites</a>
</nav>

<div v-if="activeTab === 'history'">
<History />
</div>
<div v-else-if="activeTab === 'favorites'">
<Favorites />
</div>

</main>
</template>



<style>
 .nav{
        .tab-selected, .round-font:hover{
            color: #A8DF7D;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
            cursor: pointer;
        }

        .round-font{
            font-size: 30px;
            text-decoration: none;
        }

        .tab{

            color: #B590DA;
            text-shadow: -1px -1px 0 #A8DF7D,
            1px -1px 0 #A8DF7D,
            -1px 1px 0 #A8DF7D,
            1px 1px 0 #A8DF7D !important;
        }
    }

    .profile{

        #player-name{
            font-size: 30px;
        }

        #player-user-name{
            font-size: 20px;
            font-weight: bold;
            color: #47008F;
        }
        .detail{
            max-width: 50px;
            padding: 1px 5px 1px 5px;
            margin: 1px 25px 1px 25px;
            justify-content: center;

            .detail-title{
                color: #47008F;
                font-weight: bold;
                font-size: 18px;
            }
            .detail-content{
                font-size: 30px;
                color: #A8DF7D;
                text-shadow: -1px -1px 0 #47008F,
                1px -1px 0 #47008F,
                -1px 1px 0 #47008F,
                1px 1px 0 #47008F !important;

            }
        }
    }
</style>