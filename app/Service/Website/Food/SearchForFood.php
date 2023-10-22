<?php

namespace App\Service\Website\Food;

use Illuminate\Http\Request;
use App\Models\Food;

class SearchForFood
{
    public function apply(Request $request)
    {
        try {
            $searchTerm = $request->search;

            $food_data = Food::where('title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
                ->get();

            if ($food_data->isEmpty()) {
                $message = 'No matching food found';
                return response()->json([
                    'success' => false,
                    'message' => $message,
                ]);
            }

            $view = view('website.searchForFood.index', compact('food_data', 'searchTerm'))->render();
            return response()->json([
                'success' => true,
                'view' => $view,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error_message' => $e->getMessage(),
            ]);
        }
    }
}