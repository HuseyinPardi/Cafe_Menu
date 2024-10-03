import "bootstrap";
import axios from "axios";
window.axios = axios;

const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: Make sure you are including a csrf-token meta tag in your layout."
    );
}

//window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
