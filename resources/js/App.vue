<template>
    <AdminNavbar />
    <router-view></router-view>
</template>

<script setup>
import AdminNavbar from "./components/Admin/AdminNavbar.vue";
</script>

<style scoped>
* {
    font-family: "Lora", serif !important;
}
</style>
