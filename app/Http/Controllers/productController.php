<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function products(){
        return view("products");
    }
    public function index(){
        return view("welcome");
    }
}
