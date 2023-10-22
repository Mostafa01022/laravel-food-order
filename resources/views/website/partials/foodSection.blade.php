<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            @if($food_data->isNotEmpty())
            @foreach ($food_data as $food)
            <form class="addToCartForm" method="post" action="{{route('addToCart')}}">
                @csrf
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="{{ asset('images/' . $food->image) }}" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc no-border">
                        <h4>{{$food->title}}</h4>
                        <input type="number" class="quantity" name="quantity" min="1" value="1">
                        <div>  {{$food->price}}  $ </div>
                        <p class="food-detail">
                            {{$food->description}}
                        </p>
                        <br>
                        <input type="hidden" class="food_id" name="food_id" value="{{$food->id}}">
                        @auth
                        <input type="hidden" class="user_id" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-primary">Add To Cart</button>
                        @endauth

                        @guest
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Add To Cart</button>
                        @endguest
                    </div>
                </div>
            </form>
            @endforeach
            @else
            <div class='error'>No Food Found</div>
            @endif
            <div class="clearfix"></div>
        </div>
</section>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please log in to add items to the cart.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Log In</a>
            </div>
        </div>
    </div>
</div>
    
