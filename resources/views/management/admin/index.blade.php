@extends('management.layouts.app')

@section('jsFile')
<script src="{{asset('js/management/admin/actions.js')}}"></script>
@endsection

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-4" data-toggle="modal" data-target="#exampleModal">
    Add Admin
</button>
<div id="action_message" class="text-success d-flex p-4"></div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="add_form">
                    <div class="modal-body">
                        <div id="validation-errors" class="text-danger"></div>
                        @include('management.admin.partials.register')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('management.admin.partials.changePassword')
    @include('management.admin.partials.updateAdminData')

    <div class="d-flex justify-content-center">
    <table class="table m-4  w-60 ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $key => $record)
                <tr id="admin_row_{{ $record->id }}">
                    <th scope="row">{{ $key + 1 }}</th>
                    <td class="admin_name">{{ $record->name }}</td>
                    <td class='admin_email w-50'>{{ $record->email }}</td>
                    <td>
                        <button value="{{ $record->id }}" class="update_btn"data-toggle="modal"
                            data-target="#updateAdminDateModal"><img title="Update"
                                src="{{ asset('css/images/update.png') }}" /></button>
                        <button value="{{ $record->id }}"class="change_btn" data-toggle="modal"
                            data-target="#changePasswordModal"><img title="change password"
                                src="{{ asset('css/images/change.png') }}" /></button>
                        <button value="{{ $record->id }}"class="delete_btn"><img title="Delete"
                                src="{{ asset('css/images/delete.png') }}" /></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
