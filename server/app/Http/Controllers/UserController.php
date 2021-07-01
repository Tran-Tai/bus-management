<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // public function signIn(Request $request)
    // {
    //     $user_name = $request->user_name;
    //     $password = $request->password;
    //     if (Auth::attempt(['user_name' => $user_name, 'password' => $password])) {
    //         return view('demo');
    //     } else {
    //         Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng');
    //         return redirect('login');
    //     }
    // }

    // public function signOut()
    // {
    //     Auth::logout();
    //     return redirect('/login');
    // }
    
    public function showLoginPage(){
        $user = auth()->user();

        return view('auth.login');
    }

    public function showRegisterPage(){
        return view('auth.register');
    }

    public function login(Request $request){
        
         Auth::attempt([
            'user_name' => $request->username,
            'password' => $request->password
        ]);

        if(Auth::check()){
            $res = Auth::user();
            return response()->json($res); 
        }else{
            $res = 'khong thanh cong';
            return response()->json($res);
        }
        // if(!$user){
        //     return redirect('/login');
        // }else{
        //     $res = Auth::user();
        //     return response()->json($res);
        // }  

        // $data = json_decode(json_encode($request->all()), true);
        // $data_check = User::where("user_name","=", $data['user_name'])->get()->toArray();
        // if(count($data_check) > 0){
        //     if(Hash::check($data['password'], $data_check[0]['password'])){
        //         return response()->json(['success'=>1, "data"=>$data_check,"remember_token"=>""]);    
        //     }else{
        //         return response()->json(['success'=>0, "data"=>"Mật khẩu không đúng!","remember_token"=>""]);
        //     }
        // }
        // return response()->json(['success' => -1,"data"=>"Tên đăng nhập không đúng!","remember_token"=>""]);
    }

    public function register(Request $request){
        $name = $request->name;
        $username = $request->username;
        $password = $request->password;
        $age = $request->age;
        $gender = $request->gender;

        $user = new User();
        $user->name = $name;
        $user->user_name = $username;
        $user->password = bcrypt($password);
        $user->age = $age;
        $user->gender = $gender;

        $user->save();

        return redirect('/login');
    }

    public function signOut(){
        Auth::logout();

        return redirect('/login');
    }
}
