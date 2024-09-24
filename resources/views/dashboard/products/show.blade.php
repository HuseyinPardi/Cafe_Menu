@extends('layouts.app')

@section('title')
Product Show
@endsection


@section('content')
    <div class="container">          
        <div class="d-flex justify-content-center flex-wrap" style="gap: 30px; margin: 40px;">          
                <div class="text-center border rounded p-3" style="width: 300px;">
                    <img src="{{$product->product_images->first()->image_path}}" alt="{{$product->name}}" class="img-fluid" style="width: 300px; height: 300px; object-fit: cover;">
                    <h3 class="text-center">{{$product->name}}</h3>
                    <p>{{$product->description}}</p>
                    <h5>Fiyat: {{$product->price}} lira</h5>
                </div>
        </div>
    </div>
@endsection