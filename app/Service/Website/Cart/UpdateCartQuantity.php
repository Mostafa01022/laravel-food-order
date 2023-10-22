<?php

namespace App\Service\Website\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateCartQuantity
{
    public function apply(Request $request)
    {
        DB::beginTransaction();
        try {

            if ($request->food_id) {
                $cart = session()->get('cart');
                if (isset($cart[$request->food_id])) {
                    $cart[$request->food_id]['quantity'] = $request->quantity;
                    session()->put('cart', $cart);
                }
                DB::commit();

                return response()->json(['success' => true, 
                'message' => "quantity updated Successfully",
                'price' => $cart[$request->food_id]['price']
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
