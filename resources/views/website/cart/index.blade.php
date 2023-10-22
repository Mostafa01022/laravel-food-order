@extends('layouts.app')

@section('jsFile')
    <script src="{{ asset('js/website/cart/actions.js') }}"></script>
@endsection
@section('content')
    <section class="h-100 h-custom cart_page" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card shopping-cart" style="border-radius: 15px;">
                        <div class="card-body text-black">

                            @if (session('cart'))
                                <div class="row ">
                                    <div class="col-lg-6 px-5 py-4">

                                        <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your Cart</h3>
                                        @foreach (session('cart') as $food_id => $item)
                                            <div class="row_{{ $food_id }}">
                                                <div class="d-flex align-items-center mb-5">
                                                    <div class="flex-shrink-0">
                                                        <img src="images/{{ $item['image'] }}" class="img-fluid"
                                                            style="width: 100px;" alt="Generic placeholder image">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <a class="float-end text-black remove_btn "
                                                            food_id ="{{ $food_id }}"><i class="btn-close "
                                                                aria-label="Close"></i></a>
                                                        <h5 class="text-primary">{{ $item['title'] }}</h5>
                                                        <h6 style="color: #9e9e9e;">{{ $item['description'] }}</h6>
                                                        <div class="d-flex align-items-center">
                                                            <p class="fw-bold mb-0 me-5 pe-3 food_total_price">
                                                                {{ $item['price'] * $item['quantity'] }}$
                                                            </p>
                                                            <div class="input-group">
                                                                <input food_id ="{{ $food_id }}"
                                                                    class="form-control quantity fw-bold text-black"
                                                                    min="1" name="quantity"
                                                                    value="{{ $item['quantity'] }}" type="number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="d-flex justify-content-between p-2 mb-2">
                                            <button  id="clear_btn" class="btn btn-danger ">Clear</button>
                                        </div>
                                        <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">
                                        <div class="d-flex justify-content-between p-2 mb-2"
                                            style="background-color: #e1f5fe;">
                                            <h5 class="fw-bold mb-0">Total:</h5>
                                            <h5 id ="total_price" class="fw-bold mb-0"></h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 px-5 py-4">
                                        <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Payment</h3>
                                        <form class="mb-5" id="order_form">
                                            <div class="mb-5">
                                                <div class="row mb-3">
                                                    <label for="full_name" class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>
                            
                                                    <div class="col-md-6">
                                                        <input id="full_name" type="text" class="form-control" name="full_name" required autocomplete="current-password">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                            
                                                    <div class="col-md-6">
                                                        <input id="address" type="text" class="form-control" name="address" required autocomplete="">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="phone" type="text" class="form-control" name="phone" required autocomplete="phone">
                                                    </div>
                                                </div>
                                                <input id="bill" type="hidden" class="form-control" name="bill" required autocomplete="">
                                                <input id="user_id" type="hidden" value="{{auth()->user()->id}}" class="form-control" name="user_id" required autocomplete="">
                                                <div class="row mb-0">
                                                    <div class="col-md-8 offset-md-4">
                                                        <button type="submit" id="order_btn"class="btn btn-primary">
                                                            {{ __('Confirm') }}
                                                        </button>
                                                    </div>
                                                    <div class="col-md-8 offset-md-4">
                                                    <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                                                        <a href="{{ route('home') }}"><i class="fas fa-angle-left me-2"></i>
                                                            Back to shopping</a>
                                                    </h5>
                                                </div>
                                                </div>
                                                </div>
                                        </form>

                                    </div>
                                </div>
                            @else
                                Add Something To Cart !
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
