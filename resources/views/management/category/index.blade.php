@extends('management.layouts.app')

@section('content')

@section('jsFile')
<script src="{{asset('js/management/category/actions.js')}}"></script>
@endsection
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-4" data-toggle="modal" data-target="#addCategoryModal">
    Add Category
</button>
<div id="action_message" class="text-success d-flex m-4"></div>

@include('management.category.partials.addCategoryModal')
@include('management.category.partials.updateCatModal')

<div class="d-flex justify-content-center">
    <table class="table m-4  w-60 ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Active</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $key => $record)
                <tr id="category_row_{{ $record->id }}">
                    <th scope="row">{{ $key + 1 }}</th>
                    <td class="category_title">{{ $record->title }}</td>
                    <td class='category_image '>
                        <img style="width: 5rem;"src="{{ asset('images/' . $record->image ) }}" ></td>
                    <td class='category_active'>{{ $record->active }}</td>
                    <td>
                        <button value="{{ $record->id }}" class="update_btn"data-toggle="modal"
                            data-target="#updateCategoryModal"><img title="Update"
                                src="{{ asset('css/images/update.png') }}" /></button>
                        <button value="{{ $record->id }}"class="delete_btn" data-image="{{$record->image}}"><img title="Delete"
                                src="{{ asset('css/images/delete.png') }}" /></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection