<script setup>
import Favorite from './player_favorite.vue'
import { useLoginStore } from '@/stores/loginStore';
import axios from '../../../axios-auth'
</script>

<template>
    <div class="container d-flex flex-wrap justify-content-center">
        <Favorite v-for="favorite in favorites"
        :favoriteLog = favorite
        />
    </div>
</template>

<script>
export default {
    name: 'PlayerFavorites',
    components: {
        Favorite
    },
    data(){
        return {
            favorites: [],
            userId: '',
            loginStore: '',
        };
    },
    mounted(){
        this.loginStore = useLoginStore();
        this.userId = this.loginStore.requestUserData.id;

        axios.get(`/player/${this.userId}/favorites`)
        .then(result => this.favorites = result.data)
        .catch(error => console.log(error))
    }
}
</script>

<style>

</style>