<script setup>
import TopicTableItem from './topic_table_item.vue'
</script>

<template>
 <div class="d-flex justify-content-center"><h3 class="round-font">Topics</h3></div>

<button class="btn m-3">Create new Topic</button>

<table class="table table-success table-striped">
<thead>
<tr>
    <th scope="col" class="round-font">Name</th>
    <th scope="col" class="round-font">Nr quizzes</th>
    <th scope="col" class="round-font">action</th>

</tr>
</thead>
<tbody class="table-group-divider">
<TopicTableItem />
<TopicTableItem />
<TopicTableItem />

</tbody>
</table>


</template>