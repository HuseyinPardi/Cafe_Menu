<template>
    <div class="add-category-page">
        <h1>Yeni Kategori Ekle</h1>
        <form @submit.prevent="addCategory">
            <div class="form-group">
                <label for="name">Kategori Adı:</label>
                <input
                    type="text"
                    id="name"
                    v-model="newCategory.name"
                    required
                />
            </div>
            <div>
                <label for="users">Kafe Seç:</label>
                <select v-model="selectedUser" required>
                    <option
                        v-for="user in users"
                        :key="user.id"
                        :value="user.id"
                    >
                        {{ user.cafe_name }}
                    </option>
                </select>
            </div>
            <br />
            <button type="submit">Ekle</button>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const newCategory = ref({
    name: "",
});
const users = ref([]);
const selectedUser = ref(null);
const router = useRouter();

const getUsers = async () => {
    try {
        const response = await axios.get("/api/users");
        users.value = response.data;
    } catch (error) {
        console.error("Kafeler çekilirken bir hata oluştu:", error);
    }
};

const addCategory = async () => {
    try {
        const response = await axios.post("/api/categories", {
            name: newCategory.value.name,
            user_id: selectedUser.value,
        });

        console.log("Kategori başarıyla eklendi:", response.data);
        router.push("/admin/categories");
    } catch (error) {
        console.error("Kategori eklenirken bir hata oluştu:", error);
    }
};
onMounted(() => {
    getUsers();
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

input,
textarea {
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
