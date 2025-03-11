import "./bootstrap";
import Alpine from "alpinejs";

import { createApp } from "vue";
import Antd from "ant-design-vue";
import "ant-design-vue/dist/reset.css";
import App from "./App.vue";

window.Alpine = Alpine;
Alpine.start();

createApp(App).use(Antd).mount("#app");
