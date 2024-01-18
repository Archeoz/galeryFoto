<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function loginpage(){
        return view('login');
    }

    public function login(Request $request){
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('mainpage');
        } else {
            return back()->with('error','email / password salah');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request){
        // dd($request);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/');
    }
}
