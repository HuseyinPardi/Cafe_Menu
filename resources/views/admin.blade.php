<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/js/app.js') <!-- Vite ile Vue kullanımı için -->
</head>
<body id="admin-blade">
    <div id="app">
        <!-- Vue'nun yüklendiği sayfa-->
        <router-view></router-view>
    </div>
</body>
</html>
