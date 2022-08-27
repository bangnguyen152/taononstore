<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        $search = $request->get('search');
        $products = DB::table('products')
            -> join('categories', 'categories.id','=','products.category_id')
            ->where('products.id','like','%'.$search.'%')
            ->orWhere('categories.name','like','%'.$search.'%')
            ->orWhere('categories.description','like','%'.$search.'%')
            ->orwhere('discount','like','%'.$search.'%')
            ->orWhere('products.description','like','%'.$search.'%')
            ->orWhere('price','like','%'.$search.'%')
            ->orWhere('title','like','%'.$search.'%')->paginate(10, ['*'], 'products');
        return view('search_result',compact("products",'search'));
    }
}
