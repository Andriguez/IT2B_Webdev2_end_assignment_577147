<template>
    <span id="timer" class="round-font">{{ formattedCounter }}</span>
</template>

<script>
export default {
  data() {
    return {
      counter: 0,
      timer: null,
      timerValue: 0
    };
  },
  computed: {
    formattedCounter() {
      const minutes = Math.floor(this.counter / 60);
      const seconds = this.counter % 60;
      return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }
  },
  methods: {
    stopTimer() {
      this.timerValue = this.counter;
      clearInterval(this.timer);

      return this.counter;
    }
  },
  mounted() {
    this.timer = setInterval(() => {
      this.counter++;
    }, 1000);
  },
  beforeUnmount() {
    clearInterval(this.timer);
  }
};
</script>