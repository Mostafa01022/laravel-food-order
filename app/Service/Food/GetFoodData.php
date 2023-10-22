<?php

namespace App\Service\Food;

use App\Models\Food;
use Illuminate\Support\Facades\DB;

class GetFoodData
{
    public function apply()
    {
        try {
            $records = Food::get();
            $category_data = DB::table('categories')->select('id', 'title')->get();
            return view('Admin.foods', compact('records', 'category_data'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
