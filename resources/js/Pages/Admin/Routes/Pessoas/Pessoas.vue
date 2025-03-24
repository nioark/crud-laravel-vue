<template>
    <CadastroModal ref="CadastroModalRef" />

    <div class="flex justify-between w-full mt-2">
        <h2 class="text-3xl font-bold ml-2">Cadastros</h2>
        <div class="flex gap-2">
            <button
                @click="CadastroModalRef?.show()"
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
            <input
                v-model="searchTerm"
                type="search"
                class="grow"
                placeholder="Search"
            />
            <kbd class="kbd kbd-sm">⌘</kbd>
            <kbd class="kbd kbd-sm">K</kbd>
        </label>
    </div>
    <!-- <span v-if="isPending">Loading...</span> -->
    <table v-if="cadastros.length > 0" class="table">
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
        <tbody>
            <!-- row 1 -->
            <tr v-for="cadastro in cadastros" :key="cadastro.id">
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
                                (() => {
                                    const names = cadastro.nome.split(" ");
                                    const firstInitial =
                                        names[0]?.[0]?.toUpperCase() || "";
                                    const secondInitial =
                                        (names.length > 1 &&
                                            names[1]?.[0]?.toUpperCase()) ||
                                        "";
                                    return firstInitial + secondInitial;
                                })()
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
                        {{ cadastro.telefone || "Não informado" }}
                    </span>
                </td>
                <td>{{ cadastro.email || "Não informado" }}</td>
                <th class="flex justify-end">
                    <button
                        @click="CadastroModalRef?.show(cadastro)"
                        class="btn btn-neutral hover:btn-warning square"
                    >
                        <EditIcon />
                    </button>
                    <button
                        @click="CadastroService.deleteCadastro(cadastro.id)"
                        class="btn btn-neutral hover:btn-error square"
                    >
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
    <div class="flex w-full justify-between items-center">
        <div>
            <p class="text-sm text-base-content pl-2">
                Mostrando
                <span class="font-medium">{{ from }}</span>
                a
                <span class="font-medium">{{ to }}</span>
                de
                <span class="font-medium">{{ total }}</span>
                resultados
            </p>
        </div>
        <div class="join">
            <button
                class="join-item btn"
                :disabled="currentPage === 1"
                @click="gotoPage(currentPage - 1)"
            >
                «
            </button>
            <button
                v-if="currentPage > 1"
                class="join-item btn"
                @click="gotoPage(currentPage - 1)"
            >
                {{ currentPage - 1 }}
            </button>
            <button class="join-item btn bg-primary!" disabled>
                {{ currentPage }}
            </button>
            <button
                v-if="currentPage < lastPage && currentPage + 1 != lastPage"
                class="join-item btn"
                @click="gotoPage(currentPage + 1)"
            >
                {{ currentPage + 1 }}
            </button>
            <button
                v-if="lastPage > 2 && currentPage + 2 < lastPage"
                class="join-item btn"
                disabled
            >
                ...
            </button>
            <button
                v-if="
                    currentPage < lastPage &&
                    lastPage > 2 &&
                    currentPage != lastPage
                "
                class="join-item btn"
                @click="gotoPage(lastPage)"
            >
                {{ lastPage }}
            </button>
            <button
                class="join-item btn"
                :disabled="currentPage === lastPage"
                @click="gotoPage(currentPage + 1)"
            >
                »
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import CadastroModal from "./Components/CadastroModal.vue";
import { ref, watch } from "vue";
import CadastroService, { CadastroForm } from "./CadastroService";

const CadastroModalRef = ref<InstanceType<typeof CadastroModal> | null>(null);

import PlusIcon from "virtual:icons/hugeicons/user-add-01";
import DeleteIcon from "virtual:icons/hugeicons/delete-04";
import EditIcon from "virtual:icons/hugeicons/edit-01";
import IdIcon from "virtual:icons/hugeicons/identification";
import EmailIcon from "virtual:icons/hugeicons/mail-at-sign-01";
import PhoneIcon from "virtual:icons/hugeicons/call";

const cadastros = ref<CadastroForm[]>([]);
const currentPage = ref(1);
const lastPage = ref(1);
const from = ref(1);
const to = ref(10);
const total = ref(0);

const searchTerm = ref("");

watch(searchTerm, () => {
    CadastroService.setSearchTerm(searchTerm.value);
});

function gotoPage(page: number) {
    CadastroService.setPage(page);
}
CadastroService.listCadastros().subscribe(async (data) => {
    cadastros.value = data.data;
    lastPage.value = data.last_page;
    from.value = data.from;
    to.value = data.to;
    total.value = data.total;
});

CadastroService.listenPageChange().subscribe((page) => {
    console.log(page);
    currentPage.value = page;
});
</script>
