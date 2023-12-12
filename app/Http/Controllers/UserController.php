<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view ('rent.index');
    }

    public function order(){
        return view ('order.index');
    }
}
