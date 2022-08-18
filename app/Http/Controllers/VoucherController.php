<?php

namespace App\Http\Controllers;

use App\Models\imageModel;
use App\Models\ProductModel;
use App\Models\User;
use App\Models\VoucherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = VoucherModel::query()
            ->where('discount_code', 'like', '%'.$search.'%')
            ->paginate(5);
        $data->appends(['search' => $search]);
        return view('admin.voucher.index', [
            'vouchers' => $data,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin.voucher.create');
    }

    public function store(Request $request)
    {
        $voucher = new VoucherModel();
        $voucher->discount_code = $request->get('discount_code');
        $voucher->discount = $request->get('discount');
        if (!$request->has('status')) {
            $voucher->status = 0;
        } else {
            $voucher->status = 1;
        }
        $voucher->save();

        return redirect()->route('voucher');
    }

    public function destroy(VoucherModel $voucher)
    {
        $voucher->delete();
        return redirect()->route('voucher');
    }

    public function update(Request $request, $id)
    {
        if (!$request->has('status')) {
            $request->merge(['status' => 0]);
        } else {
            $request->merge(['status' => 1]);
        }
        $voucher = DB::table('vouchers')
            ->where('id', $id)
            ->update([
                'discount_code' => $request->input('discount_code'),
                'discount' => $request->input('discount'),
                'status' => $request->input('status')
            ]);
        return redirect()->route('voucher');
    }

    public function edit(VoucherModel $voucher)
    {
        return view('admin.voucher.edit', [
            'voucher' => $voucher,
        ]);
    }

}
