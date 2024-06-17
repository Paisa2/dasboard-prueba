<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('categoria', [\App\Http\Controllers\Admin\CategoriaController::class, 'index']);

    Route::get('add-categoria', [\App\Http\Controllers\Admin\CategoriaController::class, 'create']);

    Route::post('add-categoria', [\App\Http\Controllers\Admin\CategoriaController::class, 'store']);

Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])
->name('register.store');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])
->middleware('guest')
->name('register.index');


Route::post('/registerAdmin', [App\Http\Controllers\RegisterAdminController::class, 'store'])
->name('admin.registerAdminStore');

Route::get('/registerAdmin', [App\Http\Controllers\RegisterAdminController::class, 'create'])
->middleware('guest')
->name('admin.registerAdmin');


Route::get('/login', [App\Http\Controllers\SessionsController::class, 'create'])
->middleware('guest')
->name('login.index');

Route::post('/login', [App\Http\Controllers\SessionsController::class, 'store'])
->name('login.store');

Route::get('/logout', [App\Http\Controllers\SessionsController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

Route::get('/usuario', [App\Http\Controllers\UserController::class, 'index'])
->middleware('auth.user')
->name('user.index');

Route::get('/auth', function () {
    return view('index');
})->middleware('auth.user')
->name('auth.user');

});
