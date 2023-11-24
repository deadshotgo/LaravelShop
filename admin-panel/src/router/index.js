// Composables
import { createRouter, createWebHistory } from 'vue-router'
import store from "@/store";

const routes = [
  {
    path: '/',
    component: () => import('@/layouts/default/Default.vue'),
    meta: { layout: "main", requiresAuth: true },
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
      {
        path: '/contacts',
        name: 'Contacts',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Contact.vue'),
      },
      {
        path: '/products',
        name: 'Products',
        component: () => import(/* webpackChunkName: "home" */ '@/views/products/Product.vue'),
      },
      {
        path: '/products/create',
        name: 'ProductsCreate',
        component: () => import(/* webpackChunkName: "home" */ '@/views/products/ProductCreate.vue'),
      },
    ],
  },
  {
    path: '/',
    component: () => import('@/layouts/main-layout/AuthLayout.vue'),
    meta: { layout: "auth" },
    children: [
      {
        path: '/login',
        name: 'Login',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Login.vue'),
      }
    ],
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});
const isAuthenticated = () => {
 return  !!store.getters.TOKEN
};
router.beforeEach((to, from, next) => {
  if (to.matched.some((route) => route.meta?.requiresAuth)) {
    if (isAuthenticated()) {
      next();
    } else {
      next("/login");
    }
  } else {
    next();
  }
});

export default router
