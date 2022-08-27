<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = DB::table('products')
            ->where('id','like',$search)
            ->orwhere('discount','like',$search)
            ->orWhere('description','like','%'.$search.'%')
            ->orWhere('price','like','%'.$search.'%')
            ->orWhere('title','like','%'.$search.'%')->paginate(10, ['*'], 'products');
        return view('search_result',compact("products",'search'));
    }
}
