@extends('layouts.app')

@section('content')
@auth
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                
                {{ __('You are logged in') }}  {{ Auth::user()->name }}
            </div>
        </div>
    </div>
</div>
@endauth

<div class="container">
    
    @include('website.partials.search')
    @include('website.partials.catSection')
    @include('website.partials.foodSection')

</div>


@endsection
