<?php

namespace App\Http\Controllers\Website\Food;

use App\Http\Controllers\Controller;
use App\Service\Website\Food\GetActiveFood;

class FoodPageController extends Controller
{
    public function index(GetActiveFood $getActiveFood)
    {
        return $getActiveFood->apply();
    }
}
