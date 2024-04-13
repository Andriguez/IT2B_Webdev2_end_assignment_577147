<template>
        <div class="input-group mb-3">
            <div class="input-group-text">
                <input class="form-check-input mt-0" type="checkbox" v-model="answer.isCorrect" aria-label="Checkbox for following text input" @input="emitUpdateAnswer">
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" v-model="answer.answer" @input="emitUpdateAnswer">
        </div>
</template>

<script>
export default {
    name: 'ManageQuizAnswer',
    data(){
        return {

        };
    },
    props: {
        answer: Object
    },
    methods: {
        emitUpdateAnswer() {
      this.$emit('update-answer', this.answer.Id);
    }
    }
}
</script>