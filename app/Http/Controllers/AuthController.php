<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function doLogin(Request $request){

        $user = Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        
        if($user){
            return response()->json(['status' => true, 'message' => '', 'data' => []], 200);
        }else{
            return response()->json(['status' => false, 'message' => 'Login gagal. Periksa kembali username dan passowrd Anda atau hubungi Developer.', 'data' => []], 400);
        }
        
        return response()->json($user);
        
    }

    public function doLogout(){
        Auth::logout();
        return redirect('/auth');
    }
}
