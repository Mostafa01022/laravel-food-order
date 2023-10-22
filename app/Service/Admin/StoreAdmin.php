<?php

namespace App\Service\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreAdmin
{
    public function apply(Request $request)
    {
        DB::beginTransaction();
        try {
            $password = Hash::make($request->password);

            $data = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
            ]);
            DB::commit();

            return response()->json([
                'success' => true,
                'data' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $password,
                    'id' => $data->id
                ],
                'message' => '<div class="error">admin added.</div>',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => '<div class="error">Error adding admin.</div>',
                'error_message' =>  $th->getMessage()
            ]);
        }
    }
}
