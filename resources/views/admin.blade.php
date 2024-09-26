<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/js/app.js') <!-- Vite ile Vue uygulamasını dahil ediyoruz -->
</head>
<body>
    <div id="app">
        <!-- Vue'nun yüklenip sayfaları göstermesini bekliyoruz -->
        <router-view></router-view>
    </div>
</body>
</html>
