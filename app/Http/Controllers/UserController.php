<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function user()
    {
        return view('userView.user');
    }

    public function addUser()
    {
        $user = DB::table('users')
            ->insert([
                'firstName' => 'Yvan', 'lastName' => 'BOBO', 'email' => 'bobpro@merco.com',
                'password' => Hash::make('yarabi')
            ]);
        dd($user);
    }
}
