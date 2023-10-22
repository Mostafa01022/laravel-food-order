<?php

namespace App\Service\Food;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;




class StoreFood
{
    use UploadImageTrait;

    public function apply(Request $request):JsonResponse
    {
        DB::beginTransaction();
        try {
            $photo = $this->UploadImage($request, 'image', 'Foods');
            $food = new Food();
            $food->category_id = $request->category;
            $food->title = $request->title;
            $food->price = $request->price;
            $food->description = $request->description;
            $food->image = $photo;
            $food->active = $request->active;
            $food->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => "<div class='success'>food added.</div>",
                'data' => [
                    'id' => $food->id,
                    'title' => $request->title,
                    'price' => $request->price,
                    'description' => $request->description,
                    'image' => $photo,
                    'active' => $request->active,
                ]
            ]);
        } catch (\throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => "<div class='success'>store failed.</div>",
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
