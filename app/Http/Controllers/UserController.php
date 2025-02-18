<?php

namespace App\Http\Controllers;

use App\Models\User; // import this
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // import this for password hashing

class UserController extends Controller
{
    //here create all crud logic
    public function loadAllUsers(){
        $all_users = User::all();
        return view('users', compact('all_users'));
    }

    public function loadAddUserForm(){
        return view('add-user');
    }

    public function AddUser(Request $request){
        // form validation here
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|',
            'password' => 'required|confirmed|min:4|max:8',


        ]);
        try {
            // create new user
            $new_user = new User();
            $new_user->full_name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->password = Hash::make($request->password);
            $new_user->save();

            return redirect('/users')->with('success','User Added Successfully');
        } catch (\Exception $e) {
            return redirect('/add/user')->with('fail', $e->getMessage());
        }




    }
}
