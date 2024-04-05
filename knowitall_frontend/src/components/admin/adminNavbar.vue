<template>
    <ul class="nav nav-pills">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Quizzes</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" @click="openWindow('quizzes')">Manage Quizzes</a></li>
                <li><a class="dropdown-item" href="#" @click="openWindow('levels')">Manage Levels</a></li>
                <li><a class="dropdown-item" href="#" @click="openWindow('topics')">Manage Topics</a></li>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" role="button" @click="openWindow('users')">Users</a></li>
        <li class="nav-item"><a class="nav-link" role="button" @click="openWindow('flags')">Flags</a></li>
    </ul>
</template>

<script>
export default {
    name: 'AdminNavbar',
    methods: {
        openWindow(tab) {
            this.$emit('openWindow', tab, null)
        }
    }
}

</script>



<style>
.tab-selected{
            color: #A8DF7D;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
            cursor: pointer;
        }
</style>