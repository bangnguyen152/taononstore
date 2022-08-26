<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $data = BannerModel::query()
            -> where('title','like','%'.$search.'%')
            ->orderBy('created_at','desc')
            -> paginate(5);
        $data->appends(['search' => $search]);
        return view('admin.banner.index',[
            'banners' => $data,
            'search'=> $search,
        ]);
    }
    public function create(){
        return view('admin.banner.create');
    }
    public function store(Request $request){
        $banner = new BannerModel();
        $banner-> title = $request->get('title');
        $banner-> description = $request->get('description');
        $banner-> start_at = $request->get('start_at');
        $banner-> end_at = $request->get('end_at');
        $banner->created_at = Carbon::now();

        foreach ($request->photos as $photo) {
            $imageName = 'photos/'.time().'.'.$photo->extension();
            $photo->move(public_path('photos'), $imageName);
            $banner-> thumbnail = $imageName;
        }
        $banner-> status = 1;
        $banner->save();

        return redirect()->route('banner');
    }
    public function destroy(BannerModel $banner){
        $banner->delete();
        return redirect()->route('banner');
    }
    public function update(Request $request,$id){
        if (!$request->has('status')) {
            $request->merge(['status' => 0]);
        } else {
            $request->merge(['status' => 1]);
        }
            $input = $request->all();
            $imageName = 'photos/'.time().'.'.$input['photo']->extension();
            $input['photo']->move(public_path('photos'), $imageName);
            $request->photo = $imageName;
            DB::table('banners')
                ->where('id', $id)
                ->update([
                    'title' => $input['title'],
                    'description' => $request->input('description'),
                    'start_at' => $request->input('start_at'),
                    'end_at' => $request->input('end_at'),
                    'thumbnail' => $imageName,
                    'status' => $request->input('status'),
                    'updated_at' => Carbon::now(),

                ]);
        return redirect()->route('banner');
    }
    public function edit(BannerModel $banner){
        return view('admin.banner.detail',[
            'banner' => $banner,
        ]);
    }
    public function getStatus(User $user){
        if($user->status===1){
            return 'Hoạt Động';
        }
        else{
            return 'Đã Dừng';
        }
    }
}
