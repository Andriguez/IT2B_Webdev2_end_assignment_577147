<script setup>
import FlagTableItem from './flag_table_item.vue'

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
        <span class="round-font">all flags</span>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">unsolved</a></li>
        <li><a class="dropdown-item" href="#">solved</a></li>
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
<FlagTableItem  @openWindow="openWindow" />
<FlagTableItem  @openWindow="openWindow" />
<FlagTableItem  @openWindow="openWindow" />

</tbody>
</table>
</template>