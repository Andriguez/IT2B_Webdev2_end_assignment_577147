<script setup>
import UserTableItem from './user_table_item.vue'
</script>

<template>
<div class="d-flex justify-content-center"><h3 class="round-font">Users</h3></div>
<div class="btn-group p-4">
    <button type="button" class="btn dropdown-toggle" style="width: 120px;" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="round-font">all usertypes</span>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something</a></li>
    </ul>
</div>

<table class="table table-success table-striped">
<thead>
<tr>
    <th scope="col" class="round-font">Name</th>
    <th scope="col" class="round-font">username</th>
    <th scope="col" class="round-font">quizzes answered</th>
    <th scope="col" class="round-font">usertype</th>
    <th scope="col" class="round-font">action</th>
</tr>
</thead>
<tbody class="table-group-divider">
<UserTableItem />
<UserTableItem />
<UserTableItem />

</tbody>
</table>
</template>