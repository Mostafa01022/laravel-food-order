<?php

namespace App\Service\Website\Food;

use Illuminate\Support\Facades\DB;

class GetActiveFood
{
    public function apply()
    {
        try {
            $food_data = DB::table('foods')->where('active', '1')->get();
            return view('website.food.index', compact('food_data'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
