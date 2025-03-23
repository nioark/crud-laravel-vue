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
    {
        path: "/admin",
        component: () => import("./Pages/Admin/AdminRoute.vue"),
        children: [
            {
                path: "",
                name: "admin-home",
                component: () => import("./Pages/Admin/Routes/Home.vue"),
            },
            {
                path: "pessoas",
                name: "admin-pessoas",
                component: () => import("./Pages/Admin/Routes/Pessoas.vue"),
                meta: {
                    breadCrumb: {
                        to: "/admin/pessoas",
                        text: "Cadastros",
                    },
                },
            },
            {
                path: "registros",
                name: "admin-registros",
                component: () => import("./Pages/Admin/Routes/Registros.vue"),
                meta: {
                    breadCrumb: {
                        to: "/admin/registros",
                        text: "Registros",
                    },
                },
            },
        ],
        meta: {
            breadCrumb: {
                to: "/admin",
                text: "Home",
            },
        },
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
/* 
.beforeEach(async (to, from) => {
    if (
      // make sure the user is authenticated
      !isAuthenticated &&
      // ❗️ Avoid an infinite redirect
      to.name !== 'Login'
    ) {
      // redirect the user to the login page
      return { name: 'Login' }
    }
}); */
