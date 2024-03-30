<script setup>
import HistoryLog from './player_history_item.vue'
import axios from '../../../axios-auth'
import { useLoginStore } from '@/stores/loginStore';
</script>

<template>
    <div class="container d-flex flex-wrap justify-content-center">
        <HistoryLog v-for="historyLog in history"
        :historyLog="historyLog"
        />
    </div>
</template>

<script>
export default {
    name: 'PlayerHistory',
    components: {
        HistoryLog
    },
    data(){
        return {
            history: [],
            userId: '',
            loginStore: '',
        };
    },
    mounted(){
        this.loginStore = useLoginStore();
        this.userId = this.loginStore.requestuserid

        axios.get(`/player/${this.userId}/history`)
        .then(result => this.history = result.data)
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>