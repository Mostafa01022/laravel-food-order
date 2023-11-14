<?php

namespace App\Http\Controllers\Management\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Service\Order\UpdateOrder;
use App\Service\Order\DeleteOrder;

class OrderController extends Controller
{
    public function index(){
        $records = Order::get();
        return view("management.order.index",compact("records"));
    }

    public function update(int $id , UpdateOrder $updateOrder , \Illuminate\Http\Request $request ){
        return $updateOrder->apply( $id , $request);
    }
    public function delete(DeleteOrder $deleteOrder , \Illuminate\Http\Request $request ){
    {
        return $deleteOrder->apply($request);
    }
    }
}
