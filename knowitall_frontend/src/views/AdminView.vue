<script setup>
import AdminNavbar from '../components/admin/adminNavbar.vue'
import QuizzesTable from '../components/admin/quizzes/quizzes_table.vue'
import ManageQuiz from '../components/admin/quizzes/manage/manage_quiz.vue'
import TopicsTable from '../components/admin/quizzes/topics_table.vue'
import ManageTopic from '../components/admin/quizzes/manage/manage_topic.vue'
import LevelsTable from '../components/admin/quizzes/levels_table.vue'
import ManageLevel from '../components/admin/quizzes/manage/manage_level.vue'
import UsersTable from '../components/admin/users/users_table.vue'
import ManageUser from '../components/admin/users/manage/manage_user.vue'
import FlagsTable from '../components/admin/flags/flags_table.vue'
</script>

<template>
    <main>
        <AdminNavbar @openWindow="changeWindow"/>
        <div v-if="selectedTab === 'quizzes'">
            <QuizzesTable  @openWindow="changeWindow" />
        </div>
        <div v-else-if="selectedTab === 'manage_quiz'">
        <ManageQuiz @openWindow="changeWindow" />
        </div>
        <div v-else-if="selectedTab === 'users'">
        <UsersTable @openWindow="changeWindow" />
        </div>
        <div v-else-if="selectedTab === 'manage_user'">
        <ManageUser :user="selectedObject" @openWindow="changeWindow" />
        </div>
        <div v-else-if="selectedTab === 'levels'">
        <LevelsTable @openWindow="changeWindow" />
        </div>
        <div v-else-if="selectedTab === 'manage_level'">
        <ManageLevel :level="selectedObject" @openWindow="changeWindow" />
        </div>
        <div v-else-if="selectedTab === 'topics'">
        <TopicsTable @openWindow="changeWindow" />
        </div>
        <div v-else-if="selectedTab === 'manage_topic'">
        <ManageTopic :topic="selectedObject" @openWindow="changeWindow" />
        </div>
        <div v-else-if="selectedTab === 'flags'">
        <FlagsTable @openWindow="changeWindow" />
        </div>
    </main>
</template>

<script>
export default {
    name: 'AdminView',
    data(){
        return{
            selectedTab: 'quizzes',
            selectedObject: null
        }
    },
    methods: {
        changeWindow(tab, object){
            this.selectedTab = '';
            this.selectedObject = object;

            this.$nextTick(() => {
                this.selectedTab = tab;
            });

            console.log(`tab = ${tab}, object = ${object}`);

        }
    }
}
</script>