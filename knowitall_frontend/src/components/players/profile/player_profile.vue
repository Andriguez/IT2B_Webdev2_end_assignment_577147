<script setup>
import { ref } from 'vue';
import PlayerHistory from './player_history_list.vue'
import PlayerFavorites from './player_favorites_list.vue'
import PlayerDetail from './player_detail.vue'
import axios from '../../../axios-auth'
import { useLoginStore } from '@/stores/loginStore';

const activeTab = ref('history');
</script>

<template>
<main>

<div class="profile p-3 m-2 d-flex flex-nowrap">
    <div>
    <img src="../../../assets/user-profile-img.png">
    </div>
    <div>
    <span id="player-name" class="round-font">{{ getName() }}  </span>
    <span id="player-user-name" class=""> @{{ getUsername() }}</span>

        <div class="container details d-flex flex-wrap">
            <PlayerDetail
            v-for="(value, key) in details"
            :key="key"
            :title="key"
            :value ="value"
             />
    </div>
    </div>
</div>

<nav class="nav px-3 py-2">
    <a class="round-font p-2" :class="{ 'tab-selected': activeTab === 'history', 'tab': activeTab !== 'history' }" @click="activeTab = 'history'" aria-current="page">history</a>
    <a class="round-font p-2" :class="{ 'tab-selected': activeTab === 'favorites', 'tab': activeTab !== 'favorites' }" @click="activeTab = 'favorites'" aria-current="page">favorites</a>
</nav>

<div v-if="activeTab === 'history'">
<PlayerHistory />
</div>
<div v-else-if="activeTab === 'favorites'">
<PlayerFavorites />
</div>

</main>
</template>

<script>
export default {
    name: 'playerProfile',
    components: {
        PlayerDetail,
        PlayerHistory,
        PlayerFavorites,
    },
// props: {
  //      detail: Object
    //},
    data(){
        return {
            details: [],
            userId: '',
            loginStore: useLoginStore(),
        };
    },
    mounted(){
        this.userId = this.loginStore.requestUserData.id;

        axios.get(`/player/${this.userId}`)
        .then(result => this.details = result.data)
        .catch(error => console.log(error))
    },
    methods: {
        getName(){
            return this.loginStore.requestUserData.name;
        },
        getUsername(){
            return this.loginStore.requestUserData.username;
        }
    }
};
</script>


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
    }
</style>