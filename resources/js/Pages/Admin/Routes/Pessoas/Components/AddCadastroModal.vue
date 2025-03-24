<template>
    <dialog ref="dialogRef" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form method="dialog">
                <button
                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                >
                    ✕
                </button>
            </form>
            <h3 class="text-lg font-bold">Informaçoes do cadastro</h3>

            <form @submit.prevent="submitForm" class="">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Nome</legend>
                    <label class="input validator w-full">
                        <IdIcon />
                        <input
                            v-model="form.nome"
                            type="text"
                            placeholder="João Silva"
                            required
                        />
                    </label>
                    <div class="validator-hint hidden">Insira o nome</div>
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Email</legend>
                    <label class="input validator w-full">
                        <EmailIcon />
                        <input
                            v-model="form.email"
                            type="email"
                            placeholder="mail@site.com"
                            required
                        />
                    </label>
                    <div class="validator-hint hidden">
                        Insira um email válido
                    </div>
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Telefone</legend>
                    <label class="input validator w-full">
                        <PhoneIcon />
                        <input
                            type="text"
                            v-model="form.telefone"
                            v-mask:="'(##) #####-####'"
                            placeholder="(00) 00000-0000"
                            patern="^\(\d{2}\) \d{5}-\d{4}$"
                            required
                        />
                    </label>
                    <div class="validator-hint hidden">
                        Insira um telefone válido
                    </div>
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Tipo</legend>
                    <select v-model="form.tipo" class="select w-full" required>
                        <option disabled selected>Escolha um tipo</option>
                        <option value="cpf">Física</option>
                        <option value="cnpj">Júridica</option>
                    </select>
                </fieldset>

                <fieldset
                    v-if="form.tipo === 'cpf'"
                    class="fieldset animate-fade"
                >
                    <legend class="fieldset-legend">CPF</legend>
                    <label class="input validator w-full">
                        <IdIcon />

                        <input
                            v-model="form.cpf_cnpj"
                            type="text"
                            v-mask:="'###.###.###-##'"
                            patern="^\d{3}\.\d{3}\.\d{3}-\d{2}$"
                            placeholder="000.000.000-00"
                            required
                        />
                    </label>
                    <div class="validator-hint hidden">
                        Insira um CPF válido
                    </div>
                </fieldset>

                <fieldset
                    v-if="form.tipo === 'cnpj'"
                    class="fieldset animate-fade"
                >
                    <legend class="fieldset-legend">CNPJ</legend>
                    <label class="input validator w-full">
                        <IdIcon />
                        <input
                            v-model="form.cpf_cnpj"
                            type="text"
                            v-mask:="'##.###.###/####-##'"
                            placeholder="00.000.00/0000-00"
                            pattern="^\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}$"
                            required
                        />
                    </label>
                    <div class="validator-hint hidden">
                        Insira um CNPJ válido
                    </div>
                </fieldset>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-error">Cancelar</button>
                    </form>

                    <button type="submit" class="btn btn-accent">
                        Adicionar
                    </button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";

import IdIcon from "virtual:icons/hugeicons/grid";
import EmailIcon from "virtual:icons/hugeicons/mail-01";
import PhoneIcon from "virtual:icons/hugeicons/call";
import { toast } from "vue-sonner";
import CadastroService, { CadastroForm } from "../CadastroService";

const dialogRef = ref<HTMLDialogElement | null>(null);
const showDialog = () => dialogRef.value?.showModal();
const closeDialog = () => dialogRef.value?.close();

const form = reactive<CadastroForm>({
    nome: "",
    email: "",
    telefone: "",
    tipo: "cpf",
    cpf_cnpj: "",
});

defineExpose({ show: showDialog, close: closeDialog });

async function submitForm() {
    await toast.promise(
        async () => {
            try {
                const response = CadastroService.createCadastro(form);

                console.log(response);
                closeDialog();
            } catch (error) {
                if (error.status == 500)
                    throw new Error("Erro de conexão. Verifique sua internet.");

                throw error;
            }
        },
        {
            loading: "Criando...",
            success: "Cadastro adicionado com sucesso!",
            error: (err) => err.message || "Ocorreu um erro inesperado.",
        }
    );
}
</script>
