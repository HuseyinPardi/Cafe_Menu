@extends('layouts.app')



@section('title')
Products Index
@endsection


@section('content')
    <div class="container">          
            <div class="d-flex justify-content-center flex-wrap" style="gap: 30px; margin: 40px;">
                @foreach ($products as $product)
                    <div class="border rounded p-3" style="width: 300px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                        <img src="{{$product->images->first()->image_path}}" alt="{{$product->name}}" class="img-fluid" style="width: 300px; height: 300px; object-fit: cover;">
                        <h3 class="text-center">{{$product->name}}</h3>
                        <div style="text-align: center;">
                            <a href="{{route('cafe.product.details', [
                            'first_name' => $user ? $user->cafe_slug : 'default_name' , 
                            'category_name' => $category ? $category->slug : 'default-category',
                            'product_name' => $product ? $product->slug : 'default-product' ])}}" class="btn btn-primary">see more</a>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
@endsection