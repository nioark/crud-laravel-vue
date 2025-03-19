import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Pages/HomeRoute.vue"),
    },
    {
        path: "/test",
        component: () => import("./Pages/TestRoute.vue"),
    },
    {
        path: "/login",
        component: () => import("./Pages/LoginRoute.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});