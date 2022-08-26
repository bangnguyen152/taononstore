<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\VoucherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = Bill::query()
            ->where('full_name', 'like', '%'.$search.'%')
            ->orderBy('order_date','desc')
            ->paginate(6);
        $data->appends(['search' => $search]);
        return view('admin.bill.index', [
            'bills' => $data,
            'search' => $search,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Bill $bill)
    {
        $customerInfo = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'orders.id as bill_id', 'orders.order_date', 'orders.note as bill_note', 'orders.status as bill_status')
            ->where('orders.id', '=', $bill->id)
            ->orderBy('order_date','desc')
            ->first();

        $billInfo = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
//            ->join('vouchers', 'order_details.voucher_id', '=', 'vouchers.id')
            ->where('order_details.order_id', '=', $bill->id)
            ->select('orders.*', 'order_details.*','order_details.total_money as bill_total', 'products.title as product_name')
            ->get();
        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;


        return view('admin.bill.edit', [
            'bills'=> $customerInfo,
            'bill_details' => $billInfo,
        ]);
    }
    public function getVoucher($id){
        $data= VoucherModel::query()
            ->where('id', '=', $id)
            ->firstOrFail();
        if(!isset($data)||$data->status===0){
            return 1;
        }
        return $data->discount;
    }
    public function getTotalMoney($id){
        $billInfo = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->leftjoin('products', 'order_details.product_id', '=', 'products.id')
            ->where('orders.id', '=', $id)
            ->select('orders.*', 'order_details.*', 'products.title as product_name')
            ->get();
        $sum = 0;
        foreach ($billInfo as $bill){
            $bill->price = $this->getVoucher($bill->voucher_id)*($bill->price);
        }
        return $sum;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Bill $bill)
    {
        $order = DB::table('orders')
            ->where('id', $bill->id)
            ->update([
                'status' => $request->input('status'),
            ]);
        return redirect()->route('order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect()->route('order');
    }
}
