<template>
    <div class="flex flex-col ml-4">
        <div class="max-w-xl">
            <h2 class="text-3xl text-accent font-bold sm:text-4xl">
                Acessos rápidos
            </h2>

            <p class="mt-4 text-neutral-content">
                Segue a lista de acessos mais importantes do sistema
            </p>
        </div>

        <div
            class="mt-8 grid grid-cols-1 gap-8 md:mt-16 md:grid-cols-2 md:gap-12 lg:grid-cols-3"
        >
            <router-link
                to="/admin/pessoas"
                class="flex cursor-pointer items-start gap-4 rounded-lg p-2 transition-all hover:bg-neutral-700 border-2 hover:border-secondary border-transparent hover:drop-shadow-lg"
            >
                <span class="rounded-lg bg-secondary p-3">
                    <UserAddIcon class="text-secondary-content" />
                </span>

                <div>
                    <h2 class="text-lg font-bold">Cadastrar uma pessoa</h2>

                    <p class="mt-1 text-sm text-neutral-content">
                        Clique aqui para cadastrar uma pessoa no sistema
                    </p>
                </div>
            </router-link>

            <router-link
                to="/admin/pessoas"
                class="flex cursor-pointer items-start gap-4 rounded-lg p-2 transition-all hover:bg-neutral-700 border-2 hover:border-secondary border-transparent hover:drop-shadow-lg h-32"
            >
                <span class="rounded-lg bg-secondary p-3">
                    <CadastrosIcon class="text-secondary-content" />
                </span>

                <div>
                    <h2 class="text-lg font-bold">Painel de Cadastros</h2>

                    <p class="mt-1 text-sm text-neutral-content">
                        Acompanhe os cadastros realizados no sistema, onde pode
                        visualizar e editar cadastros realizados.
                    </p>
                </div>
            </router-link>

            <div
                v-tippy="'⚠️ Não implementado apenas visual!!'"
                class="flex cursor-pointer items-start gap-4 rounded-lg p-2 transition-all hover:bg-neutral-700 border-2 hover:border-secondary border-transparent hover:drop-shadow-lg h-32"
            >
                <span class="rounded-lg bg-secondary p-3">
                    <RegistrosIcon class="text-secondary-content" />
                </span>

                <div>
                    <h2 class="text-lg font-bold">Registros</h2>

                    <p class="mt-1 text-sm text-neutral-content">
                        Clique aqui para ver registros dos administradores no
                        sistema, visualize suas alterações.
                    </p>
                </div>
            </div>

            <div
                v-tippy="'⚠️ Não implementado apenas visual!!'"
                class="flex cursor-pointer items-start gap-4 rounded-lg p-2 transition-all hover:bg-neutral-700 border-2 hover:border-secondary border-transparent hover:drop-shadow-lg h-32"
            >
                <span class="rounded-lg bg-secondary p-3">
                    <ColaboradoresIcon class="text-secondary-content" />
                </span>

                <div>
                    <h2 class="text-lg font-bold">Adicionar colaborador</h2>

                    <p class="mt-1 text-sm text-neutral-content">
                        Clique aqui para adicionar um colaborador ao sistema.
                    </p>
                </div>
            </div>

            <div
                v-tippy="'⚠️ Não implementado apenas visual!!'"
                class="flex cursor-pointer items-start gap-4 rounded-lg p-2 transition-all hover:bg-neutral-700 border-2 hover:border-secondary border-transparent hover:drop-shadow-lg h-32"
            >
                <span class="rounded-lg bg-secondary p-3">
                    <ConfiguracoesIcon class="text-secondary-content" />
                </span>

                <div>
                    <h2 class="text-lg font-bold">Configurações da conta</h2>

                    <p class="mt-1 text-sm text-neutral-content">
                        Clique aqui para alterar as configurações da sua conta,
                        como nome, email e senha.
                    </p>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div
            class="stats shadow"
            v-tippy="'⚠️ Não implementado apenas visual!!'"
        >
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path>
                    </svg>
                </div>
                <div class="stat-title">Cadastros</div>
                <div class="stat-value">2,345</div>
                <div class="stat-desc">Jan 1st - Feb 1st</div>
            </div>

            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                        ></path>
                    </svg>
                </div>
                <div class="stat-title">Novos Cadastros</div>
                <div class="stat-value">112</div>
                <div class="stat-desc">↗︎ 400 (22%)</div>
            </div>

            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                        ></path>
                    </svg>
                </div>
                <div class="stat-title">Pessoas Juridicas</div>
                <div class="stat-value">347</div>
                <div class="stat-desc">↘︎ 90 (14%)</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                        ></path>
                    </svg>
                </div>
                <div class="stat-title">Pessoas Físicas</div>
                <div class="stat-value">1300</div>
                <div class="stat-desc">↘︎ 90 (30%)</div>
            </div>
        </div>
    </div>
</template>

<script setup>
import UserAddIcon from "virtual:icons/hugeicons/user-add-01";
import CadastrosIcon from "virtual:icons/hugeicons/profile-02";
import RegistrosIcon from "virtual:icons/hugeicons/apple-reminder";
import ColaboradoresIcon from "virtual:icons/hugeicons/shield-user";
import ConfiguracoesIcon from "virtual:icons/hugeicons/settings-01";
import { directive as VTippy } from "vue-tippy";
</script>
