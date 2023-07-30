import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/Home.vue";

const routes = [
  {
    path: "/",
    name: "home",
    meta: { layout: "main" },
    component: HomeView,
  },
  // {
  //   path: "/login",
  //   name: "login",
  //   meta: { layout: "auth" },
  //   component: () => import("../views/Login.vue"),
  // },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
