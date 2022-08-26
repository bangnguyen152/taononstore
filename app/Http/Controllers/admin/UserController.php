<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home(){
        return view('admin.home');
    }
    public function index(Request $request){
        $search = $request->get('search');
        $data = User::query()
            -> where('full_name','like','%'.$search.'%')
            ->orderBy('created_at','desc')
            -> paginate(5);
        $data->appends(['search' => $search]);
        return view('admin.user.index',[
            'users' => $data,
            'search'=> $search,
        ]);
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(StoreRequest $request){
        $user = new User();

        $user-> full_name = $request->get('full_name');
        $user-> address = $request->get('address');
        $user-> phone_number = $request->get('phone_number');
        $user-> email = $request->get('email');
        $user-> password = Hash::make($request->get('password'));
        if ($request->get('role_id')===0){
            $user-> role_id = 0;
        }else
        {
            $user-> role_id = 1;
        }
        if (!$request->has('status')){
            $user-> status = 0;
        }else{
            $user-> status = 1;
        }
        $user->created_at = Carbon::now();
        $user->save();

        return redirect()->route('user');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('user');
    }
    public function update(Request $request,$id){
        if ($request->get('role_id')===0){
            $request->merge(['role_id'=>0]);
        }else
        {
            $request->merge(['role_id'=>1]);
        }
        if (!$request->has('status')){
            $request->merge(['status'=>0]);
        }else{
            $request->merge(['status'=>1]);
        }
        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'role_id' => $request->input('level'),
                'status' => $request->input('status'),
                'updated_at' => Carbon::now(),
            ]);
        return redirect()->route('user');
    }
    public function edit(User $user){
        return view('admin.user.edit',[
            'user' => $user,
        ]);
    }
}
