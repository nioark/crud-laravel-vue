import "./bootstrap";
import router from "./router";
import { createApp } from "vue";

import "../css/app.css";
import App from "./App.vue";

import { VueQueryPlugin } from "@tanstack/vue-query";

createApp(App).use(router, VueQueryPlugin).mount("#app");
