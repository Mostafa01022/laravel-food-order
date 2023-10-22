<?php

namespace App\Service\Website\Category;

use Illuminate\Support\Facades\DB;

class GetActiveCategory
{
    public function apply()
    {
        try {
            $category_data = DB::table('categories')->where('active', '1')->get();
            return view('website.category.index', compact('category_data'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
