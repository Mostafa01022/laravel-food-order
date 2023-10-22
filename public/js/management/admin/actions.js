$(".add_form").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + "/management/admin/store",
        method: 'post',
        dataType: 'json',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(result, status) {
            if (result.success) {
                console.log(status);
                $('#validation-errors').html('');
                $("#action_message").html(result.message);
                $('#exampleModal').modal('toggle');
                $(".add_form")[0].reset();
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $('.table').append(` <tr id="admin_row_${result.data.id}">
                    <th scope="row"></th>
                    <td class="admin_name">${result.data.name}</td>
                    <td class='admin_email w-50'>${result.data.email}</td>
                    <td>
                        <button value="${result.data.id}" class="update_btn"data-toggle="modal"
                    data-target="#updateAdminDateModal"><img title="Update"
                            src="{{ asset('css/images/update.png') }}" /></button>
                    <button value="${result.data.id}"class="change_btn" data-toggle="modal"
                                data-target="#changePasswordModal"><img title="change password"
                            src="{{ asset('css/images/change.png') }}" /></button>
                    <button value="${result.data.id}"class="delete_btn"><img title="Delete"
                            src="{{ asset('css/images/delete.png') }}" /></button>
                    </td>
                </tr>`);
            }
        },
        error: function(xhr, status, error) {
            $('#validation-errors').html('');
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                $.each(xhr.responseJSON.errors, function(key, value) {
                    $('#validation-errors').append('<div class="error_message">' +
                        value + '</div>');
                });
            } else {
                $('#validation-errors').html('An error occurred. Please try again later.');
            }
        }
    });
});

$(document).on("click", ".delete_btn", function() {
    let id = $(this).val();
    let btn = $(this);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'get',
        dataType: 'json',
        url: BASE_URL + "/management/admin/delete/" + id,
        success: function(result, status) {
            if (result.success == true) {
                console.log(result);
                console.log(status);
                btn.closest("tr").remove();
                $("#action_message").html(result.message);
            } else {
                console.log(result);
                console.log(status);
            }
        }
    });
});

$(document).on("click", ".change_btn", function() {
    let id = $(this).val();

    $(".change_pass_form").on("submit", function(e) {
    $('#change-errors').html('');
    $('#wrong_password').html('');

    e.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'post',
        url: BASE_URL + '/management/admin/change_password/' + id,
        dataType: 'json',
        data: {
            old_password: $("#old_password").val(),
            new_password: $("#new_password").val(),
            new_password_confirmation: $("#new_password_confirmation").val(),
        },
        success: function(result, status) {
            if (result.success) {
                console.log(status);
                $('#change-errors').html('');
                $("#action_message").html(result.message);
                $('#changePasswordModal').modal('toggle');
                $(".change_pass_form")[0].reset();
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $('.close_btn').click();
            } else {
                $("#wrong_password").html(result.message);
                $(".change_pass_form")[0].reset();
            }
        },
        error: function(xhr, status, error, response) {
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                $('#change-errors').html('');
                $.each(xhr.responseJSON.errors, function(key, value) {
                    $('#change-errors').append('<div class="error_message">' + value +
                        '</div>');
                });
                $(".change_pass_form")[0].reset();
            } else {
                $('#change-errors').html('An error occurred. Please try again later.');
                $(".change_pass_form")[0].reset();
            }
        }
    });
});
});

//=======DISPLAY UPDATE FORM =====//////

$(document).on("click", ".update_btn", function() {
    let id = $(this).val();
    $.ajax({
        method: 'get',
        url: BASE_URL + '/management/admin/edit_data/' + id,
        dataType: 'json',
        success: function(result, status) {
            if (result.success == true) {
                console.log(result);
                console.log(status);
                $("#name_to_update").val(result.data.name);
                $("#email_to_update").val(result.data.email);
                $("#admin_id").val(id);
            }
        }
    });
});

$("#updateDataForm").on("submit", function(e) {
    e.preventDefault();
    let id = $("#admin_id").val();
    let trRow = $("#admin_row_" + id);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'post',
        url: BASE_URL + '/management/admin/update_data/' + id,
        dataType: 'json',
        data: {
            name: $("#name_to_update").val(),
            email: $("#email_to_update").val(),
        },
        success: function(result, status) {
            if (result.success == true) {
                console.log(status);
                console.log(result.data.name);
                $("#action_message").html(result.message);
                trRow.find(".admin_name").html(result.data.name);
                trRow.find(".admin_email").html(result.data.email);
                $('#update-errors').html('');
                $(".updateDataForm")[0].reset();
            }
        },
        error: function(xhr) {
            $('#update-errors').html('');
            $.each(xhr.responseJSON.errors, function(key, value) {
                $('#update-errors').append('<div class="error_message">' + value +
                    '</div');
            });
        },
    });
});
