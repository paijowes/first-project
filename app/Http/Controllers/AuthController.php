<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('register')->with('success','Register telah berhasil');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect('employees')->with('msg', 'Login Berhasil');
        }

        return back()->with('error','Email atau Password salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
