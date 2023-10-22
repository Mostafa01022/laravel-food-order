@extends('management.layouts.app')

@section('content')
hello  {{ Auth::guard('admin')->user()->name }}

@endsection