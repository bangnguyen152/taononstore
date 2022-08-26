<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Carbon\Carbon;
use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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
    public function login(LoginRequest $request){
        $validated = $request->safe()->only(['email', 'password','_token']);
        try {
            $user = User::query()
                -> where('email', $request->get('email'))
                ->firstOrFail();
            if (!Hash::check($request->get('password'), $user->password)) {
                throw new \RuntimeException("Sai mật khẩu");
            }
            if($user->role_id===2){
                session()->put('id',$user->id);
                session()->put('full_name',$user->full_name);
                session()->put('role_id',$user->role_id);
                session()->put('status',$user->status);
                session()->put('email',$user->email);
                return redirect()->route('homepage');
            }

            session()->put('id',$user->id);
            session()->put('full_name',$user->full_name);
            session()->put('role_id',$user->role_id);
            session()->put('status',$user->status);
            session()->put('email',$user->email);
            return redirect()->route('master');


        }
        catch (Throwable $e){
            return redirect()->back()->withErrors(['msg' => 'Sai mật khẩu']);
        }
    }
    public function logout() {

        session()->flush();

        return redirect()->route('homepage');
    }
    public function register(Request $request){
        return view('register');
    }
    public function register_process(RegistrationRequest $request){
        User::query()
            ->create([
                'full_name' =>$request->get('full_name'),
                'email' =>$request->get('email'),
                'address' =>$request->get('address'),
                'phone_number' =>$request->get('phone_number'),
                'password' =>Hash::make($request->get('password')),
                'created_at'=> Carbon::now(),
                'role_id' =>2,
                'status'=>1,
            ]);
        return redirect()->route('login');
    }
    public function showForgetPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\RedirectResponse()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.email-link', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    /**
     * Write code on Method
     *
     * @return Application|Factory|View()
     */
    public function showResetPasswordForm($token) {
        return view('auth.verify-email', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\RedirectResponse()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password),
                'updated_at'=> Carbon::now(),
                ]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
