<?php

namespace  App\Service\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;;

class UpdateAdmin
{
    public function apply(int $id, Request $request)
    {
        DB::beginTransaction();
        try {
            $admin = Admin::findOrFail($id);
            $admin->name =  $request->input('name');
            $admin->email =  $request->input('email');
            $admin->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'data' =>
                [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                ],
                'message' => "<div class='success'>Data updated successfully.</div>"
            ]);
        } catch (\throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => '<div class="error">Error updating admin.</div>',
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
