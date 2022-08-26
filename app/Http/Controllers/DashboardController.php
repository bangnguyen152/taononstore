<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDeltail;
use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $user = User::query()
            -> where('role_id','=','2')
            ->get();
        $NumUser = $user->count();
        $product = ProductModel::query()
            ->get();
        $NumProduct = $product->count();
        $profit = Bill::query()
            ->join('order_details', 'orders.id','=','order_details.order_id')
            -> where('status','=','4')
            ->sum('price');
        $recentsales = Bill::query()
            ->join('order_details', 'orders.id','=','order_details.order_id')
            ->orderBy('order_date','desc')
            ->limit(5)
            ->get();
        $pending = Bill::query()
            -> where('status','=','0')
            ->get()->count();
        $NumOrder = DB::table('orders')->get()->count();
        $topselling = DB::table('products')
            ->orderBy('sold','desc')
            ->get();
        return view('admin.home',[
            'user' => $user,
            'product' => $product,
            'profit' => $profit,
            'NumUser' => $NumUser,
            'NumProduct'=> $NumProduct,
            'NumOrder'=>$NumOrder,
            'pending'=>$pending,
            'topsellings'=>$topselling,
            'recentsales'=>$recentsales,

        ]);
    }
}
