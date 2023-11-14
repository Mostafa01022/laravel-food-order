<?php

namespace App\Service\Order;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Class UpdateOrder {
    public function apply(int $id ,Request $request):JsonResponse
    {
        DB::beginTransaction();
        try {
            $order = Order::findOrFail($id);
            $request->validate([
                'status' => 'required',
            ]);
            $order->status = $request->status;
            $order->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'data' => [ 
                    'status' => $request->status
                ],
                'message' => "<div class='success'>Data updated successfully.</div>"
            ]);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => true,
                'message' => 'Error updating data .',
                'error_message' =>  $e->getMessage()
            ]);
        }
    }
}