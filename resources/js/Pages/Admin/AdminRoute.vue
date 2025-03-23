<template>
    <div class="flex flex-col w-full items-center mx-auto">
        <div class="flex h-full w-full max-w-[100rem] p-2 gap-2">
            <div class="w-64 h-full bg-primary rounded-lg">
                <a class="btn btn-ghost text-xl mb-20">daisyUI</a>

                <ul class="menu w-56">
                    <li class="menu-title">Cadastros</li>
                    <li>
                        <router-link to="/admin/pessoas">
                            <PersonIcon />

                            Pessoas
                        </router-link>
                    </li>

                    <li class="menu-title">Admin</li>
                    <li>
                        <router-link to="/admin/registros">
                            <RegistroIcon />

                            Registros
                        </router-link>
                    </li>
                </ul>
            </div>

            <div class="flex flex-col w-full">
                <Navbar class="" />

                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Navbar from "./Components/Navbar.vue";
import PersonIcon from "virtual:icons/hugeicons/user-multiple-02";
import RegistroIcon from "virtual:icons/hugeicons/align-box-top-right";
</script>
