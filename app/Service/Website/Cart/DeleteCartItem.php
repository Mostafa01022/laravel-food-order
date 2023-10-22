<?php

namespace App\Service\Website\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteCartItem
{
    public function apply(Request $request)
    {
        DB::beginTransaction();
        try {

            if ($request->food_id) {
                $cart = session()->get('cart');
                if (isset($cart[$request->food_id])) {
                    unset($cart[$request->food_id]);
                    session()->put('cart', $cart);
                }
                $cartCountItems = count($cart);
                DB::commit();

                return response()->json(['success' => true, 
                "cartCountItems" => $cartCountItems ,
                'message' => "Food Deleted Successfully",
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error_message' => $e->getMessage(),
            ]);
        }
    }
}
