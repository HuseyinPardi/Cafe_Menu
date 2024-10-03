<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/js/app.js')
</head>
<body id="admin-blade">
    <div id="app">
        <router-view></router-view>
    </div>
</body>
</html>
