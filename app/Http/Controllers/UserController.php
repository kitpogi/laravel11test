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

    // public function EditUser(Request $request){
    //     $request->validate([
    //         'full_name' => 'required|string',
    //         'email' => 'required|email|unique:users',
    //         'phone_number' => 'required|',



    //     ]);
    //     try {
    //         // update new user
    //         $update_user = User::where('id:', $request->user_id)->update([
    //             'full_name' => $request->full_name,
    //             'email' => $request->email,
    //             'phone_number' => $request->phone_number,

    //         ]);


    //         return redirect('/users')->with('success','User Updated Successfully');
    //     } catch (\Exception $e) {
    //         return redirect('/edit/user')->with('fail', $e->getMessage());
    //     }
    // }

    public function EditUser(Request $request){
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->user_id, // Ignore current user email
            'phone_number' => 'required',
        ]);

        try {
            // Find the user first
            $user = User::find($request->user_id);
            if (!$user) {
                return redirect('/users')->with('fail', 'User not found');
            }

            // Update user fields
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->save();

            return redirect('/users')->with('success', 'User Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/edit/user')->with('fail', $e->getMessage());
        }
    }


    public function loadEditForm($id){
        $user = User::find($id);

        if (!$user) {
            return redirect('/users')->with('fail', 'User not found');
        }

        return view('edit-user', compact('user'));
    }

    public function deleteUser ($id){
        try{
            User::where('id', $id)->delete();
            return redirect('/users')->with('success', 'User Deleted Successfully');
        } catch (\Exception $e ){
            //throw $th
            return redirect('/users')->with('fail', $e->getMessage());
        }
    }
}
