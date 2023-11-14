@extends('management.layouts.app')

@section('content')

<div class="text-center justify-content-center"><h1>hello  {{ Auth::guard('admin')->user()->name }}</h1></div>
<div class="main-content ">
    <div class="m-5 d-flex justify-content-center">
        <div class=" btn btn-outline-danger col-4">                   
            <h1>{{$revenue}}</h1>
            <br>
            Revenue
        </div>
        <div class=" btn btn-outline-success col-4 text-center">                   
            <h1>{{$orderCount}}</h1>
            <br>
            Total Orders
        </div>
    </div>
    <div class="m-5 d-flex justify-content-center">
        <div class=" btn btn-outline-primary col-4 text-center">                   
            <h1>{{$catCount}}</h1>
            <br>
            Category
        </div>
        <div class=" btn btn-outline-warning col-4 text-center">                   
            <h1>{{$foodCount}}</h1>
            <br>
            Food
        </div>
    </div>
    </div>
</div>

@endsection