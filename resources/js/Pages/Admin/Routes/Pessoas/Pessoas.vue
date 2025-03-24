<template>
    <AddCadastroModal ref="addCadastroRef" />

    <div class="flex justify-between w-full mt-2">
        <h2 class="text-3xl font-bold ml-2">Cadastros</h2>
        <div class="flex gap-2">
            <button
                @click="addCadastroRef?.show()"
                class="btn btn-primary h-8 rounded-lg"
            >
                <PlusIcon />
                Adicionar
            </button>
        </div>
    </div>
    <div class="flex justify-end w-full mt-4">
        <label class="input w-96 min-w-96">
            <svg
                class="h-[1em] opacity-50"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
            >
                <g
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke-width="2.5"
                    fill="none"
                    stroke="currentColor"
                >
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input type="search" class="grow" placeholder="Search" />
            <kbd class="kbd kbd-sm">⌘</kbd>
            <kbd class="kbd kbd-sm">K</kbd>
        </label>
    </div>
    <!-- <span v-if="isPending">Loading...</span> -->
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" />
                    </label>
                </th>
                <th>
                    <span class="flex items-center gap-2">
                        <IdIcon />Nome
                    </span>
                </th>
                <!-- <th>Documento</th> -->
                <th>
                    <span class="flex items-center gap-2">
                        <PhoneIcon /> Telefone
                    </span>
                </th>
                <th>
                    <span class="flex items-center gap-2">
                        <EmailIcon /> Email
                    </span>
                </th>
            </tr>
        </thead>
        <tbody v-if="!isPending">
            <!-- row 1 -->
            <tr v-for="cadastro in data">
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" />
                    </label>
                </th>
                <td>
                    <div class="flex items-center gap-3">
                        <!--                         <div class="avatar">
                            <div class="mask mask-squircle h-12 w-12">
                                <img
                                    src="https://img.daisyui.com/images/profile/demo/2@94.webp"
                                    alt="Avatar Tailwind CSS Component"
                                />
                            </div>
                        </div> -->

                        <div
                            class="mask mask-squircle h-12 w-12 bg-neutral flex justify-center items-center"
                        >
                            {{
                                cadastro.nome.split("")[0].toUpperCase() +
                                cadastro.nome.split("")[1].toUpperCase()
                            }}
                        </div>
                        <div>
                            <div class="font-bold">{{ cadastro.nome }}</div>
                            <div
                                :class="
                                    cadastro.tipo === 'cpf'
                                        ? 'bg-blue-500'
                                        : 'bg-amber-400 text-black'
                                "
                                class="text-sm badge badge-ghost badge-sm"
                            >
                                {{ cadastro.tipo.toUpperCase() }}
                                {{ cadastro.cpf_cnpj }}
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="badge badge-ghost badge-sm">
                        {{ cadastro.telefone }}</span
                    >
                </td>
                <td>{{ cadastro.email }}</td>
                <th class="flex justify-end">
                    <button class="btn btn-neutral hover:btn-warning square">
                        <EditIcon />
                    </button>
                    <button class="btn btn-neutral hover:btn-error square">
                        <DeleteIcon />
                    </button>
                </th>
            </tr>
        </tbody>
        <!-- foot -->
        <tfoot class="hidden">
            <tr>
                <th></th>
                <th>
                    <span class="flex items-center gap-2">
                        <IdIcon />Nome
                    </span>
                </th>
                <!-- <th>Documento</th> -->
                <th>
                    <span class="flex items-center gap-2">
                        <PhoneIcon /> Telefone
                    </span>
                </th>
                <th>
                    <span class="flex items-center gap-2">
                        <EmailIcon /> Email
                    </span>
                </th>
            </tr>
        </tfoot>
    </table>
</template>

<script setup lang="ts">
import { useQuery } from "@tanstack/vue-query";
import AddCadastroModal from "./Components/AddCadastroModal.vue";
import axios from "axios";
import { ref } from "vue";

const addCadastroRef = ref<InstanceType<typeof AddCadastroModal> | null>(null);

import PlusIcon from "virtual:icons/hugeicons/user-add-01";
import DeleteIcon from "virtual:icons/hugeicons/delete-04";
import EditIcon from "virtual:icons/hugeicons/edit-01";
import IdIcon from "virtual:icons/hugeicons/identification";
import EmailIcon from "virtual:icons/hugeicons/mail-at-sign-01";
import PhoneIcon from "virtual:icons/hugeicons/call";

const { isPending, isError, data, error } = useQuery({
    queryKey: ["pessoas"],
    queryFn: async () => {
        const response = await axios.get("/api/cadastros");
        return response.data;
    },
});
/* if (isPending) {
    console.log("carregando...");
}
if (isError) {
    console.log("Erro ao carregar:", error, isError);
} */
</script>
