@extends('layouts.app')

@section('content')
    <div class= 'container '>
        <div class='m-6'> welcome to our website {{auth()->user()->name}}</div>
        <div class='m-6'> <a href="/home">continue to home</a></div>
    </div>
@endsection