@extends('auth.app')

@section('title')
Register Page
@endsection
    <div class="container mt-5">
        <h2>Kayıt Formu</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">Ad</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Soyad</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">E-posta</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Telefon Numarası</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="cafe_name">Kafe Adı</label>
                <input type="text" class="form-control" id="cafe_name" name="cafe_name" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Kayıt Ol</button>
        </form>
    </div>
@section('content')

@endsection