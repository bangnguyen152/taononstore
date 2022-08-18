<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\ProductDetailModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function getDetail(ProductModel $product)
    {
        $data = ProductDetailModel::query()
            ->where('product_id', $product->id)
            ->firstOrFail();
        $comments = CommentModel::query()
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where('comments.product_id', $product->id)
            ->select('users.*', 'comments.*')
            ->get();
        return view('admin.product_detail.index', [
            'product_detail' => $data,
            'comments' => $comments,
        ]);
    }
    public function create(){
        return view('admin.product.create');
    }
}
