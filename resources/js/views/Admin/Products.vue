<template>
    <div class="products-container">
        <h1 class="products-title">Ürünler</h1>
        <ul class="products-list">
            <li
                v-for="product in products"
                :key="product.id"
                class="product-item"
            >
                <span class="product-id">{{ product.id }}.</span>

                <span class="product-name">{{ product.name }}</span>

                <div class="product-actions">
                    <button
                        class="edit-button"
                        @click="editProduct(product.id)"
                    >
                        Edit
                    </button>
                    <button
                        class="delete-button"
                        @click="deleteProduct(product.id)"
                    >
                        Delete
                    </button>
                </div>
            </li>
        </ul>
        <button class="add-button" @click="addProduct()">Yeni Ürün Ekle</button>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const products = ref([]);
const router = useRouter();

const getProducts = async () => {
    try {
        const response = await axios.get("/api/products");
        products.value = response.data;
    } catch (error) {
        console.error("Ürünler çekilirken bir hata oluştu: ", error);
    }
};

const addProduct = () => {
    router.push(`/admin/products/create`);
};

const editProduct = (id) => {
    router.push(`/admin/products/${id}/edit`);
};

const deleteProduct = async (id) => {
    const confirmation = confirm(
        "Bu ürünü silmek istediğinizden emin misiniz?"
    );
    if (confirmation) {
        try {
            await axios.delete(`/api/products/${id}`);
            products.value = products.value.filter(
                (product) => product.id !== id
            );
            console.log(`Ürün ${id} başarıyla silindi.`);
        } catch (error) {
            console.error("Ürün silinirken bir hata oluştu:", error);
        }
    }
};

onMounted(() => {
    getProducts();
});
</script>

<style scoped>
.products-container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.products-title {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 15px;
    color: #333;
}

.products-list {
    list-style-type: none;
    padding-left: 0;
    margin: 0;
}

.product-item {
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

.product-item:hover {
    background-color: #f0f0f0;
    transform: translateX(5px);
}

.product-id {
    font-weight: bold;
    margin-right: 10px;
}

.product-name {
    flex-grow: 1;
}

.product-actions {
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
