<?php

namespace App\Service\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditCategory
{

    public function apply(Request $request)
    {
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($request->id);
            $data = [
                'id' => $category->id,
                'title' => $category->title,
                'image' => $category->image,
            ];
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Category found successfully.',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => '<div class="error">category not found.</div>',
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
