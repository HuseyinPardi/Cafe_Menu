<template>
    <AdminNavbar />
    <router-view></router-view>
</template>

<script>
import { defineComponent } from "vue"; // Composition API'den defineComponent'i içe aktar
import AdminNavbar from "./admin/components/AdminNavbar.vue";

export default defineComponent({
    components: {
        AdminNavbar,
    },
    setup() {
        // Bu alanda reactive değişkenler, computed properties ve diğer Composition API özellikleri tanımlanabilir.

        return {
            // Buradan geri döndürülmesi gereken değişkenler ve fonksiyonlar
        };
    },
});
</script>

<style>
/* Admin paneline özel stiller burada tanımlanabilir */
</style>
