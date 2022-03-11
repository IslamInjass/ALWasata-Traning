<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function register()
  {

    return view('auth.register');
  }

  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'nat_num' => 'required|string|min:10',
          'password' => 'required|string|min:8|confirmed',
          'password_confirmation' => 'required',
      ]);

      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'nat_num' => $request->nat_num,
          'password' => Hash::make($request->password),
      ]);

      return redirect('login');
  }

}