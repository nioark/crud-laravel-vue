<template>
    <div class="flex flex-col w-full items-center mx-auto">
        <div class="flex h-full w-full max-w-[100rem] p-2 gap-2">
            <div class="w-64 h-full flex flex-col bg-base-100 rounded-lg">
                <div
                    class="btn btn-ghost text-xl mb-20 flex w-full items-center justify-start"
                >
                    <LogoIcon class="text-accent text-2xl mt-1" />AdminUI
                </div>

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
                    <li>
                        <router-link to="/admin/usuarios">
                            <UsersIcon />

                            Usuários
                        </router-link>
                    </li>
                </ul>
                <div class="mt-auto select-none">
                    <div class="flex items-center gap-2 p-4 text-sm">
                        <CogIcon />

                        Configurações
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-full max-h-full overflow-auto">
                <Navbar class="" />
                <div class="flex flex-col w-full max-h-full overflow-auto">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Navbar from "./Components/Navbar.vue";
import PersonIcon from "virtual:icons/hugeicons/user-multiple-02";
import RegistroIcon from "virtual:icons/hugeicons/align-box-top-right";
import CogIcon from "virtual:icons/hugeicons/settings-01";
import LogoIcon from "virtual:icons/hugeicons/alpha-square";
import UsersIcon from "virtual:icons/hugeicons/user-shield-01";
import { directive as VTippy } from "vue-tippy";
</script>
