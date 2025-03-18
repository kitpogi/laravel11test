<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController; // Fixed controller name
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'loadDashboard'])->name('dashboard');

    // Student CRUD routes
    Route::get('/students', [StudentController::class, 'loadAllStudents'])->name('students.index');
    Route::get('/add/student', [StudentController::class, 'loadAddStudentForm'])->name('students.add');
    Route::post('/add/student', [StudentController::class, 'AddStudent'])->name('students.store');
    Route::get('/edit/student/{id}', [StudentController::class, 'loadEditForm'])->name('students.edit');
    Route::post('/edit/student', [StudentController::class, 'EditStudent'])->name('students.update');
    Route::get('/delete/student/{id}', [StudentController::class, 'deleteStudent'])->name('students.delete');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin dashboard (Make sure 'admin' middleware exists before using it)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
 