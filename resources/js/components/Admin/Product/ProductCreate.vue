<template>
    <div class="add-product-page">
        <h1>Yeni Ürün Ekle</h1>
        <form @submit.prevent="addProduct" class="form-container">
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
            <div class="form-group">
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
            <div class="form-group">
                <label for="image_path">Resim URL ekle:</label>
                <input
                    type="text"
                    id="image_path"
                    v-model="newProduct.image_path"
                    required
                />
            </div>
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
    image_path: "",
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

        const productId = response.data.id;

        await axios.post(`/api/products/${productId}/images`, {
            image_path: newProduct.value.image_path,
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
.add-product-page {
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
textarea,
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

textarea {
    min-height: 150px;
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
