<?php

namespace App\Service\Food;

use App\Models\Food;
use App\Traits\DeleteImageTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateFood
{
    use UploadImageTrait;
    use DeleteImageTrait;
    public function apply(int $id , Request $request)
    {
        DB::beginTransaction();
        try {
            $food = Food::findOrFail($id);
            $food->title =  $request->title;
            $food->description =  $request->description;
            $food->price =  $request->price;
            $food->active =  $request->active;
            $food->category_id =  $request->category;
            $food->image =  $request->old_image;
            if($request->file('image')){
                $food->image = $this->UploadImage($request,'image', 'Foods');
                $old_image = basename($request->input('old_image'));
                $this->deleteImage( $old_image, 'Foods');
            }
            $food->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'data' =>
                [
                    'title' =>  $food->title,
                    'description' =>  $food->description,
                    'price' =>  $food->price,
                    'active' => $food->active,
                    'image' => $food->image,
                    'id' => $food->id,
                ],
                'message' => "<div class='success'>Data updated successfully.</div>"
            ]);
        } catch (\throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => true,
                'message' => 'Error updating data .',
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
