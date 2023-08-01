import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/Home.vue";
import Error404Component from "@/components/errors/Error404Component.vue";

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
    component: () => import("../views/VContact.vue"),
  },
  {
    path: "/about-us",
    name: "aboutUs",
    meta: { layout: "main" },
    component: () => import("../views/VAboutUs.vue"),
  },
  {
    path: "/cart",
    name: "cart",
    meta: { layout: "main" },
    component: () => import("../views/VCart.vue"),
  },
  { path: "/:pathMatch(.*)*", name: "NotFound", component: Error404Component },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
