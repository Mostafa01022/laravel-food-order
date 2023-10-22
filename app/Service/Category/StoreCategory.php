<?php

namespace App\Service\Category;

use App\Models\Category;
use App\Traits\DeleteImageTrait;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\DB;




class StoreCategory 
{
    use UploadImageTrait;
    use DeleteImageTrait;
    
    public function apply(Request $request)
    {
        DB::beginTransaction();
        try{
            $photo = $this->UploadImage($request, 'image', 'Categories');
    
            $category = Category::create([
                'title' => $request->title,
                'active' => $request->active,
                'image' => $photo,
            ]);
            DB::commit();
            return response()->json([
                'success' =>true,
            'message' => 'Category added successfully.', 
            'data'=>[
                'title' => $category->title,
                'id' => $category->id,
                'active' => $category->active,
                'image' => $category->image,
            ]
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => '<div class="error">Error adding category.</div>',
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
