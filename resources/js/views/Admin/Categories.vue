<template>
    <div class="categories-container">
        <h1 class="categories-title">Kategoriler</h1>
        <ul class="categories-list">
            <li
                v-for="category in categories"
                :key="category.id"
                class="category-item"
            >
                <span class="category-id">{{ category.id }}.</span>

                <span class="category-name">{{ category.name }}</span>
                <div class="category-actions">
                    <button
                        class="delete-button"
                        @click="deleteCategory(category.id)"
                    >
                        Delete
                    </button>
                </div>
            </li>
        </ul>
        <button class="add-button" @click="addCategory()">
            Yeni Kategori Ekle
        </button>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const categories = ref([]);
const router = useRouter();

const getCategories = async () => {
    try {
        const response = await axios.get("/api/categories");
        categories.value = response.data;
    } catch (error) {
        console.error("Kategoriler çekilirken bir hata oluştu: ", error);
    }
};

const addCategory = () => {
    router.push(`/admin/categories/create`);
};

const deleteCategory = async (id) => {
    const confirmation = confirm(
        "Bu kategoriyi silmek istediğinizden emin misiniz?"
    );
    if (confirmation) {
        try {
            await axios.delete(`/api/categories/${id}`);
            categories.value = categories.value.filter(
                (category) => category.id !== id
            );
            console.log(`Kategori ${id} başarıyla silindi.`);
        } catch (error) {
            console.error("Kategori silinirken bir hata oluştu:", error);
        }
    }
};

onMounted(() => {
    getCategories();
});
</script>

<style scoped>
.categories-container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.categories-title {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 15px;
    color: #333;
}

.categories-list {
    list-style-type: none;
    padding-left: 0;
    margin: 0;
}

.category-item {
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

.category-item:hover {
    background-color: #f0f0f0;
    transform: translateX(5px);
}

.category-id {
    font-weight: bold;
    margin-right: 10px;
}

.category-name {
    flex-grow: 1;
}

.category-actions {
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
