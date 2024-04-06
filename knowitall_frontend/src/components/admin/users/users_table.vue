<script setup>
import UserTableItem from './user_table_item.vue'
import axios from '../../../axios-auth'

import { defineEmits } from 'vue';
const emit = defineEmits(['openWindow']);
</script>

<template>
<div class="d-flex justify-content-center"><h3 class="round-font">Users</h3></div>
<div class="btn-group p-4">
    <button type="button" class="btn dropdown-toggle" style="width: 120px;" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="round-font">{{ selectedFilterText }}</span>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#" @click="getUsers(null)">All Users</a></li>
        <li><a class="dropdown-item" href="#" @click="getUsers('2')">Player</a></li>
        <li><a class="dropdown-item" href="#" @click="getUsers('1')">Admin</a></li>
    </ul>
</div>

<table class="table table-success table-striped">
<thead>
<tr>
    <th scope="col" class="round-font">Name</th>
    <th scope="col" class="round-font">username</th>
    <th scope="col" class="round-font">usertype</th>
    <th scope="col" class="round-font">action</th>
</tr>
</thead>
<tbody class="table-group-divider">
<UserTableItem v-for="user in users"
:key="user.Id"
:user="user"
@openWindow="openWindow" />

</tbody>
</table>
</template>

<script>
export default {
    name: 'UsersTable',
    components: {
        UserTableItem
    },
    data(){
        return {
            users: [],
            selectedFilter: null,
            getUsersURL: '',
        };
    },
    methods: {
        getUsers(filter){
            this.selectedFilter = filter;

            if(this.selectedFilter === null){ this.getUsersURL = '/users' } else {this.getUsersURL = `/users/${filter}`};

            axios.get(this.getUsersURL)
            .then(result => this.users = result.data)
                .catch(error => console.log(error))
        },
        openWindow(tab, object){
          this.$emit('openWindow', tab, object);
        }
    },
    mounted(){
        this.getUsers(null)
    },
    computed: {
    selectedFilterText() {
      if (this.selectedFilter === '1') {
        return 'Admin';
      } else if (this.selectedFilter === '2') {
        return 'Player';
      } else {
        return 'All Users';
      }
    }
  }

}
</script>