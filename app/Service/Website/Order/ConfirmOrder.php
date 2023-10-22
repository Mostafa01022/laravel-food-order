<?php

namespace App\Service\Website\Order;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class ConfirmOrder
{
    public function apply(Request $request)
    {
        DB::beginTransaction();
        try {
            $order = new Order();
            $order->status = "pending";
            $order->user_id = $request->user_id;
            $order->full_name = $request->full_name;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->bill = $request->bill;
            $save = $order->save();
            if($save){
                $cart = session()->get('cart');
                foreach($cart as $food_id => $item){
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->food_id = $food_id;
                    $orderItem->user_id = $order->user_id;
                    $orderItem->price = $item['price'];
                    $orderItem->quantity = $item['quantity'];
                    $orderItem->save();
                    session()->forget('cart');
                    DB::commit();
                }
            }
            return response()->json([
                'success' => true,
                'message' => "ordered successfully.",
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
