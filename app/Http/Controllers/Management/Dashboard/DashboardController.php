<?php

namespace App\Http\Controllers\Management\Dashboard;

use App\Http\Controllers\Controller;
use App\Service\Dashboard\GetTotalData;

class DashboardController extends Controller
{
    public function index(GetTotalData $getTotalData)
    {
        return $getTotalData->apply();
    }
}
