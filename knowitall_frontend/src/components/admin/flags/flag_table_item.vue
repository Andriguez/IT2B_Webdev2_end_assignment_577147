<script setup>
import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);

function openWindow(tab) {
  emit('openWindow', tab);
}
</script>

<template>
<tr>
    <td>{{ flag.sentAt }}</td>
    <td>{{ flag.user }}</td>
    <td>"{{ flag.message }}"</td>
    <td><a href="#" @click="openWindow('manage_quiz')">{{ flag.quiz }}</a></td>
    <td>
        <span id="questionNr" :data-tooltip="question_text">{{ flag.question_nr }}</span>
    </td>
    <td>
        <select id="inputState" class="form-select" v-model="isSolved">
            <option :value="null" selected>Choose...</option>
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