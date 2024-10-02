<template>
    <div class="edit-product-page">
        <h1>Ürünü Düzenle</h1>
        <form @submit.prevent="updateProduct">
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
});

const route = useRoute();
const router = useRouter();

// Ürünü API'den çekiyoruz
const getProduct = async () => {
    const productId = route.params.id; // URL'den ürün ID'sini alıyoruz
    try {
        const response = await axios.get(`/api/products/${productId}`);
        product.value = response.data; // Ürün bilgilerini state'e atıyoruz
    } catch (error) {
        console.error("Ürün bilgileri alınırken hata oluştu:", error);
    }
};

// Ürün güncelleme fonksiyonu
const updateProduct = async () => {
    try {
        await axios.put(`/api/products/${product.value.id}`, product.value); // API çağrısı
        router.push("/admin/products"); // Güncelleme sonrası ürünler sayfasına yönlendiriyoruz
    } catch (error) {
        console.error("Ürün güncellenirken hata oluştu:", error);
    }
};

// Sayfa yüklendiğinde ürünü alıyoruz
onMounted(() => {
    getProduct();
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
