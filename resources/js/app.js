import "./bootstrap";
import "../css/app.css";
import { createApp } from "vue";
import router from "./router/index"; // Router dosyanı import et
import App from "./App.vue"; // Root Vue bileşenini import et

// Admin panel Vue uygulamasını başlat
const app = createApp(App);

// Vue Router'ı Vue uygulamasına ekle
app.use(router);

// Uygulamayı mount et
app.mount("#app");
