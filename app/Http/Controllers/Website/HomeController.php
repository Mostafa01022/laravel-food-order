<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Service\Website\Home\GetHomeData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(GetHomeData $getHomeData)
    {
        return $getHomeData->apply();
    }
}
