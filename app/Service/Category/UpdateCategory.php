<?php

namespace App\Service\Category;

use App\Models\Category;
use App\Traits\DeleteImageTrait;
use App\Traits\ResponseMessageTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateCategory
{
    use UploadImageTrait;
    use DeleteImageTrait;
    public function apply(int $id,Request $request)
    {
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($id);
            $category->title =  $request->title;
            $category->active =  $request->active;
            if($request->file('new_image')){
                $category->image = $this->UploadImage($request,'new_image', 'Categories');
                $old_image = basename($request->old_image);
                $this->deleteImage( $old_image, 'Categories');
            }
            $category->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'data' =>
                [
                    'title' =>  $category->title,
                    'active' => $category->active,
                    'image' => $category->image,
                ],
                'message' => "<div class='success'>Data updated successfully.</div>"
            ]);
        } catch (\throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => true,
                'message' => "<div class='success'>update failed.</div>",
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
