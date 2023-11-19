@extends('management.layouts.app')
@section('content')

@section('jsFile')
<script src="{{asset('js/management/food/actions.js')}}"></script>
@endsection
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary m-4" data-toggle="modal" data-target="#addFoodModal">
        Add Food
    </button>
    <div id="action_message" class="text-success d-flex m-4"></div>
    @include('management.food.partials.addFoodModal')
    @include('management.food.partials.updateFoodModal')

    <div class="d-flex justify-content-center">
        <table class="table m-4  w-60 ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Active</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paginator as $key => $record)
                    <tr id="food_row_{{ $record->id }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td class="food_title">{{ $record->title }}</td>
                        <td class="food_price">{{ $record->price }}</td>
                        <td class="food_description">{{ $record->description }}</td>
                        <td class='food_image '>
                            <img style="width: 5rem;" src="{{ asset('images/' . $record->image) }}">
                        </td>
                        <td class='food_active'>{{ $record->active }}</td>
                        <td>
                            <button value="{{ $record->id }}" class="update_btn"data-toggle="modal"
                                data-target="#updateFoodModal"><img title="Update"
                                    src="{{ asset('css/images/update.png') }}" /></button>
                            <button value="{{ $record->id }}"class="delete_btn" data-image="{{ $record->image }}"><img
                                    title="Delete" src="{{ asset('css/images/delete.png') }}" /></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('management.partials.paginator')
@endsection
