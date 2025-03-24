<template>
    <div class="flex w-full items-center justify-center magicpattern">
        <div
            class="flex w-[400px] md:w-[800px] h-[500px] justify-center items-center rounded-lg overflow-hidden bg-base-100 animate-fade-up animate-ease-in"
        >
            <div
                class="hidden md:block md:w-1/2 h-full relative overflow-hidden"
            >
                <img
                    src="/resources/media/background.png"
                    alt=""
                    class="h-full w-full object-cover"
                />
                <!-- <div class="absolute inset-0 bg-gradient-to-r from-80%  from-transparent to-base-100"></div> -->
            </div>
            <div class="w-1/2 h-full flex justify-center items-center flex-col">
                <!-- bg-base-200 border border-base-300 rounded-box -->
                <div class="flex flex-col h-full justify-center p-8">
                    <h2 class="text-3xl font-bold">Bem vindo!</h2>
                    <p class="text-gray-400">Faça login para continuar.</p>

                    <fieldset class="fieldset w-xs mt-4">
                        <label class="input validator">
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
                                    <rect
                                        width="20"
                                        height="16"
                                        x="2"
                                        y="4"
                                        rx="2"
                                    ></rect>
                                    <path
                                        d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"
                                    ></path>
                                </g>
                            </svg>
                            <input
                                v-model="email"
                                type="email"
                                placeholder="exemplo@dominio.com"
                                required
                            />
                        </label>
                        <div class="validator-hint hidden">
                            Insira um email válido
                        </div>

                        <label class="input validator mt-1">
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
                                    <path
                                        d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"
                                    ></path>
                                    <circle
                                        cx="16.5"
                                        cy="7.5"
                                        r=".5"
                                        fill="currentColor"
                                    ></circle>
                                </g>
                            </svg>
                            <input
                                v-model="password"
                                type="password"
                                required
                                placeholder="Password"
                                minlength="4"
                                title="Must be more than 8 characters, including number, lowercase letter, uppercase letter"
                            />
                            <!--                             pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
 -->
                        </label>
                        <p class="validator-hint hidden">
                            Must be more than 8 characters, including
                            <br />At least one number <br />At least one
                            lowercase letter <br />At least one uppercase letter
                        </p>

                        <button
                            @click="login(email, password)"
                            class="btn rounded-lg btn-neutral mt-4"
                        >
                            Login
                        </button>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";

async function login(email, password) {
    try {
        const csrfResponse = await axios.get("/sanctum/csrf-cookie");
        console.log(csrfResponse); // You can check the response for debugging

        // Now make the login request
        const loginResponse = await axios.post("/api/login", {
            email,
            password,
        });
        console.log("Login successful:", loginResponse.data); // Handle the successful login
        // Navigate to admin route on successful login
        router.push("/admin");
    } catch (error) {
        console.error("Login failed:", error);
    }
}
</script>
