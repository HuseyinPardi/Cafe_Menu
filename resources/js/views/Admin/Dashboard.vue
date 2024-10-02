<template>
    <div class="admin-dashboard">
        <h1>Admin Dashboard</h1>
        <div class="admin-dashboard-img">
            <img
                src="https://img.freepik.com/premium-vector/admin-control-panel-flat-illustration-editable-vector_203633-1917.jpg"
                alt="admin"
            />
        </div>
    </div>
</template>

<script setup></script>

<style scoped>
.admin-dashboard {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 12px;
}

.admin-dashboard-img {
    border: 2px solid #333;
    border-radius: 3px;
    box-shadow: 4px 8px 12px rgba(0, 0, 0, 0.2);
}
</style>
