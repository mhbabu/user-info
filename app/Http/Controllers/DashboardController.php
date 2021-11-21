<?php

namespace App\Http\Controllers;

use App\Models\UserInformation;

class DashboardController extends Controller
{
    public function index(){
        $data['totalUserInfo'] = UserInformation::all()->count();
        return view("backend.pages.dashboard", $data);
    }
}
