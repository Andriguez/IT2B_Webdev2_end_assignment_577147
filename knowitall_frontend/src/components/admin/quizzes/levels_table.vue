<script setup>
import LevelTableItem from './level_table_item.vue'
</script>

<template>
    <div class="d-flex justify-content-center"><h3 class="round-font">Levels</h3></div>

<button class="btn m-3">Create new Level</button>

<table class="table table-success table-striped">
<thead>
<tr>
    <th scope="col" class="round-font">Name</th>
    <th scope="col" class="round-font">Nr quizzes</th>
    <th scope="col" class="round-font">action</th>

</tr>
</thead>
<tbody class="table-group-divider">
<LevelTableItem />
<LevelTableItem />
<LevelTableItem />

</tbody>
</table>
</template>