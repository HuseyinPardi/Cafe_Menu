<template>
    <div class="edit-product-page">
        <h1>Ürünü Düzenle</h1>
        <form @submit.prevent="updateProduct" class="form-container">
            <div class="form-group">
                <label for="name">Ürün Adı:</label>
                <input type="text" id="name" v-model="product.name" required />
            </div>
            <div class="form-group">
                <label for="price">Fiyat:</label>
                <input
                    type="number"
                    id="price"
                    v-model="product.price"
                    required
                />
            </div>
            <div class="form-group">
                <label for="description">Açıklama:</label>
                <textarea
                    id="description"
                    v-model="product.description"
                    required
                ></textarea>
            </div>
            <div class="form-group">
                <label for="images">Mevcut Resimler:</label>
                <div v-for="(image, index) in product.image_paths" :key="index">
                    <input
                        type="text"
                        v-model="product.image_paths[index]"
                        class="image-path"
                    />
                </div>
            </div>
            <div class="form-group">
                <label for="new-image">Yeni Resim Ekle:</label>
                <input type="text" v-model="newImage" class="new-image-path" />
                <button type="button" @click="addImage">Ekle</button>
            </div>
            <button type="submit">Güncelle</button>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

const product = ref({
    id: "",
    name: "",
    price: "",
    description: "",
    image_paths: [],
});
const newImage = ref("");

const route = useRoute();
const router = useRouter();

const getProduct = async () => {
    const productId = route.params.id;
    try {
        const response = await axios.get(`/api/products/${productId}`);
        product.value = response.data;
        product.value.image_paths = response.data.images.map(
            (image) => image.image_path
        );
    } catch (error) {
        console.error("Ürün bilgileri alınırken hata oluştu:", error);
    }
};

const addImage = () => {
    if (newImage.value) {
        product.value.image_paths.push(newImage.value);
        newImage.value = "";
    }
};

const updateProduct = async () => {
    try {
        await axios.put(`/api/products/${product.value.id}`, product.value);
        router.push("/admin/products");
    } catch (error) {
        console.error("Ürün güncellenirken hata oluştu:", error);
    }
};

onMounted(() => {
    getProduct();
});
</script>

<style scoped>
.edit-product-page {
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
    margin-bottom: 20px;
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
textarea {
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

.new-image-path {
    margin-bottom: 10px;
}
</style>
