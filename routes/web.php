<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\PostController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserAdminController;

use App\Http\Controllers\Auth\LoginController;


Route::get('/admin', function(){
    return view('auth.admin');
});

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


//PagesController
Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get ('/home', [PagesController::class, 'index']);
// Route::get('/about', [PagesController::class, 'about']);
// Route::get('/services', [PagesController::class, 'services']);

//UserController
Route::get('/profile', [UserController::class, 'index']);
Route::get('/profile/edit', [UserController::class, 'edit']);
Route::post('/profile', [UserController::class, 'update'])->name('editprofile');
// Route::get('/users',[UserController::class, 'showUsers']);
// Route::get('/users/view/{id}',[UserController::class, 'viewUsers'])->name('viewuser');
// Route::post('/users/delete/{id}', [UserController::class, 'destroy'])->name('deleteuser');

//PostController
Route::resource('posts', 'App\Http\Controllers\PostController');

//AuthRoutes
Auth::routes();

//Admin
// Route::get('/admin', function(){
//     dd('Auth Admin works');
// })->middleware(['auth','auth.admin']);
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users','AdminController',['except' =>['show','create','store']]);
//->middleware(['auth','auth.admin'])
//UserAdmin
Route::resource('user', 'UserAdminController');





});

