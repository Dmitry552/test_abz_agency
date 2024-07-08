import {
    createRouter,
    createWebHistory,
} from 'vue-router'
import Home from '../pages/Home.vue'
import CreateUser from '../pages/CreateUser.vue'
import User from "../pages/User.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/user/create',
      name: 'createUser',
      component: CreateUser,
    },
    {
      path: '/user/:id',
      name: 'user',
      component: User
    },
    {
      path: '/:catchAll(.*)',
      redirect: '/',
    }
  ]
})


export default router
