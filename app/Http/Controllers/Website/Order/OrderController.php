<?php

namespace App\Http\Controllers\Website\Order;

use App\Http\Controllers\Controller;
use App\Service\Website\Order\ConfirmOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function confirmOrder(ConfirmOrder $confirmOrder , Request $request)
    {
        return $confirmOrder->apply($request);
    }
}
