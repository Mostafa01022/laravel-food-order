<?php

namespace App\Http\Controllers\Website\Category;

use App\Http\Controllers\Controller;
use App\Service\Website\Category\GetActiveCategory;

class CategoryPageController extends Controller
{
    public function index(GetActiveCategory $getActiveCategory)
    {
        return $getActiveCategory->apply();
    }
}
