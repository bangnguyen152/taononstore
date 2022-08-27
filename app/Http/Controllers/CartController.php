<?php
namespace App\Http\Controllers;
use App\Http\Requests\CheckoutRequest;
use App\Models\Bill;
use App\Models\BillDeltail;
use App\Models\ProductModel;
use Carbon\Carbon;
use Couchbase\View;
use float\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
class CartController extends Controller
{
    public function index(){
        $products = ProductModel::all();
        return view('cart', compact('products'));
    }

    public function addProductToCart($id){
        $product = ProductModel::find($id);
        if ($product){
            \Cart::add(['id' => $id, 'name' => $product->title, 'qty' => 1, 'price' => $product->price, 'weight'=>100,'options' => ['thumbnail' => $product->photo],'total'=>\Cart::total(),]);
            return redirect()->back();
        }
        // //tăng số lượng
    }
    public function listCartProduct($id=null){
        $product = ProductModel::find($id);
        $user = DB::table('users')
            ->where('id',session()->get('id'))
            ->first();
        $products = \Cart::content();
        $viewData = [
            'user' => $user,
            'products' => $products
        ];
        if (Request::get('id') && (Request::get('increment')) == 1) {
            $rows = \Cart::search(function($key, $value) {
                return $key->id == Request::get('id');
            });
            $product = $rows->first();
            \Cart::update($product->rowId, $product->qty + 1);
        }
        if (Request::get('id') && (Request::get('decrease')) == 1) {
            $rows = \Cart::search(function($key, $value) {
                return $key->id == Request::get('id');
            });
            $product = $rows->first();
            \Cart::update($product->rowId, $product->qty - 1);
        }
        $rows = \Cart::search(function($key, $value) {
            return $key->id === Request::get('id');
        });
        return view('cart',$viewData);
    }
    public function getCheckOut(CheckoutRequest $request) {
        $this->data['title'] = 'Check out';
        $this->data['cart'] = \Cart::content();
        $total =0;
        foreach ($this->data['cart']as $proNum){
            if ($proNum->qty!==1){
                $total += $proNum->price*$proNum->qty;
            }
            else{
                $total += $proNum->price;
            }

        }
        $this->data['total'] = $total;
        $dataU = $request->all();
        $discount = DB::table('vouchers')
            ->where('discount_code','like',$request->discount_code)
            ->first();
        return view('checkout', [
            'data' => $this->data,
            'dataU'=> $dataU,
            'discount'=>$discount
        ]);
    }
    public function postCheckOut(Request $request) {
        $cartInfor = \Cart::content();
        $voucher_id = DB::table('vouchers')
            ->where('discount_code','=',Request::get('discount_code'))
            ->first();
        // validate
        // $rule = [
        //     'fullName' => 'required',
        //     'email' => 'required|email',
        //     'address' => 'required',
        //     'phoneNumber' => 'required|digits_between:10,12'
        // ];

        // $validator = \Validator::make(Input::all(), $rule);

        // if ($validator->fails()) {
        //     return redirect('/checkout')
        //                 ->withErrors($validator)
        //                 ->withInput();//////
        // }

        try {
            // save
            $bill = new Bill;
            $bill->user_id = session()->get('id');
            $bill->email = session()->get('email');
            $bill->full_name = Request::get('full_name');
            $bill->address = Request::get('address');
            $bill->phone_number = Request::get('phone_number');
            $bill->order_date = Carbon::now();
            $bill->note = Request::get('note');
            $bill->status = 0;
            $bill->save();
            if (count($cartInfor) >0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new BillDeltail();
                    $billDetail->order_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->voucher_id = $voucher_id->id;
                    $billDetail->number = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->total_money = FinalPrice($voucher_id->discount, $item->price*$item->qty);
                    $billDetail->save();
                    $product = DB::table('products')
                        ->where('id', $item->id)
                        ->first();
                    DB::table('products')
                        ->where('id', $item->id)
                        ->update([
                            'sold'=> $product->sold+$item->qty,
                        ]);
                }
            }

            // del
            \Cart::destroy();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return redirect()->route('homepage');
    }
    public function remove($id){
        $product = ProductModel::find($id);
        // $id = \Cart::search(function($key, $value) {
        //     return $key->id == Request::get('id');
        // });
        \Cart::remove($id);
//         flash("Your item has been removed");
        return back();

    }
}
