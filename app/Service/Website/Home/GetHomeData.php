<?php

namespace App\Service\Website\Home;

use Illuminate\Support\Facades\DB;

class GetHomeData
{
    public function apply()
    {
        try {
            $category_data = DB::table('categories')->where('active', '1')->limit(3)->get();

            $food_data = DB::table('foods')->where('active', '1')->get();

            return view('home', compact('category_data', 'food_data'));

        } catch (\Exception $e) {
            
            return $e->getMessage();
        }
    }
}
