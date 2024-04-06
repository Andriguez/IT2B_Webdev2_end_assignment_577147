<script setup>
import axios from '../../../../axios-auth'
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
<div class="d-flex justify-content-center"><h3 class="round-font">Users</h3></div>
<div class="container">
<form class="row g-3">
    <div class="col-md-4">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName" v-model="name">
    </div>
    <div class="col-md-4">
        <label for="inputUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="inputUsername" v-model="username">
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label">Usertype</label>
        <select id="inputState" class="form-select" v-model="usertype.Id">
            <option v-for="utype in usertypes" :key="utype.Id" :value="utype.Id">{{utype.type_name}}</option>
        </select>
    </div>

</form>
    <div class="col-12 my-4">
        <button type="button" class="btn me-3" @click="resetUserPassword">Reset Password</button>
        <label> *resets password to <strong>password123</strong></label>
    </div>

    <div class="col-12 my-4">
        <button class="btn" @click="editUser">Save</button>
    </div>
</div>
</template>

<script>
export default {
    name: 'ManageUser',
    props: {
        user: Object
    },
    data(){
        return {
            usertypes: [],
            username: '',
            name: '',
            usertype: '',
        }
    },
    methods: {
        editUser() {
            return new Promise((resolve, reject) => {
                axios.put(`/user/${this.user.Id}`,{
                    username: this.username,
                    name: this.name,
                    usertype: this.usertype.Id
                })
                .then((res) => {
                    resolve();
                    const resultMessage = `info of user @${res.data.username} has been updated`;
                    alert(resultMessage);
                    this.$emit('openWindow', 'users', null);
                })
                .catch((error) => reject(error));
            })
        },

        resetUserPassword(){
            let resultMessage = '';
            return new Promise((resolve, reject) => {
                axios.patch(`/resetpwd/${this.user.Id}`)
                .then((res) => {
                    resolve();
                    if(res.data === true){
                        resultMessage = `password of user @${this.username} has been resetted`;
                    } else { resultMessage = `password of user ${this.username} has not been resetted`;}
                    alert(resultMessage);
                    this.$emit('openWindow', 'users', null);
                })
                .catch((error) => reject(error));
            })
        }

    },
    mounted(){
        axios.get('/users/types')
        .then((res) => {
            this.usertypes = res.data;
        })
        .catch((error) => console.log(error));

        this.name = this.user.name;
        this.username = this.user.username;
        this.usertype = this.user.type

        console.log(this.usertype);
    }
}
</script>