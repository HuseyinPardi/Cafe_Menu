@extends('layouts.app')


@section('title')
Categories Index
@endsection



@section('content') 
    <div class="container">          
            <div class="d-flex justify-content-center flex-wrap" style="gap: 30px; margin: 40px;">
                @foreach ($categories as $category)
                    <div class="border rounded p-3" style="width: 300px;">
                        <img src="{{$category->image}}" alt="{{$category->name}}" class="img-fluid" style="width: 300px; height: 300px; object-fit: cover;">
                        <h3 class="text-center">{{$category->name}}</h3>
                        @auth
                            <div style="text-align: center;">
                                <a href="{{route('cafe.products', [
                                'first_name' => $user ? $user->cafe_slug : 'default_name' , 
                                'category_name' => $category ? $category->slug : 'deafult_category'])}}" class="btn btn-primary">see more</a>
                            </div>
                        @endauth

                        @guest
                            <p>If you want to see more, <a href="{{route('login')}}">Log In</a> or <a href="{{route('register')}}">Register</a></p>
                        @endguest
                    </div>
                @endforeach
            </div>
    </div>
@endsection

