<?php
    
namespace App\Service\Dashboard;
use App\Models\Category;
use App\Models\Food;
use App\Models\Order;

class GetTotalData {
    public function apply(){
        $catCount = Category::get("id")->count();
        $foodCount = Food::get("id")->count();
        $orderCount = Order::get('id')->count();
        $revenue = Order::where('status','delivered')->sum('bill');
        return view('management.dashboard.index',compact('catCount','foodCount','orderCount','revenue'));
    }
}