import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Admin/Dashboard.vue";
import UserList from "../views/Admin/Users.vue";
import UserEdit from "../components/Admin/User/UserEdit.vue";
import UserCreate from "../components/Admin/User/UserCreate.vue";
import CategoryList from "../views/Admin/Categories.vue";
import CategoryCreate from "../components/Admin/Category/CategoryCreate.vue";
import ProductList from "../views/Admin/Products.vue";
import ProductEdit from "../components/Admin/Product/ProductEdit.vue";
import ProductCreate from "../components/Admin/Product/ProductCreate.vue";

const routes = [
    { path: "/admin", component: Dashboard },
    { path: "/admin/users", component: UserList },
    { path: "/admin/users/create", component: UserCreate },
    { path: "/admin/users/:id/edit", component: UserEdit },
    { path: "/admin/categories", component: CategoryList },
    { path: "/admin/categories/create", component: CategoryCreate },
    { path: "/admin/products", component: ProductList },
    { path: "/admin/products/create", component: ProductCreate },
    { path: "/admin/products/:id/edit", component: ProductEdit },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
