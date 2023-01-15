<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login(Request $req)
    {
         $req->validate([
            'no_induk' => 'required',
            'password' => 'required',

         ]);

        $no_induk = $req->get('no_induk');
        $password = $req->get('password');
        $credentials = $req->get('no_induk', 'password');
        $credentials = $req->only('no_induk', 'password');

        if (auth()->guard('front')->attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->route('front::login');
    }

    public function logout(Request $req)
    {
        auth()->guard('front')->logout();
        return redirect()->route('front::login');
    }
}
