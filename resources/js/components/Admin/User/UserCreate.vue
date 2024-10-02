<template>
    <div class="add-user-page">
        <h1>Yeni Kullanıcı Ekle</h1>
        <form @submit.prevent="addUser">
            <div class="form-group">
                <label for="first_name">Ad:</label>
                <input
                    type="string"
                    id="first_name"
                    v-model="newUser.first_name"
                    required
                />
            </div>
            <div class="form-group">
                <label for="last_name">Soyad:</label>
                <input
                    type="string"
                    id="last_name"
                    v-model="newUser.last_name"
                    required
                />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input
                    type="email"
                    id="email"
                    v-model="newUser.email"
                    required
                />
            </div>
            <div class="form-group">
                <label for="phone_number">Telefon Numarası:</label>
                <input
                    type="number"
                    id="phone_number"
                    v-model="newUser.phone_number"
                    required
                />
            </div>
            <div class="form-group">
                <label for="cafe_name">Kafe İsmi:</label>
                <input
                    type="string"
                    id="cafe_name"
                    v-model="newUser.cafe_name"
                    required
                />
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input
                    type="password"
                    id="password"
                    v-model="newUser.password"
                    required
                />
            </div>
            <br />
            <button type="submit">Ekle</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const newUser = ref({
    first_name: "",
    last_name: "",
    email: "",
    phone_number: "",
    cafe_name: "",
    password: "",
});

const router = useRouter();

const addUser = async () => {
    try {
        const response = await axios.post("/api/users", {
            first_name: newUser.value.first_name,
            last_name: newUser.value.last_name,
            email: newUser.value.email,
            phone_number: newUser.value.phone_number,
            cafe_name: newUser.value.cafe_name,
            password: newUser.value.password,
        });

        console.log("Kullanıcı başarıyla eklendi:", response.data);
        router.push("/admin/users");
    } catch (error) {
        console.error("Kullanıcı eklenirken bir hata oluştu:", error);
    }
};
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
