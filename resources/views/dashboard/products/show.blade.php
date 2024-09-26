@extends('layouts.app')

@section('title')
Product Show
@endsection


@section('content')
    <div class="container">
        <div class="d-flex justify-content-center" style="gap: 30px; margin: 40px;">
            <div class="text-center border rounded p-3" style="width: 350px; position: relative;"> <!-- Genişliği arttırdık -->

                <!-- Sol Ok -->
                <button id="prevBtn" class="btn btn-primary" style="position: absolute; left: -40px; top: 50%; transform: translateY(-50%);">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- Ana ürün resmi -->
                <img id="mainImage" src="{{$product->product_images->first()->image_path}}" alt="{{$product->name}}" class="img-fluid" style="width: 300px; height: 300px; object-fit: cover;"> <!-- Sabit genişlikte -->

                <!-- Sağ Ok -->
                <button id="nextBtn" class="btn btn-primary" style="position: absolute; right: -40px; top: 50%; transform: translateY(-50%);">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Ürün Bilgileri -->
                <h3 class="text-center">{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <h5>Fiyat: {{$product->price}} lira</h5>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        // Ürün resimlerini JavaScript dosyasına aktarmak için ürün resimlerini JSON formatında kullan
        const images = @json($product->product_images->pluck('image_path'));
    </script>
@endsection