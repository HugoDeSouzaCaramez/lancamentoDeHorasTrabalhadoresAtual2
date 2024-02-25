import "./bootstrap";
import { createApp } from "vue";
import EmployerList from "./components/EmployerList.vue";
import DateSearch from "./components/DateSearch.vue";

const app = createApp({});

app.component("EmployerList", EmployerList);
app.component("DateSearch", DateSearch);

app.mount("#app");
