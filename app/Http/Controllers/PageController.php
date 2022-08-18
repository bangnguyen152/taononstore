<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){

        $iphone=DB::table('products')->where('category_id','=','1')->take(4)->get();
        $macs=DB::table('products')->where('category_id','=','3')->take(4)->get();
        $ipads=DB::table('products')->where('category_id','=','2')->take(4)->get();
        $watches=DB::table('products')->where('category_id','=','4')->take(4)->get();
        $airpods=DB::table('products')->where('category_id','=','5')->take(4)->get();
        $accessories =DB::table('products')->where('category_id','=','6')->take(4)->get();
        return view('home',[
            'iphones'=> $iphone,
            'macs'=> $macs,
            'ipads'=> $ipads,
            'watches'=> $watches,
            'airpods'=>$airpods,
            'accessories'=>$accessories,
        ]);
    }
    public function detail(Request $request){
        $products = DB::table('products')
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->where('products.id',$request->id)
            ->select('products.*','product_details.*')
            ->first();
        $product = DB::table('products')->where('products.id',$request->id)
            ->first();
        $data = DB::table('products')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('images.thumbnail','images.id', 'categories.name')
            ->where('products.id',$request->id)
            ->take(1)
            ->get();
        return view('product_detail', [
            'products'=> $products,
            'images' => $data,
            'product'=> $product,
        ]);
    }
    public function iphone(){
        $products = DB::table('products')->where('category_id','=','1')->get();

        return view('product_list',[
            'products'=>$products,
        ]);
    }
    public function mac(){
        $products = DB::table('products')->where('category_id','=','3')->get();

        return view('product_list',[
            'products'=>$products,
        ]);
    }
    public function ipad(){
        $products = DB::table('products')->where('category_id','=','2')->get();

        return view('product_list',[
            'products'=>$products,
        ]);
    }
    public function watch(){
        $products = DB::table('products')->where('category_id','=','4')->get();

        return view('product_list',[
            'products'=>$products,
        ]);
    }
    public function amthanh(){
        $products = DB::table('products')->where('category_id','=','5')->get();

        return view('product_list',[
            'products'=>$products,
        ]);
    }
    public function phukien(){
        $products = DB::table('products')->where('category_id','=','6')->get();

        return view('product_list',[
            'products'=>$products,
        ]);
    }

}
