<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login()
    {

      return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nat_num' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('nat_num', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout() {
      Auth::logout();

      return redirect('login');
    }

    public function home()
    {

      return view('home');
    }
}