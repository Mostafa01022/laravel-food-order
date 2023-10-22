<?php

namespace App\Service\Website\FoodOfCat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetFoodOfCategory
{
    public function apply(Request $request)
    {
        try {
            $food_data = DB::table('foods')->where('active', '1')->get();

            $food_data = DB::table('foods')->where('category_id', $request->id)->get();

            $category_title = DB::table('categories')->where('id', $request->id)->select('title')->get();

            return view('website.foodOfCategory.index', compact('food_data','category_title'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
