<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function profile()  {
        $user = auth()->user();
        return view('authentication.profile',compact('user'));
    }
}
