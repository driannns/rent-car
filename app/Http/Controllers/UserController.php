<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $data = DB::table('cars')->orderBy('name', 'asc')->get();
        $category = DB::table('categories')->orderBy('category', 'asc')->get();
        return view ('rent.index', ['data' => $data, 'category' => $category]);
    }

    public function order(){
        return view ('order.index');
    }
}
