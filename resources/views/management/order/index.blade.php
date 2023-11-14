@extends('management.layouts.app')
@section('content')
@include('management.order.partials.updateOrderModal')

@section('jsFile')
<script src="{{asset('js/management/order/actions.js')}}"></script>
@endsection

    <div id="action_message" class="text-success d-flex m-4"></div>    
    <div class="d-flex justify-content-center">
        <table class="table m-4  w-60 ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Bill</th>
                    <th scope="col">Status</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $key => $record)
                    <tr id="order_row_{{ $record->id }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td class="name">{{ $record->full_name }}</td>
                        <td class="address">{{ $record->address }}</td>
                        <td class="phone">{{ $record->phone }}</td>
                        <td class="bill">{{ $record->bill }}</td>
                        <td class='status'>{{ $record->status }}</td>
                        <td>
                            <button value="{{ $record->id }}" class="update_btn" data-toggle="modal"
                                data-target="#updateOrderModal"><img title="Update"
                                    src="{{ asset('css/images/update.png') }}" /></button>
                            <button value="{{ $record->id }}"class="delete_btn"><img
                                    title="Delete" src="{{ asset('css/images/delete.png') }}" /></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection