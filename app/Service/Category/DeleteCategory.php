<?php

namespace App\Service\Category;

use App\Models\Category;
use App\Traits\DeleteImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteCategory
{
    use DeleteImageTrait;
    public function apply(Request $request)
    {
        DB::beginTransaction();
        try {
            Category::findOrFail($request->id)->delete();
            $image = basename($request->image);
            $this->deleteImage($image, 'Categories');
            DB::commit();
            return response()->json([
                'message' => 'Category deleted successfully.', 
                'success' => true
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => '<div class="error">Error deleting category.</div>',
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
