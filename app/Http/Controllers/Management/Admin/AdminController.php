<?php

namespace App\Http\Controllers\Management\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Service\Admin\ChangeAdminPassword;
use App\Service\Admin\EditAdminData;
use App\Service\Admin\StoreAdmin;
use App\Models\Admin;
use App\Service\Admin\DeleteAdmin;
use App\Service\Admin\UpdateAdmin;

class AdminController extends Controller
{
    public function index()
    {   
        $records = Admin::get();
        return view('management.admin.index' ,compact('records') );
    }

    public function store(StoreAdminRequest $storeAdminRequest, StoreAdmin $storeAdmin)
    {
        return $storeAdmin->apply($storeAdminRequest);
    }
    public function changePassword(int $id ,ChangePasswordRequest $changePasswordRequest, ChangeAdminPassword $changeAdminPassword)
    {
        return $changeAdminPassword->apply( $id ,$changePasswordRequest);
    }
    public function delete(int $id ,DeleteAdmin $deleteAdmin)
    {
        return $deleteAdmin->apply($id);
    }
    public function edit(int $id ,EditAdminData $editAdminData)
    {
        return $editAdminData->apply($id);
    }
    public function update(int $id ,UpdateAdmin $updateAdminData ,UpdateAdminRequest $updateAdminRequest )
    {
        return $updateAdminData->apply($id,$updateAdminRequest);
    }
}
