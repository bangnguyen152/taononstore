<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = CategoryModel::query()
            ->where('name', 'like', '%'.$search.'%')
            ->orderBy('created_at','desc')
            ->paginate(5);
        $data->appends(['search' => $search]);
        return view('admin.category.index', [
            'categories' => $data,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $category = new CategoryModel();
        $category->name = $request->get('name');
        $category->created_at = Carbon::now();

        $category->save();

        return redirect()->route('category');
    }

    public function destroy(CategoryModel $category)
    {
        $category->delete();
        return redirect()->route('category');
    }

    public function update(Request $request, $id)
    {

        $category = DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'updated_at' => Carbon::now(),
            ]);
        return redirect()->route('category');
    }

    public function edit(CategoryModel $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }
}
