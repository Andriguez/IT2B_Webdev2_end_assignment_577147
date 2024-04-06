<script setup>
import axios from '../../../axios-auth'
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
<tr>
    <td>{{ level.level }}</td>
    <td>{{ level.nr_quizzes }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="buttons">
            <button type="button" class="btn btn-primary" @click="openWindow(level)">Edit</button>
            <button type="button" class="btn btn-danger" @click="deleteLevel">Delete</button>
        </div>
    </td>
</tr>
</template>

<script>
export default {
    name: 'LevelTableItem',
    data(){
        return {
            resultMessage: ''
        };
    },
    props: {
        level: Object
    },
    methods: {
        openWindow(object) {
            this.$emit('openWindow','manage_level', object);
        },
        deleteLevel(){
            return new Promise((resolve, reject) => {
                axios.delete(`/quizzes/levels/${this.level.Id}`)
                .then((res) => {
                    resolve();
                    if(res.data === true){
                        this.resultMessage = `level ${this.level.level} has been deleted`;
                    } else { this.resultMessage = `level ${this.level.level} has not been deleted`;}
                    alert(this.resultMessage);
                    this.$emit('openWindow', 'levels', null);
                })
                .catch((error) => reject(error));
            })
        }
    }
}
</script>