import { createRouter, createWebHistory } from "vue-router";
import axios from "axios";
import HomeIcon from "virtual:icons/hugeicons/home-11";
import PersonIcon from "virtual:icons/hugeicons/user-multiple-02";

axios.defaults.baseURL = "http://127.0.0.1:8000";
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"; // Set the proper header

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
        meta: {
            guest: true,
        },
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
                component: () =>
                    import("./Pages/Admin/Routes/Pessoas/Pessoas.vue"),
                meta: {
                    breadCrumb: {
                        icon: PersonIcon,
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
            requiresAuth: true,
            breadCrumb: {
                icon: HomeIcon,
                to: "/admin",
                text: "Home",
            },
        },
    },
];

async function isAuthenticated() {
    try {
        const response = await axios.get("http://127.0.0.1:8000/api/user", {
            withCredentials: true,
        });
        return response.data; // If user is logged in, return user data
    } catch (error) {
        console.log(error);
        return null; // If not logged in, return null
    }
}

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    const user = await isAuthenticated();

    if (to.meta.requiresAuth && !user) {
        next("/login"); // Redirect to login if not authenticated
        /*     } else if (to.meta.requiresAdmin && user?.role !== "admin") {
        next("/dashboard"); // Redirect non-admin users to dashboard */
    } else if (to.meta.guest && user) {
        next("/admin"); // Prevent logged-in users from accessing login
    } else {
        next(); // Continue navigation
    }
});

export default router;
