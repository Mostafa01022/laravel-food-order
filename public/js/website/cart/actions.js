recalculateTotalPrice();

$(".quantity").on("change", function() {
    let input = $(this);
    let food_id = input.attr('food_id');
    let quantity = parseInt(input.val());
    let inputRow = $('.row_' + food_id);
    updateQuantity(food_id, quantity, inputRow);
});

function updateQuantity(food_id, quantity, inputRow) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + '/cart/quantity/update',
        method: 'post',
        data: {
            food_id: food_id,
            quantity: quantity
        },
        dataType: 'json',
        success: function(result) {
            console.log(result.message);
            let food_total_price = quantity * result.price;
            inputRow.find('.food_total_price').html(food_total_price + '<span>$</span>');
            recalculateTotalPrice();
        },
        error: function(xhr, error) {
            console.log(xhr);
            alert('error');
        }

    });
}

function recalculateTotalPrice() {
    let total_price = 0;
    $(".food_total_price").each(function() {
        total_price += parseFloat($(this).html());
    });
    $("#total_price").html(total_price + '<span class="fw-bold">$</span>')
    $('#bill').val(total_price);
    if (total_price == '') {
        $('.cart_page').html('<div class="container alert alert-success">Add Something To Cart !</div>')
    }
}
$(".remove_btn").on("click", function(e) {
    e.preventDefault();
    let btn = $(this);
    let food_id = btn.attr('food_id');
    let div = $(".row_" + food_id);
    if (confirm("Do you really want to delete?")) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            url: BASE_URL + '/cart/item/delete',
            data: {
                food_id: food_id,
            },
            dataType: 'json',
            success: function(result) {
                alert(result.message);
                div.remove();
                $(".cartCountItems").html(result.cartCountItems)
                recalculateTotalPrice();
            }
        });
    }
});

$("#clear_btn").on("click", function() {
    if (confirm("Do you really want to clear cart ?")) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'post',
        url: BASE_URL + '/cart/clear',
        data: {
            clear: 1
        },
        dataType: 'json',
        success: function() {
            $(".cartCountItems").html(0);
            $('.cart_page').html('<div class="container alert alert-success">Add Something To Cart !</div>')
        }
    });
}
});

$("#order_form").on("submit", function(e) {
    let form_data = new FormData(this);
    e.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'post',
        url: BASE_URL + '/order/submit',
        data: form_data
        ,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(result) {
            alert(result.message);
            $(".cartCountItems").html(0);
            $('.cart_page').html('<div class="container alert alert-success">Add Something To Cart !</div>')
        }
    });
});