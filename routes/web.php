<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\UserController;



// Route::get('/', function () {
//     return view('welcome');
// })->name('home');


Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Mis Rutas
|--------------------------------------------------------------------------
*/

// User sin login
Route::get('/', [UserController::class, 'Index'])->name('home');
Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login');
Route::get('/user/register', [UserController::class, 'UserRegister'])->name('user.register');

// User con login
Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
});


// Admin Route Login Page
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Admin Routes
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/store/admin/profile', [AdminController::class, 'StoreAdminProfile'])->name('store.admin.profile');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/admin/password', [AdminController::class, 'UpdateAdminPassword'])->name('update.admin.password');
});

// Instructor Routes Login Page
Route::get('/instructor/login', [InstructorController::class, 'InstructorLogin'])->name('instructor.login');

// Instructor con login Routes
Route::middleware(['auth', 'roles:instructor'])->group(function () {
    Route::get('/instructor/dashboard', [InstructorController::class, 'InstructorDashboard'])->name('instructor.dashboard');
    Route::get('/instructor/logout', [InstructorController::class, 'InstructorLogout'])->name('instructor.logout');
    Route::get('/instructor/profile', [InstructorController::class, 'InstructorProfile'])->name('instructor.profile');
    Route::post('/store/instructor/profile', [InstructorController::class, 'StoreInstructorProfile'])->name('store.instructor.profile');
    Route::get('/instructor/change/password', [InstructorController::class, 'InstructorChangePassword'])->name('instructor.change.password');
    Route::post('/update/instructor/password', [InstructorController::class, 'UpdateInstructorPassword'])->name('update.instructor.password');
});

 
