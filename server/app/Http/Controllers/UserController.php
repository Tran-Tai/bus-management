<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signIn(Request $request)
    {
        $user_name = $request->user_name;
        $password = $request->password;
        if (Auth::attempt(['user_name' => $user_name, 'password' => $password])) {
            return view('demo');
        } else {
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng');
            return redirect('login');
        }
    }

    public function signOut()
    {
        Auth::logout();
        return redirect('/login');
    }
}
