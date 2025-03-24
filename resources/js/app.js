import "./bootstrap";
import router from "./router";
import { createApp } from "vue";

import "../css/app.css";
import App from "./App.vue";

import { VueQueryPlugin } from "@tanstack/vue-query";

import VMask from "@ssibrahimbas/v-mask";

createApp(App).use(router).use(VueQueryPlugin).use(VMask).mount("#app");
