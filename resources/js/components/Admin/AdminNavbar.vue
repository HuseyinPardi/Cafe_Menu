<template>
    <nav class="admin-navbar">
        <div class="logo">
            <router-link to="/admin" class="dashboard"
                >Admin Paneli</router-link
            >
        </div>
        <ul class="nav-links">
            <li>
                <router-link to="/admin/users" class="nav-link"
                    >Kafeler</router-link
                >
            </li>
            <li>
                <router-link to="/admin/categories" class="nav-link"
                    >Kategoriler</router-link
                >
            </li>
            <li>
                <router-link to="/admin/products" class="nav-link"
                    >Ürünler</router-link
                >
            </li>
        </ul>
        <div class="user-info">
            <span>Admin</span>
            <button class="logout" @click="logout()">Admin Panelden Çık</button>
        </div>
    </nav>
</template>

<script setup>
import axios from "axios";
import { useRouter } from "vue-router";
const router = useRouter();
const logout = async () => {
    try {
        const response = await axios.post("/logout");
        console.log(response.data.message);
        window.location.href = "/";
    } catch (error) {
        console.error("Çıkış yaparken bir hata oluştu:", error);
    }
};
</script>

<style scoped>
.dashboard {
    text-decoration: none;
    color: white;
}

.dashboard:hover {
    color: #ffcc00;
}
.admin-navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px 20px;
    color: white;
}

.logo {
    font-size: 1.5em;
    font-weight: bold;
}

.nav-links {
    list-style-type: none;
    display: flex;
    gap: 20px;
}

.nav-links li a {
    color: white;
    text-decoration: none;
    transition: color 0.3s;
}

.nav-links li a:hover {
    color: #ffcc00;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logout {
    background-color: #ff0000;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
}
</style>
