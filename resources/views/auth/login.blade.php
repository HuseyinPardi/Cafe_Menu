@extends('auth.app')

@section('title')
Login Page
@endsection
    
@section('content')
    <div class="container mt-5">
        <h2>Giriş Formu</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">E-posta</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Giriş Yap</button>
        </form>
    </div>
@endsection