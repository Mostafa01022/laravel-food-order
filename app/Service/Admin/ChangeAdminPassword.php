<?php

namespace App\Service\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangeAdminPassword
{
    public function apply(int $id, Request $request)
    {
        DB::beginTransaction();
        try {
            $admin = Admin::findOrFail($id);
            $oldPasswordMatch = Hash::check($request->old_password, $admin->password);
            if ($oldPasswordMatch) {
                $admin->password = Hash::make($request->new_password);
                $admin->save();
                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => '<div class="success">Password changed successfully.</div>',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Wrong password.',
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => '<div class="error">Error changing password or wrong password.</div>',
                'error_message' => $th->getMessage(),
            ]);
        }
    }
}
