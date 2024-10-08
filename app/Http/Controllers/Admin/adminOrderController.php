<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminOrderController extends Controller
{
    public function order_management()
    {
        return view("Admin.order_management");
    }
    public function order_details()
    {
        return view("Admin.order_details");
    }
    public function order_summary()
    {
        return view("Admin.order_summary");
    }
}
