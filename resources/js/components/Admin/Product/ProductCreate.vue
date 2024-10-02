<template>
    <div class="add-product-page">
        <h1>Yeni Ürün Ekle</h1>
        <form @submit.prevent="addProduct">
            <div class="form-group">
                <label for="name">Ürün Adı:</label>
                <input
                    type="text"
                    id="name"
                    v-model="newProduct.name"
                    required
                />
            </div>
            <div class="form-group">
                <label for="price">Fiyat:</label>
                <input
                    type="number"
                    id="price"
                    v-model="newProduct.price"
                    required
                />
            </div>
            <div class="form-group">
                <label for="description">Açıklama:</label>
                <textarea
                    id="description"
                    v-model="newProduct.description"
                    required
                ></textarea>
            </div>
            <div>
                <label for="categories">Kategori Seç:</label>
                <select v-model="selectedCategory" required>
                    <option
                        v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                    >
                        {{ category.name }}
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

const newProduct = ref({
    name: "",
    price: "",
    description: "",
});
const categories = ref([]);
const selectedCategory = ref(null);
const router = useRouter();

const getCategories = async () => {
    try {
        const response = await axios.get("/api/categories");
        categories.value = response.data;
    } catch (error) {
        console.error("Kategoriler çekilirken bir hata oluştu:", error);
    }
};

const addProduct = async () => {
    try {
        const response = await axios.post("/api/products", {
            name: newProduct.value.name,
            price: parseFloat(newProduct.value.price),
            description: newProduct.value.description,
            category_id: selectedCategory.value,
        });

        console.log("Ürün başarıyla eklendi:", response.data);
        router.push("/admin/products");
    } catch (error) {
        console.error("Ürün eklenirken bir hata oluştu:", error);
    }
};
onMounted(() => {
    getCategories();
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
