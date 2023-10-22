<?php

namespace App\Http\Controllers\Website\FoodOfCat;

use App\Http\Controllers\Controller;
use App\Service\Website\FoodOfCat\GetFoodOfCategory;
use Illuminate\Http\Request;

class FoodOfCatController extends Controller
{
    public function getFoodOfCategory(Request $request, GetFoodOfCategory $getFoodOfCategory)
    {
        return $getFoodOfCategory->apply($request);
    }
}
