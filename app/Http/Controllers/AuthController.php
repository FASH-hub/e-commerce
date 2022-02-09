<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
   
    /*
    * ------------------------------------
    * Displays all the users registered
    * ------------------------------------
    */
    function displayUsers()
    {
        return User::all();
    }


    /*
    * ------------------------------
    * Display  user by id
    * ------------------------------
    */
    public function displayUserId($id)
    {
        return User::find($id);
    }


    /*
    * ------------------------------------------------
    * creates a new user
    * ------------------------------------------------
    */
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
        $result = $user->save();

        if ($result) {
            return ('You have been successfully registered');
        } else {
            return ('Registration has been failed');
        }
    }



    /**
     * ----------------------------------
     * Delete an user from database.
     * ----------------------------------
     */
    public function deleteUser($id)
    {
        $user = User::find($id);

        $resutl = $user->delete();

        if ($resutl) {
            return ["member" => "has been deleted"];
        } else {
            return ["member" => "couldn't be deleted"];
        }
    }




    /*
    * ------------------------------
    * Updates the user according to the received id.
    * ------------------------------
    */

    public function updateUser(Request $request, $id)
    {

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;

        $member = $user->save();
        if ($member) {
            return ["member" => " updated"];
        } else {
            return ["member" => " couldn't be updated"];
        }
    }


    /*
    * ------------------------------
    * Login
    * ------------------------------
    */
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
                $request->session()->put('userId', $user->id);
                return redirect('userPage');
            } else {
                return back()->with('fail', 'Unmatched password');
            }
        } else {
            return back()->with('fail', 'Unknown credentials');
        }
    }


    /*
    * ------------------------------
    * Updates the password according to the user's received id.
    * ------------------------------
    */
    function updatePsswd(Request $request, $id)
    {
        $psswd = $request->User::find($id);
        $psswd->password = Hash::make($request->password);
        $result = $psswd->save();
        if ($result) {
            return ["Your password has been updated successfully"];
        } else {
            return ["Your password failed to be updated"];
        }
    }




    /*
    * ------------------------------
    * logout
    * ------------------------------
    */
    public function logout()
    {

        if (Session::has('userId')) {
            Session::pull('userId');
            return  redirect('login-user');
        }
        
    }
}
