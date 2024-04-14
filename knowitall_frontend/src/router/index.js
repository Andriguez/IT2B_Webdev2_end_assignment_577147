import { createRouter, createWebHistory } from 'vue-router'
import { useLoginStore } from '@/stores/loginStore'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'login',

      component: LoginView
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/RegisterView.vue')
    },
    {
      path: '/quizzes',
      name: 'quizzes',
      component: () => import('../views/QuizzesView.vue'),
      meta: { requiresAuth: true }
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/AdminView.vue'),
      meta: { requiresAuth: true, requiresAdmin: true }
    },
    {
      path: '/player',
      name: 'player',
      component: () => import('../views/PlayerProfileView.vue'),
      meta: { requiresAuth: true }
    },
    {
      path: '/quiz/:quizId',
      name: 'quiz',
      component: () => import('../views/QuizView.vue'),
      meta: { requiresAuth: true },
      props: true
    },
    {
      path: '/logout',
      name: 'Logout',
      meta: { requiresAuth: true },
      beforeEnter: (to, from, next) => {
        const loginStore = useLoginStore();
        loginStore.logout();
        next('/');
      }
    }
  ]
});

router.beforeEach((to, from, next) => {
  const loginStore = useLoginStore();

  if(loginStore.isLoggedIn && (to.path === '/login' || to.path === '/register')){
      next('/');
  }

  if(to.meta.requiresAuth){
    
    if(!loginStore.isLoggedIn){
      next('/login');
    } else {
      if(to.meta.requiresAdmin && loginStore.requestUserData.usertype !== 'admin'){
        next('/');

      } else {
        next();
      }
    }
  } else {
    next();
  }
});

export default router
