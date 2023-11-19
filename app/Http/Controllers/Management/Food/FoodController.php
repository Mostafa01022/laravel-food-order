<?php

namespace App\Http\Controllers\Management\Food;

use App\Http\Requests\Food\StoreFoodRequest;
use App\Http\Requests\Food\UpdateFoodRequest;
use App\Service\Food\DeleteFood;
use App\Service\Food\EditFood;
use App\Service\Food\StoreFood;
use App\Service\Food\UpdateFood;
use App\Service\Food\ViewPage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class FoodController extends Controller
{
    public function index(ViewPage $viewPage)
    {
        return $viewPage->apply();
    }
    public function store(StoreFood $storeFood ,StoreFoodRequest $storeFoodRequest)
    {   
        return $storeFood->apply($storeFoodRequest);
    }
    public function delete(DeleteFood $deleteFood , Request $request )
    {   
        return $deleteFood->apply($request);
    }
    public function edit(EditFood $editFood , Request $request )
    {   
        return $editFood->apply($request);
    }
    public function update( int $id ,UpdateFood $updateFood , UpdateFoodRequest $updateFoodRequest )
    {   
        return $updateFood->apply($id, $updateFoodRequest);
    }
}
