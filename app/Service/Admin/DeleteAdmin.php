<?php

namespace App\Service\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class DeleteAdmin
{
    public function apply(int $id)
    {
        DB::beginTransaction();
        try {
            Admin::findOrFail($id)->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => '<div class="error">admin deleted.</div>',
            ]);
        } catch (\throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => '<div class="error">Error deleting admin.</div>',
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
