<?php

namespace App\Service\Website\Cart;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddToCart
{
    public function apply(Request $request)
    {
        DB::beginTransaction();
        try {
            $food = Food::find($request->food_id);

            if (!$food) {
                return redirect()->back()->with('success', 'Food item not found!');
            }
            $cart = session()->get('cart', []);

            if (isset($cart[$request->food_id])) {
                $quantity = $request->quantity;

                if ($quantity <= 0) {
                    return redirect()->back()->with('success', 'Invalid quantity!');
                }
                $cart[$request->food_id]['quantity'] = $quantity;
            } else {

                $quantity = $request->quantity;

                if ($quantity <= 0) {
                    return redirect()->back()->with('success', 'Invalid quantity!');
                }

                $cart[$request->food_id]['quantity'] = $quantity;

                $item = [
                    "title" => $food->title,
                    "quantity" => $quantity,
                    "price" => $food->price,
                    "image" => $food->image,
                    "description" => $food->description,
                ];

                if (auth()->check()) {
                    $item["user_id"] = auth()->user()->id;
                }

                $cart[$request->food_id] = $item;
            }
            session()->put('cart', $cart);
            DB::commit();

            return redirect()->back()->with('success', 'food has been added to cart!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('success', 'failed to add!');
        }
    }
}
