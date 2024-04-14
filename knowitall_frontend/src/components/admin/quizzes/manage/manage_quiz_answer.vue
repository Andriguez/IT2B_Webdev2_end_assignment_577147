<template>
        <div class="input-group mb-3">
            <div class="input-group-text">
                <input class="form-check-input mt-0" type="checkbox" v-if="new_answer == false" v-model="answer.isCorrect" aria-label="Checkbox for following text input" @change="emitUpdateAnswer">
                <input class="form-check-input mt-0" type="checkbox" v-else v-model="isCorrectBool" aria-label="Checkbox for following text input" @change="emitUpdateAnswer">
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" v-if="new_answer == false" v-model="answer.answer" @input="emitUpdateAnswer">
            <input type="text" class="form-control" aria-label="Text input with checkbox" v-else v-model="answerText" @change="emitCreateAnswer">
        </div>
</template>

<script>
export default {
    name: 'ManageQuizAnswer',
    data(){
        return {
            isCorrectBool: false,
            answerText: '',
            new_answer: false
        };
    },
    props: {
        answer: Object
    },
    methods: {
        emitUpdateAnswer() {
      this.$emit('update-answer', this.answer.Id);
    },
    emitCreateAnswer(){
        let text = this.answerText;
        let bool = this.isCorrectBool ? 1 : 0;
        this.$emit('create-answer', {text, bool});
    }
    },
    mounted(){
        if(this.answer){
            this.isCorrectBool = this.answer.isCorrect;
            this.answerText = this.answer.answer;
        } else {
            this.new_answer = true;
        }
    }
}
</script>