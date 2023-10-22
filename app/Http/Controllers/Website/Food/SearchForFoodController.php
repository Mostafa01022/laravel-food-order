<?php

namespace App\Http\Controllers\Website\Food;

use App\Http\Controllers\Controller;
use App\Http\Requests\Food\SearchForFoodRequest;
use App\Service\Website\Food\SearchForFood;

class SearchForFoodController extends Controller
{
    public function search(SearchForFood $searchForFood, SearchForFoodRequest $searchForFoodRequest)
    {
        return $searchForFood->apply($searchForFoodRequest);
    }
}
