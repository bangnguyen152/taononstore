<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\admin\AdminBillController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VoucherController;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Route;


Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('login.perform');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'register_process'])->name('register.process');
Route::group([
    'middleware'=> 'admin',
    ], function () {
        Route::get('/admin',[UserController::class,'home'])->name('master');

    //quan li user
        Route::get('/admin/user',[UserController::class,'index'])->name('user');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/create',[UserController::class,'store'])->name('store');
        Route::put('/edit/{user}',[UserController::class,'edit'])->name('edit');
        Route::post('/edit/update/{user}',[UserController::class,'update'])->name('update');
        Route::delete('/destroy/{user}',[UserController::class,'destroy'])->name('destroy');

        //quan li san pham
        Route::get('product', [ProductsController::class,'index'])->name('product');
        Route::get('product/add',[ProductsController::class,'create'] )->name('product.create');
        Route::post('product/add', [ProductsController::class,'store'])->name('product.store');
        Route::put('product/edit/{product}', [ProductsController::class,'edit'])->name('product.edit');
        Route::post('product/edit/update/{product}', [ProductsController::class,'update'])->name('product.update');
        Route::delete('product/destroy/{product}', [ProductsController::class,'destroy'])->name('product.destroy');
        //detail product
        Route::get('product_detail/{product}', [ProductDetailController::class,'getDetail'])->name('product_detail');
        Route::get('product_detail/add',[ProductDetailController::class,'create'] )->name('product_detail.create');
        Route::post('product_detail/add', [ProductDetailController::class,'store'])->name('product_detail.store');
        Route::put('product_detail/edit/{product}', [ProductDetailController::class,'edit'])->name('product_detail.edit');
        Route::post('product_detail/edit/update/{product}', [ProductDetailController::class,'update'])->name('product_detail.update');

        Route::get('voucher', [VoucherController::class,'index'])->name('voucher');
        Route::get('voucher/add',[VoucherController::class,'create'] )->name('voucher.create');
        Route::post('voucher/add', [VoucherController::class,'store'])->name('voucher.store');
        Route::put('voucher/edit/{voucher}', [VoucherController::class,'edit'])->name('voucher.edit');
        Route::post('voucher/edit/update/{voucher}', [VoucherController::class,'update'])->name('voucher.update');
        Route::delete('voucher/destroy/{voucher}', [VoucherController::class,'destroy'])->name('voucher.destroy');

        //category
        Route::get('category', [CategoryController::class,'index'])->name('category');
        Route::get('category/add',[CategoryController::class,'create'] )->name('category.create');
        Route::post('category/add', [CategoryController::class,'store'])->name('category.store');
        Route::put('category/edit/{category}', [CategoryController::class,'edit'])->name('category.edit');
        Route::post('category/edit/update/{category}', [CategoryController::class,'update'])->name('category.update');
        Route::delete('category/destroy/{category}', [CategoryController::class,'destroy'])->name('category.destroy');

        //upload banner
        Route::get('banner', [BannerController::class,'index'])->name('banner');
        Route::get('banner/add',[BannerController::class,'create'] )->name('banner.create');
        Route::post('banner/add', [BannerController::class,'store'])->name('banner.store');
        Route::put('banner/edit/{banner}', [BannerController::class,'edit'])->name('banner.edit');
        Route::post('banner/edit/update/{banner}', [BannerController::class,'update'])->name('banner.update');
        Route::delete('banner/delete/{banner}',[BannerController::class,'destroy'] )->name('banner.destroy');
        //upload ảnh
        Route::post('upload',[UploadController::class,'uploadSubmit'] )->name('upload');
        Route::delete('delete/{image}',[UploadController::class,'remove'] )->name('image.remove');
        //hoa don

        Route::get('order', [AdminBillController::class,'index'])->name('order');
        Route::put('order/detail/{bill}', [AdminBillController::class,'edit'])->name('bill.detail');
        Route::post('order/update/{bill}', [AdminBillController::class,'update'])->name('bill.update');
        Route::delete('order/destroy/{bill}', [AdminBillController::class,'destroy'])->name('bill.destroy');
        Route::get('order/search', [AdminBillController::class,'index'])->name('bill.search');

        //upload file

        //Route::put('/upload/{product}', [UploadController::class,'uploadForm'])->name('upload');
        Route::post('/upload/{product}', [UploadController::class,'uploadSubmit'])->name('upload.process');
});
Route::get('/',[PageController::class,'index'])->name('homepage');
Route::get('/product/{id}',[PageController::class,'detail'])->name('product.detail');
Route::get('/iphone',[PageController::class,'iphone'])->name('iphone');
Route::get('/ipad',[PageController::class,'ipad'])->name('ipad');
Route::get('/mac',[PageController::class,'mac'])->name('mac');
Route::get('/watch',[PageController::class,'watch'])->name('watch');
Route::get('/amthanh',[PageController::class,'amthanh'])->name('amthanh');
Route::get('/phukien',[PageController::class,'phukien'])->name('phukien');
Route::get('search', 'searchController@search')->name('search');

// Cart
Route::get('addtocart/{id}',[CartController::class,'addProductToCart'])->name('addtocart');
Route::get('/cart',[CartController::class,'listCartProduct'])->name('cart');
// Route::get('/', ['as'=>'trangchu','uses'=>'PageController@index']);
Route::get('/checkout', [CartController::class,'getCheckOut']);
Route::post('/checkout', [CartController::class,'postCheckOut'])->name('checkout');
Route::get('cart/remove/{id}', [CartController::class,'remove'])->name('remove');
//profile
Route::get('profile/{id}', [ProfileController::class,'index'])->name('profile');
Route::post('profile/{id}', [ProfileController::class,'changePassword'])->name('profile.update')->middleware('change pass');

