// Composables
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    component: () => import('@/layouts/default/Default.vue'),
    children: [
      {
        path: '/',
        name: 'Home',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Home.vue'),
      },
      {
        path: '/categories',
        name: 'Category',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Category.vue'),
      },
      {
        path: '/sub-categories',
        name: 'SubCategory',
        component: () => import(/* webpackChunkName: "home" */ '@/views/SubCategory.vue'),
      },
      {
        path: '/brands',
        name: 'Brands',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Brand.vue'),
      },
      {
        path: '/tags',
        name: 'Tags',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Tag.vue'),
      },
      {
        path: '/colors',
        name: 'Colors',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Color.vue'),
      },
    ],
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});


export default router
