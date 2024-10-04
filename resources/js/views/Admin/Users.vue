<template>
    <div class="users-container">
        <h1 class="users-title">Kullanıcılar</h1>
        <ul class="users-list">
            <li v-for="user in users" :key="user.id" class="user-item">
                <span class="user-id">{{ user.id }}.</span>

                <span class="user-name">{{ user.cafe_name }}</span>
                <div class="user-actions">
                    <button class="edit-button" @click="editUser(user.id)">
                        Edit
                    </button>
                    <button class="delete-button" @click="deleteUser(user.id)">
                        Delete
                    </button>
                </div>
            </li>
        </ul>
        <button class="add-button" @click="addUser()">Yeni Kafe Ekle</button>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const users = ref([]);
const router = useRouter();

const getUsers = async () => {
    try {
        const response = await axios.get("/api/users");
        users.value = response.data;
        console.log("Kullanıcılar: ", users.value);
    } catch (error) {
        console.error("Kullanıcılar çekilirken bir hata oluştu: ", error);
    }
};

const addUser = () => {
    router.push(`/admin/users/create`);
};

const editUser = (id) => {
    router.push(`/admin/users/${id}/edit`);
};

const deleteUser = async (id) => {
    const confirmation = confirm(
        "Bu kullanıcıyı silmek istediğinizden emin misiniz?"
    );
    if (confirmation) {
        try {
            await axios.delete(`/api/users/${id}`);
            users.value = users.value.filter((user) => user.id !== id);
            console.log(`Kullanıcı ${id} başarıyla silindi.`);
        } catch (error) {
            console.error("Kullanıcı silinirken bir hata oluştu:", error);
        }
    }
};

onMounted(() => {
    getUsers();
});
</script>

<style scoped>
.users-container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.users-title {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 15px;
    color: #333;
}

.users-list {
    list-style-type: none;
    padding-left: 0;
    margin: 0;
}

.user-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 18px;
    color: #555;
    background-color: #fff;
    margin: 10px 0;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    transition: background-color 0.3s, transform 0.3s;
}

.user-item:hover {
    background-color: #f0f0f0;
    transform: translateX(5px);
}

.user-id {
    font-weight: bold;
    margin-right: 10px;
}

.user-name {
    flex-grow: 1;
}

.user-actions {
    display: flex;
    gap: 10px;
}

.edit-button {
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.edit-button:hover {
    background-color: #45a049;
}

.add-button {
    background-color: #4379f2;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.add-button:hover {
    background-color: blue;
}

.delete-button {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.delete-button:hover {
    background-color: #e53935;
}
</style>
