import "./bootstrap";
import { createApp } from "vue";
import EmployerList from "./components/EmployerList.vue";

const app = createApp({});

app.component("EmployerList", EmployerList);

app.mount("#app");
