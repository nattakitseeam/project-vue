import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',

    component: () => import( '../views/AboutView.vue')
  },

  {
    path: '/contact',
    name: 'contact',  
    component: () => import( '../views/Contact.vue')
  },
  {
    path: '/product_api',
    name: 'product_api',

    component: () => import( '../views/Product.api.vue')
  },
  {
    path: '/product_list',
    name: 'product_list',

    component: () => import( '../views/Product_list.vue')
  },
  {
    path: '/gold',
    name: 'gold',

    component: () => import('../views/gold.vue')
  },
  {
    path: '/showcustomer',
    name: 'showcustomer',

    component: () => import('../views/Showcustomer.vue')
  },
  {
    path: '/showemployee',
    name: 'showemployee',

    component: () => import('../views/Showemployee.vue')
  },
  {
    path: '/Register',
    name: 'Register',

    component: () => import('../views/Register.vue')
  },
  {
    path: '/addempregister',
    name: 'addempregister',

    component: () => import('../views/Add_employee.vue')
  }

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
