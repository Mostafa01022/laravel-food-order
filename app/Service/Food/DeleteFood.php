<?php

namespace App\Service\Food;

use App\Models\Food;
use App\Traits\DeleteImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeleteFood
{
    use DeleteImageTrait;
    public function apply(Request $request)
    {
        DB::beginTransaction();
        try {
            Food::findOrFail($request->id)->delete();
            $this->deleteImage(basename($request->image), 'Foods');
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => '<div class="error">Food deleted successfully.</div>'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => '<div class="error">Error deleting Food.</div>',
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
