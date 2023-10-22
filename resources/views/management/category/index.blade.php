@extends('management.layouts.app')

@section('content')
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
<script>
        $("#addCatForm").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: BASE_URL + '/management/category/add',
            method: 'post',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(result, status) {
                console.log(status);
                $("#addCatForm")[0].reset();
                $("#action_message").html(result.message);
                $(".table").append(`
                <tr id="category_row_${ result.data.id }">
                    <th scope="row"></th>
                    <td class="category_title">${ result.data.title }</td>
                    <td class='category_image '>
                        <img style="width: 5rem;" src="{{ asset('images/${result.data.image}') }}" /></td>
                    <td class='category_active'>${result.data.active}</td>
                    <td>
                        <button value="${ result.data.id }" class="update_btn"data-toggle="modal"
                            data-target="#updateCategoryModal"><img title="Update"
                                src="{{ asset('css/images/update.png') }}" /></button>
                        <button value="${ result.data.id }"class="delete_btn" data-image="${result.data.image}"><img title="Delete"
                                src="{{ asset('css/images/delete.png') }}" /></button>
                    </td>
                </tr>
                        `);
            },
            error: function(xhr) {
                $('#add-errors').html('');
        if (xhr.responseJSON && xhr.responseJSON.errors) {
            $.each(xhr.responseJSON.errors, function(key, value) {
                $('#add-errors').append('<div class="error_message">' +
                    value + '</div>');
            });
        } else {
            $('#add-errors').html('An error occurred. Please try again later.');
        }
    }
        });
    });

    ///====DELETE CATEGORY====////
    $(document).on("click", ".delete_btn", function() {
    let btn = $(this);
    let delete_id = btn.val();
    let image = btn.attr("data-image");
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        url: BASE_URL + '/management/category/delete',
        data: {
            id:delete_id ,
            image :image 
        },
        method: "post",
        dataType: "json",
        success: function(result, status) {
            if (result.success == true) {
                console.log(result);
                console.log(status);
                $("#action_message").html(result.message);
                btn.closest("tr").remove();
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        },
    });
    });

    $(document).on("click", ".update_btn", function() {
    let category_id = $(this).val();
    $('#validation_errors_update').html('');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + "/management/category/edit",
        method: "post",
        data: {
            id: category_id,
        },
        dataType: "json",
        success: function(result, status) {
            console.log(status);
            console.log(result.message);
            $("#title_to_update").val(result.data.title);
            $("#old_image").val(result.data.image);
            $("#cat_id").val(result.data.id);
            $("#current_image").attr('src', '{{ asset('images') }}/' + result.data.image);
            
        },
    });
    });

    $(document).on("submit", "#updateCatForm", function(e){
    e.preventDefault();
    let form_data = new FormData(this);
    let id = $(".update_btn").val();
    let trRow = $("#category_row_" + id);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + "/management/category/update/"+id ,
        method: 'post',
        data: form_data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(result, status) {
            console.log(result);
            $("#action_message").html(result.message);
            $('#updateCatForm')[0].reset();
            $("#current_image").attr('src', '');
            trRow.find(".category_title").html(result.data.title);
            trRow.find(".category_image").html("<img src='{{ asset('images') }}/" +
                result.data.image + "' width='100px'>");
            trRow.find(".category_active").html(result.data.active);
            $('#update-errors').html('');
        },
        error: function(xhr) {
            $('#update-errors').html('');
            $.each(xhr.responseJSON.errors, function(key, value) {
                $('#update-errors').append(
                    '<div class="error_message">' + value +
                    '</div');
            });
        },
    });
    });
</script>
@endsection