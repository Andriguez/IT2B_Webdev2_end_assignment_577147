<script setup>
import FlagTableItem from './flag_table_item.vue'
import axios from '../../../axios-auth'

import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
function openWindow(tab) {
  emit('openWindow', tab);
}

</script>

<template>
<div class="d-flex justify-content-center"><h3 class="round-font">Flags</h3></div>
<div class="btn-group p-4">
    <button type="button" class="btn dropdown-toggle" style="width: 120px;" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="round-font">{{ selectedFilterText }}</span>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#" @click="getFlags(null)">All Flags</a></li>
        <li><a class="dropdown-item" href="#" @click="getFlags('1')">Solved</a></li>
        <li><a class="dropdown-item" href="#" @click="getFlags('0')">Unsolved</a></li>

    </ul>
</div>

<table class="table table-success table-striped">
<thead>
<tr>
    <th scope="col" class="round-font">date</th>
    <th scope="col" class="round-font">by user</th>
    <th scope="col" class="round-font">message</th>
    <th scope="col" class="round-font">quiz</th>
    <th scope="col" class="round-font">question #</th>
    <th scope="col" class="round-font">is solved?</th>
</tr>
</thead>
<tbody class="table-group-divider">
<FlagTableItem v-for="flag in flags"
:key="flag.Id"
:flag="flag"
@openWindow="openWindow" />

</tbody>
</table>
</template>

<script>
export default {
    name: 'FlagsTable',
    components: {
        FlagTableItem
    },
    data(){
        return{
            flags: [],
            selectedFilter: null,
            getFlagsURL: ''
        };
    },
    methods: {
        getFlags(filter){
            this.selectedFilter = filter;

            if(this.selectedFilter === null){ this.getFlagsURL = '/flags' } else {this.getFlagsURL = `/flags/${filter}`};

            axios.get(this.getFlagsURL)
            .then(result => {
                this.flags = result.data;
                console.log(result.data);})
                .catch(error => console.log(error))
        }
    },
    mounted(){
        this.getFlags(null);
    },
    computed: {
    selectedFilterText() {
      if (this.selectedFilter === '1') {
        return 'solved';
      } else if (this.selectedFilter === '0') {
        return 'unsolved';
      } else {
        return 'all flags';
      }
    }
  },

}
</script>