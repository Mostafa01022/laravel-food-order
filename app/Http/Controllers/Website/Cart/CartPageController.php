<?php

namespace App\Http\Controllers\Website\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddToCartRequest;
use App\Service\Website\Cart\AddToCart;
use App\Service\Website\Cart\DeleteCartItem;
use App\Service\Website\Cart\UpdateCartQuantity;
use App\Service\Website\Cart\ClearCart;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('website.cart.index');
    }

    public function addCartItem(AddToCartRequest $addToCartRequest, AddToCart $addToCart)
    {
        return $addToCart->apply($addToCartRequest);
    }
    public function DeleteCartItem(Request $Request, DeleteCartItem $deleteCartItem)
    {
        return $deleteCartItem->apply($Request);
    }
    public function updateQuantity(Request $Request, UpdateCartQuantity $updateCartQuantity)
    {
        return $updateCartQuantity->apply($Request);
    }
    public function clear(Request $Request, ClearCart $clearCart)
    {
        return $clearCart->apply($Request);
    }
}
