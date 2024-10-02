<template>
    <div class="edit-product-page">
        <h1>Kullanıcıyı Düzenle</h1>
        <form @submit.prevent="updateUser">
            <div class="form-group">
                <label for="first_name">Ad:</label>
                <input
                    type="string"
                    id="first_name"
                    v-model="user.first_name"
                    required
                />
            </div>
            <div class="form-group">
                <label for="last_name">Soyad:</label>
                <input
                    type="string"
                    id="last_name"
                    v-model="user.last_name"
                    required
                />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" v-model="user.email" required />
            </div>
            <div class="form-group">
                <label for="phone_number">Telefon Numarası:</label>
                <input
                    type="number"
                    id="phone_number"
                    v-model="user.phone_number"
                    required
                />
            </div>
            <div class="form-group">
                <label for="cafe_name">Kafe İsmi:</label>
                <input
                    type="string"
                    id="cafe_name"
                    v-model="user.cafe_name"
                    required
                />
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input
                    type="password"
                    id="password"
                    v-model="user.password"
                    required
                />
            </div>
            <button type="submit">Güncelle</button>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

const user = ref({
    id: "",
    first_name: "",
    last_name: "",
    email: "",
    phone_number: "",
    cafe_name: "",
    password: "",
});

const route = useRoute();
const router = useRouter();

const getUser = async () => {
    const userId = route.params.id;
    try {
        const response = await axios.get(`/api/users/${userId}`);
        user.value = response.data;
    } catch (error) {
        console.error("Kullanıcı bilgileri alınırken hata oluştu:", error);
    }
};

const updateUser = async () => {
    try {
        await axios.put(`/api/users/${user.value.id}`, user.value);
        router.push("/admin/users");
    } catch (error) {
        console.error("Kullanıcı güncellenirken hata oluştu:", error);
    }
};

onMounted(() => {
    getUser();
});
</script>

<style scoped>
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px 15px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
</style>
