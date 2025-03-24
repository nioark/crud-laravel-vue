<template>
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <div class="breadcrumbs text-sm">
                <ul>
                    <li>
                        <a>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="h-4 w-4 stroke-current"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"
                                ></path>
                            </svg>
                            <router-link :to="crumbs[0].to">
                                {{ crumbs[0].text }}
                            </router-link>
                        </a>
                    </li>

                    <li v-if="crumbs.length > 1">
                        <a>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="h-4 w-4 stroke-current"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"
                                ></path>
                            </svg>
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
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow"
                >
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        crumbs: function () {
            let pathArray = this.$route.path.split("/");
            pathArray.shift();
            let breadcrumbs = pathArray.reduce((breadcrumbArray, path, idx) => {
                console.log(idx, this.$route);
                console.log("Matched", this.$route.matched[idx]);
                breadcrumbArray.push({
                    path: path,
                    to: breadcrumbArray[idx - 1]
                        ? "/" + breadcrumbArray[idx - 1].path + "/" + path
                        : "/" + path,
                    text: this.$route.matched[idx].meta.breadCrumb.text || path,
                });
                return breadcrumbArray;
            }, []);
            return breadcrumbs;
        },
    },
};
</script>
