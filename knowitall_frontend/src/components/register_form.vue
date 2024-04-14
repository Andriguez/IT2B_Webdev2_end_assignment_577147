<template>
<main style="text-align: center">
    <img class="py-2"  src="../assets/do-you-know-it-all.png" width="20%" height="5%">
    <div class="container d-flex justify-content-center" style="width: 700px">
        <form>
            <div class="form-floating py-2">
                <input type="text" class="form-control" id="floatingName" placeholder="full name" v-model="fullname">
                <label for="floatingName">full name</label>
            </div>
            <div class="form-floating py-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="@username" v-model="username">
                <label for="floatingInput">username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" v-model="password">
                <label for="floatingPassword">password</label>
            </div>

            <div class="container d-flex justify-content-center flex-nowrap">
                <a class="nav-link py-1 px-3" href="#" style="font-size: 27px" @click="postRegistration">sign up</a>
            </div>
        </form>
    </div>
</main>
</template>
<script>
import axios from '../axios-auth';

export default {
    name: 'RegisterForm',
    data(){
        return {
            fullname: '',
            username: '',
            password: ''
        }

    },
    methods: {
        postRegistration(){
            return new Promise((resolve, reject) => {
                axios.post(`/users/register`, {
                    username: this.username,
                    fullname: this.fullname,
                    password: this.password
                })
                .then((res) => {
                    resolve();
                    if(res.data === true){
                        resultMessage = `registration of user @${this.username} has been succesful`;
                    } else { resultMessage = `registration of user @${this.username} has failed`;}
                    alert(resultMessage);
                })
                .then(this.$router.replace("/quizzes"))
                .catch((error) => reject(error));
            })
        }
    }
}
</script>

<style>

</style>