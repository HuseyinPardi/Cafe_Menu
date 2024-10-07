@extends('layouts.app')

@section('title')
Product Show
@endsection


@section('content')
    <div class="container">
        <div class="d-flex justify-content-center" style="gap: 30px; margin: 40px;">
            <div class="text-center border rounded p-3" style="width: 350px; position: relative; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);"> 

                
                <button id="prevBtn" class="btn btn-primary" style="position: absolute; left: -40px; top: 50%; transform: translateY(-50%);">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <img id="mainImage" src="{{$product->images->first()->image_path}}" alt="{{$product->name}}" class="img-fluid" style="width: 300px; height: 300px; object-fit: cover;">

                <button id="nextBtn" class="btn btn-primary" style="position: absolute; right: -40px; top: 50%; transform: translateY(-50%);">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <h3 class="text-center">{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <h5>Fiyat: {{$product->price}} lira</h5>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        const images = @json($product->images->pluck('image_path'));
    </script>
@endsection