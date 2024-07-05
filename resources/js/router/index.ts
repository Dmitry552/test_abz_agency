import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import CreateUser from '../pages/CreateUser.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/user',
      name: 'user',
      component: CreateUser
    },
  ]
})

export default router
