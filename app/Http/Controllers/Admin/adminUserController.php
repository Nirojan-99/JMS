<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminUserController extends Controller
{
    public function user_management()
    {
        return view('Admin.user_management');
    }
}
