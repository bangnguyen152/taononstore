<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{
    public function index()
    {
        if (!session()->has('role_id')){
            return view('auth.login');
        }

        return redirect()->route('homepage');

    }
    public function login(Request $request){
        try {
            $user = User::query()
                -> where('email', $request->get('email'))
                ->firstOrFail();
            if (!Hash::check($request->get('password'), $user->password)) {
                throw new \RuntimeException("Invalid password");
            }
            if($user->role_id===2){
                session()->put('id',$user->id);
                session()->put('full_name',$user->full_name);
                session()->put('role_id',$user->role_id);
                session()->put('status',$user->status);
                return redirect()->route('homepage');
            }

            session()->put('id',$user->id);
            session()->put('full_name',$user->full_name);
            session()->put('role_id',$user->role_id);
            session()->put('status',$user->status);
            return redirect()->route('master');


        }
        catch (Throwable $e){
            return redirect()->route('login');
        }
    }
    public function logout() {

        session()->flush();

        return redirect()->route('homepage');
    }
    public function register(Request $request){
        return view('register');
    }
    public function register_process(Request $request){
        User::query()
            ->create([
                'full_name' =>$request->get('full_name'),
                'email' =>$request->get('email'),
                'address' =>$request->get('address'),
                'phone_number' =>$request->get('phone_number'),
                'password' =>Hash::make($request->get('password')),
                'role_id' =>2,
                'status'=>1,
            ]);
        return redirect()->route('login');
    }
}
