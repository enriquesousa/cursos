<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalizationController;


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');


// Route::get('/dashboard', function () {
//     return view('frontend.dashboard.index');
// })->middleware(['auth', 'verified'])->withoutMiddleware('last.interaction')->name('dashboard');

Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth.session', 'verified'])->withoutMiddleware('last.interaction')->name('dashboard');

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
Route::get('/frontend/about', [UserController::class, 'FrontendAbout'])->name('frontend.about');

Route::get('/locale/{locale}', [LocalizationController::class, 'setLanguage'])->name('locale');

// User con login
Route::middleware('auth.session')->group(function () {

    Route::get('/user/view/profile', [UserController::class, 'UserViewProfile'])->name('user.view.profile');
    Route::get('/user/edit/profile', [UserController::class, 'UserEditProfile'])->name('user.edit.profile');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');

    Route::get('/user/view/change/language', [UserController::class, 'UserViewChangeLanguage'])->name('user.view.change.language');
    Route::post('/user/update/change/language', [UserController::class, 'UserUpdateChangeLanguage'])->name('user.update.change.language');

});


// Admin Route Login Page
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Admin Routes
Route::middleware(['auth.session', 'roles:admin'])->group(function () {
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
Route::middleware(['auth.session', 'roles:instructor'])->group(function () {
    Route::get('/instructor/dashboard', [InstructorController::class, 'InstructorDashboard'])->name('instructor.dashboard');
    Route::get('/instructor/logout', [InstructorController::class, 'InstructorLogout'])->name('instructor.logout');
    Route::get('/instructor/profile', [InstructorController::class, 'InstructorProfile'])->name('instructor.profile');
    Route::post('/store/instructor/profile', [InstructorController::class, 'StoreInstructorProfile'])->name('store.instructor.profile');
    Route::get('/instructor/change/password', [InstructorController::class, 'InstructorChangePassword'])->name('instructor.change.password');
    Route::post('/update/instructor/password', [InstructorController::class, 'UpdateInstructorPassword'])->name('update.instructor.password');
});

 
