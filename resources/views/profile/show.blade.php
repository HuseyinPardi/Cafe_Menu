@extends('layouts.app')


@section('title')
Profile
@endsection



@section('content')
    <div class="container py-5" style="width: 100%; height: 100vh;">
        <div class="row">
            <div class="col-lg-4 col-md-5 mb-4">
                <!-- Profil Fotoğrafı -->
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://via.placeholder.com/150' }}" 
                            class="rounded-circle img-fluid" 
                            style="width: 150px; height: 150px; object-fit: cover;" 
                            alt="Profile Photo">
                        <h3 class="mt-3">{{ $user->first_name }} {{ $user->last_name }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <!-- Kullanıcı Bilgileri -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Kullanıcı Bilgileri</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Ad:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $user->first_name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Soyad:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $user->last_name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Email:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $user->email }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Telefon Numarası:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $user->phone_number }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Kafe Adı:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $user->cafe_name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Şifre:</strong>
                            </div>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" value="********" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection