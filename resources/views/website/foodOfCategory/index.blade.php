@extends('layouts.app')
@section('content')
    <section class="food-search text-center">
        <div class="container">
            @foreach ($category_title as $category_title)
            <h2>Foods on <a href="#" class="text-white">"{{$category_title->title}}"</a></h2>
            @endforeach
        </section>
            @include('website.partials.foodSection')
        </div>
        <div class="clearfix"></div>
        </div>
    <script>
        
    </script>
@endsection
