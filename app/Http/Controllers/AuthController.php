<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:13'
        ]);

        $user = new User();
        $user->name = $request->naame;
        $user->email = $request->email;
        $user->password = $request->password;
        $result = $user->save();

        if ($result) {
            return back()->with('success', 'You have been successfully registered');
        } else {
            return back()->with('fail', 'Registration has been failed');
        }
    }
}
