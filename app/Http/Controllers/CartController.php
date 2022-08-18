<?php
namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\BillDeltail;
use App\Models\ProductModel;
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
        $products = \Cart::content();
        $viewData = [
            'products' => $products
        ];

        return view('cart',$viewData);
    }
    public function getCheckOut() {
        $this->data['title'] = 'Check out';
        $this->data['cart'] = \Cart::content();
        $this->data['total'] = \Cart::total();
        return view('checkout', $this->data);
    }
    public function postCheckOut(Request $request) {
        $cartInfor = \Cart::content();
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
            $bill->full_name = Request::get('full_name');
            $bill->address = Request::get('address');
            $bill->phone_number = Request::get('phone_number');
            $bill->order_date = date('Y-m-d' );
            //$bill->total = str_replace(',', '', \Cart::total());
            $bill->note = Request::get('note');
            $bill->status = 0;
            $bill->save();
            if (count($cartInfor) >0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new BillDeltail();
                    $billDetail->order_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    //$billDetail->product_msp= $item->msp;
                    $billDetail->number = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }
            // del
            \Cart::destroy();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return redirect()->back()->with('alert','Purchase complete! Thanks for choosing our website ;)');
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
