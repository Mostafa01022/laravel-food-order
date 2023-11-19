<?php

namespace App\Service\Food;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class ViewPage
{
    public function apply()
    {
        $data = Food::paginate(2);
        $data->withPath(route('food_control'));
        $paginator = $this->customizePaginator($data);
        $category_data = Category::get()->where('active','1');
        return view('management.food.index', compact('paginator','category_data'));
    }

    private function customizePaginator($data)
    {
        $paginator = new LengthAwarePaginator(
            $data->items(),
            $data->total(),
            $data->perPage(),
            $data->currentPage(),
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        return $paginator;
    }
}
