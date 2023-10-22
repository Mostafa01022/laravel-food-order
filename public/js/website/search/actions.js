
$(document).on("click", ".search_btn", function() {
        let search = $('.search').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: BASE_URL + "/food/search",
            method: "get",
            data: {
                search: search,
            },
            dataType: "json",
            success: function(result) {
                if (result.success) {
                    // Display the view with matching food data
                    $("body").html(result.view);
                } else {
                    // Display the error message
                    alert(result.message);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
});
