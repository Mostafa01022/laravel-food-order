<?php

namespace App\Service\Order;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
    
Class DeleteOrder {
        public function apply(Request $request) : JsonResponse
        {
            DB::beginTransaction();
            try {
                $delete =Order::findOrFail($request->id)->delete();
                if( $delete ) {
                    OrderItem::where('order_id', $request->id)->delete();
                }
                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => '<div class="error"> deleted successfully.</div>'
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => '<div class="error">Error deleting.</div>',
                    'error_message' =>  $th->getMessage()
                ]);
            }
        }
}
