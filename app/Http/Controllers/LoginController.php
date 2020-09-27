<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request){
        if (Auth::guard('pengguna')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/beranda');
        }elseif (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/beranda');
        }
        return redirect('login');
    }
    
    public function logout(Request $request){
        if(Auth::guard('pengguna')->check()){
            Auth::guard('pengguna')->logout();
        }elseif(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return redirect('login');
    }   
}
