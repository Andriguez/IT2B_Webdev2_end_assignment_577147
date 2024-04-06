<script setup>
import axios from '../../../axios-auth'
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
<tr>
    <td>{{ flag.sentAt }}</td>
    <td>{{ flag.user }}</td>
    <td>"{{ flag.message }}"</td>
    <td><a href="#" @click="openWindow(flag.quiz.Id)">{{ flag.quiz.name}}</a></td>
    <td>
        <span id="questionNr" :data-tooltip="question_text">{{ flag.question_nr }}</span>
    </td>
    <td>
        <select id="inputState" class="form-select" v-model="isSolved" @change="changeFlagStatus">
            <option :value="true">solved</option>
            <option :value="false">unsolved</option>
        </select>
    </td>
</tr>
</template>

<script>
export default {
    name: 'FlagTableItem',
    data(){
        return{
            isSolved: null,
            question_text: '',
        }
    },
    props: {
        flag: Object
    },
    mounted(){
        this.isSolved = this.flag.isSolved;
        this.question_text = this.flag.question;
    },
    watch: {
    'flag.isSolved'(newValue) {
      this.isSolved = newValue === 1;
    }
  },
  methods: {
    openWindow(object) {
            this.$emit('openWindow','manage_quiz', object);
        },
    changeFlagStatus(){
        let boolpars = this.isSolved ? 1 : 0;

        return new Promise((resolve, reject) => {
                axios.put(`/flag/${this.flag.Id}`,{
                    isSolved: boolpars})
                .then((res) => {
                    resolve();
                    const resultMessage = `${res.data.user}'s flag status updated`;
                    alert(resultMessage);
                    console.log(this.isSolved);
                    this.$emit('openWindow', 'flags', null);
                })
                .catch((error) => reject(error));
            })
        
    }
  }
}


</script>

<style>
#questionNr::after {
    content: attr(data-tooltip);
    position: absolute;
    display: none;
}

#questionNr:hover::after {
    display: block;
    background-color: #B590DA;
    border: 2px solid #47008F;
    color: #A8DF7D;
}
</style>