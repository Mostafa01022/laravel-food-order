<?php

namespace App\Service\Website\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClearCart
{
    public function apply(Request $request)
    {
        try {
            if ($request->clear) {
                session()->forget('cart');
                DB::commit();
            }

            return response()->json([
                'success' => true,
                'message' => "Cart cleared successfully",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error_message' => $e->getMessage(),
            ]);
        }
    }
}