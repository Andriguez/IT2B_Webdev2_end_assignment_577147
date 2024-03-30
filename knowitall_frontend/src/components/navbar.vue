<template>
    <nav class="navbar d-flex flex-nowrap py-1 expand-lg">
    <div class="container px-0">
        <div class="col-3 d-flex">
        </div>
        <div class="col-6 d-flex justify-content-center">
        <router-link class="navbar-brand py-0" to="/">
            <img v-if="!isQuiz()" src="../assets/KNOW-IT-ALL_logo.png" alt="logo" width="100" height="70">
            <img v-if="isQuiz()" src="../assets/do-you-know-it-all.png" alt="logo" width="150" height="70">
        </router-link>
        </div>
        <div class="col-3 d-flex flex-nowrap justify-content-end">
            <router-link v-if="!isLoggedIn()" class="nav-link py-3 px-5" to="/login">Login</router-link>
            <router-link v-if="isLoggedIn() && isPlayer() && !isQuiz()" class="nav-link py-3 px-2" to="/quizzes">Quiz me</router-link>
            <router-link v-if="isLoggedIn() && isAdmin()" class="nav-link py-3 px-3" to="/admin">Admin</router-link>
            <router-link v-if="isLoggedIn() && isAdmin()" class="nav-link py-3 px-3" to="/logout">log out</router-link>
            <router-link v-if="isLoggedIn() && isQuiz()" class="nav-link py-3 px-3" to="/">exit</router-link>

            <div v-if="isLoggedIn() && isPlayer()" class="dropstart">
                <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/user_icon_noshadow.png" height="70" alt="icon">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><h5 class="px-3">Hello, {{ this.getNameOfUser() }}</h5></li>
                    <li><router-link class="dropdown-item" to="/player">view profile</router-link></li>
                    <li><router-link class="dropdown-item" to="/player">edit profile</router-link></li>
                    <li><router-link class="dropdown-item" to="/logout">log out</router-link></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</template>

<script> 
import { useLoginStore } from '../stores/loginStore';

export default {
    name: 'Navigation',
    data() {
        return {
            loginStore: useLoginStore(),
        };
    },
    mounted(){
        if (!this.loginStore) {
            console.error('Failed to initialize login store');
            return;
        }
    },
    methods: {
        isLoggedIn(){
            if (!this.loginStore) {
                return false;
            }
            return this.loginStore.isLoggedIn;
        },
        isAdmin(){
            if (!this.loginStore) {
                return false;
            }
            return this.loginStore.requestUserData.usertype === 'admin';
        },
        isPlayer(){
            if (!this.loginStore) {
                return false;
            }
            return this.loginStore.requestUserData.usertype === 'player';
        },
        isQuiz(){
            if (!this.loginStore) {
                return false;
            }
            return this.$route.path === '/quiz';
        },
        getNameOfUser(){
            if (!this.loginStore) {
                return 'Player';
            }
            return this.loginStore.requestUserData.name;
        }

    }
}
</script>

<style>
.navbar{
    background-color: #B590DA;
}
.nav-link{
    font-weight: bolder !important;
    font-size: 20px !important;
    color: #47008F !important;
    text-decoration: underline !important;
}

.nav-link:hover{
    color: #A8DF7D !important;
    text-shadow:
            -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
}

.selected{
        color: #A8DF7D;
        text-shadow: -1px -1px 0 #47008F,
        1px -1px 0 #47008F,
        -1px 1px 0 #47008F,
        1px 1px 0 #47008F !important;
    }

.dropdown-menu{
    background-color: #A8DF7D !important;

    .dropdown-item{

        color: #47008F !important;
        text-decoration: underline !important;
        font-weight: bold !important;
    }

    h5{
        color: #A8DF7D !important;
        text-shadow:
                -1px -1px 0 #47008F,
                1px -1px 0 #47008F,
                -1px 1px 0 #47008F,
                1px 1px 0 #47008F !important;
    }

    .dropdown-item:hover{
        background-color: #B590DA;
    }
}

</style>