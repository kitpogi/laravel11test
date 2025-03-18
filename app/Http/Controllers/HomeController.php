<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if (Auth::user()->userType === 'admin') {
            return view('admin.dashboard', compact('students'));
        }

        return view('dashboard', compact('students'));
    }
}

