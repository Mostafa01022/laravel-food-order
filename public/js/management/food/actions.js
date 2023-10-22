$("#addFoodForm").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + '/management/food/store',
        method: 'post',
        data: new FormData(this),
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(result, status) {
            console.log(status);
            console.log(result.data.price);
            $("#addFoodForm")[0].reset();
            $("#action_message").html(result.message);
            $(".table").append(`
                    <tr id="food_row_${ result.data.id }">
            <th scope="row"></th>
            <td class="food_title">${ result.data.title }</td>
            <td class="food_price">${ result.data.price }</td>
            <td class="food_description">${ result.data.description }</td>
            <td class='food_image '>
                <img style="width: 5rem;"src="{{ asset('images/${ result.data.image }') }}" >
            </td>
            <td class='food_active'>${ result.data.active }</td>
            <td>
                    <button value="${ result.data.id }" class="update_btn"data-toggle="modal"
                        data-target="#updateFoodModal"><img title="Update"
                            src="{{ asset('css/images/update.png') }}" /></button>
                    <button value="${ result.data.id }"class="delete_btn" data-image="${ result.data.image }"><img
                            title="Delete" src="{{ asset('css/images/delete.png') }}" /></button>
                </td>
        </tr>
                            `);
                            
        $('#add-errors').html('');

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
        url: BASE_URL + '/management/food/delete',
        data: {
            id: delete_id,
            image: image
        },
        method: "post",
        dataType: "json",
        success: function(result, status) {
            if (result.success == true) {
                console.log(result);
                console.log(status);
                $("#action_message").html(result.message);
                btn.closest("tr").remove();
            } else {
                $("#action_message").html(result.message);
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
    let food_id = $(this).val();
    $('#validation_errors_update').html('');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + "/management/food/edit",
        method: "post",
        data: {
            id: food_id,
        },
        dataType: "json",
        success: function(result, status) {
            console.log(status);
            console.log(result.message);
            $("#title_to_update").val(result.data.title);
            $("#price_to_update").val(result.data.price);
            $("#description_to_update").val(result.data.description);
            $("#old_image").val(result.data.image);
            $("#current_image").attr('src', '{{ asset('images') }}/' + result.data.image);

        },
    });
});

$(document).on("submit", "#updateFoodForm", function(e) {
    e.preventDefault();
    let form_data = new FormData(this);
    let id = $(".update_btn").val(); 
    let trRow = $("#food_row_" + id);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + "/management/food/update/" + id,
        method: 'post',
        data: form_data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(result, status) {
            console.log(result);
            $('#updateFoodForm')[0].reset();
            $("#current_image").attr('src', '');
            trRow.find(".food_title").html(result.data.title);
            trRow.find(".food_price").html(result.data.price);
            trRow.find(".food_description").html(result.data.description);
            trRow.find(".food_image").html("<img src='{{ asset('images') }}/" +
                result.data.image + "' width='100px'>");
            trRow.find(".food_active").html(result.data.active);
            $('#validation_errors_update').html('');
            $("#action_message").html(result.message);
        },
        error: function(xhr) {
            $('#validation_errors_update').html('');
            $.each(xhr.responseJSON.errors, function(key, value) {
                $('#validation_errors_update').append(
                    '<div class="error_message">' + value +
                    '</div');
            });
        },
    });
});