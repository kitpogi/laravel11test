<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/users', [UserController::class, 'loadAllUsers']);
Route::get('add/user', [UserController::class, 'loadAddUserForm']);

Route::post('add/user', [UserController::class, 'AddUser'])->name('AddUser');
