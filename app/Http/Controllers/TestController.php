<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        return User::all();
    }
    public function test2(){
        return ProductModel::all();
    }
}
