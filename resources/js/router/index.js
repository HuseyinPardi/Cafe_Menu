import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../admin/components/Dashboard.vue";
import UserList from "../admin/components/users/UserList.vue";
import UserEdit from "../admin/components/users/UserEdit.vue";
import UserCreate from "../admin/components/users/UserCreate.vue";
import CategoryList from "../admin/components/categories/CategoryList.vue";
import CategoryEdit from "../admin/components/categories/CategoryEdit.vue";
import CategoryCreate from "../admin/components/categories/CategoryCreate.vue";
import ProductList from "../admin/components/products/ProductList.vue";
import ProductEdit from "../admin/components/products/ProductEdit.vue";
import ProductCreate from "../admin/components/products/ProductCreate.vue";

const routes = [
    { path: "/admin", component: Dashboard },
    { path: "/admin/users", component: UserList },
    { path: "/admin/users/create", component: UserCreate },
    { path: "/admin/users/:id/edit", component: UserEdit },
    { path: "/admin/categories", component: CategoryList },
    { path: "/admin/categories/create", component: CategoryCreate },
    { path: "/admin/categories/:id/edit", component: CategoryEdit },
    { path: "/admin/products", component: ProductList },
    { path: "/admin/products/create", component: ProductCreate },
    { path: "/admin/products/:id/edit", component: ProductEdit },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
