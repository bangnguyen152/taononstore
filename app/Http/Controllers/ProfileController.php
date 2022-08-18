<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($id){
        $user = DB::table('users')
            ->where('id', $id)
            ->get();
        return view('profile', [
            'user' => $user,
        ]);
    }
    public function changePassword(Request $request,$id) {
        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'password' => Hash::make($request->input('new_password')),
            ]);
        return redirect()->route('homepage');
    }
}
