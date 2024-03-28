import { defineStore } from 'pinia'

export const useCounterStore = defineStore('main', {
  state: () => ({
    count: 0,
    name: 'Andy'
  }),
  getters: {
    doubleCount: (state) => state.count * 2,
  },
  actions: {
    increment() { this.count++; },
    reset() { this.count = 0; }
  },
})