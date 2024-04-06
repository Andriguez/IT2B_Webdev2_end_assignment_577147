<script setup>
import axios from '../../../../axios-auth'
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
    <div class="d-flex justify-content-center"><h3 class="round-font">Levels</h3></div>
<div class="container">
<form class="row g-3">
<div class="col-md-4">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName" v-model="levelName">
    </div>
    </form>
    <div class="col-12 my-4">
        <button class="btn" @click="editLevel" v-if="level !== null">Save</button>
        <button class="btn" @click="createLevel" v-else>create new</button>
    </div>
    </div>
</template>

<script>
export default {
    name: 'ManageLevel',
    data(){
        return {
            levelName: '',
        };
    },
    props: {
        level: Object
    },
    methods: {
        createLevel() {
            return new Promise((resolve, reject) => {
                axios.post('/quizzes/levels',{
                    level: this.levelName
                })
            .then((res)=>{
                resolve();
                const resultMessage = `new level ${res.data.level} has been created.`;
                alert(resultMessage);
                this.$emit('openWindow', 'levels', null);
            })
            .catch((error) => reject(error));
        })
    },
        editLevel() {
            return new Promise((resolve, reject) => {
                axios.put(`/quizzes/levels/${this.level.Id}`,{
                    level: this.levelName})
                .then((res) => {
                    resolve();
                    const resultMessage = `level name has been changed to ${res.data.level}`;
                    alert(resultMessage);
                })
                .catch((error) => reject(error));
                this.$emit('openWindow', 'levels', null);
            })
        }
    },
    mounted(){
        if(this.level !== null){
            this.levelName = this.level.level;
        }
    }
}

</script>