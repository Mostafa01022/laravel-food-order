<?php

namespace App\Http\Controllers\Website\UserProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('website.profile.index');
    }
}
