@extends('auth.app')

@section('title')
Register Page
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Kayıt Formu</h2>
    <div class="card mx-auto" style="max-width: 450px; padding: 15px; background-color: #e9ecef;">
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="first_name">Ad</label>
                    <input type="text" class="form-control mt-2" id="first_name" name="first_name" required placeholder="Adınızı girin">
                </div>
                <div class="form-group mt-2">
                    <label for="last_name">Soyad</label>
                    <input type="text" class="form-control mt-2" id="last_name" name="last_name" required placeholder="Soyadınızı girin">
                </div>
                <div class="form-group mt-2">
                    <label for="email">E-posta</label>
                    <input type="email" class="form-control mt-2" id="email" name="email" required placeholder="E-posta adresinizi girin">
                </div>
                <div class="form-group mt-2">
                    <label for="phone_number">Telefon Numarası</label>
                    <input type="text" class="form-control mt-2" id="phone_number" name="phone_number" required placeholder="Telefon numaranızı girin">
                </div>
                <div class="form-group mt-2">
                    <label for="cafe_name">Kafe Adı</label>
                    <input type="text" class="form-control mt-2" id="cafe_name" name="cafe_name" required placeholder="Kafe adınızı girin">
                </div>
                <div class="form-group mt-2">
                    <label for="password">Şifre</label>
                    <input type="password" class="form-control mt-2" id="password" name="password" required placeholder="Şifrenizi girin">
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
            </form>
        </div>
    </div>
    <div class="text-center mt-3">
        <p>Zaten bir hesabınız var mı? <a href="{{ route('login') }}">Giriş yapın</a></p>
    </div>
</div>
@endsection
