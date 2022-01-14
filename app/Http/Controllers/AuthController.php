<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $result = $user->save();

        if ($result) {
            return back()->with('success', 'You have been successfully registered');
        } else {
            return back()->with('fail', 'Registration has been failed');
        }
    }


    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:13'
        ]);

        $user = User::where('email', $request->email)->first();

        $user->password = Hash::make($request->password);

        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('user', $user);
                return redirect('userPage');
            } else {
                return back()->with('fail', 'Unmatched password');
            }
        } else {
            return back()->with('fail', 'Unknown credentials');
        }
    }

    public function welcome()
    {
        return view('auth.userPage');
    }
}
