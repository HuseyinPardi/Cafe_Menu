<template>
    <div class="add-category-page">
        <h1>Yeni Kategori Ekle</h1>
        <form @submit.prevent="addCategory" class="form-container">
            <div class="form-group">
                <label for="name">Kategori Adı:</label>
                <input
                    type="text"
                    id="name"
                    v-model="newCategory.name"
                    required
                />
            </div>
            <div class="form-group">
                <label for="image">Resim Url:</label>
                <input
                    type="text"
                    id="image"
                    v-model="newCategory.image"
                    required
                />
            </div>
            <div class="form-group">
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
    image: "",
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
            image: newCategory.value.image,
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
.add-category-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #f4f4f4;
}

h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.form-container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #333;
}

input,
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}
</style>
