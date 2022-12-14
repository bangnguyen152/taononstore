<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index($id){
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        return view('profile', [
            'user' => $user,
        ]);
    }
    public function changePassword(Request $request,$id) {

        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'password' => Hash::make($request->input('new_password')),
            ]);
        return back()->with('success', 'Đổi thành công!');
    }
    public function changeProfile(Request $request, $id){
        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'full_name' => $request->get('full_name'),
                'phone_number' => $request->get('phone_number'),
                'address' => $request->get('address'),
            ]);
        return back();
    }
    public function history($id){
        $products = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
//            ->join('vouchers', 'order_details.voucher_id', '=', 'vouchers.id')
            ->where('orders.user_id', '=', $id)
            ->orderBy('orders.order_date','desc')
            ->select('orders.status as product_status', 'products.price as product_price',
                'products.photo as product_photo', 'products.title as product_name','products.id as product_id','order_details.number as product_qty')
            ->get();
        $comment = DB::table('comments')
            ->join('products', 'products.id','=','comments.product_id')
            ->join('users','users.id','=','comments.user_id')
            ->where('comments.user_id','=',$id)
            ->first();
        return view('history',[
            'products' => $products,
            'comment'=> $comment,
        ]);
    }
    public function comment_index(Request $request) {
        return view('comment',[
            'id'=>$request->get('product_id'),
        ]);
}
    public function comment(Request $request,$id){
        $comment = new CommentModel();
        $comment->user_id = session()->get('id');
        $comment->product_id = $id;
        $comment->comment = $request->get('comment');
        $comment ->star = $request->get('rating');
        $comment ->time = Carbon::now();
        $comment ->save();
        return redirect()->route('homepage');
    }
}
