<?php

namespace App\Service\Food;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditFood
{

    public function apply(Request $request)
    {
        DB::beginTransaction();
        try {
            $food = Food::findOrFail($request->id);
            $data = [
                'title' => $food->title,
                'description' => $food->description,
                'price' => $food->price,
                'image' => $food->image,
            ];
            DB::commit();
            return response()->json([
                'success' => false,
                'message' => 'food found successfully.', 
                'data' => $data
                ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => '<div class="error">food not found.</div>',
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
