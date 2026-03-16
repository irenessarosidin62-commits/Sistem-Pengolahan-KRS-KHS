<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardKrsController;

Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/welcome', function () {
   return view('welcome');
});

Route::get('/user/{id}', function ($id) {
    return 'User dengan ID ' . $id;
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });
    Route::get('/users', function () {
        return 'Admin Users';
    });
});

Route::get('/listbarang/{id}/{nama}', [ListBarangController::class, 'tampilkan']);
