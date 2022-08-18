<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Models\imageModel;
use App\Models\ProductModel;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('upload_form');
    }

    public function remove(imageModel $image,ProductModel $product)
    {
        Storage::delete($image);
        $image->delete();
        return redirect()->route('product');
    }

    public function uploadSubmit(Request $request,ProductModel $product)
    {
        foreach ($request->photos as $photo) {
            $imageName = 'photos/'.time().'.'.$photo->extension();
            $photo->move(public_path('photos'), $imageName);
            imageModel::create([
                'product_id' => $product->id,
                'thumbnail' => $imageName,
            ]);
        }
        return redirect()->route('product');
    }
}
