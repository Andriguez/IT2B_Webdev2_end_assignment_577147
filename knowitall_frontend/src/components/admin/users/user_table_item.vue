<script setup>
import axios from '../../../axios-auth'
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
<tr>
    <td>{{ user.name }}</td>
    <td>@{{ user.username }}</td>
    <td>{{ user.type.type_name }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="buttons">
            <button type="button" class="btn btn-primary" @click="openWindow(user)">Edit</button>
            <button type="button" class="btn btn-danger" @click="deleteUser">Delete</button>
        </div>
    </td>
</tr>
</template>

<script>
export default {
    name: 'UserTableItem',
    props:{
        user: Object
    },
    methods: {
        openWindow(object){
            this.$emit('openWindow', 'manage_user', object);
        },
        deleteUser(){
            let resultMessage = `user (@${this.user.username}) has not been deleted`;
            return new Promise((resolve, reject) => {
                axios.delete(`/user/${this.user.Id}`)
                .then((res) => {
                    resolve();
                    if(res.data === true){
                        resultMessage = `user ${this.user.name} (@${this.user.username}) has been deleted`;
                    }
                    alert(resultMessage);
                    this.$emit('openWindow', 'users', null);
                })
                .catch((error) => reject(error));
            })
        }
    }
}

</script>