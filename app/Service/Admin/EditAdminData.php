<?php

namespace App\Service\Admin;

use App\Models\Admin;


class EditAdminData
{
    public function apply($id)
    {
        $data = Admin::select('name', 'email')->find($id);
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}