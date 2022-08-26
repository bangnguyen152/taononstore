<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UploadRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\imageModel;
use App\Models\ProductDetailModel;
use App\Models\ProductModel;
use App\Models\User;
use App\Models\VoucherModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = ProductModel::query()
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('created_at','desc')
            ->paginate(5);
        foreach($data as $each){
            $each['category_id'] = checkCategory($each->category_id);
        }
        $data->appends(['search' => $search]);
        return view('admin.product.index', [
            'products' => $data,
            'search' => $search,
        ]);
    }

    public function edit(ProductModel $product)
    {

        $data = DB::table('products')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('images.thumbnail','images.id', 'categories.name')
            ->where('products.id',$product->id)
            ->get();
        return view('admin.product.detail', [
            'product'=> $product,
            'images' => $data,
        ]);

    }
    public function create(){
        return view('admin.product.create');
    }
    public function store(Request $request)
    {

        $product = new ProductModel();
        $product->category_id = $request->get('category_id');
        $product->title = $request->get('title');
        $product->price = $request->get('price');
        $product->discount = $request->get('discount');
        $product->description = $request->get('description');
        $product->created_at = $request->get('created_at');
        $photo = $request->photo;
        $imageName = 'photos/'.time().'.'.$photo->extension();
        $photo->move(public_path('photos'), $imageName);
        $product-> photo = $imageName;
        $product->created_at = Carbon::now();

        if (!$request->has('status')) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        $product->save();
        $id = $product->id;

        $product_detail = new ProductDetailModel();

        $product_detail->product_id = $id;
        $product_detail->chip = $request->get('chip');
        $product_detail->capacity = $request->get('capacity');
        $product_detail->display = $request->get('display');
        $product_detail->camera = $request->get('camera');
        $product_detail->size_weight = $request->get('size_weight');
        $product_detail->graphic_sound = $request->get('graphic_sound');
        $product_detail->operation = $request->get('operation');
        $product_detail->ram = $request->get('ram');
        $product_detail->other = $request->get('other');
        $product_detail->connector = $request->get('connector');

        $product_detail->save();

        return redirect()->route('product');
    }

    public function destroy(ProductModel $product)
    {
        $product->delete();
        return redirect()->route('product');
    }

    public function update(Request $request, $id)
    {
        if (!$request->has('status')) {
            $request->merge(['status' => 0]);
        } else {
            $request->merge(['status' => 1]);
        }
        if (request()->has('photo')){
            $photo = $request->photo;
            $imageName = 'photos/'.time().'.'.$photo->extension();
            $photo->move(public_path('photos'), $imageName);
            $product = DB::table('products')
                ->where('id', $id)
                ->update([
                    'title' => $request->input('title'),
                    'category_id' => $request->input('category_id'),
                    'price' => $request->input('price'),
                    'description' => $request->input('description'),
                    'status' => $request->input('status'),
                    'photo'=> $imageName,
                    'updated_at' => Carbon::now(),
                ]);
        }
        else{
            $product = DB::table('products')
                ->where('id', $id)
                ->update([
                    'title' => $request->input('title'),
                    'category_id' => $request->input('category_id'),
                    'price' => $request->input('price'),
                    'description' => $request->input('description'),
                    'status' => $request->input('status'),
                ]);
        }

        return redirect()->route('product');
    }
}
