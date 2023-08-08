import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/Home.vue";

const routes = [
  {
    path: "/",
    name: "home",
    meta: { layout: "main" },
    component: HomeView,
  },
  {
    path: "/contact",
    name: "contact",
    meta: { layout: "main" },
    component: () => import("@/views/VContact.vue"),
  },
  {
    path: "/about-us",
    name: "aboutUs",
    meta: { layout: "main" },
    component: () => import("@/views/VAboutUs.vue"),
  },
  {
    path: "/cart",
    name: "cart",
    meta: { layout: "main" },
    component: () => import("@/views/VCart.vue"),
  },
  {
    path: "/products",
    name: "products",
    meta: { layout: "main" },
    component: () => import("@/views/product/VProducts.vue"),
  },
  {
    path: "/product",
    name: "product",
    meta: { layout: "main" },
    component: () => import("@/views/product/VProduct.vue"),
  },
  {
    path: "/blogs",
    name: "blog",
    meta: { layout: "main" },
    component: () => import("../views/Blog.vue"),
  },
  {
    path: "/blog/blog-details",
    name: "oneBlog",
    meta: { layout: "main" },
    component: () => import("@/components/BlogDetailComponent.vue"),
  },
  {
    path: "/login",
    name: "login",
    meta: { layout: "main" },
    component: () => import("../components/login/LoginComponent.vue"),
  },
  {
    path: "/my-account",
    name: "myAccount",
    meta: { layout: "main" },
    component: () => import("../components/my_account/MyAccountComponent.vue"),
  },
  {
    path: "/:pathMatch(.*)*",
    name: "notFound",
    meta: { layout: "main" },
    component: () => import("@/components/errors/NotFound.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
