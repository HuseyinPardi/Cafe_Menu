@extends('auth.app')

@section('title')
Login Page
@endsection
    
@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Giriş Formu</h2>
        <div class="card mx-auto" style="max-width: 350px; padding: 25px; background-color: #e9ecef;">
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-posta</label>
                        <input type="email" class="form-control mt-3" id="email" name="email" required placeholder="E-posta adresinizi girin">
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Şifre</label>
                        <input type="password" class="form-control mt-3" id="password" name="password" required placeholder="Şifrenizi girin">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success btn-block">Giriş Yap</button>
                </form>
            </div>
        </div>
        <div class="text-center mt-3">
            <p>Hesabınız yok mu? <a href="{{ route('register') }}">Kayıt olun</a></p>
        </div>
    </div>
@endsection
