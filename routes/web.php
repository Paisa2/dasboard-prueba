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

});
