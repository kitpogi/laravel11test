<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //here create all crud logic
    public function loadAllUsers(){
        return view('users');
    }
}
