$('.update_btn').on('click',function () {
    id = $(this).val();
    $('.updateOrderForm').on('submit',function (e) {
    e.preventDefault();
    data =  new FormData(this);
    let trRow = $("#order_row_" + id);
        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + '/management/orders/update/' + id,
        method: 'post',
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(result) {
            console.log(result);
            trRow.find(".status").html(result.data.status);
            $(".updateOrderForm")[0].reset();
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
});


$(document).on("click", ".delete_btn", function() {
    let btn = $(this);
    let id = btn.val();
    alert(id)
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + '/management/orders/delete',
        data: {
            id: id,
        },
        method: "post",
        dataType: "json",
        success: function(result, status) {
                console.log(result);
                console.log(status);
                $("#action_message").html(result.message);
                btn.closest("tr").remove();
        },
        error: function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        },
    });
});