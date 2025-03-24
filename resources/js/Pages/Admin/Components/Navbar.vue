<template>
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <div class="breadcrumbs text-sm">
                <ul>
                    <li>
                        <a>
                            <component :is="crumbs[0].icon" />
                            <router-link :to="crumbs[0].to">
                                {{ crumbs[0].text }}
                            </router-link>
                        </a>
                    </li>

                    <li v-if="crumbs.length > 1">
                        <a>
                            <component :is="crumbs[1].icon" />
                            {{ crumbs[1].text }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2">
            <div class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img
                        alt="Tailwind CSS Navbar component"
                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"
                    />
                </div>
            </div>
        </div>
        <div class="dropdown dropdown-end">
            <div class="flex-none" tabindex="0" role="button">
                <button class="btn btn-square btn-ghost">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="inline-block h-5 w-5 stroke-current"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                        ></path>
                    </svg>
                </button>
            </div>

            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-32 p-2 shadow"
            >
                <li><a>Settings</a></li>
                <li><a @click="logout()">Logout</a></li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";
import router from "../../../router";

async function logout() {
    await axios.get("/sanctum/csrf-cookie");

    await axios.post("/api/logout");

    router.push("/login");
}

const route = useRoute();

const crumbs = computed(() => {
    const pathArray = route.path.split("/");
    pathArray.shift();
    return pathArray.reduce((breadcrumbArray, path, idx) => {
        breadcrumbArray.push({
            path,
            to: breadcrumbArray[idx - 1]
                ? "/" + breadcrumbArray[idx - 1].path + "/" + path
                : "/" + path,
            text: route.matched[idx]?.meta?.breadCrumb?.text || path,
            icon: route.matched[idx]?.meta?.breadCrumb?.icon,
        });
        return breadcrumbArray;
    }, []);
});
</script>
