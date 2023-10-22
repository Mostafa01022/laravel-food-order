<?php

namespace App\Service\Category;

use Illuminate\Support\Facades\DB;

class GetCategoryData
{
    public function apply()
    {
        try {
            $records = DB::table('categories')->get();
            return view('Admin.categories', compact('records'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
